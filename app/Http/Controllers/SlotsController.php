<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SlotsController extends Controller
{
    public function index()
    {
    	return view('slots');

    }
}
