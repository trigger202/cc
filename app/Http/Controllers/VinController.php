<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VinController extends Controller
{


	public function index(Request $request)
	{

		return view('vin_search');

	}


	public function getCustomers()
	{

	}




}
