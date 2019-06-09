<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Slots;
use Auth; 						// фасад для пользователя
use App\User;						
use DB;

class SlotsController extends Controller
{
    public function index()
    {
    	$sl = new Slots();
    	$slots = $sl->slots;

    	$user = Auth::user()->name; // авторизированый пользователь через фасад
    	$cash = Auth::user()->cash; //денюжки
    	$id = Auth::user()->id; 

    	//dd($slots);


    	return view('slots', ['slots' => $slots, 'user' => $user, 'cash' => $cash, 'id' => $id]);

    }
}
