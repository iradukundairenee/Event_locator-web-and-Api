@extends('layouts.main')
@section('title') {{$event->title}} @stop
@section('body') 
<div class="modal fade confirmBox" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="boxTitle">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title" id="boxTitle" onclick="$('.close').addClass('.disabled')">Delete?</h5>
      </div>
      <div class="modal-body">
        Do you really want to delete this event,
        @if((count($event->reservations()))>0)
        and all its reservations, comments?
        @endif
        @if((count($event->comments()))>0)
        and all its comments?
        @endif
        <br><br>
        <b class="text-warning">Note that this action can not be undone</b>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
        <a href="{{route('deleteEvent',$event->id)}}"><button type="button" class="btn btn-danger btn-sm">Yes, Delete</button></a>
      </div>
    </div>
  </div>
</div>
<div class="list-group">
<span class="list-group-item">
<span class="list-group-item-heading"><h5 class="text-info" style="display: inline-block;font-weight: bold;">{{$event->title}}</h5>
</span>

    <p class="list-group-item-text" style="padding-top: 10px;">{{$event->description}}</p>
    <hr>
    <b class="text-muted">Location: </b> {{$event->locality}} <br>
    <b class="text-muted">Address: </b> {{$event->formatted_address}} <br>
    <b class="text-muted">Date and time: </b> {{$event->date}} <br>
    <b class="text-muted">Host: </b> {{$event->host}} 
</span><br>
<hr>
<div class="text-right">
<a href="{{route('editEvent',$event->id)}}"><button class="btn btn-primary btn-sm"><i class="ion-edit"></i>&nbsp;Edit this event</button></a>
<button class="btn btn-danger btn-sm" data-toggle="modal" data-target=".confirmBox"><i class="ion-trash-b"></i>&nbsp;Delete this event</button>
</div>
<hr>
<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
  	<li role="presentation" class="active">
  		<a href="#reservations" aria-controls="reservations" role="tab" data-toggle="tab">Reservation{{(count($event->reservations())>1)?'s':''}} <span class="badge">{{count($event->reservations())}}</span>
  		</a>
  	</li>
    <li role="presentation">
    	<a href="#comments" aria-controls="comments" role="tab" data-toggle="tab">Comment{{(count($event->comments())>1)?'s':''}} <span class="badge">{{count($event->comments())}}</span></a>
    </li>
  </ul>
  <div class="tab-content" style="border-left: 1px solid #ddd;border-right: 1px solid #ddd;border-bottom: 1px solid #ddd;padding: 15px;border-radius: 0 0 4px 4px;">
    
    <div role="tabpanel" class="tab-pane fade in active" id="reservations">
    @if(count($event->reservations())>0)
	    <div class="table-responsive">
			<table class="table table-bordered table-hover table-striped">
				<tr>
					<th>Firstname</th>
					<th>Lastname</th>
					<th>Email</th>
					<th>Phone</th>
				</tr>
				@foreach($event->reservations() as $reservation)
					<tr>
						<td>{{$reservation->firstname}}</td>
						<td>{{$reservation->lastname}}</td>
						<td>{{$reservation->email}}</td>
						<td>{{$reservation->phone}}</td>
					</tr>
				@endforeach
			</table>
		</div>
	@else
		<h2 class="text-center">No Reservation for your event</h2>
	@endif
    </div>
    <div role="tabpanel" class="tab-pane fade" id="comments">
    	@if(count($event->comments())>0)
    		@foreach($event->comments() as $comment)
    			<span class="list-group-item">
					<span class="list-group-item-heading">
						<h5 class="text-info" style="display: inline-block;font-weight: bold;">{{$comment->firstname .' '.$comment->lastname}}</h5>
					</span>
				    <p class="list-group-item-text" style="border-left: 2px solid #1db5ff;padding: 10px;">{{$comment->comment}}</p><br>
				    <div style="">
				    	
				    	<b class="text-muted"><i class="ion-android-mail"></i> </b> <a href="mailto:{{$comment->email}}">{{$comment->email}}</a> &nbsp;&nbsp;&nbsp;<i class="text-muted"><i class="ion-calendar"></i></i> <i>{{date('d M Y \a\t h:i A',strtotime($comment->created_at))}}</i>
				    </div>

				</span>
			@endforeach
    	@else
			<h2 class="text-center">No Comment on your event</h2>
		@endif
    </div>
  </div>

</div>
</div>
@stop