<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    //
    protected $fillable = [
        'title',
        'description',
        'point',
        'category_id'
    ];
}
