<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Blackjack extends Model
{	
	public $cards = [
		array(
			'title'=>'2ч',
			'url'=>'img/cards/2ч.jpeg',
			'numb'=>2
		),

		array(
			'title'=>'3ч',
			'url'=>'img/cards/3ч.jpeg',
			'numb'=>3
		)
	];

    public $message = "Fuuuu";
    
}
