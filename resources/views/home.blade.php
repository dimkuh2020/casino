@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="margin-left: 10%">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <h2 class="panel-heading" style="margin: 10px; text-align: center; padding-top: 20px;">Welcome, {{Auth::user()->name}}!</h2>                    
                <div class="panel-body">
                    <h3 style="margin: 0; text-align: center;">Choose game to play</h3>                    
                    <div class="row" id="nav" style="text-align: center; padding-top: 20px;">
                        <div class="col-md">
                            <a href="{{ route('blackjack') }}">
                                <img src="{{ asset('img/bj.png')}}" width="80%">
                            </a>
                            <h1>Black Jack</h1>
                        </div>
                            <div class="col-md">
                            <a href="{{route('slots')}}">
                                <img src="{{ asset('img/slots.png')}}" width="80%">
                            </a>
                            <h1>Slots</h1>
                        </div>                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
