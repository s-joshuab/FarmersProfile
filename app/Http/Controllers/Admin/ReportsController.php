<?php

namespace App\Http\Controllers\Admin;

use App\Models\Crops;
use App\Models\Barangays;
use App\Models\Commodities;
use App\Models\FarmersProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Spatie\Activitylog\LogOptions;

date_default_timezone_set('Asia/Manila');

class ReportsController extends Controller
{
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'username', 'user_type']);
    }

    public function reports(Request $request)
    {
        $selectedBarangay = $request->input('barangayFilter');
        $selectedCommodities = $request->input('commoditiesFilter');
        $selectedStatus = $request->input('statusFilter');

        $farmersQuery = FarmersProfile::query();

        if ($selectedBarangay) {
            $farmersQuery->where('barangays_id', $selectedBarangay);
        }

        if ($selectedStatus) {
            $farmersQuery->where('status', $selectedStatus);
        }

        $farmersQuery->with(['crops' => function ($query) {
            // Select only the columns you need from the crops table
            $query->select('id', 'commodities_id', 'farm_size', 'farm_location', 'farmersprofile_id');
        }]);

        $farmers = $farmersQuery->get();
        $barangays = Barangays::all();
        $commodities = Commodities::all();
        $farm = FarmersProfile::paginate(10);

        // Loop through each farmer and update the crops relationship to include farm_size and farm_location
        foreach ($farmers as $farmer) {
            $farmer->crops->each(function ($crop) use ($selectedCommodities) {
                $crop->farm_size = $crop->farm_size ?? 'No Data';
                $crop->farm_location = $crop->farm_location ?? 'No Data';

                // Filter crops based on selected commodities
                if (!empty($selectedCommodities)) {
                    if (!in_array($crop->commodities_id, $selectedCommodities)) {
                        $crop->farm_size = 'No Data';
                        $crop->farm_location = 'No Data';
                    }
                }
            });
        }

        return view('admin.reports.index', compact('farm', 'farmers', 'barangays', 'commodities', 'selectedBarangay', 'selectedCommodities', 'selectedStatus'));
    }


    public function search(Request $request)
    {
        $selectedBarangay = $request->input('barangayFilter');
        $selectedCommodities = $request->input('commoditiesFilter');
        $selectedStatus = $request->input('statusFilter');

        $farmersQuery = FarmersProfile::query();

        if ($selectedBarangay) {
            $farmersQuery->where('barangays_id', $selectedBarangay);
        }

        if ($selectedStatus) {
            $farmersQuery->where('status', $selectedStatus);
        }

        $farmersQuery->with(['crops' => function ($query) {
            // Select only the columns you need from the crops table
            $query->select('id', 'commodities_id', 'farm_size', 'farm_location', 'farmersprofile_id');
        }]);

        $farmers = $farmersQuery->get();
        $barangays = Barangays::all();
        $commodities = Commodities::all();
        $farm = FarmersProfile::paginate(10);

        // Loop through each farmer and update the crops relationship to include farm_size and farm_location
        foreach ($farmers as $farmer) {
            $farmer->crops->each(function ($crop) use ($selectedCommodities) {
                $crop->farm_size = $crop->farm_size ?? 'No Data';
                $crop->farm_location = $crop->farm_location ?? 'No Data';

                // Filter crops based on selected commodities
                if (!empty($selectedCommodities)) {
                    if (!in_array($crop->commodities_id, $selectedCommodities)) {
                        $crop->farm_size = 'No Data';
                        $crop->farm_location = 'No Data';
                    }
                }
            });
        }

        return view('admin.reports.search', compact('farm', 'farmers', 'barangays', 'commodities', 'selectedBarangay', 'selectedCommodities', 'selectedStatus'));
    }

}
