<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Machine;
use App\Models\Barangays;
use App\Models\Provinces;
use App\Models\Commodities;
use Illuminate\Http\Request;
use App\Models\FarmersProfile;
use App\Models\Municipalities;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class PdfController extends Controller
{

    public function generatePdf($id)
    {

        $civilStatusOptions = Status::all();
        $provinces = Provinces::all();
        $municipalities = Municipalities::all();
        $barangays = Barangays::all();
        $commodities = Commodities::where('category', 0)->pluck('commodities', 'id')->all();
        $farmers = Commodities::where('category', 1)->pluck('commodities', 'id')->all();
        $machine = Machine::pluck('machine', 'id')->all();

        $farmersprofile = farmersprofile::find($id);


        $crops = $farmersprofile ->crops;
        $machineries = $farmersprofile ->machineries;
        if (!$farmersprofile) {
            abort(403);
        }


        $path = 'assets/img/12345.jpg';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $logo ='data:image/' . $type . ';base64,' . base64_encode($data);


        $pdf = Pdf::loadView('admin.pdf.pdf', [
            'farmersprofile' => $farmersprofile,
            'provinces' => $provinces,
            'civilStatusOptions' => $civilStatusOptions, // Fix the syntax here
            'municipalities' => $municipalities,
            'barangays' => $barangays,
            'commodities' => $commodities,
            'farmers' => $farmers,
            'machine' => $machine,
            'crops' => $crops,
            'machineries' => $machineries,
            'logo' => $logo
        ]);


        return $pdf->stream();
    }
}
