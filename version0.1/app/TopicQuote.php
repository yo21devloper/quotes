<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopicQuote extends Model
{
    protected $table = 'topic_quote';
    protected $fillable = [
        'topic_id','quote_id',
    ];

    public function topicname()
    {
    	return $this->belongsTo('App\Topic','topic_id');
    }
    public function quotedata()
    {
    	return $this->belongsTo('App\Quote','quote_id','id')->where('status','1');	
    }

}