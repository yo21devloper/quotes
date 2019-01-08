<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\User;
use App\Major;
use App\University;
use App\Community;
use App\Platform;
use App\Tutor;
use App\Event;
use App\Music;
use App\Sport;
use App\ActivityWall;
use App\WallImages;
use Auth;
use Illuminate\Support\Facades\Input;
use View;
use Redirect;
use DB;
use Mail;
use Hash;
use Storage;
use URL;



class UserController extends Controller
{

	 public function notification(Request $request)
    {
        $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
        $token=$token;

        $notification = [
            'title' => 'test',
            'sound' => true,
        ];
        
        $extraNotificationData = ["message" => 'testing',"moredata" =>'dd'];

        foreach($request->usersid as $user)
        {
        	$List=User::select('android_device_id','ios_device_id')->where('UserID',$user)->first();
        	if($List->android_device_id != '')
        	{
        		$tokenList[]=$List->android_device_id;

        	}
        	elseif($List->ios_device_id != '')
        	{

        		$tokenList[]=$List->ios_device_id;

        	}
        }

        $fcmNotification = [
            'registration_ids' => $tokenList, 
            // 'to'        => $token, //single token
            'notification' => $notification,
            'data' => $extraNotificationData
        ];

        $headers = [
            'Authorization: key=AIzaSyCwhBYM5bBbCuGH035v9zPGkzxj5a8kTho',
            'Content-Type: application/json'
        ];


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
        $result = curl_exec($ch);
        curl_close($ch);

        return true;
    }


	public function signup(Request $request)
	{
		$exist=User::where('EmailID',$request->EmailID)->where('isDeleted','0')->first();

		if($exist == "")
		{

			$insert=new User();
            $insert->Status="True";
			$insert->firstname=$request->sFName;
			$insert->lastname=$request->sLName;
			$insert->EmailID=$request->EmailID;
			$insert->MajorID=$request->MajorID;
			$insert->DOB=$request->DOB;
			$insert->Password=Hash::make($request->Password);

			$todayyear=date('Y');

			$birthdayyear=date('Y',strtotime($request->DOB));

			$year=$todayyear-$birthdayyear;

			$insert->Age=$year;

			$inserted=$insert->save();
			
			if($inserted)
			{
	                $id= encrypt($insert->UserID); 

	                $bodyMessage=url('/').'/verifyemail/'.$id;

	                $data = array("bodymessage" => $bodyMessage, "email" => $request->EmailID);

	                Mail::send('mail.send_verifyemail', $data, function($message) use ($data) {

	                    $message->to($data['email'], $data['email'])

	                            ->subject('Verify Email');

	                    $message->from('admin@100degree.com','100Degree Portal');

	                });
				return response()->json(['code'=>200,'status'=> true, 'message'=> 'Successfully signup']);
			}
			else
			{

				return response()->json(['code'=>500,'status'=> false, 'message'=> 'Something went wrong, try again later']);
			}
		}
		else
		{
			if($exist->Status == 'True')
			{
				return response()->json(['code'=>201,'status'=> false, 'message'=> 'Email already exists']);
			}
			else
			{

				$id= encrypt($exist->UserID); 

	                $bodyMessage=url('/').'/verifyemail/'.$id;

	                $data = array("bodymessage" => $bodyMessage, "email" => $exist->EmailID);

	                Mail::send('mail.send_verifyemail', $data, function($message) use ($data) {

	                    $message->to($data['email'], $data['email'])

	                            ->subject('Verify Email');

	                    $message->from('admin@100degree.com','100Degree Portal');

	                });
				return response()->json(['code'=>200,'status'=> true, 'message'=> 'Successfully signup']);
				
			}
		}

	}

	public function verifyemail(Request $request)
	{
		$id=decrypt($request->id);

		$update=User::where('UserID',$id)->update(['status'=>'True','isverifiedemail'=>'1']);

		if($update)
		{
			return View::make('register_sucess');

		}
		else
		{
			return redirect('/')->with('failed','something went wrong,please try again later');
		}
	}

	public function login(Request $request)
	{
		$exist=User::where('EmailID',$request->EmailID)->where('isDeleted','0')->first();

		if($exist != "")
		{
			$verify=User::where('EmailID',$request->EmailID)->where('isDeleted','0')->where('status','True')->first();
			if($verify != "")
			{

				$login=Hash::check($request->Password, $verify->Password);
				if($login)
				{
					$verify->majorname=$verify->majors->Major;
					$activeuser=User::find($verify->UserID);
					$activeuser->isactive='1';
					$activeuser->save();

					if($verify->UniversityID != '0')
					{
						$verify->university=$verify->university->University;
					}
					return response()->json(['code'=>200,'status'=> true,'message'=>'Successfully login','data'=>$verify]);
				}
				else
				{
					return response()->json(['code'=>203,'status'=> false, 'message'=> 'Incorrect Password']);		
				}

			}
			else
			{
				return response()->json(['code'=>202,'status'=> false, 'message'=> 'Please verify your email ID']);	
			}			

		}
		else
		{
			return response()->json(['code'=>201,'status'=> false, 'message'=> 'You entered an invalid email or password. Please re-enter.']);
		}
	}

	public function majors()
	{
		$data=Major::all();
		if($data != '')
				{
					return response()->json(['code'=>200,'status'=> true, 'data'=>$data]);
				}
				else
				{
					return response()->json(['code'=>500,'status'=> false, 'message'=> 'Data is not found']);		
				}

	}

	public function universities()
	{
		$data1=University::all();
		if($data1 != '')
				{
					return response()->json(['code'=>200,'status'=> true, 'data'=>$data1]);
				}
				else
				{
					return response()->json(['code'=>500,'status'=> false, 'message'=> 'Data is not found']);		
				}

	}

	public function community()
	{

		$data=Community::all();
		
		if($data != '')
				{
					return response()->json(['code'=>200,'status'=> true, 'data'=>$data]);
				}
				else
				{
					return response()->json(['code'=>500,'status'=> false, 'message'=> 'Data is not found']);		
				}

	}

	public function profile(Request $request)
	{
		$data=User::where('UserID',$request->id)->first();

		if($data != '')
				{
					$data->majorname=$data->majors->Major;
					if($data->UniversityID != '0' || $data->UniversityID != '' )
					{
						$data->university=$data->university->University;
					}
					return response()->json(['code'=>200,'status'=> true, 'data'=>$data]);
				}
				else
				{
					return response()->json(['code'=>500,'status'=> false, 'message'=> 'Data is not found']);		
				}
	}

	public function events()
	{
		$data=Event::all();


		if($data != '')
				{
					return response()->json(['code'=>200,'status'=> true, 'data'=>$data]);
				}
				else
				{
					return response()->json(['code'=>500,'status'=> false, 'message'=> 'Data is not found']);		
				}

	}

	public function tutors()
	{
		$data=Tutor::all();
		foreach($data as $d)
		{

			$d->majorname=$d->majors->Major;
		}

		if($data != '')
				{
					return response()->json(['code'=>200,'status'=> true, 'data'=>$data]);
				}
				else
				{
					return response()->json(['code'=>500,'status'=> false, 'message'=> 'Data is not found']);		
				}

	}

	public function musics()
	{
		$data=Music::all();

		if($data != '')
				{
					return response()->json(['code'=>200,'status'=> true, 'data'=>$data]);
				}
				else
				{
					return response()->json(['code'=>500,'status'=> false, 'message'=> 'Data is not found']);		
				}
	}

	public function edit_profile(Request $request)
	{

		$exist=User::find($request->id);
		$exist->firstname=$request->FName;
		$exist->MajorID=$request->MajorID;
		if(!empty($request->UniversityID) && $request->UniversityID != '')
		{
			$exist->UniversityID=$request->UniversityID;
		}
		else
		{
			$exist->UniversityID='0';	
		}
		$exist->Age=$request->Age;
		$exist->Gender=$request->Gender;
		$exist->AboutMe=$request->AboutMe;
		if($request->ProfilePic != '')
		{
				$rand=rand(1,1000000);
                // Set the destination path
                $destinationPath = public_path().'/images';
                // Get the orginal filname or create the filename of your choice
                $filename1 = str_replace(' ', '_', $request->ProfilePic->getClientOriginalName());
                $filename1 = $rand.''.$filename1;
                $request->ProfilePic->move($destinationPath, $filename1);
        $exist->ProfilePic=$filename1;
        }

		$update=$exist->save();
		if($update)
		{
				return response()->json(['code'=>200,'status'=> true, 'message'=>"Profile updated successfully.",'data'=>$exist]);
		}
		else
		{
				return response()->json(['code'=>500,'status'=> false, 'message'=> 'Data is not found']);		
		}
	}

	public function sports()
	{

		$data=Sport::all();

		foreach($data as $d)
		{
			$d->TeamsList=json_decode($d->TeamsList);
		}


		if($data != '')
				{
					return response()->json(['code'=>200,'status'=> true, 'data'=>$data]);
				}
				else
				{
					return response()->json(['code'=>500,'status'=> false, 'message'=> 'Data is not found']);		
				}		
	}


	public function forgot_password(Request $request)
	{
		$rand=rand(100000,999999);
		$exist=User::where('EmailID',$request->email)->where('isDeleted','0')->update(['Password'=>Hash::make($rand) ]);
		if($exist)
		{

			$data = array("password" => $rand, "email" => $request->email);

	                Mail::send('mail.send_password', $data, function($message) use ($data) {

	                    $message->to($data['email'], $data['email'])

	                            ->subject('New Password');

	                    $message->from('admin@100degree.com','100Degree Portal');

	                });

			return response()->json(['code'=>200,'status'=> true, 'message'=>"We have sent you an email to reset password. Please check your email."]);

		}
		else
		{

			return response()->json(['code'=>500,'status'=> false, 'message'=> 'Invalid email']);

		}

	}


	public function activity_wall(Request $request)
	{
		$insert=new ActivityWall();
		$insert->userid=$request->userid;

		if(($request->text != '') || (!empty($request->isImage)))
		{
			if($request->text != '')
			{
				$insert->text=$request->text;
			}
			else
			{
				$insert->text='';	
			}

			if($request->isImage == '2')
			{
					if(($request->video_thumbnail != '') && ($request->video != "") )
					{
											$rand=rand(1,1000000);
						                	// Set the destination path
						                	$destinationPath = public_path().'/video_thumbnail';
						                	// Get the orginal filname or create the filename of your choice
						               		$thumbnail_image = str_replace(' ', '_', $request->video_thumbnail->getClientOriginalName());
						                	$thumbnailimage = $rand.''.$thumbnail_image;
						        			$video_url = URL::to('/'). "/video_thumbnail/".$thumbnailimage;
						                	$request->video_thumbnail->move($destinationPath, $thumbnailimage);	
											$insert->video_thumbnail=$video_url;
										
										if($request->video != '')
										{
											$rand=rand(1,1000000);
						                	// Set the destination path
						                	$destinationPath = public_path().'/video';
						                	// Get the orginal filname or create the filename of your choice
						               		$thumbnail_image = str_replace(' ', '_', $request->video->getClientOriginalName());
						                	$thumbnailimage = $rand.''.$thumbnail_image;
						        			$video_url = URL::to('/'). "/video/".$thumbnailimage;
						                	$request->video->move($destinationPath, $thumbnailimage);	
											$insert->video=$video_url;
										}

					}
					else
					{
						return response()->json(['code'=>202,'status'=> true, 'message'=> 'please choose video and may be video thumbnail and video missing']);

					}

				
				$inserted=$insert->save();
				return response()->json(['code'=>200,'status'=> true, 'message'=>'Success']);
			}
			else
			{
				
				$inserted=$insert->save();

				if($inserted != '')
				{

					if(!empty($request->isImage))
					{
						if(!empty($request->imagecount) && !empty($request->imagecount) > 0)
						{
							$count=$request->imagecount;
							for($i='1';$i<=$count;$i++)
							{
									$imagenames='image'.$i;
									
									$rand=rand(1,1000000);
					                // Set the destination path
					                $destinationPath = public_path().'/images';
					                // Get the orginal filname or create the filename of your choice
					                $filename1 = str_replace(' ', '_', $request->$imagenames->getClientOriginalName());
					                $filename1 = $rand.''.$filename1;
					        		$url = URL::to('/'). "/images/".$filename1;
					                $request->$imagenames->move($destinationPath, $filename1);
							                
									$insert21=new WallImages();
									$insert21->images=$url;
									$insert21->wall_id=$insert->id;
									$insert21->save();
							}

							return response()->json(['code'=>200,'status'=> true, 'message'=> 'success']);

						}
						else
						{
							ActivityWall::where('id',$insert->id)->delete();

							return response()->json(['code'=>202,'status'=> true, 'message'=> 'please choose image and imagecount param mission']);		
						}
					}
					else
					{
						return response()->json(['code'=>200,'status'=> true, 'message'=> 'success']);

					}

				}
				else
				{
					return response()->json(['code'=>500,'status'=> false, 'message'=> 'something went wrong']);

				}
			}
		}
		else
		{
			return response()->json(['code'=>202,'status'=> true, 'message'=> 'Param missing']);

		}
				
	}


	public function activitywalls(Request $request)
	{
		$data=ActivityWall::orderby('id','desc')->get();


		foreach($data as $d)
		{
			$d->images=$d->images;
			$d->user=$d->user;
		}

				if($data != '')
				{
					return response()->json(['code'=>200,'status'=> true, 'data'=>$data]);
				}
				else
				{
					return response()->json(['code'=>500,'status'=> false, 'message'=> 'Data is not found']);		
				}

	}


	public function social_exist(Request $request)
	{
		if($request->AuthType=='facebook')
		{
			$exist=User::where('FacebookId',$request->AuthID)->where('isDeleted','0')->first();
		}
		elseif($request->AuthType=='gmail')
		{
			$exist=User::where('GmailId',$request->AuthID)->where('isDeleted','0')->first();
		}
		else
		{
			return response()->json(['code'=>500,'status'=> true,'data'=>$insert,'message'=>'Something Went wrong, try again later']);

		}

		if($exist != '')
		{
			if($exist->isverifiedemail == '0')
			{
				$id= encrypt($exist->UserID); 

	                $bodyMessage=url('/').'/verifyemail/'.$id;

	                $data = array("bodymessage" => $bodyMessage, "email" => $exist->EmailID);

	                Mail::send('mail.send_verifyemail', $data, function($message) use ($data) {

	                    $message->to($data['email'], $data['email'])

	                            ->subject('Verify Email');

	                    $message->from('admin@100degree.com','100Degree Portal');

	                });

	            return response()->json(['code'=>200,'status'=> true, 'message'=> 'Email verified sent','data'=>$exist]);

			}
			else
			{
				$exist->majorname=$exist->majors->Major;
				return response()->json(['code'=>200,'status'=> true,'data'=>$exist]);
			}
		}

		else
		{
			return response()->json(['code'=>202,'status'=> true,'message'=>'data is not exist in database']);
		}
	}


	public function social_login(Request $request)
	{

		$exist=User::where('EmailID',$request->EmailID)->where('isDeleted','0')->first();

		if($exist != '')
		{
			if($exist->FacebookId != '' && $exist->GmailId !='')
			{
				if($exist->isverifiedemail == '0')
				{
					$id= encrypt($exist->UserID); 

	                $bodyMessage=url('/').'/verifyemail/'.$id;

	                $data = array("bodymessage" => $bodyMessage, "email" => $request->EmailID);

	                Mail::send('mail.send_verifyemail', $data, function($message) use ($data) {

	                    $message->to($data['email'], $data['email'])

	                            ->subject('Verify Email');

	                    $message->from('admin@100degree.com','100Degree Portal');

	                });

	            	return response()->json(['code'=>200,'status'=> true, 'message'=> 'Email verified sent','data'=>$exist]);

				}
				else
				{

					$exist->majorname=$exist->majors->Major;
					return response()->json(['code'=>201,'status'=> false, 'message'=> 'Email already exists','data'=>$exist]);

				}
				
			}
			else if(($exist->FacebookId != '') && ($request->AuthType=='facebook'))
			{
				if($exist->isverifiedemail == '0')
				{
					$id= encrypt($exist->UserID); 

	                $bodyMessage=url('/').'/verifyemail/'.$id;

	                $data = array("bodymessage" => $bodyMessage, "email" => $request->EmailID);

	                Mail::send('mail.send_verifyemail', $data, function($message) use ($data) {

	                    $message->to($data['email'], $data['email'])

	                            ->subject('Verify Email');

	                    $message->from('admin@100degree.com','100Degree Portal');

	                });

	            	return response()->json(['code'=>200,'status'=> true, 'message'=> 'Email verified sent','data'=>$exist]);

				}
				else
				{

					$exist->majorname=$exist->majors->Major;
					return response()->json(['code'=>201,'status'=> false, 'message'=> 'Email already exists','data'=>$exist]);

				}
			}
			elseif(($exist->GmailId != '') && ($request->AuthType=='gmail'))
			{
				if($exist->isverifiedemail == '0')
				{
					$id= encrypt($exist->UserID); 

	                $bodyMessage=url('/').'/verifyemail/'.$id;

	                $data = array("bodymessage" => $bodyMessage, "email" => $request->EmailID);

	                Mail::send('mail.send_verifyemail', $data, function($message) use ($data) {

	                    $message->to($data['email'], $data['email'])

	                            ->subject('Verify Email');

	                    $message->from('admin@100degree.com','100Degree Portal');

	                });

	            	return response()->json(['code'=>200,'status'=> true, 'message'=> 'Email verified sent','data'=>$exist]);

				}
				else
				{

					$exist->majorname=$exist->majors->Major;
					return response()->json(['code'=>201,'status'=> false, 'message'=> 'Email already exists','data'=>$exist]);

				}
			}
			elseif(($exist->FacebookId != '') && ($exist->GmailId == '') && ($request->AuthType=='gmail'))
			{


				$update=User::find($exist->UserID);
				$update->Status="True";
       			$update->firstname=$request->sFName;
				$update->GmailId=$request->AuthID;
				$updated=$update->save();
				if($updated != '')
				{
					return response()->json(['code'=>200,'status'=> true,'data'=>$update,'message'=>'Successfully Login']);
				}
				else
				{
					return response()->json(['code'=>500,'status'=> true,'data'=>$update,'message'=>'Something Went wrong, try again later']);
				}

			}
			elseif(($exist->GmailId != '') && ($exist->FacebookId == '') && ($request->AuthType=='facebook'))
			{

				$update=User::find($exist->UserID);
				$update->Status="True";
				$update->firstname=$request->sFName;
				$update->FacebookId=$request->AuthID;
				$updated=$update->save();
				if($updated != '')
				{
					return response()->json(['code'=>200,'status'=> true,'data'=>$update,'message'=>'Successfully Login']);
				}
				else
				{
					return response()->json(['code'=>500,'status'=> true,'data'=>$update,'message'=>'Something Went wrong, try again later']);
				}

			}
			else
			{
				$insert=new User();
				$insert->Status="True";
			    $insert->firstname=$request->sFName;
				$insert->EmailID=$request->EmailID;
				$insert->MajorID=$request->MajorID;
				$insert->DOB=$request->DOB;
				if($request->AuthType=='facebook')
				{
					$insert->FacebookId=$request->AuthID;
				}
				elseif($request->AuthType=='gmail')
				{
					$insert->GmailId=$request->AuthID;
				}
			
				$todayyear=date('Y');

				$birthdayyear=date('Y',strtotime($request->DOB));

				$year=$todayyear-$birthdayyear;

				$insert->Age=$year;

				$inserted=$insert->save();
			
				if($inserted)
				{
					if($request->isverifiedemail == '0')
					{
				
	                $id= encrypt($insert->UserID); 

	                $bodyMessage=url('/').'/verifyemail/'.$id;

	                $data = array("bodymessage" => $bodyMessage, "email" => $request->EmailID);

	                Mail::send('mail.send_verifyemail', $data, function($message) use ($data) {

	                    $message->to($data['email'], $data['email'])

	                            ->subject('Verify Email');

	                    $message->from('admin@100degree.com','100Degree Portal');

	                });

	                	return response()->json(['code'=>200,'status'=> true, 'message'=> 'Email verified sent','data'=>$insert]);
	            	}
		            else
		            {

		            	$inserted=$insert->isverifiedemail='1';
		            	$inserted=$insert->save();
		            	$insert->majorname=$insert->majors->Major;
						return response()->json(['code'=>200,'status'=> true, 'message'=> 'Successfully signup','data'=>$insert]);
		            }

				}
				else
				{

					return response()->json(['code'=>500,'status'=> false, 'message'=> 'Something went wrong, try again later']);
				}

			}
		}

		else
		{


				$insert=new User();
				$insert->firstname=$request->sFName;
				$insert->Status="True";
			
				$insert->EmailID=$request->EmailID;
				$insert->MajorID=$request->MajorID;
				$insert->DOB=$request->DOB;
				if($request->AuthType=='facebook')
				{
					$insert->FacebookId=$request->AuthID;
				}
				elseif($request->AuthType=='gmail')
				{
					$insert->GmailId=$request->AuthID;
				}
			
				$todayyear=date('Y');

				$birthdayyear=date('Y',strtotime($request->DOB));

				$year=$todayyear-$birthdayyear;

				$insert->Age=$year;

				$inserted=$insert->save();
			
				if($inserted)
				{
					if($request->isverifiedemail == '0')
					{
				
	                $id= encrypt($insert->UserID); 

	                $bodyMessage=url('/').'/verifyemail/'.$id;

	                $data = array("bodymessage" => $bodyMessage, "email" => $request->EmailID);

	                Mail::send('mail.send_verifyemail', $data, function($message) use ($data) {

	                    $message->to($data['email'], $data['email'])

	                            ->subject('Verify Email');

	                    $message->from('admin@100degree.com','100Degree Portal');

	                });

	                	return response()->json(['code'=>200,'status'=> true, 'message'=> 'Email verified sent','data'=>$insert]);
	            	}
		            else
		            {

		            	$inserted=$insert->isverifiedemail='1';
		            	$inserted=$insert->save();
		            	$insert->majorname=$insert->majors->Major;
						return response()->json(['code'=>200,'status'=> true, 'message'=> 'Successfully signup','data'=>$insert]);
		            }

				}
				else
				{

					return response()->json(['code'=>500,'status'=> false, 'message'=> 'Something went wrong, try again later']);
				}
		}

	}


	public function change_password(Request $request)
	{
		$user = User::find($request->userid);

    	$user->password = Hash::make(Input::get('password'));
    	$user->save();

    	return response()->json(['code'=>200,'status'=> true,'message'=>'Successfully change password.']);
    	 
    }

    public function delete_account(Request $request)
	{
		$user = User::where('UserID',$request->userid)->where('isDeleted','0')->first();

		if($user != '')
		{
    		$user->isDeleted = '1';
    		$user->save();
    		return response()->json(['code'=>200,'status'=> true,'message'=>'Account is deleted successfully']);
    	}
    	else
    	{

    		return response()->json(['code'=>500,'status'=> false,'message'=>'Data is not found']);
    	}
    	 
    }


    public function enable_notification(Request $request)
    {

    	$user = User::where('UserID',$request->userid)->where('isDeleted','0')->first();

		if($user != '')
		{
			if($request->isnotification == '1')
			{
    			$user->email_notification = $request->status;
			}
			else
			{
				$user->push_notification = $request->status;
			}
    		
    		$user->save();

    		return response()->json(['code'=>200,'status'=> true,'message'=>'Success','data'=> $user]);
    	}
    	else
    	{

    		return response()->json(['code'=>500,'status'=> false,'message'=>'Data is not found']);
    	}

    }

    public function get_notification_detail(Request $request)
    {

    	$user = User::select('email_notification','push_notification')->where('UserID',$request->userid)->first();

		if($user != '')
		{

    		return response()->json(['code'=>200,'status'=> true,'message'=>'Success','data'=> $user]);
    	}
    	else
    	{

    		return response()->json(['code'=>500,'status'=> false,'message'=>'Data is not found']);
    	}

    }



    public function deleteaccount_permanent(Request $request)
    {

    	$user = User::where('EmailID',$request->email)->delete();

		if($user != '')
		{

    		return response()->json(['code'=>200,'status'=> true,'message'=>'Success']);
    	}
    	else
    	{

    		return response()->json(['code'=>500,'status'=> false,'message'=>'Data is not found']);
    	}

    }

    public function platform(Request $request)
    {
    	$exist=Platform::where('unique_id',$request->unique_id)->count();
    	if($exist == '0')
    	{
    		$insert=new Platform($request->all());
    		$inserted=$insert->save();
    		if($inserted)
    		{

    			return response()->json(['code'=>200,'status'=> true,'message'=>'Insert Successfully']);	
    		}
    		else
    		{
    			return response()->json(['code'=>500,'status'=> false,'message'=>'Something Went wrong, Please try again later']);	
    		}
	    }
	    else
	    {
	    	return response()->json(['code'=>202,'status'=> false,'message'=>'Phone already exist']);	
	    }
    }

    public function logout(Request $request)
    {
    	$exist=User::find($request->UserID);
    	$exist->isactive='0';
    	$exist->save();
    	if($exist)
    	{
    		return response()->json(['code'=>200,'status'=> true,'message'=>'Logout Successfully']);
    	}
    	else
    	{
    		return response()->json(['code'=>500,'status'=> false,'message'=>'Data is not found']);
    	}
    }
	

}