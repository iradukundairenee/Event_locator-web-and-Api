@extends('layouts.app')

@section('title') @yield('title') @stop
@section('content')

<div class="container">
    <div class="row">
    <div class="col-md-2 col-md-offset-1">
      <nav class="navbar navbar-default sidebar" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#left-menus">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>      
        </div>
        <div class="collapse navbar-collapse" id="left-menus">
          <ul class="nav navbar-nav">      
            <li {!! (Route::currentRouteName()=='addEvent')?'class="active"':'' !!}>
              <a href="{{url('newevent')}}">Add Event</a>
            </li>        
            <li 
              {!! (Route::currentRouteName()=='events' || Route::currentRouteName()=='singleEvent' || Route::currentRouteName()=='editEvent')?'class="active"':'' !!}>
              <a href="{{ route('events') }}">My Events</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">@yield('title')</div>

                <div class="panel-body">
                    @yield('body')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
