<div class="container">

          <div class="row">

            <div class="col-lg-3 col-md-4 col-sm-12">

                <div class="footer-menu">

                    <div class="footer-logo navbar-light">

                        <a class="navbar-brand" href="{{url('/')}}">Quoteslok&#10076;</a>

                    </div><!-- footer-logo -->

                    <p>Fusce vehicula dolor arcu, sit amet blandit dolor mollis nec. Donec viverra eleifend lacus, vitae ullamcorper metus.</p>

                </div><!-- /.footer-menu -->

            </div>



            <div class="col-lg-3 col-md-4 col-sm-6">

                <div class="footer-menu">

                    <ul>

                      <li><a href="#">Posters</a></li>

                      <li><a href="#">Wallpaper</a></li>

                      <li><a href="{{url('topics')}}">Topics</a></li>

                      <li><a href="{{url('people')}}">People</a></li>

                      <li><a href="#">Shop</a></li>

                    </ul>

                </div><!-- /.footer-menu -->

            </div>



            <div class="col-lg-3 col-md-4 col-sm-6">

                <div class="footer-menu footer-menus right-footer-menu">

                    <ul>

                      <li><a href="#">About Us</a></li>

                      <li><a href="#">Contact Us</a></li>

                      <li><a href="#">Privacy Policy</a></li>

                      <li><a href="#">Terms & Conditions</a></li>

                    </ul>

                </div><!-- /.footer-menu -->

            </div>



            <div class="col-lg-3 col-md-12">

                <div class="footer-menu social-icon">

                    <ul>

                      @if(!empty($social->facebook))
                                <li class="item wow fadeIn" data-wow-delay=".25s">

                                    <a class="link fb" href="{{$social->facebook}}"><i class="fa fa-facebook" aria-hidden="true"></i>

                                    </a>

                                </li>
                                @endif

                                 @if(!empty($social->twitter))

                                <li class="item wow fadeIn" data-wow-delay=".3s">

                                    <a class="link tw" href="{{$social->twitter}}"><i class="fa fa-twitter" aria-hidden="true"></i>

                                    </a>

                                </li>
                                @endif

                                 @if(!empty($social->instagram ))

                                <li class="item wow fadeIn" data-wow-delay=".35s">

                                    <a class="link in" href="{{$social->instagram}}"><i class="fa fa-instagram" aria-hidden="true"></i>

                                    </a>

                                </li>

                                @endif

                                 @if(!empty($social->pinterest ))

                                <li class="item wow fadeIn" data-wow-delay=".4s">

                                    <a class="link p" href="{{$social->pinterest}}"><i class="fa fa-linkedin" aria-hidden="true"></i>

                                    </a>

                                </li>

                                @endif

                                 @if(!empty($social->youtube ))

                                <li class="item wow fadeIn" data-wow-delay=".4s">

                                    <a class="link p" href="{{$social->youtube}}"><i class="fa fa-youtube" aria-hidden="true"></i>

                                    </a>

                                </li>

                                @endif

                                @if(!empty($social->vimeo ))
                                <li class="item wow fadeIn" data-wow-delay=".4s">

                                    <a class="link p" href="{{$social->vimeo}}"><i class="fa fa-vimeo" aria-hidden="true"></i>

                                    </a>

                                </li>
                                @endif

                    </ul>

                </div><!-- /.footer-menu -->

            </div>

          </div><!-- /.row -->

      </div><!-- /.container -->