<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class EmployeeController extends Controller
{
    public function index() {
        $tickets = Ticket::all();
        // return echo($tickets[0]);
        return view('employee_dashboard');
    }
   
    public function loadFAQPage() {
        return view('employee_FAQ');
    }

    public function loadTicketsPage() {
        return view('employee_my_tickets');
    }

    
}
