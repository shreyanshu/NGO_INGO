<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donor;

class DonorController extends Controller
{
    public function index()
 	{
 		$donors = Donor::get();
 		return view('donors', compact('donors'));
 	}

 	public function destroy(Donor $donor)
 	{
 		$donor->project()->detach();
 		$donor->organization->detach();
 		$donor->forceDelete();

 		$donors = Donor::get();
 		return view('donors', compact('donors'));
 	}  

 	public function update(Donor $donor)
 	{
 		Donor::where('id', $donor->id)
			->update([
				'name' => request()->name, 
				'address'=>request()->address,
				'email'=>request()->email,
				'website'=>request()->website,
				'ph_number'=>request()->phone,
				'description'=>request()->description,
				'estDate'=>request()->estDate
			]);
 			
 		// $donors = Donor::get();
 		// return view('/donors', compact('donors'));
		return redirect('/donors');
 	}

 	public function store(Request $request)
 	{
 		dd($request->name);
 	}
}
