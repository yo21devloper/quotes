<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class WebsiteUser extends Authenticatable
{
    protected $table = 'users';
    protected $fillable = [
        'name', 'email', 'password'
    ];

}
