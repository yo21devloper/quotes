<nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="{{url('/')}}">Quoteslok&#10076;</a>

                <span class="mobile-search" id="search1">
                      <a class="nav-link" href="#"><i class="fa fa-search"></i></a>
                  </span>

              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
                  <span class="navbar-toggler-icon"></span>
                  <!-- <div id="nav-icon4">
                    <span></span>
                    <span></span>
                    <span></span>
                  </div> -->
              </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto mr-md-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/')}}">Home</a>
                    </li>
<!--                     <li class="nav-item">
                        <a class="nav-link" href="#">Wallpapers</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('topics')}}">Topics</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('people')}}">People</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('topics50')}}">Top50</a>
                    </li>
<!--                     <li class="nav-item">
                        <a class="nav-link" href="#">Shop</a>
                    </li> -->
                    <li class="nav-item hide-mobile" id="search">
                        <a class="nav-link" href="#"><i class="fa fa-search"></i></a>
                    </li>
                    
          @if(Session::get('user')=='')
                    <li class="nav-item border-gradient">
                        <a class="nav-link login" href="#"  data-toggle="modal" data-target="#login"><span>Log In</span></a>
                    </li>
					
          @else

					<li class="dropdown" style="margin-left:10px;">

            <a href="#" data-toggle="dropdown">

            @if(!empty($user=Session::get('user')) && $user['0']['image'] == '')
                                          <img src="{{URL::asset('images/head.png')}}" class="user-image " alt="User Image" style="width: 40px;height: 40px;border-radius: 50%;">
                        @else
                            <img src="{{URL::asset('images/'.$user['0']['image'])}}" class="user-image " alt="User Image" style="width: 40px;height: 40px;border-radius: 50%;">
                        @endif


            </a>


            <ul class="dropdown-menu custom-dropdown" style="left: -140px;top: 60px;min-width: 11rem;border-radius: unset;padding:0px;">

              <li class="li_border">
                <a href="{{url('myfavorite')}}">
                  <img src="{{URL::asset('js/md-heart.svg')}}" class="li_image">
                  <span> Favorite Quotes</span>
                </a> 

               </li >
			   <li class="li_border">
                <a href="{{url('mycollection')}}">
                  <img src="{{URL::asset('js/md-add-circle.svg')}}" class="li_image">
                  <span> My Collections</span> 
                </a> 

               </li>
			   <li class="li_border">
                <a href="{{ route('profile') }}">
                  <img src="{{URL::asset('js/md-person.svg')}}" class="li_image">  
                  <span> My Profile</span>
                </a> 

               </li>
			   <li class="li_border">
                <a href="{{url('logout1')}}">
                  <img src="{{URL::asset('js/md-log-out.svg')}}" class="li_image" style="transform: rotate(270deg); margin-top: 2px;">
                  <span> Logout</span>
                </a> 

               </li>
            </ul>
          </li>
          @endif

                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav> <!-- nav -->
	
	
<!-- login -->



<div class="modal fade modal-center bd-example-modal-lm" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-lm login-dialog" role="document">

    <div class="modal-content">     

      <div class="modal-body">

         <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>
		
		<h5 class="header">Log In</h5>


            <form class="login_modal login_modal12" id="login_form" action="{{url('login1')}}" method="post">

                {{csrf_field()}}
            

                <div class="form-group">

					<div class="input-group">
						<input type="email" class="form-control"  placeholder="Email Address" name="email" style="border-right:none">
					
						<div class="input-group-addon">
						  <img src="{{URL::asset('js/md-mail.svg')}}" class="icon" >
						</div>
					</div>
					
                </div>

                <div class="form-group">

					<div class="input-group">
						<input type="Password" class="form-control"  placeholder="Password" name="password" style="border-right:none">
						<div class="input-group-addon">
						  <img src="{{URL::asset('js/md-lock.svg')}}" class="icon" >
						</div>
					</div>

                </div>

                <div class="form-group">

                    <input type="submit" class="form-control login" value="Log In">
					
                </div>

            </form>  



                <div class="form-group text-center">

                    <div class="form-check form-check1">

                      <label class="form-check-label">

                        <a href="#" data-toggle="modal" data-dismiss= "modal" data-target="#forgot" class="login_modal_forgot">Forgot password?</a>


                      </label>



                    </div>
                </div>
				
				<div class="or_modal"><span>or</span></div>
				
				<div class="form-group">

					<a href="#" class="form-control readMore"><i class="fa fa-facebook" style="color:white;margin-right:12px;"></i>
					Log in with Facebook
					</a>
					
                </div>

                <div class="form-group" style="margin-bottom:25px;">

				   <a href="#" class="form-control google"><i class="fa fa-google" style="color:red;margin-right:12px;"></i>
					Log in with Google
					</a>

                </div>



                <p class="text-center" style="border-top:1px solid #f3f3f3;padding-top: 15px;">Don’t have an account? <a href="#" data-toggle="modal" data-dismiss= "modal" data-target="#signupmodal" class="login_modal_forgot">Sign up</a></p>

      </div>



    </div>



  </div>



</div> <!-- end login -->


<!-- forgot -->



<div class="modal fade modal-center bd-example-modal-lm forgot" id="forgot" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >



    <div class="modal-dialog modal-lm" role="document">



        <div class="modal-content">



            <div class="modal-body">



                <button type="button" class="close" data-dismiss="modal" aria-label="Close">



                    <span aria-hidden="true">&times;</span>



                 </button>



                 <h5 class="header">Reset Password</h5>



                 <p>Forgot your passowrd? No worries! We are here to help you. Please lets us know your registered email address and we will send you the link
				 to reset your password.</p>







                 <form class="login_modal forgot_password" action="{{url('/send_email')}}" method="post">

                  {{csrf_field()}}



                     <div class="form-group" style="margin: 25px 0px;">



                     <div class="input-group">
						<input type="email" class="form-control"  placeholder="Email Address" name="email" style="border-right:none;">
					
						<div class="input-group-addon">
						  <img src="{{URL::asset('js/md-mail.svg')}}" class="icon" >
						</div>
					</div>



                    </div>



                        <input type="submit" class="login" value="Send Password Reset Link">



                </form>



            </div>
			
			<p style="border-top:1px solid #f3f3f3;text-align:center;padding:15px;">

                        <a href="#" data-toggle="modal" data-dismiss= "modal" data-target="#login" class="login_modal_forgot">Back to Log In</a>
			</p>


        </div>



    </div>



</div><!--End forgot -->







<!-- signupmodal -->

    <div class="modal fade modal-center bd-example-modal-lm forgot" id="signupmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"

        aria-hidden="true">

        <div class="modal-dialog modal-lm login-dialog" role="document">

            <div class="modal-content">

                <div class="modal-body">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>
		
		<h5 class="header">Sign Up</h5>
		
		
		<div class="form-group text-center">

                    <div class="form-check form-check1">

                      <label class="form-check-label" style="padding-left:0;">

                        <p >Sign Up with <a href="#" class="login_modal_forgot">Facebook</a> or <a href="#" class="login_modal_forgot">Google</a></p>


                      </label>

                    </div>
                </div>
				
				<div class="or_modal"><span>or</span></div>


            <form class="login_modal login_modal12" id="sign_form" action="{{url('/submit')}}" method="post">

                {{csrf_field()}}
				
				 <div class="form-group">

					<div class="input-group">
						<input type="text" class="form-control"  placeholder="Name" name="name" style="border-right:none;" required>
					
						<div class="input-group-addon">
						  <img src="{{URL::asset('js/md-person.svg')}}" class="icon" >
						</div>
					</div>
					
                </div>
            

                <div class="form-group">

					<div class="input-group">
						<input type="email" class="form-control"  placeholder="Email Address" name="email" required style="border-right:none;">
					
						<div class="input-group-addon">
						  <img src="{{URL::asset('js/md-mail.svg')}}" class="icon" >
						</div>
					</div>
					
                </div>

                <div class="form-group">

					<div class="input-group">
						<input type="Password" class="form-control"  placeholder="Password" name="password" required style="border-right:none;">
						<div class="input-group-addon">
						  <img src="{{URL::asset('js/md-lock.svg')}}" class="icon" >
						</div>
					</div>

                </div>
				
				<div class="form-group fix">

                                    <input class="form-check-label" type="checkbox" style="width: 20px;height: 24px;" required>

                                    <label for="click" style="vertical-align:top" class="fixing">

                                        <span style="color:#000;font-size: 14px;">I agree to the

                                            <a href="#" class="login_modal_forgot" style="font-size: 14px;">Terms of Service</a> and the

                                            <a href="#" class="login_modal_forgot" style="font-size: 14px;">Privacy Policy.</a>

                                        </span>

                                    </label>

                  </div>

                  <div class="form-group">

                    <input id="signup_submit_button" type="submit" class="form-control login" value="Sign Up">
					
                </div>
					

            </form>  

				 <p class="text-center" style="border-top:1px solid #f3f3f3;padding-top: 15px;">Don’t have a Quoteslock account? <a href="#" data-toggle="modal" data-dismiss= "modal" data-target="#login" class="login_modal_forgot">Log In</a></p>

            </div>

                </div>
        </div>

    </div>

    <!-- signupmodal -->


    <!-- after login google and facebook -->



<div class="modal fade modal-center bd-example-modal-lm forgot" id="sign_social" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">

    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content" >
            <div class="modal-body" style="padding:20px;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #dee2e6;border:none;">
          <span aria-hidden="true">&times;</span>
        </button>
                <h6 style="color:red;"><b>Signup Failed</b></h6>
                    <div>
                        <label class="form-check-label" for="individual2" style="padding: 0px;margin-top: 20px;">
                            <p>This user already exist.</p>
                        </label>
                    </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade modal-center bd-example-modal-lm forgot" id="passwordwrong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">

    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content" >
            <div class="modal-body" style="padding:20px;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #dee2e6;border:none;">
          <span aria-hidden="true">&times;</span>
        </button>
                <h6 style="color:red;"><b>Signup Failed</b></h6>
                    <div>
                        <label class="form-check-label" for="individual2" style="padding: 0px;margin-top: 20px;">
                            <p>User password is wrong.</p>
                        </label>
                    </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade modal-center bd-example-modal-lm forgot" id="emailwrong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">

    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content" >
            <div class="modal-body" style="padding:20px;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #dee2e6;border:none;">
          <span aria-hidden="true">&times;</span>
        </button>
                <h6 style="color:red;"><b>Signup Failed</b></h6>
                    <div>
                        <label class="form-check-label" for="individual2" style="padding: 0px;margin-top: 20px;">
                            <p>User email is not exist in database.</p>
                        </label>
                    </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-center bd-example-modal-lm forgot" id="forgotpassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">

    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content" >
            <div class="modal-body" style="padding:20px;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #dee2e6;border:none;">
          <span aria-hidden="true">&times;</span>
        </button>
                <h6 style="color:blue;"><b>Forgot Password</b></h6>
                    <div>
                        <label class="form-check-label" for="individual2" style="padding: 0px;margin-top: 20px;">
                            <p>Please check your email inbox.</p>
                        </label>
                    </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-center bd-example-modal-lm forgot" id="something" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">

    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content" >
            <div class="modal-body" style="padding:20px;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #dee2e6;border:none;">
          <span aria-hidden="true">&times;</span>
        </button>
                <h6 style="color:red;"><b>Mail Sending Failed</b></h6>
                    <div>
                        <label class="form-check-label" for="individual2" style="padding: 0px;margin-top: 20px;">
                            <p>Please contact customer support.</p>
                        </label>
                    </div>
            </div>
        </div>
    </div>
</div>



<!-- forgot -->



<div class="modal fade modal-center bd-example-modal-lm forgot" id="change_password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                 </button>
                 <h5 class="header">Change Password</h5>
                 <p>You want to change the password.</p>
                 <form class="login_modal forgot_password" action="{{url('/change_password')}}" method="post">
                  {{csrf_field()}}
                     <div class="form-group" style="margin: 25px 0px;">
                     <div class="input-group">
            <input type="password" class="form-control"  placeholder="Password" name="password" style="border-right:none;">
            <div class="input-group-addon">
              <img src="{{URL::asset('js/md-lock.svg')}}" class="icon" >
            </div>
          </div>
                    </div>
                        <input type="submit" class="login" value="submit">
                </form>
            </div>
      <p style="border-top:1px solid #f3f3f3;text-align:center;padding:15px;">

                        <a href="{{url('profile')}}"  class="login_modal_forgot">Back to profile page</a>
      </p>
        </div>
    </div>
</div><!--End forgot -->


<div class="modal fade modal-center bd-example-modal-lm forgot" id="change_email" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                 </button>
                 <h5 class="header">Change Email</h5>
                 <p>You want to change the email.</p>
                 <form class="login_modal forgot_password" action="{{url('/change_email')}}" method="post">
                  {{csrf_field()}}
                     <div class="form-group" style="margin: 25px 0px;">
                     <div class="input-group">
            <input type="text" class="form-control"  placeholder="Email Address" name="email" style="border-right:none;">
            <div class="input-group-addon">
              <img src="{{URL::asset('js/md-mail.svg')}}" class="icon" >
            </div>
          </div>
                    </div>
                        <input type="submit" class="login" value="submit">
                </form>
            </div>
      <p style="border-top:1px solid #f3f3f3;text-align:center;padding:15px;">

                        <a href="{{url('profile')}}"  class="login_modal_forgot">Back to profile page</a>
      </p>
        </div>
    </div>
</div><!--End forgot -->



<div class="modal fade modal-center bd-example-modal-lm forgot" id="delete_account" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                 </button>
                 <h5 class="header">Confirm Delete Account.</h5>
                 <p>You want to delete the account.</p>
                 <form class="login_modal forgot_password" action="{{(url('delete'))}}" method="post">
                  {{csrf_field()}}
                        <input type="hidden" name="id" value="{{Session::get('user')['0']['id']}}">
                        <input type="submit" class="login" value="submit">
                </form>
            </div>
      <p style="border-top:1px solid #f3f3f3;text-align:center;padding:15px;">

                        <a href="{{url('profile')}}"  class="login_modal_forgot">Back to profile page</a>
      </p>
        </div>
    </div>
</div><!--End forgot -->


<div class="modal fade modal-center bd-example-modal-lm forgot" id="change_image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                 </button>
                 <h5 class="header">Change Image</h5>
                 <p>You want to change the Image.</p>
                 <form class="login_modal forgot_password" action="{{url('/change_image')}}" method="post" enctype="multipart/form-data">
                  {{csrf_field()}}
                     <div class="form-group" style="margin: 25px 0px;">
                     <div class="input-group">
            	<label for="files" class="btn"  style="border: 1px solid #00000026;border-right: none;width:100%;margin-bottom: 0px ! important;padding: 11px .75rem;cursor: pointer;"><span id="result">Select Image</span></label>
  				<input type="file" class="form-control" id="files" style="display: none;" placeholder="Change Picture" name="image" style="border-right:none;">

            <div class="input-group-addon">
              <img src="{{URL::asset('js/md-image.svg')}}" class="icon" >
            </div>
          </div>
                    </div>
                        <input type="submit" class="login" value="submit">
                </form>
            </div>
      <p style="border-top:1px solid #f3f3f3;text-align:center;padding:15px;">

                        <a href="{{url('profile')}}"  class="login_modal_forgot">Back to profile page</a>
      </p>
        </div>
    </div>
</div><!--End forgot -->



<div class="modal fade modal-center bd-example-modal-lm forgot" id="loginplease" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                 </button>
                 <h5 class="header">Message</h5>
                 <p>Please login first then you add the quotes.</p>
            </div>
                        <p class="text-center" style="border-top:1px solid #f3f3f3;padding-top: 15px;">Don’t have a Quoteslock account? <a href="#" data-toggle="modal" data-dismiss= "modal" data-target="#login" class="login_modal_forgot">Log In</a></p>

        </div>
    </div>
</div><!--End forgot -->


<div class="modal fade modal-center bd-example-modal-sm forgot" id="verifyemail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                 </button>
                 <h5 class="header">Message</h5>
                 <p>Please verify the email id before login.</p>
            </div>

        </div>
    </div>
</div><!--End forgot -->




