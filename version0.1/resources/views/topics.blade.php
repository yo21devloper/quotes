@extends('layouts.app')
@section('css')

@endsection

@section('content')

    <div class="banner-wrapper">
        <div class="banner">
            <!-- <div class="slider-wall" style="background: url(img/banner.svg) no-repeat;"></div> -->
        <img src="{{URL::asset('img/banner.svg')}}" alt="" class="w-100">
            <div class="banner-text">
                <h4>Topics</h4>
            </div>
        </div><!-- /.banner -->
    </div><!-- /.banner-wrapper -->





    <section class="quoteslok-section topics-wrapper">

      <div class="container">

          <div class="topics-box" style="background:none">

              <ul style="border:none">

                @foreach($topics as $topic)

                <li style="margin:15px;border: none;width: 22%;height:160px;">
                  <a href="{{url('/topics_related/'.$topic->id)}}">
                    <div >
                      <img src="{{URL::asset('/images/'.$topic->image)}}" style="width:100%;height:160px;;border: 1px solid rgba(46,62,72,.12);border-radius: 8px;" alt="">
                    </div>
                  </a>
                  <p>{{$topic->topic_name}}<p>
                </li>
                @endforeach
              </ul>

          </div><!-- topics-box -->

      </div><!-- container -->

    </section><!-- quoteslok-section -->

    



<div class="clearfix"></div>

@endsection

@section('js')

 

@endsection