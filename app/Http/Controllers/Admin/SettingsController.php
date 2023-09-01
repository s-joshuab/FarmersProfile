<?php

namespace App\Http\Controllers\Admin;


use App\Models\User;
use App\Models\Barangays;
use App\Models\Provinces;
use App\Models\AuditTrail;
use App\Models\ImageUpload;
use Illuminate\Http\Request;
use App\Models\Municipalities;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Validator;


class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function audit()
    {
        $activities = Activity::all();
        return view('admin.settings.audittrail', compact('activities'));
    }


    public function profile()
    {
        $provinces= Provinces::all();
        $municipalities = Municipalities::all();
        $barangays = Barangays::all();
        $user = Auth::User(); // Fetch the authenticated user
        return view('admin.settings.profile', compact('user', 'provinces', 'municipalities', 'barangays'));
    }

    public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    // Validate the form data for updating a profile
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'email' => [
            'required',
            'email',
            Rule::unique('users')->ignore($user->id),
        ],
        'phone_number' => 'required|numeric',
        'image' => [
            'image',
            'mimes:jpeg,png,jpg,gif',
            'max:2048',
        ],
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Validation failed.');
    }

    // Update the user's profile information
    $user->update([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'phone_number' => $request->input('phone_number'),
    ]);

    // Handle profile image upload if a new image was provided
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('assets/img/profiles'), $imageName);

        // Delete the old profile image if it exists
        if ($user->image) {
            $oldImagePath = public_path('assets/img/profiles') . '/' . $user->image;
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        // Update the user's profile image path in the database
        $user->image = $imageName;
        $user->save();
    }

    return redirect('admin/profile')->with('success', 'Profile updated successfully');
}








    public function backup()
    {
        return view('admin.settings.sysbackup');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
