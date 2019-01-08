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
  .image{
    width: 60px !important;
    height: 60px;
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
    padding: 10px 15px;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;  
    margin: 0;
    box-shadow: 0 1px 7px rgba(0,0,0, 0.1);
  }
  .more-link-wrapper .more-link{
    width: 340px;
    margin: 0 30px;
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
    color: #fff;
  }
  .more-link-wrapper .more-link:nth-child(2) span{
    background: #fff;
    color: #fc3b67 !important;
  }

  .more-link-wrapper .more-link:nth-child(2) span:hover{
    background: transparent;
    color: #fff !important;
  }
 

  .motivational-button-section .heart i.active,
  .share-collection .quotelink i.active{
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
      padding-bottom: 10px;
    }
  }
  @media (max-width: 767px){
    .more-link-wrapper{
      flex-direction: column;

    }
    .more-link-wrapper .more-link{
      width: 100%;
      margin-bottom: 10px;
      text-align: center;
    }
    .quoteslok-menu-heading .quoteslok-menu-img h4{
      font-size: 50px;
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
          @if($quotedetails != '')
          <div class="banner-text">
                @php
                $i=0;
                @endphp
                @foreach($quotedetails->topics as $relatedtopic)
                @if($i==0)
                <h4>{{$relatedtopic->topicname->topic_name}} Quotes </h4>
                @endif
                @php
                $i++;
                @endphp

                @endforeach
          </div>
          @else
          <div class="banner-text">
                <h4>Quotes </h4>
          </div>
          @endif
      </div><!-- /.banner -->
  </div>

      @if($quotedetails != '')
  <div class="motivational-quotes-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 motivational-left">
          <div class="image-wrapper ">
            <img src="{{ URL::asset('images/quotes/'.$quotedetails->image)}}" alt="">
          </div>
        </div>
        <div class="col-lg-6 motivational-right">
          <div class="motivational-right-inner">
            <h5>{{$quotedetails->description}}</h5>
            <div class="profile-user-wrapper">
              <div class="profile-user">
                <img src="{{ URL::asset('images/people/'.$quotedetails->people->image) }}" alt="" class="image">
              </div>
              <h6>{{ucfirst($quotedetails->people->name)}}</h6>
            </div>
            <div class="motivational-button-section">
                        @if(!empty(Session::get('user')) && $user=Session::get('user'))
                        @if(!empty($fav) && in_array($quotedetails->id, $fav))
                        <span class="heart" id="myHeart" style="float: left;" onclick="changeHeart({{$quotedetails->id}});"><i class="fa fa-heart active" aria-hidden="true"></i></span>
                        @else
                        <span id="myHeart" class="heart" style="float: left;" onclick="changeHeart({{$quotedetails->id}});"><i class="fa fa-heart" aria-hidden="true" ></i></span>
                        @endif
                     @else
                      <span class="heart btn321" style="float: left;" ><i class="fa fa-heart" aria-hidden="true" style="color:#cccccc;"></i></span>
                     @endif
                      <div class="share-collection">
                      @if(!empty(Session::get('user')) && $user=Session::get('user'))
                        @if(!empty($coll) && in_array($quotedetails->id, $coll))
                        <span id="myPlus" class="quotelink" onclick="changePlus({{$quotedetails->id}});"><i class="fa fa-plus-circle active" aria-hidden="true"></i></span>
                        @else
                        <span id="myPlus" class="quotelink" onclick="changePlus({{$quotedetails->id}});"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
                        @endif
                      @else
                      <span class="btn123" ><i class="fa fa-plus-circle" aria-hidden="true" style="color:#cccccc;"></i></span>
                     @endif
              <a href="javascript:;"><i class="fa fa-share" aria-hidden="true"></i></a>
            </div>
        </div>
            <div class="tag-wrapper">
              <div class="tag-heading">
                <h6>Tags</h6>
              </div>
                @foreach($quotedetails->topics as $relatedtopic)
                <a class="tag-links" href="{{url('topics_related/'.$relatedtopic->topicname->id)}}">{{$relatedtopic->topicname->topic_name}} </a>
                @endforeach
            </div>
            <div class="like-buy-now-wrapper">
              <div class="image-wrapper">
                <div class="buy-now-content">
                  <span>Liked this</span>
                  <span>Poster?</span>
                  <a href="javascript:;"><span>Buy Now</span></a>
                </div>
                {{--  <a href="javascript:;">
                  <div class="overlay"> <i class="fa fa-plus" aria-hidden="true"></i></div>
                  <img src="{{ URL::asset('images/buy_now_btn.png') }}" alt="">
                </a>  --}}
              </div>
            </div>
          </div>
        </div>
        
      </div>
          </div>
  </div>
      @else
<div class="motivational-quotes-wrapper" style="min-height: 400px;background: #fafafa;">
      <div class="container" style="margin-top: 100px;">
    <div class="row">
          <div style="box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.1);">
            <p style="padding: 30px;background-color: antiquewhite;font-weight: 600;"><i class="fa fa-exclamation-triangle" style="color:#D20921;margin-right: 10px;"></i>Data is not found.</p>
          </div>
        </div>
    </div>
</div>
@endif


@if($quotedetails != '')
  <div class="more-link-wrapper">
                @php
                $i=0;
                @endphp
                @foreach($quotedetails->topics as $relatedtopic)
                @if($i==0)
                <a class="more-link" ><span>More {{$relatedtopic->topicname->topic_name}} Quotes</span></a>
                @endif
                @php
                $i++;
                @endphp

                @endforeach
    <a class="more-link" href="{{url('people-innerside/'.$quotedetails->people->id)}}"><span>More Quotes Form {{ucfirst($quotedetails->people->name)}}</span></a>
  </div>


  <div class="masonry-wrapper">
    <div class="container">
        <ul class="grid effect-2" id="grid">
  			
        @foreach($relatedquotes as $relatedtopic)
        	
          <li>
              <a href="#">
                <img class="w-100" src="{{ URL::asset('images/quotes/'.$relatedtopic->image)}}">
              </a>
              <div class="masonry-quotes-box">
                  <div class="masonry-quotes-icon">
                      <div class="heart">
                        @if(!empty(Session::get('user')) && $user=Session::get('user'))
                        @if(!empty($fav) && in_array($relatedtopic->id, $fav))
                        <span id="myHeart" onclick="changeHeart({{$relatedtopic->id}});"><i class="fa fa-heart active" aria-hidden="true"></i></span>
                        @else
                        <span id="myHeart" onclick="changeHeart({{$relatedtopic->id}});"><i class="fa fa-heart" aria-hidden="true" ></i></span>
                        @endif
                     @else
                      <span class="btn321" ><i class="fa fa-heart" aria-hidden="true" style="color:#cccccc;"></i></span>
                     @endif
              </div>
                      <div class="share-collection">
                      @if(!empty(Session::get('user')) && $user=Session::get('user'))
                        @if(!empty($coll) && in_array($relatedtopic->id, $coll))
                        <span id="myPlus" class="quotelink" onclick="changePlus({{$relatedtopic->id}});"><i class="fa fa-plus-circle active" aria-hidden="true"></i></span>
                        @else
                        <span id="myPlus" class="quotelink" onclick="changePlus({{$relatedtopic->id}});"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
                        @endif
                      @else
                      <span class="btn123" ><i class="fa fa-plus-circle" aria-hidden="true" style="color:#cccccc;"></i></span>
                     @endif
                        <i class="fa fa-share" aria-hidden="true"></i>
                      </div>
                  </div><!-- /.masonry-quotes-icon -->

                  <div class="masonry-content">
                    <p>{{$relatedtopic->description}}</p>
                    <a  class="quotelink" href="{{url('people-innerside/'.$relatedtopic->people->id)}}"><h6>{{ucfirst($relatedtopic->people->name)}}</h6></a>
                  </div><!-- /.masonry-content -->

                  <div class="masonry-related-links">
                        @php
                          $i=0;
                          @endphp
                          @foreach($relatedtopic->topics as $related)
                          @if($i==0)
                          <a class="quotelink" href="{{url('topics_related/'.$related->topicname->id)}}"><span> {{$related->topicname->topic_name}}</span></a>
                          @endif
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
@endif

@endsection