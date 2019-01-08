<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Home extends Authenticatable
{
    protected $table = 'home';
    protected $fillable = [
        'heading', 'paragraph', 'image',
    ];

}
