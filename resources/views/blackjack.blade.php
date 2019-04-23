@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <h2 class="panel-heading" style="margin: 10; text-align: center;">BLACK JACK</h2>
                <hr>
                <div id="app">
                	<blackjack-component :data="{{json_encode($data)}}" :user="{{json_encode($user)}}"></blackjack-component>                   
            </div>
        </div>
    </div>
</div>
@endsection
