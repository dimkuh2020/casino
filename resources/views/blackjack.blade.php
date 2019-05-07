@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:3%; margin-bottom:3%" >
    <div class="panel panel-default">
        <h2 class="panel-heading" style="text-align: center; padding-bottom:3%">BLACK JACK</h2>
        <hr>
        <div id="app">
        <blackjack-component :cards="{{json_encode($cards)}}" :user="{{json_encode($user)}}" :usercards="{{json_encode($usercards)}}" :dealercards="{{json_encode($dealercards)}}"></blackjack-component>
    </div>
</div>
@endsection
