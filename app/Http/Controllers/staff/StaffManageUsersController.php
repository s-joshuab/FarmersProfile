<?php

namespace App\Http\Controllers\staff;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StaffManageUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function manage()
    {
        $users = User::all();
        return view('staff.settings.users.manageusers', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::findorfail($id);
        return view('staff.settings.users.view', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findorfail($id);
        return view('staff.settings.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'phone_number' => 'required|numeric',
            'user_type' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Error occurred during user update.');
        }

        $user->update([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'user_type' => $request->input('user_type'),
            'status' => $request->input('status'),
        ]);

        // Redirect to a success page or show a success message
        return redirect('staff/manageusers')->with('message', 'User updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
