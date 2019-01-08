@extends('layouts.app')

@section('content')
    <div class="banner-wrapper">
        <div class="banner">
            <!-- <div class="slider-wall" style="background: url(img/banner.svg) no-repeat;"></div> -->
        <img src="{{URL::asset('img/banner.svg')}}" alt="" class="w-100">
        	<div class="banner-text">
              <p style="font-size: 20px;margin-bottom: 90px;color:#73687D;">Topic</p>
          </div>
            <div class="banner-text">
                <h4 style="font-size: 50px;">{{$topic->topic_name}}</h4>
            </div>
        </div><!-- /.banner -->
    </div><!-- /.banner-wrapper -->


<div class="masonry-wrapper">
    <div class="container">
    	@if(count($quotesdata) > 0)
        <ul class="grid effect-2" id="grid">
          @php
          $k=0;
          @endphp
  				@foreach($quotesdata as $data )

                @if($data->quotedata != '')
          <li>
              <a href="{{url('poster/'.$data->quotedata->id)}}">
                <img class="w-100" src="{{url('images/quotes/'.$data->quotedata->image)}}">
              </a>
              <div class="masonry-quotes-box">
                  <div class="masonry-quotes-icon">
                      <div class="heart">
                        @if(!empty(Session::get('user')) && $user=Session::get('user'))
                        @if(!empty($fav) && in_array($quote->id, $fav))
                        <span id="myHeart" onclick="changeHeart({{$data->quotedata->id}});"><i class="fa fa-heart active" aria-hidden="true"></i></span>
                        @else
                        <span id="myHeart" onclick="changeHeart({{$data->quotedata->id}});"><i class="fa fa-heart" aria-hidden="true" ></i></span>
                        @endif
                     @else
                      <span class="btn321" ><i class="fa fa-heart" aria-hidden="true" style="color:#cccccc;"></i></span>
                     @endif

                        
                      </div>
                      <div class="share-collection">
                      @if(!empty(Session::get('user')) && $user=Session::get('user'))
                        @if(!empty($coll) && in_array($data->quotedata->id, $coll))
                        <span id="myPlus" class="quotelink" onclick="changePlus({{$data->quotedata->id}});"><i class="fa fa-plus-circle active" aria-hidden="true"></i></span>
                        @else
                        <span id="myPlus" class="quotelink" onclick="changePlus({{$data->quotedata->id}});"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
                        @endif
                      @else
                      <span class="btn123" ><i class="fa fa-plus-circle" aria-hidden="true" style="color:#cccccc;"></i></span>
                     @endif
                        <i class="fa fa-share" aria-hidden="true"></i>
                      </div>
                  </div><!-- /.masonry-quotes-icon -->


                  <div class="masonry-content">
                    <p>{{$data->quotedata->description}}</p>
                    <a class="quotelink" href="{{url('people-innerside/'.$data->quotedata->people->id)}}"<h6>{{$data->quotedata->people->name}}</h6></a>
                  </div><!-- /.masonry-content -->

                  <div class="masonry-related-links">
                        @php
                        $i=1;
                        $value=count($data->quotedata->topics);
                        @endphp
                        @foreach($data->quotedata->topics as $topicdata)
                        <a class="quotelink" href="{{url('/topics_related/'.$topicdata->topicname->id)}}">{{$topicdata->topicname->topic_name}} @if($i < $value),@endif</a>
                        @php
                        $i++;
                        @endphp
                        @endforeach
                        
                  </div><!-- /.masonry-related-links -->
                
              </div><!-- /.masonry-quotes-box -->
              
          </li>
          @php
          $k++;
          @endphp
          @endif
          
          @endforeach

			</ul><!-- /.grid -->
		@if($k=='0')
          
        <div class="quoteslok-quotes-main" style="min-height: 400px;background: #fafafa;">
      <div class="container" style="margin-top: 100px;">
    <div class="row">
          <div style="box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.1);">
            <p style="padding: 30px;background-color: antiquewhite;font-weight: 600;"><i class="fa fa-exclamation-triangle" style="color:#D20921;margin-right: 10px;"></i>Related topic, any quote is not found.</p>
          </div>
        </div>
    </div>
</div>
    @endif
    @else
          
        <div class="quoteslok-quotes-main" style="min-height: 400px;background: #fafafa;">
      <div class="container" style="margin-top: 100px;">
    <div class="row">
          <div style="box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.1);">
            <p style="padding: 30px;background-color: antiquewhite;font-weight: 600;"><i class="fa fa-exclamation-triangle" style="color:#D20921;margin-right: 10px;"></i>Related topic, any quote is not found.</p>
          </div>
        </div>
    </div>
</div>
    @endif
    </div><!-- /.container -->
</div><!-- /.masonry-wrapper -->


@endsection