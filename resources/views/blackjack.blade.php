@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="panel panel-default">
        <div class="panel-heading" style="text-align: center; height: 150px; padding-top: 60px; ">
            <div class="row justify-content-center"><h1 style="border: solid 3px #310062; color: #310062; border-radius: 20px; width: 300px"><i>BLACK JACK</i></h1></div>
        </div>        
        <div id="app">
        <blackjack-component :cards="{{json_encode($cards)}}" :user="{{json_encode($user)}}" :cash="{{json_encode($cash)}}" :id="{{json_encode($id)}}">              </blackjack-component>
    </div>
</div>
@endsection
