@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <h2 class="panel-heading" style="margin: 10; text-align: center;">BLACK JACK</h2>
                <hr>
                <div id="app">
                	<blackjack-component :cards="{{json_encode($cards)}}" :user="{{json_encode($user)}}" :usercards="{{json_encode($cards)}}" :dealercards="{{json_encode($cards)}}"></blackjack-component>                   
            </div>
        </div>
    </div>
</div>
@endsection
