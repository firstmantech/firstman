<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrmsController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function getCrm()
    {
    	return view('crm');
    }
}
