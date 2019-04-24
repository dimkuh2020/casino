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
    	$cards = $bj->cards;
    	$user = Auth::user()->name; // авторизированый пользователь через фасад

    	dd($bj->tempplayer=rand(5,15)); 
    	
    	return view('blackjack',['cards' => $cards], ['user' => $user]);
    }


}
