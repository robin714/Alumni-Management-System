<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $fillable = ['title','description','user_id','department_id','status'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function department()
    {
        return $this->belongsTo('App\Department');
    }
}
