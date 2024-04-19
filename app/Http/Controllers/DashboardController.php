<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
	{
	    $this->middleware('auth:admin');
	}
    //
    public function Dashboard(){
        return view('backend.dashboard');
    }
    public function showAdminProfile(){
        return view('backend.profile');
    }

    
}
