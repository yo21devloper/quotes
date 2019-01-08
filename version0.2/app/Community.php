<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Community extends Authenticatable
{
	protected $table='community';
    protected $fillable = [
    	'ServiceTitle', 'venue', 'StartDate', 'StartTime', 'EndTime', 'BannerPic', 'State', 'City', 'AboutService', 'Organizer', 'OrganizerImg','BuyTicketURL','latitude','longitude'
    ];



}
