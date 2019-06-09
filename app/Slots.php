<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slots extends Model
{
    public $slots = [ 
    				  array('title'=>'cherry','url'=>'img/slots/slot1.png'),
				      array('title'=>'orange','url'=>'img/slots/slot2.png'),
				      array('title'=>'plum','url'=>'img/slots/slot3.png'),
				      array('title'=>'bell','url'=>'img/slots/slot4.png'),
				      array('title'=>'bar','url'=>'img/slots/slot5.png'),
				      array('title'=>'seven','url'=>'img/slots/slot6.png'),
				    ];
}
