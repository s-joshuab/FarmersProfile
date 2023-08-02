<?php

namespace App\Http\Controllers\Admin;

use App\Models\Province;
use App\Models\Commodities;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\machine;

class FarmersDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function farmdata()
    {
        return view('admin.farmers.index');
    }

    public function form(Request $request)
    {

        $commodities = Commodities::where('categories', 0)->pluck('commodities', 'id')->all();
        $farmers = Commodities::where('categories', 1)->pluck('commodities', 'id')->all();
        $machine = Machine::pluck('machine', 'id')->all();

        $provinces = Province::all();
        // Add more queries for other categories if needed

        return view('admin.farmers.add', compact('commodities', 'farmers', 'provinces', 'machine'));
    }

    public function ID()
    {
        return view('admin.farmers.id');
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
