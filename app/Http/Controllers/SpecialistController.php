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
use App\Models\FAQ;
use App\Models\Specialist;
use App\Models\SoftwareSpecialist;
use App\Models\HardwareSpecialist;


class SpecialistController extends Controller
{
    public function index(Request $request) {
        $specID = $request->session()->get('specID');
        $tickets = Ticket::where('sepcID', $specID)->get();
        $unsolved = Ticket::where('sepcID', $specID)->where('status', "!=", "solved")->get();
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

        if($request['add-to-faq'] == 'on') {
            $faq = new FAQ();
            $faq['problem'] = $request->description;
            $faq['solution'] = $request->solution;
            $faq['SolutionID'] = $solutionID;
            $faq->save();
        } 
        
        return redirect('/specialist/dashboard/pending');

        // Add to FAQ
        
    }

    public function loadReassignPage(Request $request) {
        $chosenticket = new Ticket();
        $chosenticket->ticketID = $request->ticketID;
        $ticket = Ticket::where('ticketID', $chosenticket->ticketID)->get()[0];

        // obj needs name, id, hardware spec, software spec
        $array = [];
        $specialistsUsers = User::where('userType', 'Specialist')->get();
        foreach($specialistsUsers as $specialistsUser) {
            
            $specialist = Specialist::where('userID', $specialistsUser['userID'])->get()[0];

            $softwareSpecialties = " ";
            $specialistSoftware = SoftwareSpecialist::where('specID', $specialist->specID)->get();
            foreach($specialistSoftware as $softwareSpecialty) {
                $temp = Software::where('softID', $softwareSpecialty->softID)->get()[0]->softName;
                $softwareSpecialties .= ($temp . " | ");
            }

            $hardwareSpecialties = " ";
            $specialistHardware = HardwareSpecialist::where('specID', $specialist->specID)->get();
            foreach($specialistHardware as $hardwareSpecialty) {
                $temp = Hardware::where('serial_no', $hardwareSpecialty['serial_no'])->get()[0]->hardType;
                $hardwareSpecialties .= ($temp . " | ");
            }

            $obj = [
                'firstName' => $specialistsUser->firstName, 
                'userID' => $specialistsUser->userID, 
                'specID' => $specialist->specID, 
                'softwareSpecialties' => $softwareSpecialties, 
                'hardwareSpecialties' => $hardwareSpecialties
            ];
            array_push($array, $obj);
        }

        // return response()->json(array('success' => true, 'last_insert_id' => $array), 200);

        return view('specialist_reassign', [
            'ticketID' =>   $chosenticket->ticketID,
            'desc' => $ticket->description, 
            'specialists' => $array
        ]);
    }

    public function submitReassignment(Request $request) {
        $ticket = Ticket::find($request->ticketID);
        $ticket['sepcID'] = $request->specID;
        $ticket->save();
        return redirect('/specialist/dashboard');
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

    public function addFAQ(Request $request) {
        // ADd solution, add FAQ
        $solution = new Solution();
        $solution['dateSolved'] = $request['dateSolved'];
        $solution['timeSolved'] = $request['timeSolved'];
        $solution['solutionDescription'] = $request['solution'];
        
        $user = User::where('userID', session()->get('userID'))->get()[0];
        $solution['solutionSolver'] = $user->firstName;
        $solutionID = rand(0, 100000000);
        $solution['solutionID'] = $solutionID;
        $solution->save();

        $faq = new FAQ();
        $faq['problem'] = $request['problem'];
        $faq['solution'] = $request['solution'];
        $faq['SolutionID'] = $solutionID;
        $faq->save();

        return redirect('/specialist/edit');
    }

    public function removeFAQ(Request $request) {
        FAQ::destroy($request['faqID']);
        return redirect('/specialist/edit');
    }
    

}
