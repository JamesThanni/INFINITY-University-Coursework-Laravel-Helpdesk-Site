<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Http\Controllers\MainController;

class EmployeeController extends Controller
{
    public function index() {
        $locations = MainController::getLocations();
        $os = MainController::getOS();
        $hardware = MainController::getHardware();
        $software = MainController::getSoftware();

        return view('employee_dashboard', [
            'software' => $software, 
            'os' => $os, 
            'hardware' => $hardware, 
            'locations' => $locations
        ]);
    }
   
    public function loadFAQPage() {
        return view('employee_FAQ');
    }

    public function loadTicketsPage(Request $request) {
        $empID = $request->session()->get('empID');
        $tickets = Ticket::where('empID', $empID)->get();
        return view('employee_my_tickets', [ 
            'tickets' => $tickets, 
            'fields' => ['Ticket ID', 'Date Created', 'Description', 'Reason', 'Priority'], 
            'title' => 'All Tickets'
        ]);
    }

    public function loadUnsolvedTickets(Request $request) {
        $empID = $request->session()->get('empID');
        $tickets = Ticket::where('empID', $empID)
                         ->whereNull('solutionID')
                         ->get();
        return view('employee_my_tickets', [ 
            'tickets' => $tickets, 
            'fields' => ['Ticket ID', 'Date Created', 'Description', 'Reason', 'Priority'], 
            'title' => 'Unsolved Tickets' 
        ]);
    }

    public function loadSolvedTickets(Request $request) {
        $empID = $request->session()->get('empID');
        $tickets = Ticket::where('empID', $empID)
                         ->where('solutionID', "!=", null)
                         ->get();
        return view('employee_my_tickets', [ 
            'tickets' => $tickets, 
            'fields' => ['Ticket ID', 'Date Created', 'Description', 'Reason', 'Priority'], 
            'title' => 'Solved Tickets' 
        ]);
    }

    public function loadPendingTickets(Request $request) {
        // WAITING ON PENDING FIELD - Doesn't work fully yet

        $empID = $request->session()->get('empID');
        $tickets = Ticket::where('empID', $empID)
                         ->where('solutionID', "!=", null)
                         ->get();
        return view('employee_my_tickets', [ 
            'tickets' => $tickets, 
            'fields' => ['Ticket ID', 'Date Created', 'Description', 'Reason', 'Priority'], 
            'title' => 'Pending Tickets' 
        ]);
    }
    

    public function addTicket(Request $request) {
        $ticket = new Ticket();
        $ticket['empID'] = session()->get('empID');
        $ticket['dateCreated'] = date('Y-m-d');
        $ticket['timeCreated'] = date('H:i:s');
        $ticket['serial_no'] = $request->serial_no;
        $ticket['softID'] = $request->softID;
        $ticket['OSID'] = $request->OSID;
        $ticket['description'] = $request->description;
        $ticket['reason'] = $request->reason;
        $ticket['priority'] = $request->priority;
        $ticket['locationID'] = $request->locationID;
        $ticket['solutionID'] = null;
        $ticket['sepcID'] = 2;
        $ticket->save();

        return redirect('/employee/tickets/unsolved');
    }

    
}
