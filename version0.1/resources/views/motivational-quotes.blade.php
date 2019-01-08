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
  .more-link-wrapper .more-link:nth-child(1) span:hover{
    background: #fff;
    color: #fc3b67 !important;
  }

  .more-link-wrapper .more-link:nth-child(2) span:hover{
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
          <div class="banner-text">
              <h4>Motivational Quotes</h4>
          </div>
      </div><!-- /.banner -->
  </div>

  <div class="motivational-quotes-wrapper">
    <div class="container">      
      <div class="row">
        <div class="col-lg-6 motivational-left">
          <div class="image-wrapper ">
            <img src="{{ URL::asset('images/motivatinal.jpg')}}" alt="">
          </div>
        </div>
        <div class="col-lg-6 motivational-right">
          <div class="motivational-right-inner">
            <h5>The best way to predict the future is to create it.</h5>
            <div class="profile-user-wrapper">
              <div class="profile-user">
                <img src="{{ URL::asset('images/thumbnail.png') }}" alt="">
              </div>
              <h6>Abraham Lincoin</h6>
            </div>
            <div class="motivational-button-section">
              <span class="heart">
                <i class="fa fa-heart" aria-hidden="true"></i>
              </span>
              <a href="javascript:;"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
              <a href="javascript:;"><i class="fa fa-share" aria-hidden="true"></i></a>
            </div>
            <div class="tag-wrapper">
              <div class="tag-heading">
                <h6>Tags</h6>
              </div>
              <a class="tag-links" href="javascript:;">Motivational</a>
              <a class="tag-links" href="javascript:;">Success</a>
              <a class="tag-links" href="javascript:;">Future</a>
              <a class="tag-links" href="javascript:;">Create</a>
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

  <div class="more-link-wrapper">
    <a class="more-link" href="javascript:;"><span>More Motivational Quotes</span></a>
    <a class="more-link" href="javascript:;"><span>More Quotes form Abraham Lncoin</span></a>
  </div>

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