@extends('layouts.app')



@section('content')


    <div class="banner-wrapper">
        <div class="banner">
            <img src="{{URL::asset('img/banner.svg')}}" alt="" class="w-100">
            <div class="banner-text">
                <h4>People</h4>
            </div>
        </div><!-- /.banner -->
    </div><!-- /.banner-wrapper -->

    <!-- quoteslok-menu-heading -->



    <section class="quoteslok-section">

        <div class="container">

            <div class="people-wrapper" style="margin:0px;padding:0px;display: block;">

              <div class="row" style="margin:0px;padding:0px;">
            @foreach($peoples as $people)
              
              <div class="people-box col-md-3" style="margin:0px;padding:0px;">
               <a href="{{url('people-innerside/'.$people->id)}}">
                <div class="people-img" style="width: 210px;background:white;margin:0px;padding:0px;margin-bottom: 20px;">
                  <img src="{{URL::asset('images/people/'.$people->image)}}" alt="Milne" class="w-100" style="height: 160px;">
                  <div style=";padding:10px;text-algin:center;margin-bottom:20px;">
                <p style="text-align: center;font-weight:bold">{{ucfirst($people->name)}}</p>
                <p style="font-style: italic;text-align: center;">{{ucfirst($people->position)}}</p>
                </div>
                </div><!-- people-img -->
              </a>
              </div><!-- people-box -->
          
            @endforeach
        </div>

            </div><!-- people-wrapper -->

        </div>

        <!-- container -->

    </section>

    <!-- quoteslok-section -->



    <div class="clearfix"></div>

@endsection

@section('js')

 

@endsection