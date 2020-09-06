<?php

namespace App;
use App\Event;
use Illuminate\Database\Eloquent\Model;

class EventPeople extends Model
{
    protected $table = 'event_peoples';
    protected $fillable = ['user_id','event_id','action'];

    public function event()
    {
        return $this->belongsTo('App\Event');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
