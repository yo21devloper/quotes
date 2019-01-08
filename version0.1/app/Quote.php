<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $table = 'quotes';
    protected $fillable = [
        'image', 'description', 'people_id', 'keywords','status',
    ];

    public function people()
    {
    	return $this->belongsTo('App\People','people_id');
    }

    public function topics()
    {
    	return $this->hasMany('App\TopicQuote','quote_id','id');
    }

        public function favoritequote()
    {
        return $this->hasOne('App\MyFavoriteQuote','quoteid','id');
    }

}