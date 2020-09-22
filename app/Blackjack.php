<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Blackjack extends Model
{	

	public $usercount = null;    //подсчёт очков игрока
	public $dealercount = null;  //подсчёт очков дилера

	public $usercards = []; //пустой массив игрока для заполнения картиами
	public $dealercards = []; //пустой массив дилера для заполнения картами

	public $tempindex = null;//для записи рандомного индекса
	

	public $cards = [
		//рубаха
		array('title'=>'shirt','url'=>'img/cards/shirt.png','value'=>0),//0
		//чирва
		array('title'=>'2ch','url'=>'img/cards/2ch.jpeg','value'=>2),//1   
		array('title'=>'3ch','url'=>'img/cards/3ch.jpeg','value'=>3),//2
		array('title'=>'4ch','url'=>'img/cards/4ch.jpeg','value'=>4),//3
		array('title'=>'5ch','url'=>'img/cards/5ch.jpeg','value'=>5),//4
		array('title'=>'6ch','url'=>'img/cards/6ch.jpeg','value'=>6),//5
		array('title'=>'7ch','url'=>'img/cards/7ch.jpeg','value'=>7),//6
		array('title'=>'8ch','url'=>'img/cards/8ch.jpeg','value'=>8),//7
		array('title'=>'9ch','url'=>'img/cards/9ch.jpeg','value'=>9),//8
		array('title'=>'10ch','url'=>'img/cards/10ch.jpeg','value'=>10),//9
		array('title'=>'Vch','url'=>'img/cards/Vch.jpeg','value'=>10),//10
		array('title'=>'Qch','url'=>'img/cards/Qch.jpeg','value'=>10),//11
		array('title'=>'Kch','url'=>'img/cards/Kch.jpeg','value'=>10),//12
		array('title'=>'Tch','url'=>'img/cards/Tch.jpeg','value'=>11),//13
		//трефа
		array('title'=>'2t','url'=>'img/cards/2t.jpeg','value'=>2),//14
		array('title'=>'3t','url'=>'img/cards/3t.jpeg','value'=>3),//15
		array('title'=>'4t','url'=>'img/cards/4t.jpeg','value'=>4),//16
		array('title'=>'5t','url'=>'img/cards/5t.jpeg','value'=>5),//17
		array('title'=>'6t','url'=>'img/cards/6t.jpeg','value'=>6),//18
		array('title'=>'7t','url'=>'img/cards/7t.jpeg','value'=>7),//19
		array('title'=>'8t','url'=>'img/cards/8t.jpeg','value'=>8),//20
		array('title'=>'9t','url'=>'img/cards/9t.jpeg','value'=>9),//21
		array('title'=>'10t','url'=>'img/cards/10t.jpeg','value'=>10),//22
		array('title'=>'Vt','url'=>'img/cards/Vt.jpeg','value'=>10),//23
		array('title'=>'Qt','url'=>'img/cards/Qt.jpeg','value'=>10),//24
		array('title'=>'Kt','url'=>'img/cards/Kt.jpeg','value'=>10),//25
		array('title'=>'Tt','url'=>'img/cards/Tt.jpeg','value'=>11),//26
		//бубна
		array('title'=>'2b','url'=>'img/cards/2b.jpeg','value'=>2),//27
		array('title'=>'3b','url'=>'img/cards/3b.jpeg','value'=>3),//28
		array('title'=>'4b','url'=>'img/cards/4b.jpeg','value'=>4),//29
		array('title'=>'5b','url'=>'img/cards/5b.jpeg','value'=>5),//30
		array('title'=>'6b','url'=>'img/cards/6b.jpeg','value'=>6),//31
		array('title'=>'7b','url'=>'img/cards/7b.jpeg','value'=>7),//32
		array('title'=>'8b','url'=>'img/cards/8b.jpeg','value'=>8),//33
		array('title'=>'9b','url'=>'img/cards/9b.jpeg','value'=>9),//34
		array('title'=>'10b','url'=>'img/cards/10b.jpeg','value'=>10),//35
		array('title'=>'Vb','url'=>'img/cards/Vb.jpeg','value'=>10),//36
		array('title'=>'Qb','url'=>'img/cards/Qb.jpeg','value'=>10),//37
		array('title'=>'Kb','url'=>'img/cards/Kb.jpeg','value'=>10),//38
		array('title'=>'Tb','url'=>'img/cards/Tb.jpeg','value'=>11),//39
		//пика
		array('title'=>'2p','url'=>'img/cards/2p.jpeg','value'=>2),//40
		array('title'=>'3p','url'=>'img/cards/3p.jpeg','value'=>3),//41
		array('title'=>'4p','url'=>'img/cards/4p.jpeg','value'=>4),//42
		array('title'=>'5p','url'=>'img/cards/5p.jpeg','value'=>5),//43
		array('title'=>'6p','url'=>'img/cards/6p.jpeg','value'=>6),//44
		array('title'=>'7p','url'=>'img/cards/7p.jpeg','value'=>7),//45
		array('title'=>'8p','url'=>'img/cards/8p.jpeg','value'=>8),//46
		array('title'=>'9p','url'=>'img/cards/9p.jpeg','value'=>9),//47
		array('title'=>'10p','url'=>'img/cards/10p.jpeg','value'=>10),//48
		array('title'=>'Vp','url'=>'img/cards/Vp.jpeg','value'=>10),//49
		array('title'=>'Qp','url'=>'img/cards/Qp.jpeg','value'=>10),//50
		array('title'=>'Kp','url'=>'img/cards/Kp.jpeg','value'=>10),//51
		array('title'=>'Tp','url'=>'img/cards/Tp.jpeg','value'=>11)//52
	];
  
    
}
