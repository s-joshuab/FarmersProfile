<?php

namespace App\Http\Controllers\Admin;


use App\Models\Crops;
use App\Models\Machine;
use App\Models\Barangays;
use App\Models\Provinces;
use App\Models\Commodities;
use App\Models\Machineries;
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

    public function ID()
    {
        return view('admin.farmers.id');
    }

    public function create(Request $request)
    {
        $provinces = Provinces::all();
        $commodities = Commodities::where('category', 0)->pluck('commodities', 'id')->all();
        $farmers = Commodities::where('category', 1)->pluck('commodities', 'id')->all();
        $machine = Machine::pluck('machine', 'id')->all();

        return view('admin.farmers.create', compact('commodities', 'farmers', 'machine', 'provinces'));
    }

    public function getMunicipalities($province_id)
    {
        $municipalities = Municipalities::where('provinces_id', $province_id)->get();
        return response()->json($municipalities);
    }

    public function getBarangays($municipality_id)
    {
        $barangays = Barangays::where('municipalities_id', $municipality_id)->get();
        return response()->json($barangays);
    }


    public function store(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'ref_no' => 'required',
            'status' => 'required',
            'sname' => 'required',
            'fname' => 'required',
            'mname' => 'required',
            'ename' => 'required',
            'sex' => 'required',
            'spouse' => 'nullable',
            'number' => 'required',
            'mother' => 'required',
            'regions' => 'required',
            'provinces_id' => 'required',
            'municipalities_id' => 'required',
            'barangays_id' => 'required',
            'purok' => 'required',
            'house' => 'required',
            'dob' => 'required|date',
            'pob' => 'required',
            'religion' => 'required',
            'cstatus' => 'required',
            'education' => 'required',
            'pwd' => 'required',
            'benefits' => 'required',
            'livelihood' => 'required',
            'gross' => 'required',
            'parcels' => 'required',
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
            'regions' => $request->input('regions'),
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
            'arb' => $request->input('arb')
            // Add other attributes here...
        ]);

        $selectedCommodities = $request->input('crops', []);
        $farmSizes = $request->input('farm_size', []);
        $locations = $request->input('farm_location', []);

        foreach ($selectedCommodities as $id => $commodityId) {
            Crops::create([
                'farmersprofile_id' => $farmersprofile,
                'commodities_id' => $commodityId,
                'farm_size' => $farmSizes[$commodityId],
                'farm_location' => $locations[$commodityId],
            ]);
        }

        $selectedMachineries = $request->input('machineries', []);
        $units = $request->input('units', []);

        foreach ($selectedMachineries as $id => $machineId) {
            Machineries::create([
                'farmersprofile_id' => $farmersprofile,
                'machine_id' => $machineId,
                'units' => $units[$machineId],
            ]);
        }

        return redirect('admin/create-add')->with('message', 'Farmer Added Successfully!');

}

}
