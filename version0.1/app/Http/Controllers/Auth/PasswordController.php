<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use App\WebsiteUser;
use Hash;

class PasswordController extends Controller
{


    public function showPasswordForm($id)
    {
        $id=decrypt($id);
        if($id!='')
        {
            $data=WebsiteUser::where('id',$id)->first();
            if(!empty($data))
            {
                  return view('auth.passwords.password_set')->with(['error'=>'Your email is verified now and enter the your password!', 'isShow' => true]);
                
            }
            else
            {
                return view('auth.passwords.password_set')->with(['message'=>'Your email is already verified now!', 'isShow' => false]);

            }
        }
        else
        {
            return view('auth.passwords.password_set')->with(['message'=>'Something went wrong. Please try after some time!', 'isShow' => false]);
        }


    }


    public function password_register(Request $request)
    {
        $data=WebsiteUser::find($request->id);
       
        if($data)
        {
            $password=Hash::make($request->password);
            $data->password=$password;
            $data->status='1';

            $save=$data->save();
            if($save)
            {
               return redirect()->route('index')->with('success','User Add Successfully!'); 
            }
            else
            {
                return redirect()->back()->with('error','Something went wrong. Please try after some time!');
            }
        }
        else
        {
            return redirect()->back()->with('error','Driver id is not exists!');
        }
    }

    
}
