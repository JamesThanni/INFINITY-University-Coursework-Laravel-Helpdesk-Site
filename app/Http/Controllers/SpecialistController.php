<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpecialistController extends Controller
{
    public function index() {
        return view('specialist_dashboard');
    }

    public function loadFAQPage() {
        return view('specialist_FAQ');
    }
}
