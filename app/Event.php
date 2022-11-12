<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $fillable = [
        'photo',
        'title',
        'description',
        'start',
        'end'
    ];

    public function record_event()
    {
        return $this->hasMany(Record::class);
    }
    public function getPhotoAttribute($value)
    {
        return asset('images/event') . '/' . $value;
    }
}
