@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2">
                            <div>
                                <h2>Пополнение баланса</h2><br>
                                <p>(тут должно быть подключение к платёжным системам, но и так сойдёт)</p>
                            </div>
                        </div>                        
                        <div class="col-sm-2" style="margin-left: 50%">
                            <div >
                                <img src="{{ asset('img/okay.png')}}" width="90%" ></h2>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <div class="panel-body">                                                              
                    <hr>
                    <form id="form1" action="{{route('balance.update', $user->id)}}" method="post">
                    	{{method_field('PUT')}}
                        {{csrf_field()}}
                        <p>
                            <label for="sname">Ваш баланс:</label>
                            <br>                      
                            <input type="number" name="balance" class="form-control" id="balance" required="" value="{{$user->cash}}" style="width: 600px" step="0.01"/>
                            <br>                                     	                            
                        </p>
                        <div class="row">
                            <div class="col-sm-2">                        
                            <input type="submit" class="btn btn-success btn-lg" name="submit" value="Пополнить" style="width: 120px; font-size: 12pt;">
                        </div>
                        <div class="col-sm-2">
                            <a href="{{route('balance.edit', $user->id)}}" class="btn btn-danger btn-lg" style="width: 120px; font-size: 12pt;">Отмена</a>
                        </div>
                        
                    	</div>
                    </form>                                      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection