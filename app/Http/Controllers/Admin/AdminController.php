<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\crops;
use App\Models\Barangays;
use App\Models\Commodities;
use Illuminate\Http\Request;
use App\Models\FarmersProfile;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function admin()
    {
        $barangays = Barangays::all();
        $farmerCount = FarmersProfile::count();
        $user = User::count();
        $benefits = FarmersProfile::where('benefits', 'yes')->count();
        $status = FarmersProfile::where('status', 'Active')->count();

        $maleCount = FarmersProfile::where('sex', 'Male')->count();
        $femaleCount = FarmersProfile::where('sex', 'Female')->count();

        // Fetch unique commodities_id values from the Crops table
        $commoditiesIds = crops::distinct('commodities_id')->pluck('commodities_id')->toArray();

        // Initialize variables to store commodity names and counts
        $commodityNames = [];
        $commodityCounts = [];

        $maxCommodityIndex = null; // Initialize maxCommodityIndex with null

        foreach ($commoditiesIds as $commodityId) {
            $count = crops::where('commodities_id', $commodityId)->count();
            $commodityCounts[] = $count;

            // Fetch and store the commodity name based on the commodities_id
            $commodityName = Commodities::find($commodityId)->commodities;
            $commodityNames[] = $commodityName;

            // Update maxCommodityIndex if needed
            if ($maxCommodityIndex === null || $count > $commodityCounts[$maxCommodityIndex]) {
                $maxCommodityIndex = count($commodityCounts) - 1;
            }
        }

        // Find the maximum commodity count and its corresponding name and ID
        if ($maxCommodityIndex !== null) {
            $maxCommodityCount = $commodityCounts[$maxCommodityIndex];
            $maxCommodityName = $commodityNames[$maxCommodityIndex];
            $maxCommodityId = $commoditiesIds[$maxCommodityIndex];
        } else {
            // Set default values if there are no commodities
            $maxCommodityCount = 0;
            $maxCommodityName = "No Commodities";
            $maxCommodityId = null;
        }

        return view('admin.admin', compact('maxCommodityName', 'farmerCount', 'benefits', 'status', 'user', 'commodityCounts', 'commodityNames', 'commoditiesIds', 'maleCount', 'femaleCount', 'barangays', 'maxCommodityIndex', 'maxCommodityCount', 'maxCommodityId'));
    }




    public function getFarmerCount($id)
    {
        // Fetch the barangay name and count of farmers
        $barangay = Barangays::find($id);
        $farmerCount = FarmersProfile::where('barangays_id', $id)->count();

        return response()->json([
            'barangayName' => $barangay->name,
            'farmerCount' => $farmerCount,
        ]);
    }


    public function getAllFarmersCount()
{
    $farmerCount = FarmersProfile::count();

    return response()->json([
        'barangayName' => 'All Barangay',
        'farmerCount' => $farmerCount,
    ]);
}

public function getStatusCount($status)
{
    // Fetch the count of items based on the selected status filter
    $count = FarmersProfile::where('status', $status)->count();

    return response()->json([
        'count' => $count,
    ]);
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
