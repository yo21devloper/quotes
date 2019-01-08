@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="http://206.189.126.187/districtmaid/public/admin/css/custom.css">
<style>
.main-header {
    position: relative;
    max-height: 100px;
    z-index: 1030;
    background: #fff;
}
.main-header .logo {
    -o-transition: width 0.3s ease-in-out;
    transition: width 0.3s ease-in-out;
    display: block;
    float: left;
    font-size: 20px;
    line-height: 50px;
    text-align: center;
    width: 320px;
    font-family: 'Montserrat', sans-serif;
    padding: 0 15px;
    font-weight: 300;
    overflow: hidden;
}
.main-sidebar{
    padding-top: 100px;
}
</style>
@endsection

@section('content')

  <div class="content-wrapper">
    <section class="content container-fluid">

        <div class="content-header">
           <h1>My Profile</h1>
        </div>

        <div class="box" style="border:none">
            <div class="container-fluid" style="padding: 30px;">
                <div class="row">

                                    <div class="form-group">
                                        <div class="col-xs-12 col-sm-12">
                                            <div class="pp-images imgshow" style="background: none;">
                                        @if((Auth::user()->image) == '')
                                        <img class="img" src="{{URL::asset('admin/img/avtar-img.png')}}" id="image_upload_preview" />
                                        @else
                                        <img class="img" src="{{Auth::user()->image}}" id="image_upload_preview" />
                                        @endif
                                        <a href="javascript:void(0);" class="removePic removePicRestImage"><i class="fa fa-times"></i></a>
                                    </div>
                                            <div class="username-pp">
                                                <span class="head">{{ Auth::user()->name }}</span>
                                                <span class="email">{{ Auth::user()->email }}</span>
                                            </div>
                                            <div class="clear"></div>
                                            <div class="pp-change-images">
                                                <span class="text"><i class="fa fa-camera" aria-hidden="true"></i> Change Picture</span>
                                                <input type="file" name="rest_image[]" class="rest_img" id="inputFile" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <hr class="hr">
                                    <div class="edit-button nomrg-btn">
                                        <a class="btn btn-danger no-bg btn-radius no-margin" href="{{route('change-password')}}">Change Password</a>
                                        <a class="btn btn-danger no-bg btn-radius" href="{{route('change-email')}}">Edit Profile</a>
                                    </div>
                                    <hr class="hr">
                                
                </div>
            </div>
        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

@endsection