<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Platform extends Authenticatable
{
	protected $table='platform';
    protected $fillable = [
    	'platformtype','unique_id'
    ];



}
