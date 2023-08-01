<?php

// app/Http/Livewire/Admin/FarmersData.php;

use App\Http\Requests\FarmersProfileRequest;
use App\Http\Requests\FarmingActivityRequest;
use App\Http\Requests\FarmingActivityCommodiiesRequest;
use App\Http\Requests\MachineryRequest;
use App\Http\Requests\QrCodeRequest;
use App\Http\Requests\ProvinceRequest;
use App\Http\Requests\MunicipalityRequest;
use App\Http\Requests\BarangayRequest;
use Livewire\Component as Components;
use Illuminate\Support\Facades\DB;

class FarmersData extends Components
{
    public $highValueCrops = false;


    public $selectedProvince;
    public $selectedMunicipality;
    public $selectedBarangay;
    public $municipalities = []; // Initialize as empty array
    public $barangays = []; // Initialize as empty array

    // Add other properties and methods...

    public function storeFarmersProfile(FarmersProfileRequest $request)
    {
        $validatedData = $request->validated();
        FarmersProfile::create($validatedData);
        session()->push('success_messages', 'Farmers profile data has been saved.');

        // Clear form fields after successful data storage
        $this->reset(['farmersProfileData']);
    }

    public function storeFarmingActivity(FarmingActivityRequest $request)
    {
        $validatedData = $request->validated();
        FarmingActivity::create($validatedData);
        session()->push('success_messages', 'Farming activity data has been saved.');

        // Clear form fields after successful data storage
        // Reset other properties if needed...
    }

    public function storeFarmingActivityCommodities(FarmingActivityCommodiiesRequest $request)
    {
        $validatedData = $request->validated();
        FarmingActivityCommodiies::create($validatedData);
        session()->push('success_messages', 'Farming activity commodities data has been saved.');

        // Clear form fields after successful data storage
        // Reset other properties if needed...
    }

    public function storeMachinery(MachineryRequest $request)
    {
        $validatedData = $request->validated();
        Machinery::create($validatedData);
        session()->push('success_messages', 'Machinery data has been saved.');

        // Clear form fields after successful data storage
        // Reset other properties if needed...
    }

    public function storeQrCode(QrCodeRequest $request)
    {
        $validatedData = $request->validated();
        QrCode::create($validatedData);
        session()->push('success_messages', 'QR code data has been saved.');

        // Clear form fields after successful data storage
        // Reset other properties if needed...
    }

    public function storeProvince(ProvinceRequest $request)
    {
        $validatedData = $request->validated();
        Province::create($validatedData);
        session()->push('success_messages', 'Province data has been saved.');

        // Clear form fields after successful data storage
        // Reset other properties if needed...
    }

    public function storeMunicipality(MunicipalityRequest $request)
    {
        $validatedData = $request->validated();
        Municipality::create($validatedData);
        session()->push('success_messages', 'Municipality data has been saved.');

        // Clear form fields after successful data storage
        // Reset other properties if needed...
    }

    public function storeBarangay(BarangayRequest $request)
    {
        $validatedData = $request->validated();
        Barangay::create($validatedData);
        session()->push('success_messages', 'Barangay data has been saved.');

        // Clear form fields after successful data storage
        // Reset other properties if needed...
    }

    public function saveAllData()
    {
        DB::beginTransaction();

        try {
            $this->storeFarmersProfile(new FarmersProfileRequest());
            $this->storeFarmingActivity(new FarmingActivityRequest());
            $this->storeFarmingActivityCommodities(new FarmingActivityCommodiiesRequest());
            $this->storeMachinery(new MachineryRequest());
            $this->storeQrCode(new QrCodeRequest());
            $this->storeProvince(new ProvinceRequest());
            $this->storeMunicipality(new MunicipalityRequest());
            $this->storeBarangay(new BarangayRequest());

            DB::commit();

            // Display a single flash message with all the success messages
            $successMessages = session()->pull('Farmers Data Added Succesfully!');
            session()->flash('success', implode(' ', $successMessages));
        } catch (\Exception $e) {
            DB::rollback();

            // Handle any errors that occurred during data storage
            session()->flash('error', 'An error occurred while saving the data.');
        }

        // Redirect the user to the desired page after all operations
        return redirect()->route('admin.farmers.index');
    }
}
