<!-- Logo -->



    <a href="dashboard" class="logo" style="padding: 0 15px;width: 230px;">


        <div class="login-wrapper-inner navbar-light">

            <h1 class="navbar-brand" style="float: none;
    margin-top: 6px;
    line-height: normal;">Quoteslok&#10076;</h1>

        </div>

    </a>







    <!-- Header Navbar -->



    <nav class="navbar navbar-static-top" role="navigation">



      <!-- Sidebar toggle button-->



      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">



        <span class="sr-only">Toggle navigation</span>



      </a>



      <!-- Navbar Right Menu -->



      <div class="navbar-custom-menu">



        <ul class="nav navbar-nav">



          <!-- <li class="points-list">Points Earned : <span>467</span></li> -->



          <!-- user menu -->
                   @php
                    $image=Auth::user()->image
                    @endphp


          <li class="dropdown user user-menu">



            <!-- Menu Toggle Button -->



            <a href="#" class="dropdown-toggle user-drop" data-toggle="dropdown">

                    @if(Auth::user()->image = '')

                    <img src="{{ URL::to('/') }}/admin1/user.png" class="user-image" alt="User Image">
                    @else
                    <img src="{{ $image}}" class="user-image" alt="User Image">
                    @endif



            </a><!-- profile image -->



            <ul class="dropdown-menu login-dropdown-menu">



              <!-- The user image in the menu -->



              <li>



                <a href="{{route('my_profile')}}">



                  <div class="name-details">


                    @if(Auth::user()->image = '')

                    <img src="{{ URL::to('/') }}/admin1/user.png" class="user-image" alt="User Image">
                    @else
                    <img src="{{ $image}}" class="user-image" alt="User Image">
                    @endif


                    <h5>{{Auth::user()->name}}</h5>



                    <span>{{Auth::user()->email}}</span>



                  </div>



                </a>



              </li>


              <li>



                <a href="{{ url('admin/logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">


                  <i class="fa fa-sign-out" aria-hidden="true"></i> Logout


                </a> 


                <form id="frm-logout" action="{{ url('admin/logout') }}" method="POST" style="display: none;">

                  {{ csrf_field() }}


                </form> 

                <!-- <a href="{{ URL::to('/') }}/admin/logout"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a> -->

              </li>

            </ul>

          </li>

        </ul>

      </div>



    </nav>