<?php

namespace App\Http\Controllers\Admin;


use PDF;
use App\Exports\FarmersExport;
use App\Models\Barangays;
use App\Models\Commodities;
use Illuminate\Http\Request;
use App\Models\FarmersProfile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;


class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function reports(Request $request)
    {
        $selectedBarangay = $request->input('barangayFilter');
        $selectedCommodity = $request->input('commoditiesFilter');
        $selectedStatus = $request->input('statusFilter');

        $farmersQuery = FarmersProfile::with(['crops.commodity', 'crops.farmersprofile']); // Eager load the related data // Eager load the related data

        if ($selectedBarangay) {
            $farmersQuery->where('barangays_id', $selectedBarangay);
        }

        if ($selectedCommodity) {
            $farmersQuery->whereHas('crops.commodity', function ($q) use ($selectedCommodity) {
                $q->whereIn('id', [$selectedCommodity]);
            });
        }

        if ($selectedStatus) {
            $farmersQuery->where('status', $selectedStatus);
        }

        $farmers = $farmersQuery->get();
        $barangays = Barangays::all();
        $commodities = Commodities::all();
        $farm = FarmersProfile::paginate(10);

        return view('admin.reports.index', compact('farm', 'farmers', 'barangays', 'commodities', 'selectedBarangay', 'selectedStatus', 'selectedCommodity'));
    }



}
