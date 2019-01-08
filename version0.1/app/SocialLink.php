<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
	protected $table = 'social_link';
    protected $fillable = [
    		'facebook','twitter','instagram','pinterest','youtube','vimeo'
    ];

}