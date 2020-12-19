<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use PclZip;

class WebsiteController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function showSpecificProject(Project $slug)
    {
        return view('viewProject', ['project' => $slug]);
    }
}
