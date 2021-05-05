<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hardware;

class SpecialistController extends Controller
{
    public function index() {
        return view('specialist_dashboard');
    }

    public function loadFAQPage() {
        return view('specialist_FAQ');
    }

    public function loadSolvePage() {
        return view('specialist_solve');
    }

    public function loadEditPage() {
        $hardware = Hardware::all();
        return view('specialist_edit', [ 'hardware' => $hardware ] );
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
        // $message = count($request);
        // error_log('Some message here.');
        // echo "<script type='text/javascript'>console.log('$message');</script>";  
        Hardware::destroy($request->serial_no);
        return redirect('/specialist/edit');
    }
}
