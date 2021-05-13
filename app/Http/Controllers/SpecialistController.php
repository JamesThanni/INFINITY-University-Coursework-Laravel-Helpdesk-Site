<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\MainController;

// Remove later
use App\Models\Hardware;
use App\Models\Software;
use App\Models\OS;
use App\Models\Location;
use App\Models\Solution;

class SpecialistController extends Controller
{
    public function index() {
        return view('specialist_dashboard');
    }

    public function loadFAQPage() {
        
        $faq = MainController::getFAQ();
        return view('specialist_FAQ', [
            'faq' => $faq,
        ]);
    }

    public function loadSolvePage() {
        return view('specialist_solve');
    }

    public function loadEditPage() {
        $hardware = MainController::getHardware();
        $software = MainController::getSoftware();
        $os = MainController::getOS();
        $solutions = MainController::getSolutions();
        
        return view('specialist_edit', [
             'hardware' => $hardware, 
             'software' => $software, 
             'os' => $os, 
             'solutions' => $solutions 
        ] );
    }

    public function addHardware(Request $request) {

        $hardware = new Hardware();
        $hardware->serial_no = $request->serial_no;
        $hardware->hardType = $request->hardType;
        $hardware->make = $request->make;
        $hardware->save();

        return redirect('/specialist/edit');
    }

    public function removeHardware(Request $request) {
        Hardware::destroy($request->serial_no);
        return redirect('/specialist/edit');
    }

}
