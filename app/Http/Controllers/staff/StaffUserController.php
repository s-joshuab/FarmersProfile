<?php

namespace App\Http\Controllers\staff;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class StaffUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function users()
    {
        $users = User::all();
        return view('staff.users', compact('users'));
    }


    public function store(Request $request)
    {
        // Check if username or email is duplicate
        if (User::where('username', $request->username)->exists() || User::where('email', $request->email)->exists()) {
            session()->flash('error', 'Username or email is already taken.');
            return redirect()->back();
        }

        // Add the user to the database
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone_number' => 'required|numeric', // Add the numeric rule here
            'status' => 'required',
            'user_type' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Error occurred during Adding Secretary.');
        }

        User::create([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'phone_number' => $request->input('phone_number'),
            'status' => $request->input('status'),
            'user_type' => $request->input('user_type')
        ]);

        return redirect('staff/manageusers')->with('message', 'User Added Successfully!');
    }




    /**
     * Display the specified resource.
     */
    public function create()
    {
        return view('staff.users')->with('message', 'User Added Succesfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
