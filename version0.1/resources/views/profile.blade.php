@extends('layouts.app')
@section('css')

<style>

    .mr-lt-0{
        margin-left: 0;
    }
    .quoteslok-section.profile-wrapper{
        background-color: #fff;
    }
    .profile-image-wrapper{
        margin: 0;
    }
    .profile-image-wrapper .image-wrapper{
        width: 100px;
        height: 100px;
        overflow: hidden;
        border-radius: 50%;
        margin: 0;
        margin-bottom: 20px;
    }
    .profile-image-wrapper .image-wrapper img{
        max-width: 100%;
        margin: 0;
    }
    .change-buttons-wrapper{
        overflow: hidden;
        clear: both;
        padding: 30px 0;
        margin: 0;
        border-top: 1px solid rgba(0,0,0, 0.1);
        border-bottom: 1px solid rgba(0,0,0, 0.1);
    }
    .change-buttons-wrapper .nav-link{
        float: left;
        margin: 0;
        width: 200px;
        margin-right: 20px;
        
        color: #fc3b67 !important;
        font-size: 15px;
        white-space: nowrap;
        background: linear-gradient(to right, #fc3767 0%, #fe9568 100%);
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 30px;
        padding: 2px;
        transition: all ease-in-out 0.3s;
        text-align: center;
    }
    .change-buttons-wrapper .nav-link span{
        background-color: #fff;
        color: #fc3b67 !important;
        width: 100%;
        padding: 4px;
        border-radius: 30px;
        transition: all ease-in-out 0.3s;
        text-align: center;
        font-size: 18px;
    }
    .change-buttons-wrapper .nav-link span:hover{
        background-color: transparent;
        color: #fff !important;
        background-image: none;
    }
    .profile-box-wrapper{
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        overflow: hidden;

    }
    .profile_data_wrapper{
        margin: 0;
        padding: 20px;
    }
    .profile_data_wrapper h5{
        font-weight: bold;
        margin-bottom: 15px;
        font-size: 22px;
        color: #333;
        letter-spacing: 1px;
        font-family: MuseoSans-900;
    }
    .profile_data_wrapper h6{
        font-size: 17px;
        opacity: 0.8;
        font-weight: 500;
        
    }
    .profile-box-wrapper{
        padding-bottom: 30px;
    }
    .change-profile-btn{
        color: #fc3b67 !important;
        font-size: 18px;
        white-space: nowrap;
    }
    .change-profile-btn i{
        color: #555;
        font-size: 14px;
    }
    .delete-account-wrapper{
        padding-top: 30px;
    }
    .delete-account-wrapper h5{
        font-size: 22px;
        color: #333;
        margin-bottom: 15px;
        letter-spacing: 1px;
        font-family: MuseoSans-900;
    }
    .delete-account-wrapper p{
        opacity: 0.8;
        font-size: 16px;
        margin-bottom: 16px;
    }
    .delete-account-wrapper .delete-button{
        width: 200px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        padding: 2px !important;
        padding: 0;
        border-radius: 50px;
        -webkit-transition: all ease-in-out 0.3s;
        -moz-transition: all ease-in-out 0.3s;
        transition: all ease-in-out 0.3s;
        border: 2px solid rgba(0,0,0,0.4);
        margin-left: 0;
        color: #777;
        font-size: 15px;
    }
    .delete-account-wrapper .delete-button span{
        margin: 0;
        width: 100%;
        text-align: center;
        border-radius: 50px;
        padding: 4px 0;
        font-weight: 500;
        
    }
    .delete-account-wrapper .delete-button:hover{
        background-color: #777;
        border: 2px solid #777;
        color: #fff;
    }

    @media (max-width: 576px){
        .change-buttons-wrapper .nav-link.login{
            float: unset;
            width: 100%;
        }
        .change-buttons-wrapper .nav-link.login:nth-child(1){
            margin-bottom: 10px;
        }
        .change-buttons-wrapper a:first-child{
            margin-bottom: 10px;
        }
    }
</style>

@endsection

@section('content')

    <div class="banner-wrapper">
        <div class="banner">
            <!-- <div class="slider-wall" style="background: url(img/banner.svg) no-repeat;"></div> -->
        <img src="{{ url('img/banner.svg') }}" alt="" class="w-100">
            <div class="banner-text">
                <h4>My Profile</h4>
            </div>
        </div><!-- /.banner -->
    </div>
     @if(Session::get('user')!='')
     @php
     ($user=Session::get('user'));
     @endphp
     @endif
    <section class="quoteslok-section profile-wrapper">

      <div class="container">
          <div class="profile-inner-wrapper">
              <div class="profile-box-wrapper">
                  <div class="profile-image-wrapper">
                      <div class="image-wrapper">
                        @if(!empty($user=Session::get('user')) && $user['0']['image'] == '')
                          <img src="{{URL::asset('images/head.png')}}">
                        @else
                            <img src="{{URL::asset('images/'.$user['0']['image'])}}">
                        @endif
                      </div>
                    <a  data-toggle="modal" data-dismiss= "modal" href="#" data-target="#change_image" class="change-profile-btn" > <i class="fa fa-camera"  aria-hidden="true"></i> Change Picture</a>
                  </div>
                  <div class="profile_data_wrapper">
                    <h5>{{ucfirst($user['0']['name'])}}</h5>
                    <h6>{{($user['0']['email'])}}</h6>
                  </div>
              </div>
    
              <div class="row">
                  <div class="col-lg-6 col-md-12 mr-lt-0">
                      <div class="change-buttons-wrapper">
                        <a href="#" data-toggle="modal" data-dismiss= "modal" data-target="#change_password" class="nav-link"><span>Change Password</span></a>
                        <a href="#" data-toggle="modal" data-dismiss= "modal" data-target="#change_email" class="nav-link"><span>Change Email</span></a>
                      </div>
                  </div>
              </div>
    
              <div class="row">
                <div class="col-lg-6 col-md-12 mr-lt-0">
                            
                    <div class="delete-account-wrapper">
                        <h5>Delete My Account</h5>
                        <p>If you know longer need your account, you can delete you account login, favorites, collections, and all other data related to your account.</p>

                        <p>Delete your account cannot be undone.</p>
                        <a href="#" data-toggle="modal" data-dismiss= "modal" data-target="#delete_account" class="delete-button" href="#" ><span>Delete My Account</span></a>
                    </div>
                </div>
              </div>
          </div>


      </div><!-- container -->

    </section><!-- quoteslok-section -->

<div class="clearfix"></div>

@endsection

@section('js')

 

@endsection