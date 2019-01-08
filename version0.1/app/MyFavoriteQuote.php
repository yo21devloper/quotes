<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyFavoriteQuote extends Model
{
    protected $table = 'my_favorite';
    protected $fillable = [
        'userid','quoteid'
    ];


        public function quotedata()
    {
    	return $this->belongsTo('App\Quote','quoteid','id')->where('status','1');	
    }

}