@extends('layouts.app')

@section('content')
    <div class="banner-wrapper">
        <div class="banner">
            <!-- <div class="slider-wall" style="background: url(img/banner.svg) no-repeat;"></div> -->
        <img src="{{URL::asset('img/banner.svg')}}" alt="" class="w-100">
            <div class="banner-text">
                <h4>My Collection Quotes</h4>
            </div>
        </div><!-- /.banner -->
    </div><!-- /.banner-wrapper -->

@if(!empty($quotevalues))
<div class="masonry-wrapper">
    <div class="container">
        <ul class="grid effect-2" id="grid">
  				
          @foreach($quotevalues as $quote)  
             
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
                        <i class="fa fa-share" aria-hidden="true"></i>
                      </div>
                  </div><!-- /.masonry-quotes-icon -->

                  <div class="masonry-content">
                    <p>{{$quote->description}}</p>
                    <a  class="quotelink" href="{{url('people-innerside/'.$quote->people->id)}}"><h6>{{$quote->people->name}}</h6></a>
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
              <div class="quoteslok-quotes-main" style="min-height: 400px;">
      <div class="container" style="margin-top: 100px;">
        <div class="row">
          <div style="box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.1);">
            <p style="padding: 30px;background-color: antiquewhite;font-weight: 600;"><i class="fa fa-exclamation-triangle" style="color:#D20921;margin-right: 10px;"></i>You do not have any favorites yet.</p>
          </div>
        </div>
      </div>
    </div>
    @endif

@endsection