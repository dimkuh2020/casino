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
    	$cards = $bj->cards; // получение всеё колоды
    	$user = Auth::user()->name; // авторизированый пользователь через фасад


    	//добавление по 2 карты игроку из колоды
    	$tempindex = rand(0,count($cards)-1); 	//получение индекса первой карты из колоды во временную переменную c заменой 
    	$usercards = array($cards[$tempindex]); // запись первой карты из колоды
    	array_splice($cards, $tempindex, 1);    //удаление из колоды использованые карты
		$tempindex = rand(0,count($cards)-1);   //получение индекса второй карты из колоды во временную переменную c заменой    	
    	array_push($usercards, $cards[$tempindex]); //...запись второй карты
    	array_splice($cards, $tempindex, 1);    //...удаление из колоды
    	
    	//добавление по 1 картe дилеру из колоды
    	$tempindex = rand(0,count($cards)-1); 	
    	$dealercards = array($cards[$tempindex]);     	
    	array_splice($cards, $tempindex, 1);    
    	$tempindex = null;                      //обнуление временной переменной                   

		
    	
    	
    	return view('blackjack',['cards' => $cards, 'user' => $user, 'usercards' => $usercards, 'dealercards' => $dealercards]);
    }


}
