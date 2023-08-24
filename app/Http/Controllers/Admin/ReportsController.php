<?php

namespace App\Http\Controllers\Admin;


use PDF;
use Illuminate\Http\Request;
use App\Exports\FarmersExport;
use App\Models\FarmersProfile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function reports()
    {
        $farmers = FarmersProfile::all();
        return view('admin.reports.index', compact('farmers'));
    }

    // public function generateExcel()
    // {
    //     return Excel::download(new FarmersExport(), 'farmers_report.xlsx');
    // }

    // public function generatePdf()
    // {
    //     $farmers = FarmersProfile::all();
    //     $pdf = PDF::loadView('admin.reports.index', compact('farmers'));
    //     return $pdf->stream('farmers_report.index');
    // }
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
