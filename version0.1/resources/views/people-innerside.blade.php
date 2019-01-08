@extends('layouts.app')

@section('css')
<style>
    
  .banner-wrapper{

  }
  .motivational-quotes-wrapper{
    padding: 65px 0;
  }
  .motivational-left .image-wrapper {
    overflow: hidden;
    padding: 0 10px;
  }
  .motivational-left .image-wrapper img{
    width: 100%;
    max-width: 100%;
  }
  .motivational-right .profile-user{
    overflow: hidden;
    width: 60px;
    height: 60 px;
    border-radius: 50%;
  }
  .motivational-right .profile-user img{
    width: 100%;
  }
  .like-buy-now-wrapper .image-wrapper{
    width: 140px;
    height: 140px;
    border-radius: 50%;
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0;
    position: relative;
    background: linear-gradient(to right, #373737 0%, #656565 100%);
  }
  
  .buy-now-content > span{
    text-align: center;
    display: block;
    color: #fff;
    opacity: 0.9;
    font-family: MuseoSans-500;
    font-size: 18px;
  }

  .buy-now-content > span:nth-child(2){
    text-transform: uppercase;
    font-family: MuseoSans-900;
  }
  .buy-now-content > a span{
   color:  #c47453;
   text-transform: uppercase;
   font-family: MuseoSans-900;
   font-size: 18px;
   opacity: 1;
   transition: 0.3s all ease-in-out;
  }
  .buy-now-content > a:hover span{
    color: #f18457;
  }
  .like-buy-now-wrapper .image-wrapper img{
    max-width: 100%;
  }
  .motivational-right-inner{
    padding: 30px 15px;
  }
  .motivational-right-inner h5{
    font-size: 32px;
    font-family: serif;
    color: #333;
  }
  .profile-user-wrapper{
    display: flex;
    align-items: center;
    justify-content: flex-start;
    margin: 0;
    padding: 30px 0;
  }
  .profile-user-wrapper .profile-user{
    margin: 0;
  }
  .profile-user-wrapper .profile-user + h6{
    margin-left: 15px;
  }
  .motivational-button-section{
    padding: 30px 0;
    border-bottom: 1px solid rgba(0,0,0,0.1);
    border-top: 1px solid rgba(0,0,0,0.1);
    margin-bottom: 42px;
  }
  .motivational-button-section a,
  .motivational-button-section span{
    font-size: 22px;
    color: #888;
    padding: 0 10px;
    cursor: pointer;
  }
  .motivational-button-section a:nth-child(1){
    padding-left: 0;
  }
  
  .tag-links{
    padding: 2px 15px;
    width: auto;
    border-radius: 30px;
    border: 1px solid #888;
    text-decoration: none;
    color: #888;
    display: inline-block;
    transition: all ease-in-out 0.3s;
    margin: 10px 5px;
  }
  
  .tag-links:hover{
    background-color: #888;
    border-color: #888;
    color: #fff;
  }
  
  .tag-heading{
    padding-bottom: 20px;
  }
  .tag-heading h6{
    font-size: 18px;
  }
  .like-buy-now-wrapper{
    padding-top: 80px;
    margin: 0;
  }
  .more-link-wrapper{
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;  
    margin: 0;
  }
  .more-link-wrapper .more-link{
    width: 340px;
    transition: all ease-in-out 0.3s;
    border-radius: 30px;
    transition: all 0.3s ease-in-out;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;    
    font-weight: 500;
    background: linear-gradient(to right, #fc3767 0%, #fe9568 100%);
    padding: 2px;
  }
  .more-link-wrapper .more-link span{
    width: 100%;
    padding: 4px;
    border-radius: 30px;
    transition: all ease-in-out 0.3s;
    color: #fc3b67 !important;
    background-color: #fff
  }
 
  .more-link-wrapper .more-link:nth-child(1) span:hover{
    background: transparent;
    color: #fff !important;
  }



  .motivational-button-section .heart i.active,
  .motivational-button-section  i:hover{
    color: #f8416c;
  }
  @media (min-width: 991px) and (max-width: 1200px){
    .like-buy-now-wrapper{
      padding-top: 15px;
    }
    .motivational-button-section{
      margin-bottom: 15px;
      padding: 15px 0;
    }
    
  }
  
  @media (max-width: 991px){
    .motivational-quotes-wrapper{
      padding-bottom: 30px;
    }
  }


  @media (max-width: 767px){
    .more-link-wrapper{
      flex-direction: column;
      margin-bottom: 8px;

    }
    .more-link-wrapper .more-link{
      width: 85%;
      margin-left:10px;
      margin-bottom: -55px;
      text-align: center;
      margin-top: 15px;
    }
    .quoteslok-menu-heading .quoteslok-menu-img h4{
      font-size: 50px;
    }
    .banner-wrapper .banner .banner-text p{
      margin-bottom: 46px;
    }
    .banner-wrapper .banner .banner-text h4
    {
          margin-bottom: -35px !important;
    font-family: MuseoSans !important;
    font-size: 36px !important;
    }
  }

  @media (max-width: 576px){
    .quoteslok-menu-heading .quoteslok-menu-img h4{
      font-size : 32px;
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
              <p style="font-size: 20px;margin-bottom: 90px;color:#73687D;">People</p>
          </div>
          <div class="banner-text">
              <h4 style="font-size: 50px;">{{ucfirst($peopledetails->name)}}</h4>
          </div>
      </div><!-- /.banner -->
  </div>

  <div class="motivational-quotes-wrapper">
    <div class="container">      
      <div class="row">
        <div class="col-lg-2 motivational-left" style="margin:0px;padding: 0px;">
          <div class="image-wrapper ">
            <img src="{{ URL::asset('images/people/'.$peopledetails->image)}}" style="width:220px;height:220px;" alt="">
          </div>
        </div>
        <div class="col-lg-4 motivational-right" style="margin:0px;padding: 0px;">
          <div style="margin-left: 18px;">
            <p style="font-size:24px;color:#222222;font-weight: bold;">{{ucfirst($peopledetails->name)}}
            </p>
            <p style="font-size:24px;font-family: BodoniSvtyTwoITCTT;color:#FC3B67;margin-bottom:20px;">
              <i>{{ucfirst($peopledetails->position)}}</i>
            </p>
            <p style="font-size:18px;line-height: 35px;color:#222222;"><b>Nationality:</b> <span style="color: #FC3B67;margin-left: 67px;">Indian </span></p>
            <p style="font-size:18px;line-height: 35px;color:#222222;"><b>Born:</b> <span style="color: #FC3B67;margin-left: 113px;">
              {{date('M d', strtotime($peopledetails->date))}}, </span><span style="color:#222222;">{{date('Y', strtotime($peopledetails->date))}} </span></p>
            <!-- <p style="font-size:18px;line-height: 35px;color:#222222;"><b>Died:</b> <span style="margin-left: 118px;"></span></p> -->
            <p style="font-size:18px;line-height: 35px;color:#222222;"><b>Astrology Sign:</b><span style="color: #FC3B67;margin-left: 36px;">{{$peopledetails->horoscope}}</span></p>
          </div>
        </div>
        <div class="col-lg-4">
        </div>
        <div class="col-lg-2 motivational-right" style="text-align: right;margin-top: 10px;">
          

        <a class="link fb" href="{{$social->facebook}}"><i class="fa fa-facebook" aria-hidden="true" style="background-color: #FC3B67;width: 32px;height: 32px;border-radius: 50%;text-align: center;vertical-align: middle;padding-top: 7px;font-size: 17px;color:#fff"></i></a>
        <a class="link tw" href="https://twitter.com/" ><i class="fa fa-twitter" aria-hidden="true" style="background-color: #FC3B67;width: 32px;height: 32px;border-radius: 50%;text-align: center;vertical-align: middle;padding-top: 7px;font-size: 17px;color:#fff"></i></a>
        <a class="link in" href="https://www.facebook.com/" ><i class="fa fa-instagram" aria-hidden="true" style="background-color: #FC3B67;width: 32px;height: 32px;border-radius: 50%;text-align: center;vertical-align: middle;padding-top: 7px;font-size: 17px;color:#fff"></i></a>
          <div class="more-link-wrapper" style="position: absolute;bottom: 0px;">
          <a class="more-link" href="{{url('related_people/'.$peopledetails->position)}}"><span>Related People</span></a>
          
        </div>
        </div>
        
      </div>
    </div>
  </div>

@if(count($quotedetails) > 0)
  <div class="masonry-wrapper">
    <div class="container">
        <ul class="grid effect-2" id="grid">
  				
          @foreach($quotedetails as $quote)      
          <li>
              <a href="{{url('poster/'.$quote->id)}}">
                <img class="w-100" src="{{URL::asset('images/quotes/'.$quote->image)}}">
              </a>
              <div class="masonry-quotes-box">
                  <div class="masonry-quotes-icon">
                      <div class="heart">
                          @if(!empty(Session::get('user')) && $user=Session::get('user'))
                        @if(!empty($fav) && in_array($quote->id, $fav))
                        <span id="myHeart" onclick="changeHeart({{$quote->id}});"><i class="fa fa-heart active" aria-hidden="true"></i></span>
                        @else
                        <span id="myHeart" onclick="changeHeart({{$quote->id}});"><i class="fa fa-heart" aria-hidden="true" ></i></span>
                        @endif
                     @else
                      <span class="btn321" ><i class="fa fa-heart" aria-hidden="true" style="color:#cccccc;"></i></span>
                     @endif

                        
                      </div>
                      <div class="share-collection">
                      @if(!empty(Session::get('user')) && $user=Session::get('user'))
                        @if(!empty($coll) && in_array($quote->id, $coll))
                        <span id="myPlus" class="quotelink" onclick="changePlus({{$quote->id}});"><i class="fa fa-plus-circle active" aria-hidden="true"></i></span>
                        @else
                        <span id="myPlus" class="quotelink" onclick="changePlus({{$quote->id}});"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
                        @endif
                      @else
                      <span class="btn123" ><i class="fa fa-plus-circle" aria-hidden="true" style="color:#cccccc;"></i></span>
                     @endif
                            <a class="quotelink" href="#"><i class="fa fa-share" aria-hidden="true"></i></a>
                      </div>
                  </div><!-- /.masonry-quotes-icon -->

                  <div class="masonry-content">
                    <p>{{$quote->description}}</p>
                    <a class="quotelink" href="{{url('people-innerside/'.$quote->people->id)}}"><h6>{{$quote->people->name}}</h6></a>
                  </div><!-- /.masonry-content -->

                  <div class="masonry-related-links">
                        @php
                        $i=1;
                        $value=count($quote->topics);
                        @endphp
                        @foreach($quote->topics as $relatedtopic)
                        <a class="quotelink" href="{{url('topics_related/'.$relatedtopic->topicname->id)}}">{{$relatedtopic->topicname->topic_name}}  @if($i!=$value),@endif</a>
                        @php
                        $i++;
                        @endphp
                        @endforeach
                  </div><!-- /.masonry-related-links -->
              </div><!-- /.masonry-quotes-box -->
            
          </li>
          @endforeach

			</ul><!-- /.grid -->
    </div><!-- /.container -->
</div><!-- /.masonry-wrapper -->
@else
<div class="quoteslok-quotes-main" style="min-height: 400px;background: #fafafa;">
      <div class="container" style="margin-top: 100px;">
    <div class="row">
          <div style="box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.1);">
            <p style="padding: 30px;background-color: antiquewhite;font-weight: 600;"><i class="fa fa-exclamation-triangle" style="color:#D20921;margin-right: 10px;"></i>Data is not found.</p>
          </div>
        </div>
    </div>
</div>
@endif

@endsection