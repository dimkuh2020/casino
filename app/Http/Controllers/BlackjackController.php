<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blackjack;
use Auth; 						// фасад для пользователя
use App\User;						
use DB;


class BlackjackController extends Controller
{
    public function index()
    {

    	$bj = new Blackjack();
    	$cards = $bj->cards; // получение всей колоды
    	$user = Auth::user()->name; // авторизированый пользователь через фасад
    	$cash = Auth::user()->cash; //денюжки
    	$id = Auth::user()->id;    	
    	
    	return view('blackjack',['cards' => $cards, 'user' => $user, 'cash' => $cash, 'id' => $id]);
    }

    public function updatecash(Request $request)
    {
    	$user = User::find(Auth::id()); //получить сразу іd игрока

    	$cash=$request->cash;
    	$user->cash=$cash;
    	$user->save();

    	return ['cash' => $user->cash]; //просто прверить cash на сервере
    }


}
