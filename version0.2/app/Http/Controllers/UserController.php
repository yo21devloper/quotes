<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Major;

use App\User;

use DB;

use App\Community;

use App\Event;

use App\Music;

use App\University;

use App\Sport;

use App\Tutor;

use Auth;

use Illuminate\Support\Facades\Input;

use View;

use Redirect;

use Hash;

use Mail;

use Session;

use URL;

use App\Admin;

use App\Finder;

use Carbon\Carbon;

use PDF;

use Validator;


class UserController extends Controller

{
	public function dashboard(Request $request)
	{
		$request->session()->forget('sidebar');
		$request->session()->put('sidebar', '7');
		$data=User::where( 'created_at', '>=', Carbon::now()->startOfMonth())->orderby('created_at','asc')->get();
		$calenderdate='';
		$lastdate=date('d',strtotime(Carbon::now()->lastOfMonth()));
		
				for($i=1;$i<=$lastdate;$i++)
				{
						$calender[$i]=0;
				}

		foreach($data as $d)
		{

			if($calenderdate == date('y-m-d',strtotime($d->created_at)))
			{
				$day=date('d',strtotime($d->created_at));
				$calender[$day]=$i;
				$i++;
			}
			else
			{
				$calenderdate = date('y-m-d',strtotime($d->created_at));
				$i=1;
				$day=date('d',strtotime($d->created_at));
				$calender[$day]=$i;
			}


		}

		$total=User::count();
		
		return view::make('dashboard',compact('calender','total'));
	}

	public function majors(Request $request)
	{
		$request->session()->forget('sidebar');
		$request->session()->put('sidebar', '1');
		$majors=Major::all();
		return view::make('majors',compact('majors'));
	}

		public function community(Request $request)
	{
		$request->session()->forget('sidebar');
		$request->session()->put('sidebar', '2');
		$community=Community::all();
		return view::make('community',compact('community'));
	}

	public function events(Request $request)
	{
		$request->session()->forget('sidebar');
		$request->session()->put('sidebar', '3');
		$events=Event::all();
		return view::make('events',compact('events'));
	}

		public function musics(Request $request)
	{
		$request->session()->forget('sidebar');
		$request->session()->put('sidebar', '8');
		$musics=Music::all();
		return view::make('musics',compact('musics'));
	}

		public function universities(Request $request)
	{
		$request->session()->forget('sidebar');
		$request->session()->put('sidebar', '4');
		$universities=University::all();
		return view::make('universities',compact('universities'));
	}
	public function sports(Request $request)
	{
		$request->session()->forget('sidebar');
		$request->session()->put('sidebar', '5');
		$sports=Sport::all();
		return view::make('sports',compact('sports'));
	}
	public function tutors(Request $request)
	{
		$request->session()->forget('sidebar');
		$request->session()->put('sidebar', '6');
		$tutors=Tutor::all();
		return view::make('tutor',compact('tutors'));
	}

	public function add_tutor(Request $request)
	{
		$data=Major::all();
		return view::make('add_tutor',compact('data'));
	}

	public function edit_tutor(Request $request)
	{
		$data=Tutor::find($request->id);
		$majors=Major::all();
		return view::make('edit_tutor',compact('data','majors'));
	}

	public function update_tutor(Request $request)
	{

		$update=Tutor::find($request->id);
		$update->TutorName=$request->TutorName;
		$update->EmailID=$request->EmailID;
		$update->PhoneNo=$request->PhoneNo;
		$update->Major=$request->Major;
		if($request->Address != '')
		{

			$update->Address=$request->Address;
		}
		else
		{
			$update->Address='';	
		}
		if($request->Description != '')
		{

			$update->Description=$request->Description;
		}
		else
		{
			$update->Description='';	
		}

		if($request->ProfilePicPath != '')
		{
				$rand=rand(1,1000000);
                // Set the destination path
                $destinationPath = public_path().'/images';
                // Get the orginal filname or create the filename of your choice
                $filename = str_replace(' ', '_', $request->ProfilePicPath->getClientOriginalName());
                $filename = $rand.''.$filename;
                $request->ProfilePicPath->move($destinationPath, $filename);

		}
		else
		{
			$filename=$request->oldProfilePicPath;
		}

		$update->ProfilePicPath=$filename;
		
		$updated=$update->save();
		if($updated)
		{
			return redirect('tutors')->with('success','Tutor edited successfully');
			
		}
		else
		{
			return redirect('tutors')->with('error','Something went wrong, try again later');
		}



	}

	public function submit_tutor(Request $request)
	{
		$insert=new Tutor($request->all());
		if($insert->Description != '')
		{

			$insert->Description=$request->Description;
		}
		else
		{
			$insert->Description='';	
		}
		if($request->ProfilePicPath != '')
		{
				$rand=rand(1,1000000);
                // Set the destination path
                $destinationPath = public_path().'/images';
                // Get the orginal filname or create the filename of your choice
                $filename = str_replace(' ', '_', $request->ProfilePicPath->getClientOriginalName());
                $filename = $rand.''.$filename;
                $request->ProfilePicPath->move($destinationPath, $filename);

		}
		else
		{
			$filename='';
		}

		$insert->ProfilePicPath=$filename;
		$inserted=$insert->save();

		if($inserted)
		{
			return redirect('tutors')->with('success','Tutor added successfully');
			
		}
		else
		{
			return redirect('tutors')->with('error','Something went wrong, try again later');
		}

	}

	public function delete_tutor(Request $request)
	{

		$delete=Tutor::where('id',$request->id)->delete();
		if($delete)
		{
			return redirect('tutors')->with('success','Delete the tutor successfully');
			
		}
		else
		{
			return redirect('tutors')->with('error','Something went wrong, try again later');
		}
	}


	public function delete_event(Request $request)
	{

		$delete=Event::where('id',$request->id)->delete();
		if($delete)
		{
			return redirect('events')->with('success','Delete the event successfully');
			
		}
		else
		{
			return redirect('events')->with('error','Something went wrong, try again later');
		}
	}

		public function edit_event(Request $request)
	{

		$event=Event::where('id',$request->id)->first();
		if($event)
		{
			return view::make('edit_event',compact('event'));
			
		}
		else
		{
			return redirect('events')->with('error','Something went wrong, try again later');
		}
	}

	public function edit_music(Request $request)
	{

		$music=Music::where('id',$request->id)->first();
		if($music)
		{
			return view::make('edit_music',compact('music'));
			
		}
		else
		{
			return redirect('musics')->with('error','Something went wrong, try again later');
		}
	}

	public function update_event(Request $request)
	{

		$update=Event::find($request->id);
		$update->EventName=$request->EventName;
		$update->StartDate=$request->StartDate;
		$update->StartTime=$request->StartTime;
		$update->EndTime=$request->EndTime;
		$update->latitude=$request->latitude;
		$update->longitude=$request->longitude;
		$update->venue=$request->venue;
		if($request->AboutEvent != '')
		{

			$update->AboutEvent=$request->AboutEvent;
		}
		else
		{
			$update->AboutEvent='';	
		}
		$update->BuyTicketURL=$request->BuyTicketURL;
		if($request->Organizer != '')
		{

			$update->Organizer=$request->Organizer;
		}
		else
		{
			$update->Organizer='';	
		}

		if($request->OrganizerImg != '')
		{
				$rand=rand(1,1000000);
                // Set the destination path
                $destinationPath = public_path().'/images';
                // Get the orginal filname or create the filename of your choice
                $filename = str_replace(' ', '_', $request->OrganizerImg->getClientOriginalName());
                $filename = $rand.''.$filename;
                $request->OrganizerImg->move($destinationPath, $filename);

		}
		else
		{
			$filename=$request->oldOrganizerImg;
		}

		$update->OrganizerImg=$filename;

		if($request->BannerImg != '')
		{

				$rand=rand(1,1000000);
                // Set the destination path
                $destinationPath = public_path().'/images';
                // Get the orginal filname or create the filename of your choice
                $filename1 = str_replace(' ', '_', $request->BannerImg->getClientOriginalName());
                $filename1 = $rand.''.$filename1;
                $request->BannerImg->move($destinationPath, $filename1);

		}
		else
		{
			$filename1=$request->oldBannerImg;

		}

		$update->BannerImg=$filename1;
		$updated=$update->save();
		if($updated)
		{
			return redirect('events')->with('success','Event edited successfully');
			
		}
		else
		{
			return redirect('events')->with('error','Something went wrong, try again later');
		}



	}


		public function update_music(Request $request)
	{

		$update=Music::find($request->id);
		$update->MusicName=$request->MusicName;
		$update->StartDate=$request->StartDate;
		$update->StartTime=$request->StartTime;
		$update->EndTime=$request->EndTime;
		$update->latitude=$request->latitude;
		$update->longitude=$request->longitude;
		$update->venue=$request->venue;
		if($request->AboutMusic != '')
		{

			$update->AboutMusic=$request->AboutMusic;
		}
		else
		{
			$update->AboutMusic='';	
		}
		$update->BuyTicketURL=$request->BuyTicketURL;
		if($request->Organizer != '')
		{

			$update->Organizer=$request->Organizer;
		}
		else
		{
			$update->Organizer='';	
		}

		if($request->OrganizerImg != '')
		{
				$rand=rand(1,1000000);
                // Set the destination path
                $destinationPath = public_path().'/images';
                // Get the orginal filname or create the filename of your choice
                $filename = str_replace(' ', '_', $request->OrganizerImg->getClientOriginalName());
                $filename = $rand.''.$filename;
                $request->OrganizerImg->move($destinationPath, $filename);

		}
		else
		{
			$filename=$request->oldOrganizerImg;
		}

		$update->OrganizerImg=$filename;

		if($request->BannerImg != '')
		{

				$rand=rand(1,1000000);
                // Set the destination path
                $destinationPath = public_path().'/images';
                // Get the orginal filname or create the filename of your choice
                $filename1 = str_replace(' ', '_', $request->BannerImg->getClientOriginalName());
                $filename1 = $rand.''.$filename1;
                $request->BannerImg->move($destinationPath, $filename1);

		}
		else
		{
			$filename1=$request->oldBannerImg;

		}

		$update->BannerImg=$filename1;
		$updated=$update->save();
		if($updated)
		{
			return redirect('musics')->with('success','Music edited successfully');
			
		}
		else
		{
			return redirect('musics')->with('error','Something went wrong, try again later');
		}



	}



	public function add_event(Request $request)
	{
		return view::make('add_event');
	}

	public function add_music(Request $request)
	{
		return view::make('add_music');
	}


	public function submit_event(Request $request)
	{
		$insert=new Event($request->all());

		if($request->OrganizerImg != '')
		{
				$rand=rand(1,1000000);
                // Set the destination path
                $destinationPath = public_path().'/images';
                // Get the orginal filname or create the filename of your choice
                $filename = str_replace(' ', '_', $request->OrganizerImg->getClientOriginalName());
                $filename = $rand.''.$filename;
                $request->OrganizerImg->move($destinationPath, $filename);

		}
		else
		{
			$filename='';
		}

		$insert->OrganizerImg=$filename;

		if($request->BannerImg != '')
		{

				$rand=rand(1,1000000);
                // Set the destination path
                $destinationPath = public_path().'/images';
                // Get the orginal filname or create the filename of your choice
                $filename1 = str_replace(' ', '_', $request->BannerImg->getClientOriginalName());
                $filename1 = $rand.''.$filename1;
                $request->BannerImg->move($destinationPath, $filename1);

		}
		else
		{
			$filename1='';

		}

		$insert->BannerImg=$filename1;
		$inserted=$insert->save();

		if($inserted)
		{
			return redirect('events')->with('success','Event added successfully');
			
		}
		else
		{
			return redirect('events')->with('error','Something went wrong, try again later');
		}

	}

	public function submit_music(Request $request)
	{
		$insert=new Music($request->all());

		if($request->OrganizerImg != '')
		{
				$rand=rand(1,1000000);
                // Set the destination path
                $destinationPath = public_path().'/images';
                // Get the orginal filname or create the filename of your choice
                $filename = str_replace(' ', '_', $request->OrganizerImg->getClientOriginalName());
                $filename = $rand.''.$filename;
                $request->OrganizerImg->move($destinationPath, $filename);

		}
		else
		{
			$filename='';
		}

		$insert->OrganizerImg=$filename;

		if($request->BannerImg != '')
		{

				$rand=rand(1,1000000);
                // Set the destination path
                $destinationPath = public_path().'/images';
                // Get the orginal filname or create the filename of your choice
                $filename1 = str_replace(' ', '_', $request->BannerImg->getClientOriginalName());
                $filename1 = $rand.''.$filename1;
                $request->BannerImg->move($destinationPath, $filename1);

		}
		else
		{
			$filename1='';

		}

		$insert->BannerImg=$filename1;
		$inserted=$insert->save();

		if($inserted)
		{
			return redirect('musics')->with('success','Music added successfully');
			
		}
		else
		{
			return redirect('musics')->with('error','Something went wrong, try again later');
		}

	}

	public function submit_major(Request $request)
	{
		$insert=new Major($request->all());
		$inserted=$insert->save();
		if($inserted)
		{
			return redirect('majors')->with('success','Major added successfully');
			
		}
		else
		{
			return redirect('majors')->with('error','Something went wrong, try again later');
		}

	}

		public function update_major(Request $request)
	{
		$update=Major::find($request->id);
		$update->Major=$request->Major;
		$updated=$update->save();
		if($updated)
		{
			return redirect('majors')->with('success','Major edited successfully');
			
		}
		else
		{
			return redirect('majors')->with('error','Something went wrong, try again later');
		}

	}

	public function delete_major(Request $request)
	{
		$delete=Major::where('id',$request->id)->delete();
		if($delete)
		{
			return redirect('majors')->with('success','Major deleted successfully');
			
		}
		else
		{
			return redirect('majors')->with('error','Something went wrong, try again later');
		}

	}


	public function submit_universities(Request $request)
	{
		$insert=new University($request->all());
		$inserted=$insert->save();
		if($inserted)
		{
			return redirect('universities')->with('success','University added successfully');
			
		}
		else
		{
			return redirect('universities')->with('error','Something went wrong, try again later');
		}

	}

		public function update_universities(Request $request)
	{
		$update=University::find($request->id);
		$update->University=$request->University;
		$updated=$update->save();
		if($updated)
		{
			return redirect('universities')->with('success','University edited successfully');
			
		}
		else
		{
			return redirect('universities')->with('error','Something went wrong, try again later');
		}

	}

	public function delete_universities(Request $request)
	{
		$delete=University::where('id',$request->id)->delete();
		if($delete)
		{
			return redirect('universities')->with('success','University deleted successfully');
			
		}
		else
		{
			return redirect('universities')->with('error','Something went wrong, try again later');
		}

	}

	public function add_sport(Request $request)
	{
		return view::make('add_sport');
	}

	public function edit_sport(Request $request)
	{
		$data=Sport::find($request->id);
		return view::make('edit_sport',compact('data'));
	}


	public function delete_sport(Request $request)
	{
		$delete=Sport::where('id',$request->id)->delete();
		if($delete)
		{
			return redirect('sports')->with('success','Sport deleted successfully');
			
		}
		else
		{
			return redirect('sports')->with('error','Something went wrong, try again later');
		}

	}


	public function update_sport(Request $request)
	{

		$update=Sport::find($request->id);
		$update->SportName=$request->SportName;
		$update->SportType=$request->SportType;
		$update->StartDate=$request->StartDate;
		$update->StartTime=$request->StartTime;
		$update->EndTime=$request->EndTime;
		$update->latitude=$request->latitude;
		$update->longitude=$request->longitude;
		$update->Address=$request->Address;

		if($request->Description != '')
		{

			$update->Description=$request->Description;
		}
		else
		{
			$update->Description='';	
		}

		if($request->BannerImg != '')
		{

				$rand=rand(1,1000000);
                // Set the destination path
                $destinationPath = public_path().'/images';
                // Get the orginal filname or create the filename of your choice
                $filename1 = str_replace(' ', '_', $request->BannerImg->getClientOriginalName());
                $filename1 = $rand.''.$filename1;
                $request->BannerImg->move($destinationPath, $filename1);

		}
		else
		{
			$filename1=$request->oldBannerImg;

		}

		$i=0;

		foreach($request->Team as $Teams)
		{
			$TeamsList[$i]['Team']=$Teams;

			if(!empty($request->Logo))
			{
				foreach($request->Logo as $key => $logos)
				{
						if($key == $i)
						{
							$rand=rand(1,1000000);
				            // Set the destination path
				            $destinationPath = public_path().'/images';
				            // Get the orginal filname or create the filename of your choice
				            $filename2 = str_replace(' ', '_', $logos->getClientOriginalName());
				            $filename2 = $rand.''.$filename2;
				            $logos->move($destinationPath, $filename2);
				        }
				        else
				        {

				        	foreach($request->oldLogo as $oldkey => $olds)
				        	{
				        		if($oldkey == $i )
				        		{
				        			$filename2=$olds;
				        		}
				        	}

				        }

					$TeamsList[$i]['Logo']=$filename2;
				}
			}
			else
			{
				foreach($request->oldLogo as $oldkey => $olds)
				{
					if($oldkey == $i )
				    	{
				        	$TeamsList[$i]['Logo']=$olds;
				        }
				}

			}

			$i++;
		}


		$teamslist=json_encode($TeamsList);
		$update->TeamsList=$teamslist;
		$update->BannerImg=$filename1;
		$updated=$update->save();
		if($updated)
		{
			return redirect('sports')->with('success','Sport edited successfully');
			
		}
		else
		{
			return redirect('sports')->with('error','Something went wrong, try again later');
		}
	}

	public function submit_sport(Request $request)
	{
		$insert=new Sport($request->all());
		if($request->BannerImg != '')
		{

				$rand=rand(1,1000000);
                // Set the destination path
                $destinationPath = public_path().'/images';
                // Get the orginal filname or create the filename of your choice
                $filename1 = str_replace(' ', '_', $request->BannerImg->getClientOriginalName());
                $filename1 = $rand.''.$filename1;
                $request->BannerImg->move($destinationPath, $filename1);

		}
		else
		{
			$filename1=$request->oldBannerImg;

		}

		$i=0;

		foreach($request->Team as $Teams)
		{
			$TeamsList[$i]['Team']=$Teams;
			$i++;
		}
		$k=0;

		foreach($request->Logo as $logos)
		{

			if($logos != '')
			{
					$rand=rand(1,1000000);
		            // Set the destination path
		            $destinationPath = public_path().'/images';
		            // Get the orginal filname or create the filename of your choice
		            $filename1 = str_replace(' ', '_', $logos->getClientOriginalName());
		            $filename1 = $rand.''.$filename1;
		            $logos->move($destinationPath, $filename1);

			}
			else
			{
				$filename1='';

			}

			$TeamsList[$k]['Logo']=$filename1;
			$k++;
		}


		$teamslist=json_encode($TeamsList);
		$insert->TeamsList=$teamslist;
		$insert->BannerImg=$filename1;

		$inserted=$insert->save();
		if($inserted)
		{
			return redirect('sports')->with('success','Sport edited successfully');
			
		}
		else
		{
			return redirect('sports')->with('error','Something went wrong, try again later');
		}


	}

	public function add_community(Request $request)
	{
		return view::make('add_community');
	}

	public function edit_community(Request $request)
	{
		$data=Community::find($request->id);
		return view::make('edit_community',compact('data'));
	}


	public function delete_community(Request $request)
	{
		$delete=Community::where('id',$request->id)->delete();
		if($delete)
		{
			return redirect('community')->with('success','Community deleted successfully');
			
		}
		else
		{
			return redirect('community')->with('error','Something went wrong, try again later');
		}

	}


	public function update_community(Request $request)
	{

		$update=Community::find($request->id);
		$update->ServiceTitle=$request->ServiceTitle;
		$update->StartDate=$request->StartDate;
		$update->StartTime=$request->StartTime;
		$update->EndTime=$request->EndTime;
		$update->State=$request->State;
		$update->City=$request->City;
		$update->venue=$request->venue;
		$update->Organizer=$request->Organizer;
		$update->AboutService=$request->AboutService;
		$update->latitude=$request->latitude;
		$update->longitude=$request->longitude;
	
		if($request->BannerImg != '')
		{

				$rand=rand(1,1000000);
                // Set the destination path
                $destinationPath = public_path().'/images';
                // Get the orginal filname or create the filename of your choice
                $filename1 = str_replace(' ', '_', $request->BannerImg->getClientOriginalName());
                $filename1 = $rand.''.$filename1;
                $request->BannerImg->move($destinationPath, $filename1);

		}
		else
		{
			$filename1=$request->oldBannerImg;

		}
		if($request->OrganizerImg != '')
		{

				$rand=rand(1,1000000);
                // Set the destination path
                $destinationPath = public_path().'/images';
                // Get the orginal filname or create the filename of your choice
                $filename = str_replace(' ', '_', $request->OrganizerImg->getClientOriginalName());
                $filename = $rand.''.$filename;
                $request->OrganizerImg->move($destinationPath, $filename);

		}
		else
		{
			$filename=$request->oldOrganizerImg;

		}

		$update->BannerPic=$filename1;
		$update->OrganizerImg=$filename;
		$updated=$update->save();
		if($updated)
		{
			return redirect('community')->with('success','Community edited successfully');
			
		}
		else
		{
			return redirect('community')->with('error','Something went wrong, try again later');
		}
	}

	public function submit_community(Request $request)
	{
		
		$update=new Community($request->all());
		
		if($request->BannerImg != '')
		{

				$rand=rand(1,1000000);
                // Set the destination path
                $destinationPath = public_path().'/images';
                // Get the orginal filname or create the filename of your choice
                $filename1 = str_replace(' ', '_', $request->BannerImg->getClientOriginalName());
                $filename1 = $rand.''.$filename1;
                $request->BannerImg->move($destinationPath, $filename1);

		}
		else
		{
			$filename1=$request->oldBannerImg;

		}
		if($request->OrganizerImg != '')
		{

				$rand=rand(1,1000000);
                // Set the destination path
                $destinationPath = public_path().'/images';
                // Get the orginal filname or create the filename of your choice
                $filename = str_replace(' ', '_', $request->OrganizerImg->getClientOriginalName());
                $filename = $rand.''.$filename;
                $request->OrganizerImg->move($destinationPath, $filename);

		}
		else
		{
			$filename=$request->oldOrganizerImg;

		}

		$update->BannerPic=$filename1;
		$update->OrganizerImg=$filename;
		$updated=$update->save();
		if($updated)
		{
			return redirect('community')->with('success','Community edited successfully');
			
		}
		else
		{
			return redirect('community')->with('error','Something went wrong, try again later');
		}
	}


	public function my_profile(Request $request)
	{

		return view::make('my-profile');

	}

		public function change_password(Request $request)
	{

		return view::make('change-password');

	}

		public function change_email(Request $request)
	{

		return view::make('change-email');

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
                $obj_user = Admin::find($user_id);
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
                $obj_user = Admin::find($user_id);
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
                $obj_user = Admin::find($user_id);
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
                $obj_user = Admin::find($user_id);
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