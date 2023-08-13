<?php

namespace App\Http\Controllers\Admin;

use App\Models\AuditTrail;
use App\Models\User;
use App\Models\ImageUpload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\Models\Activity;

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
        $user = Auth::user(); // Fetch the authenticated user
        return view('admin.settings.profile', compact('user'));
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
