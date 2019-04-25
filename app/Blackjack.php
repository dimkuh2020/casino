<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Blackjack extends Model
{	

	public $usercount = null;    //подсчёт очков игрока
	public $dealercount = null;  //подсчёт очков дилера

	public $usercards = []; //пустой массив игрока для заполнения картиами
	public $dealercards = []; //пустой массив дилера для заполнения картами

	public $tempplayer = null;//для записи рандомного индекса
	public $tempdealer = null;




	public $cards = [
		//чирва
		array('title'=>'2ч','url'=>'img/cards/2ч.jpeg','value'=>2),//0   
		array('title'=>'3ч','url'=>'img/cards/3ч.jpeg','value'=>3),//1
		array('title'=>'4ч','url'=>'img/cards/4ч.jpeg','value'=>4),//2
		array('title'=>'5ч','url'=>'img/cards/5ч.jpeg','value'=>5),//3
		array('title'=>'6ч','url'=>'img/cards/6ч.jpeg','value'=>6),//4
		array('title'=>'7ч','url'=>'img/cards/7ч.jpeg','value'=>7),//5
		array('title'=>'8ч','url'=>'img/cards/8ч.jpeg','value'=>8),//6
		array('title'=>'9ч','url'=>'img/cards/9ч.jpeg','value'=>9),//7
		array('title'=>'10ч','url'=>'img/cards/10ч.jpeg','value'=>10),//8
		array('title'=>'Вч','url'=>'img/cards/Вч.jpeg','value'=>10),//9
		array('title'=>'Дч','url'=>'img/cards/Дч.jpeg','value'=>10),//10
		array('title'=>'Кч','url'=>'img/cards/Кч.jpeg','value'=>10),//11
		array('title'=>'Тч','url'=>'img/cards/Тч.jpeg','value'=>11),//12
		//трефа
		array('title'=>'2т','url'=>'img/cards/2т.jpeg','value'=>2),//13
		array('title'=>'3т','url'=>'img/cards/3т.jpeg','value'=>3),//14
		array('title'=>'4т','url'=>'img/cards/4т.jpeg','value'=>4),//15
		array('title'=>'5т','url'=>'img/cards/5т.jpeg','value'=>5),//16
		array('title'=>'6т','url'=>'img/cards/6т.jpeg','value'=>6),//17
		array('title'=>'7т','url'=>'img/cards/7т.jpeg','value'=>7),//18
		array('title'=>'8т','url'=>'img/cards/8т.jpeg','value'=>8),//19
		array('title'=>'9т','url'=>'img/cards/9т.jpeg','value'=>9),//20
		array('title'=>'10т','url'=>'img/cards/10т.jpeg','value'=>10),//21
		array('title'=>'Вт','url'=>'img/cards/Вт.jpeg','value'=>10),//22
		array('title'=>'Дт','url'=>'img/cards/Дт.jpeg','value'=>10),//23
		array('title'=>'Кт','url'=>'img/cards/Кт.jpeg','value'=>10),//24
		array('title'=>'Тт','url'=>'img/cards/Тт.jpeg','value'=>11),//25
		//бубна
		array('title'=>'2б','url'=>'img/cards/2б.jpeg','value'=>2),//26
		array('title'=>'3б','url'=>'img/cards/3б.jpeg','value'=>3),//27
		array('title'=>'4б','url'=>'img/cards/4б.jpeg','value'=>4),//28
		array('title'=>'5б','url'=>'img/cards/5б.jpeg','value'=>5),//29
		array('title'=>'6б','url'=>'img/cards/6б.jpeg','value'=>6),//30
		array('title'=>'7б','url'=>'img/cards/7б.jpeg','value'=>7),//31
		array('title'=>'8б','url'=>'img/cards/8б.jpeg','value'=>8),//32
		array('title'=>'9б','url'=>'img/cards/9б.jpeg','value'=>9),//33
		array('title'=>'10б','url'=>'img/cards/10б.jpeg','value'=>10),//34
		array('title'=>'Вб','url'=>'img/cards/Вб.jpeg','value'=>10),//35
		array('title'=>'Дб','url'=>'img/cards/Дб.jpeg','value'=>10),//36
		array('title'=>'Кб','url'=>'img/cards/Кб.jpeg','value'=>10),//37
		array('title'=>'Тб','url'=>'img/cards/Тб.jpeg','value'=>11),//38
		//пика
		array('title'=>'2п','url'=>'img/cards/2п.jpeg','value'=>2),//39
		array('title'=>'3п','url'=>'img/cards/3п.jpeg','value'=>3),//40
		array('title'=>'4п','url'=>'img/cards/4п.jpeg','value'=>4),//41
		array('title'=>'5п','url'=>'img/cards/5п.jpeg','value'=>5),//42
		array('title'=>'6п','url'=>'img/cards/6п.jpeg','value'=>6),//43
		array('title'=>'7п','url'=>'img/cards/7п.jpeg','value'=>7),//44
		array('title'=>'8п','url'=>'img/cards/8п.jpeg','value'=>8),//45
		array('title'=>'9п','url'=>'img/cards/9п.jpeg','value'=>9),//46
		array('title'=>'10п','url'=>'img/cards/10п.jpeg','value'=>10),//47
		array('title'=>'Вп','url'=>'img/cards/Вп.jpeg','value'=>10),//48
		array('title'=>'Дп','url'=>'img/cards/Дп.jpeg','value'=>10),//49
		array('title'=>'Кп','url'=>'img/cards/Кп.jpeg','value'=>10),//50
		array('title'=>'Тп','url'=>'img/cards/Тп.jpeg','value'=>11),//51
	];

    public $message = "Fuuuu";

    
    
}
