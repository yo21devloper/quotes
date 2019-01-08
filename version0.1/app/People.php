<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $table = 'people';
    protected $fillable = [
        'image', 'name', 'position','status','date', 'horoscope',
    ];

}