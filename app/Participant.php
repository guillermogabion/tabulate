<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    //
    protected $fillable = [
        'first_name',
        'last_name',
        'address',
        'contact',
        'designation',
    ];

    protected $appends = [
        'fullname'
    ];
    public function getFullnameAttribute()
    {
        $fullname = '';
        if ($this->firstname) $fullname = ucfirst($this->firstname);
        if ($this->lastname) $fullname .= ' ' . ucfirst($this->lastname);
        return $fullname;
    }

    public function record_participant()
    {
        return $this->belongsToMany(Record::class);
    }
}
