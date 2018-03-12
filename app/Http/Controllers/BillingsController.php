<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BillingsController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function getBilling()
    {
    	return view('ops-billing');
    }
}
