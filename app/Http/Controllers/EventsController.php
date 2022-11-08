<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
use App\Models\Comments;
use App\Models\Reservations;
use Auth;
class EventsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	public function index(){
		$events = Events::where('user_id',Auth::user()->id)->get();
		return view('events')->with('events',$events);
    }
    public function showEventForm(){
    	return view('addEvent');
    }
    public function saveEvent(Request $request){
        $validate = \Validator::make($request->all(),[
                'title'=>'required|min:6',
                'description'=>'required|min:6',
                'host'=>'required',
                'formatted_address'=>'required',
                'lat'=>'required',
                'lng'=>'required',
            ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors())->withInput();
        }
    	$event = new Events();
    	$event->title = $request->input('title');
    	$event->date = $request->input('date').':00'; //Appends 00(seconds), to match Valid date string to work with date string
    	$event->description = $request->input('description');
    	$event->host = $request->input('host');
    	$event->user_id = Auth::user()->id;
    	$event->formatted_address = $request->input('formatted_address');
    	$event->locality = $request->input('locality');
    	$event->state = $request->input('state');
    	$event->country = $request->input('country');
    	$event->lng = $request->input('lng');
    	$event->lat = $request->input('lat');
    	$event->administrative_area_level_1 = $request->input('administrative_area_level_1');
    	$event->save();
    	return redirect()->back()->withMessage('Successfully saved');
    }
    public function singleEvent($id){
    	$event = Events::where('id',$id)->where('user_id',Auth::user()->id)->firstOrFail();
        return view('singleEvent')->with('event',$event);
    }
    public function deleteEvent($id){
        $event = Events::where('id',$id)->where('user_id',Auth::user()->id)->firstOrFail();
        Reservations::where('event_id',$event->id)->forceDelete();
        Comments::where('event_id',$event->id)->forceDelete();
        $event->forceDelete();
        return redirect('events')->with('message','Your event has been successfully deleted');
    }
    public function editEvent($id){
        $event = Events::where('id',$id)->where('user_id',Auth::user()->id)->firstOrFail();
        return view('editEvent')->with('event',$event);
    }
    public function updateEvent($id,Request $request){
        $validate = \Validator::make($request->all(),[
                'title'=>'required|min:6',
                'description'=>'required|min:6',
                'host'=>'required',
                'formatted_address'=>'required',
                'lat'=>'required',
                'lng'=>'required',
            ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors())->withInput();
        }
        $event = Events::where('id',$id)->where('user_id',Auth::user()->id)->firstOrFail();
        $event->title = $request->input('title');
        $event->date = $request->input('date');
        $event->description = $request->input('description');
        $event->host = $request->input('host');
        $event->user_id = Auth::user()->id;
        $event->formatted_address = $request->input('formatted_address');
        $event->locality = $request->input('locality');
        $event->state = $request->input('state');
        $event->country = $request->input('country');
        $event->lng = $request->input('lng');
        $event->lat = $request->input('lat');
        $event->administrative_area_level_1 = $request->input('administrative_area_level_1');
        $event->save();
        return redirect()->back()->withMessage('An event has been successfully saved');
    }
}
