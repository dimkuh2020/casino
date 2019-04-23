<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blackjack;
use Auth; // фасад для пользователя


class BlackjackController extends Controller
{
    public function index()
    {

    	$bj = new Blackjack();
    	$data = ['cards' => $bj->cards];    	

    	$user = Auth::user()->name; // авторизированый пользователь через фасад
    	
    	return view('blackjack',['data' => $data], ['user' => $user]);
    }


}
