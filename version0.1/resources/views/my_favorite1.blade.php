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

<div class="masonry-wrapper">
    <div class="container">
        <ul class="grid effect-2" id="grid">
  				
          <li>
              <a href="#">
                <img class="w-100" src="img/thought.jpg">
              </a>
              <div class="masonry-quotes-box">
                  <div class="masonry-quotes-icon">
                      <div class="heart">
                        <i class="fa fa-heart" aria-hidden="true"></i>
                      </div>
                      <div class="share-collection">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        <i class="fa fa-share" aria-hidden="true"></i>
                      </div>
                  </div><!-- /.masonry-quotes-icon -->

                  <div class="masonry-content">
                    <p>Stay positive, work hard, make it happen.</p>
                    <h6>STEVEN SHAW</h6>
                  </div><!-- /.masonry-content -->

                  <div class="masonry-related-links">
                        <a href="#">Positive,</a>
                        <a href="#">Work Hard,</a>
                        <a href="#">Believe</a>
                  </div><!-- /.masonry-related-links -->
              </div><!-- /.masonry-quotes-box -->
          </li>


          <li>
              <a href="#">
                <img class="w-100" src="img/thought2.jpg">
              </a>
              <div class="masonry-quotes-box">
                  <div class="masonry-quotes-icon">
                      <div class="heart">
                        <i class="fa fa-heart" aria-hidden="true"></i>
                      </div>
                      <div class="share-collection">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        <i class="fa fa-share" aria-hidden="true"></i>
                      </div>
                  </div><!-- /.masonry-quotes-icon -->

                  <div class="masonry-content">
                    <p>Stop waiting, start creating.</p>
                    <h6>James Mcvoy</h6>
                  </div><!-- /.masonry-content -->

                  <div class="masonry-related-links">
                        <a href="#">Waiting,</a>
                        <a href="#">Start,</a>
                        <a href="#">Creative,</a>
                        <a href="#">Inspiration</a>
                  </div><!-- /.masonry-related-links -->
              </div><!-- /.masonry-quotes-box -->
          </li>


          <li>
              <a href="#">
                <img class="w-100" src="img/thought3.jpg">
              </a>
              <div class="masonry-quotes-box">
                  <div class="masonry-quotes-icon">
                      <div class="heart">
                        <i class="fa fa-heart" aria-hidden="true"></i>
                      </div>
                      <div class="share-collection">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        <i class="fa fa-share" aria-hidden="true"></i>
                      </div>
                  </div><!-- /.masonry-quotes-icon -->

                  <div class="masonry-content">
                    <p>Diffcult roads often lead to beautiful destinations.</p>
                    <h6>UNKNOWN</h6>
                  </div><!-- /.masonry-content -->

                  <div class="masonry-related-links">
                        <a href="#">Difficlut,</a>
                        <a href="#">Beautiful,</a>
                        <a href="#">Motivation,</a>
                        <a href="#">Destination</a>
                  </div><!-- /.masonry-related-links -->
              </div><!-- /.masonry-quotes-box -->
          </li>

          <li>
              <a href="#">
                <img class="w-100" src="img/thought4.jpg">
              </a>
              <div class="masonry-quotes-box">
                  <div class="masonry-quotes-icon">
                      <div class="heart">
                        <i class="fa fa-heart" aria-hidden="true"></i>
                      </div>
                      <div class="share-collection">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        <i class="fa fa-share" aria-hidden="true"></i>
                      </div>
                  </div><!-- /.masonry-quotes-icon -->

                  <div class="masonry-content">
                    <p>As long as thereʼs light we have got a chace.</p>
                    <h6>POLE DAMERON</h6>
                  </div><!-- /.masonry-content -->

                  <div class="masonry-related-links">
                        <a href="#">Light,</a>
                        <a href="#">Chance,</a>
                        <a href="#">Long,</a>
                        <a href="#">Motivation</a>
                  </div><!-- /.masonry-related-links -->
              </div><!-- /.masonry-quotes-box -->
          </li>


          <li>
              <a href="#">
                <img class="w-100" src="img/thought2.jpg">
              </a>
              <div class="masonry-quotes-box">
                  <div class="masonry-quotes-icon">
                      <div class="heart">
                        <i class="fa fa-heart" aria-hidden="true"></i>
                      </div>
                      <div class="share-collection">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        <i class="fa fa-share" aria-hidden="true"></i>
                      </div>
                  </div><!-- /.masonry-quotes-icon -->

                  <div class="masonry-content">
                    <p>Stop waiting, start creating.</p>
                    <h6>James Mcvoy</h6>
                  </div><!-- /.masonry-content -->

                  <div class="masonry-related-links">
                        <a href="#">Waiting,</a>
                        <a href="#">Start,</a>
                        <a href="#">Creative,</a>
                        <a href="#">Inspiration</a>
                  </div><!-- /.masonry-related-links -->
              </div><!-- /.masonry-quotes-box -->
          </li>

          <li>
              <a href="#">
                <img class="w-100" src="img/thought5.jpg">
              </a>
              <div class="masonry-quotes-box">
                  <div class="masonry-quotes-icon">
                      <div class="heart">
                        <i class="fa fa-heart" aria-hidden="true"></i>
                      </div>
                      <div class="share-collection">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        <i class="fa fa-share" aria-hidden="true"></i>
                      </div>
                  </div><!-- /.masonry-quotes-icon -->

                  <div class="masonry-content">
                    <p>Your future is created by what you do today, not tomorrow.</p>
                    <h6>MORGAN FREEMAN</h6>
                  </div><!-- /.masonry-content -->

                  <div class="masonry-related-links">
                        <a href="#">Future,</a>
                        <a href="#">Today,</a>
                        <a href="#">Tomorrow,</a>
                        <a href="#">Motivation</a>
                  </div><!-- /.masonry-related-links -->
              </div><!-- /.masonry-quotes-box -->
          </li>


          <li>
              <a href="#">
                <img class="w-100" src="img/thought4.jpg">
              </a>
              <div class="masonry-quotes-box">
                  <div class="masonry-quotes-icon">
                      <div class="heart">
                        <i class="fa fa-heart" aria-hidden="true"></i>
                      </div>
                      <div class="share-collection">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        <i class="fa fa-share" aria-hidden="true"></i>
                      </div>
                  </div><!-- /.masonry-quotes-icon -->

                  <div class="masonry-content">
                    <p>As long as thereʼs light we have got a chace.</p>
                    <h6>POLE DAMERON</h6>
                  </div><!-- /.masonry-content -->

                  <div class="masonry-related-links">
                        <a href="#">Light,</a>
                        <a href="#">Chance,</a>
                        <a href="#">Long,</a>
                        <a href="#">Motivation</a>
                  </div><!-- /.masonry-related-links -->
              </div><!-- /.masonry-quotes-box -->
          </li>


          <li>
              <a href="#">
                <img class="w-100" src="img/thought.jpg">
              </a>
              <div class="masonry-quotes-box">
                  <div class="masonry-quotes-icon">
                      <div class="heart">
                        <i class="fa fa-heart" aria-hidden="true"></i>
                      </div>
                      <div class="share-collection">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        <i class="fa fa-share" aria-hidden="true"></i>
                      </div>
                  </div><!-- /.masonry-quotes-icon -->

                  <div class="masonry-content">
                    <p>Stay positive, work hard, make it happen.</p>
                    <h6>STEVEN SHAW</h6>
                  </div><!-- /.masonry-content -->

                  <div class="masonry-related-links">
                        <a href="#">Positive,</a>
                        <a href="#">Work Hard,</a>
                        <a href="#">Believe</a>
                  </div><!-- /.masonry-related-links -->
              </div><!-- /.masonry-quotes-box -->
          </li>


          <li>
              <a href="#">
                <img class="w-100" src="img/thought3.jpg">
              </a>
              <div class="masonry-quotes-box">
                  <div class="masonry-quotes-icon">
                      <div class="heart">
                        <i class="fa fa-heart" aria-hidden="true"></i>
                      </div>
                      <div class="share-collection">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        <i class="fa fa-share" aria-hidden="true"></i>
                      </div>
                  </div><!-- /.masonry-quotes-icon -->

                  <div class="masonry-content">
                    <p>Diffcult roads often lead to beautiful destinations.</p>
                    <h6>UNKNOWN</h6>
                  </div><!-- /.masonry-content -->

                  <div class="masonry-related-links">
                        <a href="#">Difficlut,</a>
                        <a href="#">Beautiful,</a>
                        <a href="#">Motivation,</a>
                        <a href="#">Destination</a>
                  </div><!-- /.masonry-related-links -->
              </div><!-- /.masonry-quotes-box -->
          </li>


          <li>
              <a href="#">
                <img class="w-100" src="img/thought6.jpg">
              </a>
              <div class="masonry-quotes-box">
                  <div class="masonry-quotes-icon">
                      <div class="heart">
                        <i class="fa fa-heart" aria-hidden="true"></i>
                      </div>
                      <div class="share-collection">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        <i class="fa fa-share" aria-hidden="true"></i>
                      </div>
                  </div><!-- /.masonry-quotes-icon -->

                  <div class="masonry-content">
                    <p>You are not a drop in the ocean. You are the entire ocean in a drop.</p>
                    <h6>RUMI</h6>
                  </div><!-- /.masonry-content -->

                  <div class="masonry-related-links">
                        <a href="#">Ocean,</a>
                        <a href="#">Inspiration,</a>
                        <a href="#">Motivation and Believe</a>
                  </div><!-- /.masonry-related-links -->
              </div><!-- /.masonry-quotes-box -->
          </li>


          <li>
              <a href="#">
                <img class="w-100" src="img/thought4.jpg">
              </a>
              <div class="masonry-quotes-box">
                  <div class="masonry-quotes-icon">
                      <div class="heart">
                        <i class="fa fa-heart" aria-hidden="true"></i>
                      </div>
                      <div class="share-collection">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        <i class="fa fa-share" aria-hidden="true"></i>
                      </div>
                  </div><!-- /.masonry-quotes-icon -->

                  <div class="masonry-content">
                    <p>As long as thereʼs light we have got a chace.</p>
                    <h6>POLE DAMERON</h6>
                  </div><!-- /.masonry-content -->

                  <div class="masonry-related-links">
                        <a href="#">Light,</a>
                        <a href="#">Chance,</a>
                        <a href="#">Long,</a>
                        <a href="#">Motivation</a>
                  </div><!-- /.masonry-related-links -->
              </div><!-- /.masonry-quotes-box -->
          </li>

          <li>
              <a href="#">
                <img class="w-100" src="img/thought5.jpg">
              </a>
              <div class="masonry-quotes-box">
                  <div class="masonry-quotes-icon">
                      <div class="heart">
                        <i class="fa fa-heart" aria-hidden="true"></i>
                      </div>
                      <div class="share-collection">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        <i class="fa fa-share" aria-hidden="true"></i>
                      </div>
                  </div><!-- /.masonry-quotes-icon -->

                  <div class="masonry-content">
                    <p>Your future is created by what you do today, not tomorrow.</p>
                    <h6>MORGAN FREEMAN</h6>
                  </div><!-- /.masonry-content -->

                  <div class="masonry-related-links">
                        <a href="#">Future,</a>
                        <a href="#">Today,</a>
                        <a href="#">Tomorrow,</a>
                        <a href="#">Motivation</a>
                  </div><!-- /.masonry-related-links -->
              </div><!-- /.masonry-quotes-box -->
          </li>

			</ul><!-- /.grid -->
    </div><!-- /.container -->
</div><!-- /.masonry-wrapper -->

@endsection