<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mevents = Events::whereMonth('date','=',date('m',time()))->get();
        $events = Events::whereNotIn('id',$mevents)->orderBy('date','desc')->get();
        return view('home')->with('mevents',$mevents)->with('events',$events);
    }
    public function getApp(){
        return response()->download(public_path('applications/android/EventLocator.apk'));
    }
}
