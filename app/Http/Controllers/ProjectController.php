<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'technologies' => 'required|array',
        ]);

        Project::create([
            'name' => $request->input('name'),
            'technologies' => $request->input('technologies'),
        ]);

    }


}
