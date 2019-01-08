
<!-- Logo -->
    <a href="dashboard" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">
        <img src="{{ URL::to('/') }}/assets/app-icon.png" alt="">
      </span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg" >
        <img src="{{ URL::to('/') }}/assets/app-icon.png" alt="" style="width: 110px;height: 71px;">
      </span>
    </a>


    <!-- Header Navbar -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <a  href="#" class="sidebar-toggle" data-toggle="push-menu" role="button"><span class="sr-only">Toggle navigation</span> <i class="fa fa-bars"></i></a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav left-menu">
                        <li>
                            <div class="dropdown logoutbox" style="padding-top: 10px;">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><div class="pp-images imgshow" style="background: none;height: 40px;width: 40px;">
                                        @if((Auth::user()->image) == '')
                                        <img class="img" src="{{URL::asset('admin/img/avtar-img.png')}}" width="40" id="image_upload_preview1" />
                                        @else
                                        <img class="img" src="{{Auth::user()->image}}" width="40" id="image_upload_preview1" />
                                        @endif
                                    </div>  <span style="color:#FF4351;">{{Auth::user()->name}}</span> <i class="fa fa-angle-down text-danger" style="padding-left:10px;color:#FF4351;"></i></a>
                                <ul class="dropdown-menu logout" style="position: absolute;top: 100%;z-index: 1000;float: left;min-width: 160px;padding: 0px 0;margin: 2px 0 0;font-size: 14px;text-align: left;list-style: none;right:26px;">
                                    <li><a href="{{route('my_profile')}}"><i class="material-icons">person</i> <span>My Profile</span><div class="clearfix"></div></a></li>
                                    <li>
                  <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="material-icons">power_settings_new</i> <span>Logout</span><div class="clearfix"></div></a>
                  
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                  
                 </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>