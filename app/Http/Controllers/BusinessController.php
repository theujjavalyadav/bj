<?php

namespace App\Http\Controllers;

use App\Http\Requests\BusinessRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Business;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use app\Repositories\BusinessRepositoryInterface;

class BusinessController extends Controller
{

    protected $businessRepository;

    public function __construct(BusinessRepositoryInterface $businessRepository)
    {
        $this->businessRepository = $businessRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $businesses = $this->businessRepository->getAll();

        return view('business.index', ['businesses' => $businesses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('business.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BusinessRequest $request)
    {

        $validatedData = $request->validated();

        if ($request->hasFile('logo')) {

            $validatedData['logo'] = $request->file('logo')->store('image', 'public');
        }

        $business = Business::create($validatedData);

        Alert::success('Success!', 'Business Added Successfully')->flash();

        if (!$business) {

            return back()->with('error', 'Business Not Added Please Try Again');
        
        } else {

            return redirect()->route('Business.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $business = $this->businessRepository->getById($id);

        if (!$business) {
            return redirect()->route('Business.index');
        }

        return view('showActions.business', compact('business'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $business = $this->businessRepository->editBusiness($id);

        return  view('business.edit', ['businesses' => $business]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $business = $this->businessRepository->updateBusiness($id);
        if (!$business) {

            return response()->json(['message' => 'Business not found'], 404);
        }
        // Validate input
        $validatedData = $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('businesses', 'email')->ignore($id)],
            'business_type' => 'required|string|max:255',
            'description' => 'required|string',
        ]);


        //  $business->update([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'business_type' => $request->business_type,
        //     'description' => $request->description,
        //     'logo' => $request->hasFile('logo') ? $request->file('logo')->store('image', 'public') : $business->logo
        // ]);


        // Ensure email updates manually
        $business->email = $validatedData['email'];
        $business->name = $validatedData['name'];
        $business->business_type = $validatedData['business_type'];
        $business->description = $validatedData['description'];

        if ($request->hasFile('logo')) {
            $business->logo = $request->file('logo')->store('image', 'public');
        }

        $business->save();
        Alert::success('Success', 'Business Updated Successfully');
       
        return redirect()->route('Business.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $business = $this->businessRepository->destroyBusiness($id);
        Alert::success('Deleted!', 'Business has been successfully deleted.');
        $business->delete();

        return redirect('Business');
    }
}
