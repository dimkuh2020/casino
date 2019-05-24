@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="panel panel-default">
        <div class="panel-heading" style="text-align: center; height: 150px; background: url(img/bjfooter.jpg); background-size: cover;">BLACK JACK</div>        
        <div id="app">
        <blackjack-component :cards="{{json_encode($cards)}}" :user="{{json_encode($user)}}" :cash="{{json_encode($cash)}}" :id="{{json_encode($id)}}">              </blackjack-component>
    </div>
</div>
@endsection
