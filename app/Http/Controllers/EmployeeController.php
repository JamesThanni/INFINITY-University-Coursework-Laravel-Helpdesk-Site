<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\FAQ;
use App\Models\Solution;
use App\Http\Controllers\MainController;

class EmployeeController extends Controller
{
    public function index() {
        $locations = MainController::getLocations();
        $os = MainController::getOS();
        $hardware = MainController::getHardware();
        $software = MainController::getSoftware();
        $faq = MainController::getFAQ();
        return view('employee_dashboard', [
            'software' => $software, 
            'os' => $os, 
            'hardware' => $hardware, 
            'locations' => $locations,            
            'faq' => $faq
        ]);
    }
   
    public function loadFAQPage() {
        $faq = MainController::getFAQ();
        return view('employee_FAQ', [
            'faq' => $faq,
        ]);
    }

    public function loadTicketsPage(Request $request) {
        $empID = $request->session()->get('empID');
        $tickets = Ticket::where('empID', $empID)->get();
        $unsolved = Ticket::where('empID', $empID)->where('status', 'Unsolved')->get();
        $output = array();
        foreach($tickets as $ticket ) {
            $solutions = Solution::where('solutionID', $ticket->solutionID)->get();
            if(count($solutions) > 0) {
                $solution = $solutions[0];
                $obj = [ $ticket->ticketID, $ticket->dateCreated, $ticket->description, $solution->solutionDescription, $ticket->status ];
                array_push($output, $obj);
            } else {
                $obj = [ $ticket->ticketID, $ticket->dateCreated, $ticket->description, 'Not solved yet', $ticket->status ];
                array_push($output, $obj);
            }
        }
        return view('employee_my_tickets', [ 
            'tickets' => $output, 
            'fields' => ['Ticket ID', 'Date Created', 'Description', 'Solution', 'Status', 'Interactions'], 
            'title' => 'All Tickets',
            'type' => 'all', 
            'unsolved' => $unsolved
        ]);
    }

    public function loadUnsolvedTickets(Request $request) {
        $empID = $request->session()->get('empID');
        $tickets = Ticket::where('empID', $empID)
                         ->where('status', 'Unsolved')
                         ->get();
        
        $output = array();
        foreach($tickets as $ticket ) {
            $obj = [ $ticket->ticketID, $ticket->dateCreated, $ticket->description, $ticket->reason, $ticket->priority ];
            array_push($output, $obj);
        }
        return view('employee_my_tickets', [ 
            'tickets' => $output, 
            'fields' => ['Ticket ID', 'Date Created', 'Description', 'Reason', 'Priority'], 
            'title' => 'Unsolved Tickets', 
            'type' => 'unsolved'  
        ]);
    }

    public function loadSolvedTickets(Request $request) {
        $empID = $request->session()->get('empID');
        $tickets = Ticket::where('empID', $empID)
                         ->where('status', 'Solved')
                         ->get();
        $output = array();
        foreach($tickets as $ticket ) {
            $solutions = Solution::where('solutionID', $ticket->solutionID)->get();
            if(count($solutions) > 0) {
                $solution = $solutions[0];
                $obj = [ $ticket->ticketID, $solution->dateSolved, $ticket->description, $solution->solutionDescription ];
                array_push($output, $obj);
            }
        }
        // return var_dump($output[0]);
        return view('employee_my_tickets', [ 
            'tickets' => $output, 
            'fields' => ['Ticket ID', 'Date Created', 'Description', 'Solution'], 
            'title' => 'Solved Tickets', 
            'type' => 'solved'  
        ]);
    }

    public function loadPendingTickets(Request $request) {
        // WAITING ON PENDING FIELD - Doesn't work fully yet

        $empID = $request->session()->get('empID');
        $tickets = Ticket::where('empID', $empID)
                         ->where('status', 'Pending')
                         ->get();
        $output = array();
        foreach($tickets as $ticket ) {
            $solutions = Solution::where('solutionID', $ticket->solutionID)->get();
            if(count($solutions) > 0) {
                $solution = $solutions[0];
                $obj = [ $ticket->ticketID, $solution->dateSolved, $ticket->description, $solution->solutionDescription ];
                array_push($output, $obj);
            }
        }
        return view('employee_my_tickets', [ 
            'tickets' => $output, 
            'fields' => ['Ticket ID', 'Date Created', 'Description', 'Solution', 'Interaction'], 
            'title' => 'Solved Tickets', 
            'type' => 'pending' 
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
        $ticket['status'] = 'Unsolved';
        $ticket->save();

        return redirect('/employee/tickets/unsolved');
    }

    public function denyTicket(Request $request) {
        $ticket = Ticket::find($request->ticketID);
        $ticket['status'] = 'Unsolved';
        $ticket->save();

        return redirect('/employee/tickets/pending');
    }

    public function acceptTicket(Request $request) {
        $ticket = Ticket::find($request->ticketID);
        $ticket['status'] = 'Solved';
        $ticket->save();

        return redirect('/employee/tickets/pending');
    }

    
}
