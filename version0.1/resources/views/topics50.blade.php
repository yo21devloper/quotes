@extends('layouts.app')



@section('content')

    <div class="banner-wrapper">
        <div class="banner">
            <!-- <div class="slider-wall" style="background: url(img/banner.svg) no-repeat;"></div> -->
        <img src="{{ url('img/banner.svg') }}" alt="" class="w-100">
            <div class="banner-text">
                <h4>Top50</h4>
            </div>
        </div><!-- /.banner -->
    </div>



    <section class="quoteslok-section">

        <div class="container">

            <div class="topfifty">

                <div class="row">

                @php
                $i=1;
                @endphp
                @foreach($topics as $topic)
                  <div class="col-lg-4 col-md-6 col-sm-6">

                      <div class="quotes-home">

                          <a href="{{url('/topics_related/'.$topic->id)}}">

                              <div class="qotes-img">

                                  <img src="@if($i % 2 != 0) {{URL::asset('img/mask.jpg')}} @elseif($i % 2 == 0) {{URL::asset('img/mask2.jpg')}} @elseif($i==3) {{URL::asset('img/mask3.jpg')}} @endif" alt="" class="w-100">

                                  <div class="qotes-border">

                                      <div class="qotes-tex">

                                          <div class="quotes-hght">

                                              <h4>Top 50</h4>

                                              <h5>{{$topic->topic_name}}</h5>

                                              <p>Quotes</p>

                                          </div>

                                          <!-- quotes-hght -->

                                      </div>

                                  </div>

                              </div>

                              <!-- qotes-img -->

                          </a>

                      </div>

                      <!-- quotes-home -->

                  </div>
                @php
                $i++;
                @endphp
                  @endforeach

                  </div>              

              </div>

            </div><!-- topfifty -->

        </div>

        <!-- container -->

    </section>

    <!-- quoteslok-section -->



    <div class="clearfix"></div>

@endsection

@section('js')

 

@endsection