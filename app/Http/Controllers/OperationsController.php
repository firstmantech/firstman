<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OperationsController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function getOperations()
    {
    	return view('operations');
    }
}
