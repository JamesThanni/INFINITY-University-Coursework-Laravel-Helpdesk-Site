<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index() {
        return view('employee_dashboard');
    }
   
    public function loadFAQPage() {
        return view('employee_FAQ');
    }

    public function loadTicketsPage() {
        return view('employee_my_tickets');
    }

    
}
