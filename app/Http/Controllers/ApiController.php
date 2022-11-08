<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function reserve($id,Request $request){
		$event = \App\Models\Events::findOrFail($id);
		$reserve = new \App\Models\Reservations();
		$reserve->event_id = $event->id;
		$reserve->firstname = $request->input('firstname');
		$reserve->lastname = $request->input('lastname');
		$reserve->email = $request->input('email');
		$reserve->phone = $request->input('phone');
		$reserve->save();
		return Response()->json(["message"=>"You reservation has been successfully submitted"]);
	}
	public function comment($id,Request $request){
		$event = \App\Models\Events::findOrFail($id);
		$comment = new \App\Models\Comments();
		$comment->event_id = $event->id;
		$comment->firstname = $request->input('firstname');
		$comment->lastname = $request->input('lastname');
		$comment->email = $request->input('email');
		$comment->comment = $request->input('comment');
		$comment->save();
		return Response()->json(["message"=>"Your comment has been successfully submitted"]);
	}
	public function event($id){
		$event = \App\Models\Events::findOrFail($id);
		return Response()->json($event);
	}
	public function events(){
		$events = \App\Models\Events::orderBy('id','desc')->get();
		return Response()->json($events);
	}
}
