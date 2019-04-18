<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
          
        // $eventRegistrations=\App\EventRegistration::where('status',1)->paginate(6);
        $eventRegistrations=\App\EventRegistration::paginate(6);
        return view("welcome")->with("eventRegistrations",$eventRegistrations);
       
    }
}
