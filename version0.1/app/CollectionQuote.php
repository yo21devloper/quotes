<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollectionQuote extends Model
{
    protected $table = 'collection_quote';
    protected $fillable = [
        'userid','quoteid','collectionid'
    ];

        public function quotedata()
    {
    	return $this->belongsTo('App\Quote','quoteid','id')->where('status','1');	
    }

}