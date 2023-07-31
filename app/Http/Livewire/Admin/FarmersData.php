<?php

namespace App\Http\Livewire\Admin;

use App\Models\Barangay;
use App\Models\Commodiies;
use App\Models\Province;
use App\Models\Municipality;
use Livewire\Component as Components;

class FarmersData extends Components
{
    public $highValueCrops = false;

    public $selectedProvince;
    public $selectedMunicipality;
    public $selectedBarangay;
    public $municipalities = []; // Initialize as empty array
    public $barangays = []; // Initialize as empty array

    public function render()
    {
        $commodities = Commodiies::where('categories', 0)->pluck('commodities', 'id')->all();
        $farmers = Commodiies::where('categories', 1)->pluck('commodities', 'id')->all();
        $provinces = Province::all();
        return view('livewire.admin.farmers-data', compact('provinces', 'commodities', 'farmers'));
    }

    public function updatedSelectedProvince($provinceId)
    {
        $this->municipalities = Municipality::where('province_id', $provinceId)->get();
        $this->selectedMunicipality = null;
        $this->selectedBarangay = null;
        $this->barangays = [];
    }

    public function updatedSelectedMunicipality($municipalityId)
    {
        $this->barangays = Barangay::where('municipality_id', $municipalityId)->get();
        $this->selectedBarangay = null;
    }

}
