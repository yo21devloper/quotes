<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Event extends Authenticatable
{
	protected $table='events';
    protected $fillable = [
    	'EventName', 'StartDate', 'StartTime', 'EndTime', 'BannerImg', 'venue', 'AboutEvent', 'BuyTicketURL', 'Organizer', 'OrganizerImg','BuyTicketURL','latitude','longitude'
    ];

        public function majors()
    {
    	return $this->hasone('App\Major','Major');
    }



}
