<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $table = 'events';
    protected $dates = ['date','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at'];
    public function getTitleAttribute($value)
    {
        return $this->attributes['title'] = ucfirst($value);
    }
    public function getDateAttribute($value)
    {
        return $this->attributes['date'] = date('d M Y h:i A',strtotime($value));
    }
    public function reservations(){
    	return $this->hasMany('\App\Models\Reservations','event_id','id')->get();
    }
    public function comments(){
    	return $this->hasMany('\App\Models\Comments','event_id','id')->get();
    }
}
