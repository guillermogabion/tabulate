<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = [
        'avatar',
        'name'
    ];

    public function getAvatarAttribute($value)
    {
        return asset('images/category') . '/' . $value;
    }
}
