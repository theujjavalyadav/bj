<?php

namespace App\Http\Controllers;
use App\Http\Requests\LocationRequest;
use App\Models\Business;
use Illuminate\Http\Request;
use  App\Models\Location;
use App\Repositories\LocationRepositoryInterface;
use Illuminate\Cache\Lock;
use RealRashid\SweetAlert\Facades\Alert;

class LocationController extends Controller
{

    protected $locationRepository;

    public function __construct(LocationRepositoryInterface $locationRepository)
    {
        $this->locationRepository = $locationRepository;
    }


    //get all location data and redirect to index 
    function showLocation()
    {
        // $Locations = Location::all();
        $locations = $this->locationRepository->getLocations();

        return view('location.index', ['locations' => $locations]);
       

    }
    //store location
    public function store(LocationRequest $request)
    {
        $validatedData = $request->validated();
        $location = $this->locationRepository->create($validatedData);

        if (isset($location['error'])) {
            return back()->with('error', $location['error']);
        }

        Alert::success('Success!', 'New Location successfully added');
        return redirect()->route('showLocation');
    }

    //delete locatin
    function delete($id)
    {
        $location = $this->locationRepository->destroyLocation($id);
        $location->delete('Success', 'Location Successfully Delete');
        Alert::success('Success', 'Business Successfully Delete');

        return redirect('showLocation');
    }
    //show periculer location list
    function show($id)
    {
        $location = Location::where('id', $id)->with('business')->first();

        if (!$location) {
            return redirect()->route('showLocation');
        }

        return view('showActions.location', ['location' => $location]);
    }
    // edit location
    function edit($id)
    {

        
        $business = Business::all();
        $location = $this->locationRepository->editLocation($id);

        return view('location.edit', ['locations' => $location, 'businesses' => $business]);
    }
    //update location
    function update(LocationRequest $request, $id)
    {

        $location = $this->locationRepository->updateLocation($id);

        if (!$location) {
            return response()->json(['message' => 'Location not found'], 404);
        }

        $validatedData = $request->validated();
        $location->update($validatedData);

        Alert::success('Success', 'Business Successfully Updated');

        return redirect('showLocation');
    }
}
