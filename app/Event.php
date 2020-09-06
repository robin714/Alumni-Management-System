<?php

namespace App;
use App\EventPeople;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['title','description','event_place','startDateTime','user_id','department_id','status'];

    public function eventPeoples()
    {
        return $this->hasMany('App\EventPeople');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function department()
    {
        return $this->belongsTo('App\Department');
    }
}
