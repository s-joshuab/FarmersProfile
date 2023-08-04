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



}
