@extends('layouts.app')

@section('content')
    <div class="banner-wrapper">
        <div class="banner">
            <!-- <div class="slider-wall" style="background: url(img/banner.svg) no-repeat;"></div> -->
        <img src="{{URL::asset('img/banner.svg')}}" alt="" class="w-100">
            <div class="banner-text">
                <h4>My Favorite Quotes</h4>
            </div>
        </div><!-- /.banner -->
    </div><!-- /.banner-wrapper -->
    <div class="quoteslok-quotes-main" style="min-height: 400px;">
      <div class="container" style="margin-top: 100px;">
        <div class="row">
          <div style="box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.1);">
            <p style="padding: 30px;background-color: antiquewhite;font-weight: 600;"><i class="fa fa-exclamation-triangle" style="color:#D20921;margin-right: 10px;"></i>You do not have any favorites yet.</p>
          </div>
        </div>
      </div>
    </div>
@endsection
