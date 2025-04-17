<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    /**
     * User registration
     */
    public function registration(AuthRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        if ($user) {

            Auth::login($user);
            Alert::success('Success', 'Registration successful. Welcome to the dashboard!');

            return redirect()->route('dashboard');
        } else {

            return back()->with('error', 'Registration failed. Please try again.');
        }
    }
    
    //regisetred user login 
    function login(Request $request)
    {
        $user = $request->only('email', 'password');

        if (Auth::attempt($user)) {

            return redirect()->route('dashboard');
            Alert::success('Success', 'Login Successful');
        }

        return back()->with('error', 'Invalid email or password. Please try again.');
    }

    /**
     * Return dashboard view
     */
    function dashboard()
    {
        return view("welcome");
    }

    //logined user profile
    function profile($id)
    {
        $user = User::where('id', $id)->first();

        if (!$user) return redirect()->route('dashboard');

        return view('users.profile', ['users' => $user]);
    }

    //user logout
    function logout()
    {
        Auth::logout();
        Alert::success('Success', 'Logout Successfully');

        return redirect('login');
    }
}
