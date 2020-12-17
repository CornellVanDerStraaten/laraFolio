<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
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

    public function showNavigation() {
        return view('adminNav');
    }

    public function toProjectDashboard() {
        return view('adminProjectDashboard');
    }
}