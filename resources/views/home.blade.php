@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <h2 class="panel-heading" style="margin: 10; text-align: center;">Welcome, {{Auth::user()->name}}!</h2>                    
                <div class="panel-body">
                    <h3 style="margin: 0; text-align: center;">Choose game to play</h3>
                    <hr>
                    <div class="row" id="nav" style="text-align: center">
                        <div class="col-md-4">
                            <a href="{{ route('blackjack') }}">
                                <img src="{{ asset('img/bj.png')}}" width="80%">
                            </a>
                            <h4>Black Jack</h4>
                        </div>
                            <div class="col-md-4">
                            <a href="">
                                <img src="{{ asset('img/slots.png')}}" width="80%">
                            </a>
                            <h4>Slots</h4>
                        </div>
                        <div class="col-md-4">
                            <a href="">
                                <img src="{{ asset('img/casino.jpg')}}" width="80%">
                            </a><br>
                            <h4>Что то новое</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
