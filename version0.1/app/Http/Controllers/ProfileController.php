<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\SocialLink;
use Auth;
use View;
use Redirect;
use Hash;

class ProfileController extends Controller
{
    function showProfile()
    {
    	$social=SocialLink::first();
        return view::make('profile',compact('social'));
    }
}
