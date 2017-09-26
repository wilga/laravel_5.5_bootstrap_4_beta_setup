<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = [];

    public function eventType()
    {
        return $this->belongsTo('App\EventType');
    }     
}
