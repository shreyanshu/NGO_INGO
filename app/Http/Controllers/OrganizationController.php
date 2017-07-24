<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organization;

class OrganizationController extends Controller
{
 	public function index()
 	{
 		$orgs = Organization::get();
 		return view('NGO_INGO', compact('orgs'));
 	}   

 	public function destroy(Organization $organization)
 	{
 		// dd($organization->id);
 	// 	$donor->project()->detach();
 	// 	$donor->organization->detach();
 	// 	$donor->forceDelete();

 		$organization->donor()->detach();
 		$organization->forceDelete();

 		
 		$orgs = Organization::get();
 		return view('NGO_INGO', compact('orgs'));
 	
 	}  
}
