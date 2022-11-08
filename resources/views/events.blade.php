@extends('layouts.main')
@section('title') Events @stop
@section('body') 
{!! (session()->has('message'))?'<p class="text-success text-center">'.session()->get('message').'</p>':'' !!}
@if(count($events)>0)
<div class="list-group">
@foreach($events as $event)
<a href="{{route('singleEvent',$event->id)}}" class="list-group-item">
<span class="list-group-item-heading"><h5 class="text-info" style="display: inline-block;font-weight: bold;">{{$event->title}}</h5><h5 class="text-muted" style="display: inline-block;float: right;">{{$event->date}}</h5></span>
    <p class="list-group-item-text" style="padding-top: 10px;">{{$event->description}}</p><br>
    <i class="text-muted">Location: </i> {{$event->formatted_address}} &nbsp;&nbsp;&nbsp;
    <i class="text-muted">Host: </i> {{$event->host}} &nbsp;&nbsp;&nbsp;

</a>	
 @endforeach
</div>
@else
<h2 class="text-center">You have not yet added any event<br><br>
<a href="{{route('addEvent')}}"><button class="btn btn-primary">Add an event</button></a>
</h2><br>

@endif
@stop