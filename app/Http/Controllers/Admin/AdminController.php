<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function admin()
    {
        return view('admin.admin');
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function farmdata()
    // {
    //     return view('admin.farmers.farmdata');
    // }

    /**
     * Store a newly created resource in storage.
     */
    // public function reports()
    // {
    //     return view('admin.farmers.reports');
    // }

    /**
     * Display the specified resource.
     */

    public function store(Request $request)
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
