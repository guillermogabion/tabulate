<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $fillable = [
        'name',
        'color',
        'start',
        'end'
    ];

    public function record_event()
    {
        return $this->hasMany(Record::class);
    }
}
