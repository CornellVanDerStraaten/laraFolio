<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
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
        return view('adminProjectDashboard', ['projects' => Project::all()]);
    }
}
