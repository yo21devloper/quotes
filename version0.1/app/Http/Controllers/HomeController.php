<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\WebsiteUser;
use App\Topic;
use App\People;
use App\Quote;
use App\Home;
use App\TopicQuote;
use App\SocialLink;
use Auth;
use Illuminate\Support\Facades\Input;
use View;
use Redirect;
use Hash;
use Mail;
use Session;
use App\MyFavoriteQuote;
use App\MyCollectionQuote;
use App\CollectionQuote;

class HomeController extends Controller
{
    
    public function topics(Request $request)
    {
        $topics=Topic::all();
        $social=SocialLink::first();
        return view::make('topics',compact('topics','social'));
    }

        public function topics_related(Request $request)
    {
        $social=SocialLink::first();
        $quotesdata=TopicQuote::where('topic_id',$request->topicid)->get();
        $topic=Topic::where('id',$request->topicid)->first();

        $userdata=Session::get('user');

        if($userdata != '')
        {
          $favorites=MyFavoriteQuote::where('userid',$userdata['0']['id'])->get();

          foreach($favorites as $favorite)
          {
            $fav[]=$favorite->quoteid;
          }
        }
        else
        {
          $fav =[];
        }

                if($userdata != '')
        {
          $collections=MyCollectionQuote::where('userid',$userdata['0']['id'])->get();

          foreach($collections as $collection)
          {
            $coll[]=$collection->quoteid;
          }
        }
        else
        {
          $coll =[];
        }


        return view::make('topic_related',compact('quotesdata','topic','social','fav','coll'));
    }


    public function topics50(Request $request)
    {
        $topics=Topic::where('top50','1')->get();
        $social=SocialLink::first();
        return view::make('topics50',compact('topics','social'));
    }
    public function people(Request $request)
    {
        $peoples=People::where('status','1')->get();
        $social=SocialLink::first();
        return view::make('people',compact('peoples','social'));
    }
    
    public function index(Request $request)
    {
        $quotes=Quote::where('status','1')->get();
        $top50=Topic::where('top50','1')->get();
        $home=Home::first();
        $social=SocialLink::first();

        $userdata=Session::get('user');

        if($userdata != '')
        {
          $favorites=MyFavoriteQuote::where('userid',$userdata['0']['id'])->get();

          foreach($favorites as $favorite)
          {
            $fav[]=$favorite->quoteid;
          }
        }
        else
        {
          $fav =[];
        }

        if($userdata != '')
        {
          $collections=MyCollectionQuote::where('userid',$userdata['0']['id'])->get();

        }
        else
        {
          $collections =[];
        }
        
        
        return view::make('index',compact('quotes','top50','home','social','fav','collections'));
    }


    public function login(Request $request)
    {
        $user=WebsiteUser::where('email',$request->email)->first();

        if(!empty($user))
        {

          if($user->status=='1')
          {
           
            if (Hash::check($request->password, $user->password))
            {
                session()->push('user', $user);
                return redirect::route('index')->with('success', 'you successfully login');
            }
            else
            {
                return redirect::route('index')->with('error_code','2')->with('success', 'password is wrong');
            }
          }
          else
          {
              return redirect::route('index')->with('error_code','7')->with('error', 'Please verify the email id on website');
          }
            
        }
        else
        {
               return redirect::route('index')->with('error_code','3')->with('error', 'First register the email on website');         
        }
    }


    public function logout1()
    {
      session()->flush();
      return redirect::route('index');
    }

        public function delete(Request $request)
    {
       $delete=WebsiteUser::find($request->id);
       $delete->status='0';
       $delete->save();
        if($delete)
        {
            session()->flush();
            return redirect::route('index');
        }
    }

            public function verifyemail(Request $request)
    {
       $update=WebsiteUser::find(decrypt($request->id));
       $update->status='1';
       $update->save();
        if($update)
        {
            session()->flush();
            return redirect::route('index')->with('error_code','8')->with('success','Now login the website');
        }
    }

    public function submit(Request $request)
    {
        $exits=WebsiteUser::where('email',$request->email)->first();
        if(!empty($exits))
        {
            return redirect::route('index')->with('error_code','1')->with('success', 'User already exists');
        }
        else
        {
            $password=Hash::make($request->password);
            $submit=new WebsiteUser($request->all());
            $submit->password=$password;
            $insert=$submit->save();
            if($insert)
            {
              $id= encrypt($submit->id); 

              $bodyMessage=url('/').'/verifyemail/'.$id;

              $data = array("bodymessage" => $bodyMessage, "email" => $request->email);
      
              Mail::send('mail.send_verifyemail', $data, function($message) use ($data) {

                            $message->to($data['email'], $data['email'])

                                    ->subject('Verify Email');

                            $message->from('jattin@muser.co.in','Quotes Website');

                        });
                return redirect::route('index')->with('success', 'Thanks For Registering')->with('error_code','7');
            }
        }

    }

    public function send_email(Request $request)
  {
      
      $login=WebsiteUser::where('email',$request->email)->first();
      if(!empty($login))
      {

        $id= encrypt($login->id); 

        $bodyMessage=url('/').'/forgot_password/'.$id;

        $data = array("bodymessage" => $bodyMessage, "email" => $request->email);
      
        Mail::send('mail.send_email', $data, function($message) use ($data) {

                            $message->to($data['email'], $data['email'])

                                    ->subject('Forgot Password');

                            $message->from('jattin@muser.co.in','Quotes Website');

                        });
        return redirect('/')->with('error_code','4');
      }
      else
      {
          return redirect('/')->with('error_code','5');
      }
      
  }

  public function search(Request $request)
  {
    $key=$request->key;
    
    $query=Topic::where('topic_name','like','%' . $key . '%')->get();

    $author=People::where('name','like','%' . $key . '%')->get();
    
    if(count($query)>0 || count($author)>0 )
    {
        foreach($query as $data)
        {
          $array[] = ($data->topic_name).' '.'Topic name';
        }
        foreach($author as $data1)
        {
          $array[] = ($data1->name).' '.'Author name';
        }
    }
    else
    {
        $array[]='';
    }
    echo json_encode($array);

  }


  public function favorite()
  {
	  $social=SocialLink::first();
    return view::make('my_favorite',compact('social'));
  }
    public function favorite1()
  {
	  $social=SocialLink::first();
    return view::make('my_favorite1',compact('social'));
  }

      public function collection()
  {
	  $social=SocialLink::first();
    return view::make('collection',compact('social'));
  }

        public function collection1()
  {
	  $social=SocialLink::first();
    return view::make('collection1',compact('social'));
  }

  public function motivationalQuotes(){

    $social=SocialLink::first();
    return view::make('motivational-quotes',compact('social'));
  }
  public function people_innerside(Request $request)
  {

    $social=SocialLink::first();
    $peopledetails=People::where('id',$request->peopleid)->first();
    $quotedetails=Quote::where('status','1')->where('people_id',$request->peopleid)->get();
    $topics=TopicQuote::all();

    $userdata=Session::get('user');

        if($userdata != '')
        {
          $favorites=MyFavoriteQuote::where('userid',$userdata['0']['id'])->get();

          foreach($favorites as $favorite)
          {
            $fav[]=$favorite->quoteid;
          }
        }
        else
        {
          $fav =[];
        }

                if($userdata != '')
        {
          $collections=MyCollectionQuote::where('userid',$userdata['0']['id'])->get();

          foreach($collections as $collection)
          {
            $coll[]=$collection->quoteid;
          }
        }
        else
        {
          $coll =[];
        }

    return view::make('people-innerside',compact('social','peopledetails','quotedetails','fav','coll'));
  }

  public function related_people(Request $request)
  {
    $social=SocialLink::first();
    $peoples=People::where('position',$request->position)->get();

    return view::make('related_people',compact('social','peoples'));
  }


  public function poster(Request $request)
  {

    $social=SocialLink::first();
    $quotedetails=Quote::where('status','1')->where('id',$request->quoteid)->first();

    $topicquote=TopicQuote::where('quote_id',$quotedetails->id)->first();

    $quoteids=TopicQuote::where('topic_id',$topicquote->topic_id)->get();

    
    foreach($quoteids as $quoteid)
    {
    
        $relatedquote=Quote::where('status','1')->where('id',$quoteid->quote_id)->first();
        if($relatedquote != '')
        {
          $relatedquotes[]=$relatedquote;
        }

    }

    $userdata=Session::get('user');

        if($userdata != '')
        {
          $favorites=MyFavoriteQuote::where('userid',$userdata['0']['id'])->get();

          foreach($favorites as $favorite)
          {
            $fav[]=$favorite->quoteid;
          }
        }
        else
        {
          $fav =[];
        }


                if($userdata != '')
        {
          $collections=MyCollectionQuote::where('userid',$userdata['0']['id'])->get();

          foreach($collections as $collection)
          {
            $coll[]=$collection->quoteid;
          }
        }
        else
        {
          $coll =[];
        }

    return view::make('poster',compact('social','quotedetails','relatedquotes','fav','coll'));
  }

  public function myfavoritesubmit(Request $request)
  {
        $social=SocialLink::first();

    if(!empty(Session::get('user')) && $user=Session::get('user'))
    {

      $exist=MyFavoriteQuote::where('userid',$user['0']['id'])->where('quoteid',$request->quoteid)->first();
        
        if($exist!='')
        {
          $exist->delete();
          return response('error', 200);
        }
        else
        {
          $quotedata=new MyFavoriteQuote();
          $quotedata->userid=$user['0']['id'];
          $quotedata->quoteid=$request->quoteid;
          $quotedata->save();
          return response('success', 202);
        }

        return redirect('myfavorite');
    }
    else
    {
          return response('error_code', 200);      
    }
 
  }


  public function myfavorite(Request $request)
  {
        $social=SocialLink::first();

    if(!empty(Session::get('user')) && $user=Session::get('user'))
    {
   		$quotedata1=MyFavoriteQuote::where('userid',$user['0']['id'])->get(); 


      $userdata=Session::get('user');

        if($userdata != '')
        {
          $favorites=MyFavoriteQuote::where('userid',$userdata['0']['id'])->get();

          foreach($favorites as $favorite)
          {
            $fav[]=$favorite->quoteid;
          }
        }
        else
        {
          $fav =[];
        }


                if($userdata != '')
        {
          $collections=MyCollectionQuote::where('userid',$userdata['0']['id'])->get();

          foreach($collections as $collection)
          {
            $coll[]=$collection->quoteid;
          }
        }
        else
        {
          $coll =[];
        }
    	
   		return view::make('myfavorite',compact('social','quotedata1','coll','fav'));
    }
    else
    {
    	return redirect('/');	
    }
   
   }


   public function mycollection(Request $request)
  {
        $social=SocialLink::first();

    if(!empty(Session::get('user')) && $user=Session::get('user'))
    {
      $quotedata1=MyCollectionQuote::where('userid',$user['0']['id'])->get(); 

      return view::make('mycollection',compact('social','quotedata1'));


    }
    else
    {
      return redirect('/'); 
    }
   
   }


   public function mycollectiondata(Request $request)
  {
        $social=SocialLink::first();

    if(!empty(Session::get('user')) && $user=Session::get('user'))
    {
      
      $topicid=Topic::where('topic_name',$request->topicname)->first();

      $quotedata=TopicQuote::select('quote_id')->where('topic_id',$topicid->id)->get();


      foreach($quotedata as $quotesdatas)
      {
        $quotevalues23[]=$quotesdatas->quote_id;
      }

      $quotedata1=MyCollectionQuote::select('quoteid')->where('userid',$user['0']['id'])->get(); 
      
      foreach($quotedata1 as $quotesdatas12)
      {
        $quotevalues12[]=$quotesdatas12->quoteid;
      }

      if(!empty($quotevalues23) && !empty($quotevalues12) )
      {

        $value12=array_intersect($quotevalues23, $quotevalues12);
      }
      else
      {
        $value12=[];
      }


      foreach($value12 as $value)
      {
        $quotevalues[]=Quote::where('id',$value)->first();
      }


      $userdata=Session::get('user');

      if($userdata != '')
        {
            $collections=MyCollectionQuote::where('userid',$userdata['0']['id'])->get();

            foreach($collections as $collection)
            {
              $coll[]=$collection->quoteid;
            }
        }
        else
        {
          $coll =[];
        }


        if($userdata != '')
        {
          $favorites=MyFavoriteQuote::where('userid',$userdata['0']['id'])->get();

          foreach($favorites as $favorite)
          {
            $fav[]=$favorite->quoteid;
          }
        }
        else
        {
          $fav =[];
        }

      return view::make('mycollectiondata',compact('social','quotevalues','fav','coll'));


    }
    else
    {
      return redirect('/'); 
    }
   
   }


   public function mycollectionsubmit(Request $request)
  {
        $social=SocialLink::first();

    if(!empty(Session::get('user')) && $user=Session::get('user'))
    {
           
        $exists=CollectionQuote::where('collectionid',$request->collectionid)->where('quoteid',$request->quoteid)->where('userid',$user['0']['id'])->count();

        if($exists == '0')
        {
            $quotedata=new CollectionQuote();
            $quotedata->userid=$user['0']['id'];
            $quotedata->collectionid=$request->collectionid;
            $quotedata->quoteid=$request->quoteid;
            $quotedata->save();
            return response('success','200');
        }
        else
        {
            return response('success','202'); 
        }
    }
    else
    {
          return response('error_code',500);      
    }
 
  }


  public function change_email(Request $request)
  {

    if(!empty(Session::get('user')) && $user=Session::get('user'))
    {
        session()->flush();
        $update=WebsiteUser::where('id',$user['0']['id'])->update(['email' => $request->email]);

        $user=WebsiteUser::where('id',$user['0']['id'])->first();

        session()->push('user', $user);

        if($update)
        {
            return redirect('profile');     
        }
        else
        {
          return redirect::back();
        }
    }
      else
    {
        return redirect::back();
    }

  }


  public function change_password(Request $request)
  {

    if(!empty(Session::get('user')) && $user=Session::get('user'))
    {

        $password1=Hash::make($request->password);

        $update=WebsiteUser::where('id',$user['0']['id'])->update(['password' => $password1]);

        if($update)
        {
            return redirect('profile');     
        }
        else
        {
          return redirect::back();
        }
    }
      else
    {
        return redirect::back();
    }

  }


  public function change_image(Request $request)
  {

    if(!empty(Session::get('user')) && $user=Session::get('user'))
    {

            if ($request->image!='') 

             {

                    $rand=rand(1,1000000);

                    // Set the destination path

                    $destinationPath = public_path().'/images/';

                    // Get the orginal filname or create the filename of your choice

                    $filename2 = str_replace(' ', '_', $request->image->getClientOriginalName());

                    $filename2=$rand.''.$filename2;

                    $request->image->move($destinationPath, $filename2);

            }   

            else

            {

                $filename2='head.png';

            }
      
        session()->flush();

        $update=WebsiteUser::where('id',$user['0']['id'])->update(['image' => $filename2]);

        $user=WebsiteUser::where('id',$user['0']['id'])->first();

        session()->push('user', $user);

        if($update)
        {
            return redirect('profile');     
        }
        else
        {
          return redirect::back();
        }
    }
      else
    {
        return redirect::back();
    }

  }


}
