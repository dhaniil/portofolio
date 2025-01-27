<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skills;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $skills = Skills::all();
        return view('app', compact('projects', 'skills'));
    }


}