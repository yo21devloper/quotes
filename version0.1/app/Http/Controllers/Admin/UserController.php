<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Topic;
use App\People;
use App\Quote;
use App\Home;
use App\SocialLink;
use App\TopicQuote;
use Auth;
use Illuminate\Support\Facades\Input;
use View;
use Redirect;
use Validator;
use Hash;



class UserController extends Controller
{
  public function dashboard()
  {
    return view::make('admin.dashboard');

  }

  public function home()
  {
    $home=Home::first();
    return view::make('admin.view_home',compact('home'));

  }

  public function edit_home(Request $request)
  {
    $home=Home::find($request->id);
    return view::make('admin.edit_home',compact('home'));

  }

  public function update_home(Request $request)
  {
    if ($request->image!='') 
         {
                $rand=rand(1,1000000);
                // Set the destination path
                $destinationPath = public_path().'/images';
                // Get the orginal filname or create the filename of your choice
                $filename2 = str_replace(' ', '_', $request->image->getClientOriginalName());
                $filename2=$rand.''.$filename2;
                $request->image->move($destinationPath, $filename2);
        }   
        else
        {
            $filename2=$request->old_image;
        }
    $home=Home::find($request->id);
    $home->image=$filename2;
    $home->paragraph=$request->paragraph;
    $home->heading=$request->heading;
    $update=$home->save();
    if($update)
    {
      return redirect()->route('home')->with('success','Home Data is update successfully');  
    }
    else
    {
      return redirect()->back();
    }
  
  }

  public function topics()
  {
  	$topics=Topic::all();
    return view::make('admin.view_topic',compact('topics'));

  }

  public function update_topic(Request $request)
  {
    if ($request->image!='') 
         {
                $rand=rand(1,1000000);
                // Set the destination path
                $destinationPath = public_path().'/images';
                // Get the orginal filname or create the filename of your choice
                $filename2 = str_replace(' ', '_', $request->image->getClientOriginalName());
                $filename2=$rand.''.$filename2;
                $request->image->move($destinationPath, $filename2);
        }   
        else
        {
            $filename2=$request->old_image;
        }
  	$update=Topic::find($request->id);
    $update->image=$filename2;
    $update->topic_name=$request->topic_name;
    $save=$update->save();
    if($save)
    {
    	return redirect::back()->with('success','Topic is update successfully');	
    }
    else
    {
    	return redirect::back()->with('error','Topic is not update!!');
    }
    

  }


  public function submit_topic(Request $request)
  {
    if ($request->image!='') 
         {
                $rand=rand(1,1000000);
                // Set the destination path
                $destinationPath = public_path().'/images';
                // Get the orginal filname or create the filename of your choice
                $filename2 = str_replace(' ', '_', $request->image->getClientOriginalName());
                $filename2=$rand.''.$filename2;
                $request->image->move($destinationPath, $filename2);
        }   
        else
        {
            $filename2='';
        }
  		$topic=new Topic($request->all());
      $topic->image=$filename2;
      $insert=$topic->save();
    if($insert)
    {
    	return redirect::back()->with('success','Topic is submit successfully');	
    }
    else
    {
    	return redirect::back()->with('error','Topic is not submit!!');
    }
    
  }

  public function delete_topic(Request $request)
  {
  	$delete=Topic::destroy($request->id);
    if($delete)
    {
    	return redirect::back()->with('success','Topic is delete successfully');	
    }
    else
    {
    	return redirect::back()->with('error','Topic is not delete!!');
    }
    
  }

  public function publish_topic(Request $request)
  {
    $update=Topic::find($request->id);
    $update->top50='1';
    $update1=$update->save();
    if($update1)
    {
      return redirect::back()->with('success','Topic is publish in Top50 successfully');  
    }
    else
    {
      return redirect::back()->with('error','Topic is not delete!!');
    }
    
  }

  public function unpublish_topic(Request $request)
  {
    $update=Topic::find($request->id);
    $update1=$update->top50='0';
    $update1=$update->save();
    if($update1)
    {
      return redirect::back()->with('success','Topic is unpublish in top50 successfully');  
    }
    else
    {
      return redirect::back()->with('error','Topic is not delete!!');
    }
    
  }


  public function people()
  {
    $peoples=People::all();
    return view::make('admin.view_people',compact('peoples'));

  }

  public function edit_people(Request $request)
  {
    $people=People::find($request->id);
    return view::make('admin.edit_people',compact('people'));

  }

  public function update_people(Request $request)
  {
    if ($request->image!='') 
         {
                $rand=rand(1,1000000);
                // Set the destination path
                $destinationPath = public_path().'/images/people';
                // Get the orginal filname or create the filename of your choice
                $filename2 = str_replace(' ', '_', $request->image->getClientOriginalName());
                $filename2=$rand.''.$filename2;
                $request->image->move($destinationPath, $filename2);
        }   
        else
        {
            $filename2=$request->old_image;
        }
    $update=people::find($request->id);
    $update->image=$filename2;
    $update->name=$request->name;
    $update->position=$request->position;
    $update->date=$request->date;
    $update->horoscope=$request->horoscope;
    $save=$update->save();
    if($save)
    {
      return redirect()->route('people')->with('success','People Profile is update successfully');  
    }
    else
    {
      return redirect::back()->with('error','People Profile is not update!!');
    }
    

  }


  public function submit_people(Request $request)
  {
    if ($request->image!='') 
         {
                $rand=rand(1,1000000);
                // Set the destination path
                $destinationPath = public_path().'/images/people';
                // Get the orginal filname or create the filename of your choice
                $filename2 = str_replace(' ', '_', $request->image->getClientOriginalName());
                $filename2=$rand.''.$filename2;
                $request->image->move($destinationPath, $filename2);
        }   
        else
        {
            $filename2='';
        }
      $people=new People($request->all());
      $people->image=$filename2;
      $insert=$people->save();
    if($insert)
    {
      return redirect::back()->with('success','People Profile is submit successfully');  
    }
    else
    {
      return redirect::back()->with('error','People Profile is not submit!!');
    }
    
  }

  public function delete_people(Request $request)
  {
    $delete=People::destroy($request->id);
    if($delete)
    {
      return redirect::back()->with('success','People is delete successfully');  
    }
    else
    {
      return redirect::back()->with('error','People is not delete!!');
    }
    
  }

  public function publish_people(Request $request)
  {
    $update=People::find($request->id);
    $update->status='1';
    $update1=$update->save();
    if($update1)
    {
      return redirect::back()->with('success','People Profile is publish successfully');  
    }
    else
    {
      return redirect::back()->with('error','People Profile is not delete!!');
    }
    
  }

  public function unpublish_people(Request $request)
  {
    $update=People::find($request->id);
    $update1=$update->status='0';
    $update1=$update->save();
    if($update1)
    {
      return redirect::back()->with('success','People Profile is unpublish successfully');  
    }
    else
    {
      return redirect::back()->with('error','People Profile is not delete!!');
    }
    
  }


  public function quotes()
  {
    $quotes=Quote::all();
    $topics=TopicQuote::all();
    $topic_name=[];
    foreach($quotes as $quote)
      {
        foreach($topics as $topic)
        {
       
          if($quote->id == $topic->quote_id)
          {
              $topic_name[]=$topic->topicname->topic_name;

          }
        }
        if($topic_name !='')
        {
          $quote->name=implode(',',$topic_name);
        }
        else
        {
          $quote->name='';
        }
      }

    return view::make('admin.view_quotes',compact('quotes'));

  }
  public function add_quotes()
  {
    $topics=Topic::all();
    $peoples=People::all();

    return view::make('admin.add_quotes',compact('topics','peoples'));

  }


  public function edit_quotes(Request $request)
  {
    $quote=Quote::find($request->id);
    $topics=Topic::all();
    $peoples=People::all();
    $topics24=TopicQuote::select('topic_id')->where('quote_id',$request->id)->get();
    foreach($topics24 as $topic1)
    {
      $topic12[]=$topic1->topic_id;
    }

    return view::make('admin.edit_quotes',compact('quote','topics','peoples','topic12'));
  }

  public function update_quotes(Request $request)
  {
    if ($request->image!='') 
         {
                $rand=rand(1,1000000);
                // Set the destination path
                $destinationPath = public_path().'/images/quotes/';
                // Get the orginal filname or create the filename of your choice
                $filename2 = str_replace(' ', '_', $request->image->getClientOriginalName());
                $filename2=$rand.''.$filename2;
                $request->image->move($destinationPath, $filename2);
        }   
        else
        {
            $filename2=$request->old_image;
        }

    $update=Quote::find($request->id);
    $update->image=$filename2;
    $update->description=$request->description;
    $update->people_id=$request->people_id;
    $update->keywords=$request->keywords;
    $save=$update->save();
    if($save)
    {
      $delete=TopicQuote::where('quote_id',$request->id)->delete();
      if($delete)
      {
        foreach($request->topic_id as $topic)
        {
          $insert=new TopicQuote($request->all());
          $insert->quote_id=$request->id;
          $insert->topic_id=$topic;
          $insert->save();
        }
      }

      return redirect()->route('quotes')->with('success','Quote is update successfully');  
    }
    else
    {
      return redirect::back()->with('error','Quote is not update!!');
    }
    

  }


  public function submit_quotes(Request $request)
  {
    if ($request->image!='') 
         {
                $rand=rand(1,1000000);
                // Set the destination path
                $destinationPath = public_path().'/images/quotes';
                // Get the orginal filname or create the filename of your choice
                $filename2 = str_replace(' ', '_', $request->image->getClientOriginalName());
                $filename2=$rand.''.$filename2;
                $request->image->move($destinationPath, $filename2);
        }   
        else
        {
            $filename2='';
        }
      $quote=new Quote($request->all());
      $quote->image=$filename2;
      $insert=$quote->save();

    if($insert)
    {
      foreach($request->topic_id as $topic)
      {
 
        $insert1=new TopicQuote($request->all());
        $insert1->quote_id=$quote->id;
        $insert1->topic_id=$topic;
        $insert1->save();
      }
      return redirect()->route('quotes')->with('success','Quote is submit successfully');  
    }
    else
    {
      return redirect::back()->with('error','Quote is not submit!!');
    }
    
  }

  public function delete_quotes(Request $request)
  {
    $delete=Quote::destroy($request->id);
    if($delete)
    {
      return redirect::back()->with('success','Quote is delete successfully');  
    }
    else
    {
      return redirect::back()->with('error','Quote is not delete!!');
    }
    
  }

  public function publish_quotes(Request $request)
  {
    $update=Quote::find($request->id);
    $update->status='1';
    $update1=$update->save();
    if($update1)
    {
      return redirect::back()->with('success','Quote is publish successfully');  
    }
    else
    {
      return redirect::back()->with('error','Quote is not delete!!');
    }
    
  }

  public function unpublish_quotes(Request $request)
  {
    $update=Quote::find($request->id);
    $update1=$update->status='0';
    $update1=$update->save();
    if($update1)
    {
      return redirect::back()->with('success','Quote is unpublish successfully');  
    }
    else
    {
      return redirect::back()->with('error','Quote is not delete!!');
    }
    
  }


  public function view_sociallinks()
  {
    $code=SocialLink::first();
    return view::make('admin.view_sociallinks',compact('code'));
  }
  public function edit_sociallinks(Request $request)
  {
    
    $id=decrypt($request->id);
    $code=SocialLink::find($id);
    return view::make('admin.edit_sociallinks',compact('code'));
  }
  public function update_sociallinks(Request $request)
  {
    $code=SocialLink::find($request->id);
    $update=$code->facebook=$request->facebook;
    $update=$code->twitter=$request->twitter;
    $update=$code->instagram=$request->instagram;
    $update=$code->pinterest=$request->pinterest;
    $update=$code->youtube=$request->youtube;
    $update=$code->vimeo=$request->vimeo;
    $update=$code->save();
    if($update)
    {
      return redirect()->route('view_sociallinks')->with('success','Social Links Update Successfully');
    }
    else
    {
      return redirect()->route('view_sociallinks')->with('error','Social Links code is not Update!');
    }
  }



    public function my_profile(Request $request)
  {

    return view::make('admin.my-profile');

  }

    public function change_password(Request $request)
  {

    return view::make('admin.change-password');

  }

    public function change_email(Request $request)
  {

    return view::make('admin.change-email');

  }

        public function admin_credential_rules(array $data)
    {
      $messages = [
        'current_password.required' => 'Please enter current password',
        'password.required' => 'Please enter password',
      ];

      $validator = Validator::make($data, [
        'current_password' => 'required',
        'password' => 'required|different:current_password',
        'password_confirmation' => 'required|same:password',     
      ], $messages);

      return $validator;
    }

  public function updatepassword(Request $request)
    {
          if(Auth::Check())
          {
            $request_data = $request->All();
            $validator = $this->admin_credential_rules($request_data);
            if($validator->fails())
            {
              return redirect::back()->with('error', $validator->getMessageBag());
            }
            else
            {  
              $datacurrent_password = Auth::User()->password;           
              if(Hash::check($request_data['current_password'], $datacurrent_password))
              {           
                $user_id = Auth::User()->id;                       
                $obj_user = User::find($user_id);
                $obj_user->password = Hash::make($request_data['password']);;
                $obj_user->save(); 
                return redirect::back()->with('success', 'Changed password successfully');
              }
              else
              {           
                return redirect::back()->with('error', 'Please enter correct current password');   
              }
            }        
          }
          else
          {
            return redirect()->to('/');
          }  
    }


    public function update_email(Request $request)
    {
          if(Auth::Check())
          {
            $request_data = $request->All();
      $validator = Validator::make($request_data, [
          'email' => 'required',
          'name' => 'required',     
        ]);
            if($validator->fails())
            {
              return redirect::back()->with('error', $validator->getMessageBag());
            }
            else
            {  
                         
                $user_id = Auth::User()->id;                       
                $obj_user = User::find($user_id);
                $obj_user->email = $request->email;
                $obj_user->name = $request->name;
                $obj_user->save(); 
                return redirect::back()->with('success', 'Changed email successfully');
              
            }        
          }
          else
          {
            return redirect()->to('/');
          }  
    }

        public function change_profile(Request $request)
    {
          $rand=rand(1,1000);
          $destination_path=public_path().'/admin_image';
          $image_name=str_replace(' ', '_', $request->file->getClientOriginalName());
          $filename=$rand.''.$image_name;
          $filename_url=url('/').'/admin_image/'.$filename;
          $request->file->move($destination_path,$filename);

          if(Auth::Check())
          {         
                $user_id = Auth::User()->id;                       
                $obj_user = User::find($user_id);
                $obj_user->image = $filename_url;
                $obj_user->save(); 
                return redirect::back()->with('success', 'Profile image change successfully');  
          }
          else
          {
            return redirect()->to('/');
          }  
    }

    public function remove_pic(Request $request)
    {

          if(Auth::Check())
          {         
                $user_id = Auth::User()->id;                       
                $obj_user = User::find($user_id);
                $obj_user->image = '';
                $obj_user->save(); 
                return response('success','200');  
          }
          else
          {
            return response('error','500');
          } 

    }
  
}
