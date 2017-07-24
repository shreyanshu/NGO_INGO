<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    public function index()
 	{
 		$projects = Project::get();
 		return view('projects', compact('projects'));
 	}  

 	public function destroy(Project $project)
 	{
 		$project->donor()->detach();
 		$project->forceDelete();
 		$projects = Project::get();
 		return view('projects', compact('projects'));
 	}
}
