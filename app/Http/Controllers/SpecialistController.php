<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Http\Controllers\MainController;

// Remove later
use App\Models\Hardware;
use App\Models\Software;
use App\Models\OS;
use App\Models\Location;
use App\Models\Solution;

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
            'title' => 'Solved Tickets',
            'unsolved' => $unsolved
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
        $ticket = Ticket::where('ticketID', $chosenticket->ticketID)->get();
        return view('specialist_solve', [
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
