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
date_default_timezone_set('Asia/Manila');
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function admin()
    {
        $mostPlantedByBarangay = $this->mostPlantedCommoditiesByBarangay();
        $barangays = Barangays::all();
        $farmerCount = FarmersProfile::count();
        $user = User::count();
        $benefits = FarmersProfile::where('benefits', 'yes')->count();
        $status = FarmersProfile::where('status', 'Active')->count();

        $maleCount = FarmersProfile::where('sex', 'Male')->count();
        $femaleCount = FarmersProfile::where('sex', 'Female')->count();
        $activeStatusCount = FarmersProfile::where('status', 'Active')->count();

        // Fetch the count of inactive farmers
        $inactiveStatusCount = FarmersProfile::where('status', 'Inactive')->count();
        // Fetch unique commodities_id values from the Crops table
        $commoditiesIds = crops::distinct('commodities_id')->pluck('commodities_id')->toArray();

        // Initialize variables to store commodity names and counts
        $commodityNames = [];
        $commodityCounts = [];

        $maxCommodityCounts = []; // Initialize an array to store counts of the highest commodities
        $maxCommodities = []; // Initialize an array to store commodities with the highest count

        foreach ($commoditiesIds as $commodityId) {
            // Exclude records with null commodities_id
            if (!is_null($commodityId)) {
                $count = crops::where('commodities_id', $commodityId)->count();

                if (empty($maxCommodityCounts) || $count > max($maxCommodityCounts)) {
                    // If this commodity has a higher count, clear the previous counts
                    $maxCommodityCounts = [$count];
                    $maxCommodities = [];
                }

                if ($count == max($maxCommodityCounts)) {
                    // If this commodity has the same highest count, add its count to the list
                    $commodity = Commodities::find($commodityId);
                    $commodityName = $commodity ? $commodity->commodities : "Unknown";
                    $maxCommodities[] = ['name' => $commodityName, 'count' => $count];
                }

                $commodityCounts[] = $count;

                // Fetch and store the commodity name based on the commodities_id
                $commodity = Commodities::find($commodityId);
                if ($commodity) {
                    $commodityName = $commodity->commodities;
                    $commodityNames[] = $commodityName;
                } else {
                    $commodityNames[] = "Unknown"; // Provide a default value for missing commodities
                }
            }
        }

        // Find the maximum commodity count and its corresponding name and ID
        $maxCommodityIndex = array_search(max($commodityCounts), $commodityCounts);
        if ($maxCommodityIndex !== false) {
            $maxCommodityCount = $commodityCounts[$maxCommodityIndex];
            $maxCommodityName = $commodityNames[$maxCommodityIndex];
            $maxCommodityId = $commoditiesIds[$maxCommodityIndex];
        } else {
            // Set default values if there are no commodities
            $maxCommodityCount = 0;
            $maxCommodityName = "No Commodities";
            $maxCommodityId = null;
        }

        return view('admin.admin', compact('mostPlantedByBarangay', 'maxCommodities','maxCommodityName', 'farmerCount', 'benefits', 'status', 'user', 'commodityCounts', 'commodityNames', 'commoditiesIds', 'maleCount', 'femaleCount', 'barangays', 'maxCommodityIndex', 'activeStatusCount', 'inactiveStatusCount', 'maxCommodityCount', 'maxCommodityId'));
    }


    public function mostPlantedCommoditiesByBarangay()
    {
        // Fetch data for most planted commodities by barangay
        $mostPlantedByBarangay = DB::table('crops')
            ->rightJoin('farmersprofile', 'crops.farmersprofile_id', '=', 'farmersprofile.id')
            ->rightJoin('barangays', 'farmersprofile.barangays_id', '=', 'barangays.id')
            ->leftJoin('commodities', 'crops.commodities_id', '=', 'commodities.id')
            ->select('barangays.barangays as barangay', 'commodities.commodities', DB::raw('COUNT(*) as commodities_count'))
            ->groupBy('barangays.barangays', 'commodities.commodities')
            ->orderBy('barangays.barangays') // Order by barangay name
            ->get();

        // Group the results by barangay for easier processing
        $groupedData = $mostPlantedByBarangay->groupBy('barangay');

        // Initialize an array to store the final data for the table
        $tableData = [];

        foreach ($groupedData as $barangay => $data) {
            // Find the commodity with the highest count for the current barangay
            $maxCommodity = $data->sortByDesc('commodities_count')->first();

            $rowData = [
                'barangay' => $barangay,
                'most_commodity' => $maxCommodity ? $maxCommodity->commodities : 'No Data',
                'commodities_count' => $maxCommodity ? $maxCommodity->commodities_count : 0,
            ];

            $tableData[] = $rowData;
        }

        return $tableData;
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
