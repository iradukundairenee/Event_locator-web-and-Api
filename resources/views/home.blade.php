@extends('layouts.app')
@section('title') Events @stop
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        @if(count($mevents)>0)
            <div class="panel panel-default">
                <div class="panel-heading"><b>This month's events</b></div>
                <div class="panel-body">
                    
                        <div class="list-group">
                        @foreach($mevents as $mevent)
                        <span class="list-group-item">
                        <span class="list-group-item-heading"><h5 class="text-info" style="display: inline-block;font-weight: bold;">{{$mevent->title}}</h5><h5 class="text-muted" style="display: inline-block;float: right;">{{$mevent->date}}</h5></span>
                            <p class="list-group-item-text" style="padding-top: 10px;">{{$mevent->description}}</p><br>
                            <i class="text-muted">Location: </i> {{$mevent->formatted_address}} &nbsp;&nbsp;&nbsp;
                            <i class="text-muted">Host: </i> {{$mevent->host}} &nbsp;&nbsp;&nbsp;

                        </span>    
                         @endforeach
                        </div>
                        
                </div>
            </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading"><b>Other events</b></div>
                <div class="panel-body">
                    @if(count($events)>0)
                        <div class="list-group">
                        @foreach($events as $event)
                        <span class="list-group-item">
                        <span class="list-group-item-heading"><h5 class="text-info" style="display: inline-block;font-weight: bold;">{{$event->title}}</h5><h5 class="text-muted" style="display: inline-block;float: right;">{{$event->date}}</h5></span>
                            <p class="list-group-item-text" style="padding-top: 10px;">{{$event->description}}</p><br>
                            <i class="text-muted">Location: </i> {{$event->formatted_address}} &nbsp;&nbsp;&nbsp;
                            <i class="text-muted">Host: </i> {{$event->host}} &nbsp;&nbsp;&nbsp;

                        </span>    
                         @endforeach
                        </div>
                        @else
                        <h2 class="text-center">There is no event added<br><br>
                        <a href="{{url('register')}}"><button class="btn btn-primary">Register to add events</button></a>
                        </h2><br>

                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
