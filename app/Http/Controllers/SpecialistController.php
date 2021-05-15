<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Http\Controllers\MainController;
use DB;

// Remove later
use App\Models\Hardware;
use App\Models\Software;
use App\Models\OS;
use App\Models\Location;
use App\Models\Solution;
use App\Models\User;

class SpecialistController extends Controller
{
    public function index(Request $request) {
        $specID = $request->session()->get('specID');
        $tickets = Ticket::where('sepcID', $specID)->get();
        $unsolved = Ticket::where('sepcID', $specID)->where('status', "unsolved")->get();
        $output = array();
        foreach($tickets as $ticket ) {
            $solutions = Solution::where('solutionID', $ticket->solutionID)->get();
            if(count($solutions) > 0) {
                $solution = $solutions[0];
                $obj = [ $ticket->ticketID, $ticket->description, $solution->solutionDescription, $solution->dateSolved,$ticket->status ];
                array_push($output, $obj);
            } else {
                $obj = [ $ticket->ticketID,  $ticket->description, 'Not solved yet', 'N/A', $ticket->status ];
                array_push($output, $obj);
            }
        }
        return view('specialist_dashboard', [
            'tickets' => $output, 
            'fields' => ['Ticket ID',  'Description', 'Solution','Date Solved', 'Status'], 
            'title' => 'All tickets',
            'unsolved' => $unsolved, 
            'type' => 'all'
        ]);
    }

    public function loadUnsolvedTickets(Request $request) {
        $specID = $request->session()->get('specID');
        $tickets = Ticket::where('sepcID', $specID)->where('status', "unsolved")->get();
        $output = array();
        foreach($tickets as $ticket ) {
            $solutions = Solution::where('solutionID', $ticket->solutionID)->get();
            if(count($solutions) > 0) {
                $solution = $solutions[0];
                $obj = [ $ticket->ticketID, $ticket->description, $solution->solutionDescription, $solution->dateSolved, $ticket->priority, $ticket->status ];
                array_push($output, $obj);
            } else {
                $obj = [ $ticket->ticketID,  $ticket->description, 'Not solved yet', 'N/A', $ticket->priority, $ticket->status];
                array_push($output, $obj);
            }
        }
        return view('specialist_dashboard', [
            'tickets' => $output, 
            'fields' => ['Ticket ID',  'Description', 'Solution','Date Solved', 'Priority', 'Status'], 
            'title' => 'Unsolved Tickets', 
            'type' => 'unsolved'    
        ]);
    }

    public function loadPendingTickets(Request $request) {
        $specID = $request->session()->get('specID');
        $tickets = Ticket::where('sepcID', $specID)->where('status', "Pending")->get();
        $output = array();
        foreach($tickets as $ticket ) {
            $solutions = Solution::where('solutionID', $ticket->solutionID)->get();
            if(count($solutions) > 0) {
                $solution = $solutions[0];
                $obj = [ $ticket->ticketID, $ticket->description, $solution->solutionDescription, $solution->dateSolved];
                array_push($output, $obj);
            } else {
                $obj = [ $ticket->ticketID,  $ticket->description, 'Not solved yet', 'N/A'];
                array_push($output, $obj);
            }
        }
        return view('specialist_dashboard', [
            'tickets' => $output, 
            'fields' => ['Ticket ID',  'Description', 'Solution','Date Solved'], 
            'title' => 'Pending Tickets', 
            'type' => 'pending'    
        ]);
    }

    public function loadSolvedTickets(Request $request) {
        $specID = $request->session()->get('specID');
        $tickets = Ticket::where('sepcID', $specID)->where('status', "solved")->get();
        $output = array();
        foreach($tickets as $ticket ) {
            $solutions = Solution::where('solutionID', $ticket->solutionID)->get();
            if(count($solutions) > 0) {
                $solution = $solutions[0];
                $obj = [ $ticket->ticketID, $ticket->description, $solution->solutionDescription, $solution->dateSolved];
                array_push($output, $obj);
            } else {
                $obj = [ $ticket->ticketID,  $ticket->description, 'Not solved yet', 'N/A'];
                array_push($output, $obj);
            }
        }
        return view('specialist_dashboard', [
            'tickets' => $output, 
            'fields' => ['Ticket ID',  'Description', 'Solution','Date Solved'], 
            'title' => 'Solved Tickets', 
            'type' => 'solved'    
        ]);
    }

    public function loadFAQPage() {
        $faq = MainController::getFAQ();
        return view('specialist_FAQ', [
            'faq' => $faq,
        ]);
    }

    public function loadSolvePage(Request $request) {
        $chosenticket = new Ticket();
        $chosenticket->ticketID = $request->ticketID;
        $ticket = Ticket::where('ticketID', $chosenticket->ticketID)->get()[0];
       
        //os, hard, software
        $osVersion = '';
        if(isset($ticket->OSID)) {
            $osVersion = OS::where('OSID', $ticket->OSID)->get()[0]->version;
        }

        $hardType = '';
        if(isset($ticket->serial_no)) {
            $hardType = Hardware::where('serial_no', $ticket->serial_no)->get()[0]->hardType;
        }

        $softName = '';
        if(isset($ticket->softID)) {
            $softName = Software::where('softID', $ticket->softID)->get()[0]->softName;
        }

        $solution = "";
        if(isset($ticket->solutionID)) {
            $solution = Solution::where('solutionID', $ticket->solutionID)->get()[0]->solutionDescription;
        }

        return view('specialist_solve', [
            'ticketID' =>   $chosenticket->ticketID,
            'desc' => $ticket->description, 
            'ticket' => $ticket, 
            'osVersion' => $osVersion, 
            'hardType' => $hardType, 
            'softName' => $softName, 
            'priority' => $ticket->priority, 
            'solution' => $solution
        ]);
    }

    public function submitSolution(Request $request) {
        // Add solutions to table
        $solution = new Solution();
        $solution['dateSolved'] = date('Y-m-d');
        $solution['timeSolved'] = date('H:i:s');
        $solution['solutionDescription'] = $request->solution;

        $user = User::where('userID', session()->get('userID'))->get()[0];
        $solution['solutionSolver'] = $user->firstName;
        $solutionID = rand(0, 100000000);
        $solution['solutionID'] = $solutionID;
        $solution->save();
        // $solution->id;
        // Add ticket sepcID 
        $ticket = Ticket::where('ticketID', $request->ticketID)->get()[0];
        $ticket['solutionID'] = $solutionID;
        $ticket['status'] = 'Pending';
        $ticket->save();
        
        return redirect('/specialist/dashboard/pending');

        // Add to FAQ
        
    }

    public function loadReassignPage(Request $request) {
        $chosenticket = new Ticket();
        $chosenticket->ticketID = $request->ticketID;
        $ticket = Ticket::where('ticketID', $chosenticket->ticketID)->get();


        return view('specialist_reassign', [
            'ticketID' =>   $chosenticket->ticketID,
            'desc' => $ticket[0]->description
        ]);
    }

    public function loadEditPage() {
        $hardware = MainController::getHardware();
        $software = MainController::getSoftware();
        $os = MainController::getOS();
        $solutions = MainController::getSolutions();
        $faqs = MainController::getFAQ();
        

        return view('specialist_edit', [
             'hardware' => $hardware, 
             'software' => $software, 
             'os' => $os, 
             'faqs' => $faqs
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
