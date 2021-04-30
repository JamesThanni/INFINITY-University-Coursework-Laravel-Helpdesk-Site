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
}
