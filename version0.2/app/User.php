<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'UserID';
    
    protected $fillable = [
        'UserID', 'lastname', 'firstname', 'EmailID','FacebookId','GmailId','ProfilePic', 'DOB', 'Gender', 'AboutMe', 'Password','Age','MajorID', 'UniversityID', 'Status','email_notification','push_notification','android_device_id','ios_device_id','isactive'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     public function majors()
    {
        return $this->hasone('App\Major','id','MajorID');
    }

         public function university()
    {
        return $this->hasone('App\University','id','UniversityID');
    }

}
