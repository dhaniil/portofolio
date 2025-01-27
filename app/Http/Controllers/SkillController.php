<?php

namespace App\Http\Controllers;

use App\Models\Skills;
use App\Models\Project;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skills::all();
        $projects = Project::all();
        return view('app', compact('skills', 'projects'));
    }
}