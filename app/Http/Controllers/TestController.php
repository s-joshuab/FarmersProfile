<?php

namespace App\Http\Controllers;

use App\Models\Barangays;
use App\Models\Municipalities;
use App\Models\Provinces;
use App\Models\Test;
use Illuminate\Http\Request;
use Faker\Provider\sv_SE\Municipality;

class TestController extends Controller
{
    public function index()
    {
        $provinces = Provinces::all();
        return view('test', compact('provinces'));
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


    public function saveData(Request $request)
    {
        $validatedData = $request->validate([
            'province_id' => 'integer',
            'municipality_id' => 'integer',
            'barangay_id' => 'integer',
        ]);

        Test::create($validatedData);
        return response()->json(['message' => 'Data saved successfully']);
    }

}
