<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blackjack;

class BlackjackController extends Controller
{
    public function index()
    {

    	$bj = new Blackjack();
    	$data = ['message' => $bj->message];

    	


    	return view('blackjack', $data);
    }


}
