<section class="sidebar">
  <ul class="sidebar-menu" data-widget="tree">
    <li id="side-dashboard" @if(Session::get('sidebar') == '7') style="background: #FF4351;" @endif><a href="{{ url('/dashboard')}}"><img src="{{URL::asset('dist/img/dashboard.svg')}}"><span>Dashboard</span></a></li>

    <li id="side-service"  @if(Session::get('sidebar') == '1') style="background: #FF4351;" @endif ><a href="{{ url('/majors')}}"><img src="{{URL::asset('dist/img/library.svg')}}"><span>Majors</span></a></li>

    <li id="side-service" @if(Session::get('sidebar') == '2') style="background: #FF4351;" @endif><a href="{{ url('/community')}}"><img src="{{URL::asset('dist/img/multiple-users-silhouette.svg')}}"><span>Community</span></a></li>

    <li id="side-service" @if(Session::get('sidebar') == '3') style="background: #FF4351;" @endif><a href="{{ url('/events')}}"><img src="{{URL::asset('dist/img/event.svg')}}"><span>Events</span></a></li>

    <li id="side-service" @if(Session::get('sidebar') == '4') style="background: #FF4351;" @endif><a href="{{ url('/universities')}}"><img src="{{URL::asset('dist/img/graduate-cap.svg')}}"><span>Universities</span></a></li>

    <li id="side-service"  @if(Session::get('sidebar') == '8') style="background: #FF4351;" @endif ><a href="{{ url('/musics')}}"><img src="{{URL::asset('admin/img/musical-note.svg')}}"><span>Music</span></a></li>

    <li id="side-service" @if(Session::get('sidebar') == '5') style="background: #FF4351;" @endif><a href="{{ url('/sports')}}"><img src="{{URL::asset('dist/img/bike.svg')}}"><span>Sports</span></a></li>

    <li id="side-service" @if(Session::get('sidebar') == '6') style="background: #FF4351;" @endif><a href="{{ url('/tutors')}}"><img src="{{URL::asset('dist/img/user-account-box.svg')}}"><span>Tutors</span></a></li>

       
  </ul><!-- /.sidebar-menu -->
</section><!-- /.sidebar -->