<?php

namespace App\Http\Controllers\Admin;

use App\Models\Region;
use App\Models\machine;
use App\Models\Barangay;
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
    $commodities = Commodities::where('category', 0)->pluck('commodities', 'id')->all();
    $farmers = Commodities::where('category', 1)->pluck('commodities', 'id')->all();
    $machine = Machine::pluck('machine', 'id')->all();

    return view('admin.farmers.create', compact('commodities', 'farmers','machine'));
}

    public function ID()
    {
        return view('admin.farmers.id');
    }

    public function store(Request $request)
    {

        // Validate the input data
        $validator = Validator::make($request->all(), [
            'farm_number' =>'nullable',
            'ref_no' => 'required',
            'status' => 'required',
            'sname' => 'required',
            'fname' => 'required',
            'mname' => 'required',
            'ename' => 'required',
            'sex' => 'required',
            'spouse' => 'required',
            'mother' => 'nullable',
            'number' => 'required',
            'regions_id' => 'nullable',
            'province_id' => 'nullable',
            'municipalities_id' => 'nullable',
            'barangays_id' => 'nullable',
            'purok' => 'required',
            'house' => 'required',
            'dob' => 'required',
            'pob' => 'required',
            'religion' => 'required',
            'cstatus' => 'required',
            'education' => 'required',
            'pwd' => 'required',
            'benefits' => 'required',
            'livelihood' => 'nullable',
            'crops_id' => 'nullable',
            'machinery_id' => 'nullable',
            'gross' => 'required',
            'parcels' => 'required',
            'arb' => 'required',
            'commodities_id' => 'nullable',
            'farm_size' => 'nullable',
            'farm_location' => 'nullable',
            'machine_id' => 'nullable',
            'units' => 'required',
        ]);

        if ($validator->fails()) {
            dd($validator->errors()->all());
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Error occurred during Adding.');
        }

        // Create the farmer profile using the FarmersProfile model
        $farmersprofile = FarmersProfile::create([
            'farm_number' => $request->input('farm_number'),
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
            'province_id' => $request->input('province_id'),
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
            'crops_id' => $request->input('crops_id'),
            'machinery_id' => $request->input('machinery_id'),
            'gross' => $request->input('gross'),
            'parcels' => $request->input('parcels'),
            'arb' => $request->input('arb'),
            // Add other attributes here...
        ]);

        // Save the farmer profile
        $farmersprofile->save();

        // Assuming you have a "crops" relationship defined in the FarmersProfile model.
        // You might need to adjust this part according to your actual relationships.
        $farmersprofile->crops()->attach($request->input('commodities_id'), [
            'farm_size' => $request->input('farm_size'),
            'farm_location' => $request->input('farm_location'),
        ]);

        // Assuming you have a "machineries" relationship defined in the FarmersProfile model.
        // You might need to adjust this part according to your actual relationships.
        $farmersprofile->machineries()->attach($request->input('machine_id'), [
            'units' => $request->input('units'),
        ]);

        return redirect('admin/create-add')->with('message', 'User Added Successfully!');
    }


}
