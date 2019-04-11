@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <h2 class="panel-heading" style="margin: 10; text-align: center;">BLACK JACK</h2>
                <hr>
                <div id="app">
                	Start here
                	<br>
                	{{$message}}
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection
