<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use App\Models\Specialist;

class MainController extends Controller
{
    public function index() {
        $users = User::all();

        return view('login', [ 'users' => [] ]);
    }

    public function login(Request $request) {
        $user = User::where('email', $request->email)
                    ->where('password', $request->password)
                    ->get();  
                          
        if(isset($user[0])) {
            $userID = $user[0]->userID;
            $request->session()->put('userID', $userID);
            switch($user[0]->userType){
                case 'Specialist':
                    $specialist = Specialist::where('userID', $userID)
                                        ->get(); 
                    $request->session()->put('specID', $specialist[0]->specID);
                    return redirect('/specialist');
                    break;
                    
                case 'Employee':
                    $employee = Employee::where('userID', $userID)
                                        ->get(); 
                    $request->session()->put('empID', $employee[0]->empID);
                    return redirect('/employee');
                    break;

                case 'Analyst':
                    $employee = Employee::where('userID', $userID)
                                        ->get(); 
                    $request->session()->put('empID', $employee[0]->empID);
                    return redirect('/analyst');
                    break;
            }

        } else {
            return redirect('/login');
        }
        
    }

    public function logout(Request $request) {
        $request->session()->forget('empID');
        $request->session()->forget('userID');
        $request->session()->forget('specIDp');
        return view('login', [ 'users' => [] ]);
    }
}
