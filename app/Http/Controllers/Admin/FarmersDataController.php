<?php

namespace App\Http\Controllers\Admin;

use App\Models\machine;
use App\Models\Regions;
use App\Models\Barangay;
use App\Models\Barangays;
use App\Models\Provinces;
use App\Models\Commodities;
use Illuminate\Http\Request;
use App\Models\FarmersProfile;
use App\Models\Municipalities;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class FarmersDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function farmdata()
    {
        return view('admin.farmers.index');
    }

    public function create(Request $request)
{
    $regions = Regions::pluck('name', 'id');
    $commodities = Commodities::where('category', 0)->pluck('commodities', 'id')->all();
    $farmers = Commodities::where('category', 1)->pluck('commodities', 'id')->all();
    $machine = Machine::pluck('machine', 'id')->all();

    return view('admin.farmers.create', compact('commodities', 'farmers','machine', 'regions'));
}

    public function ID()
    {
        return view('admin.farmers.id');
    }

    public function getProvinces(Request $request)
    {
        $regionsId = $request->input('regions_id');
        $provinces = Provinces::where('regions_id', $regionsId)->pluck('name', 'id');
        return response()->json($provinces);
    }

    /**
     * AJAX endpoint to fetch municipalities based on selected province
     */
    public function getMunicipalities(Request $request)
    {
        $provincesId = $request->input('provinces_id');
        $municipalities = Municipalities::where('provinces_id', $provincesId)->pluck('name', 'id');
        return response()->json($municipalities);
    }

    /**
     * AJAX endpoint to fetch barangays based on selected municipality
     */
    public function getBarangays(Request $request)
    {
        $municipalitiesId = $request->input('municipalities_id');
        $barangays = Barangays::where('municipalities_id', $municipalitiesId)->pluck('name', 'id');
        return response()->json($barangays);
    }

    public function store(Request $request)
    {
        // Validate the input data
        $validator = Validator::make($request->all(), [
            'ref_no' => 'required',
            'status' => 'required',
            'sname' => 'required',
            'fname' => 'required',
            'mname' => 'required',
            'ename' => 'required',
            'sex' => 'required',
            'spouse' => 'required',
            'number' => 'required',
            'regions_id' => 'required|exists:regions,id',
            'provinces_id' => 'required|exists:provinces,id',
            'municipalities_id' => 'required|exists:municipalities,id',
            'barangays_id' => 'required|exists:barangays,id',
            'purok' => 'required',
            'house' => 'required',
            'dob' => 'required|date',
            'pob' => 'required',
            'religion' => 'required',
            'cstatus' => 'required',
            'education' => 'required',
            'pwd' => 'required',
            'benefits' => 'required',
            'livelihood' => 'required=',
            'gross' => 'required|numeric',
            'parcels' => 'required|numeric',
            'arb' => 'required',
            // Add other validation rules for other fields here...
        ]);

        if ($validator->fails()) {
            dd($validator->errors()->all());
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Error occurred during Adding.');
        }

        // Create the farmer profile using the FarmersProfile model
        $farmersprofile = FarmersProfile::create([
            'ref_no' => $request->input('ref_no'),
            'status' => $request->input('status'),
            'sname' => $request->input('sname'),
            'fname' => $request->input('fname'),
            'mname' => $request->input('mname'),
            'ename' => $request->input('ename'),
            'sex' => $request->input('sex'),
            'spouse' => $request->input('spouse'),
            'mother' => $request->input('mother'),
            'number' => $request->input('number'),
            'regions_id' => $request->input('regions_id'),
            'provinces_id' => $request->input('provinces_id'),
            'municipalities_id' => $request->input('municipalities_id'),
            'barangays_id' => $request->input('barangays_id'),
            'purok' => $request->input('purok'),
            'house' => $request->input('house'),
            'dob' => $request->input('dob'),
            'pob' => $request->input('pob'),
            'religion' => $request->input('religion'),
            'cstatus' => $request->input('cstatus'),
            'education' => $request->input('education'),
            'pwd' => $request->input('pwd'),
            'benefits' => $request->input('benefits'),
            'livelihood' => $request->input('livelihood'),
            'gross' => $request->input('gross'),
            'parcels' => $request->input('parcels'),
            'arb' => $request->input('arb'),
            // Add other attributes here...
        ]);

        // Save the farmer profile
        $farmersprofile->save();

        // Assuming you have a "crops" relationship defined in the FarmersProfile model.
        // You might need to adjust this part according to your actual relationships.

        // Store crops data in the pivot table
        $farmers = $request->input('commodities_id', []);
        $cropData = [];
        foreach ($farmers as $Id) {
            $cropData[$Id] = [
                'farm_size' => $request->input("farm_size_{$Id}"),
                'farm_location' => $request->input("farm_location_{$Id}"),
            ];
        }
        $farmersprofile->crops()->sync($cropData);

        // Assuming you have a "machines" relationship defined in the FarmersProfile model.
        // You might need to adjust this part according to your actual relationships.

        // Store machines data in the pivot table
        $machines = $request->input('machine_id', []);
        $machineData = [];
        foreach ($machines as $machineId) {
            $machineData[$machineId] = [
                'units' => $request->input("noofunits_{$machineId}"),
            ];
        }
        $farmersprofile->machines()->sync($machineData);

        return redirect('admin/create-add')->with('message', 'User Added Successfully!');
    }
}
