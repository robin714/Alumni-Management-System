<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name'];

    public function events()
    {
        return $this->hasMany('App\Event');
    }

    public function notices()
    {
        return $this->hasMany('App\Notice');
    }

    public function user()
    {
    	return $this->hasMany('App\User');
    }
}
