<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{csrf_token()}}">
  <title>100 Degree - Admin</title>
  
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <link rel="stylesheet" href="{!! asset('bower_components/bootstrap/dist/css/bootstrap.min.css') !!}">
<!--   <link rel="stylesheet" href="{!! asset('bower_components/font-awesome/css/font-awesome.min.css') !!}">
  <link rel="stylesheet" href="{!! asset('bower_components/Ionicons/css/ionicons.min.css') !!}"> -->
  <link href="{{ URL::asset('admin/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic|Roboto+Mono:400,500|Material+Icons" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" href="{!! asset('dist/css/main.css') !!}">
  <link rel="stylesheet" href="{!! asset('dist/css/custom.css') !!}">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="{!! asset('bower_components/fullcalendar/dist/fullcalendar.min.css') !!}">
  <link rel="stylesheet" href="{!! asset('bower_components/fullcalendar/dist/fullcalendar.print.min.css') !!}" media="print">

  <link rel="stylesheet" type="text/css" href="{!! asset('dist/css//bootstrap-datepicker.min.css') !!}">
  <link rel="stylesheet" type="text/css" href="{!! asset('dist/css/perfect-scrollbar.css') !!}">
  <link rel="icon" href="{{ URL::to('/') }}/assets/app-icon.png" type="img/x-icon">
  <link rel="stylesheet" type="text/css" href="{!! asset('css/jquery.toast.min.css') !!}">

<link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">

<!--   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous"> -->
<style>
.dropdown-menu.notification{
  width: 265px;
    right: -85px;
    top: 50px;
    left: inherit;
    background: #eee;
    box-shadow: 4px 5px 9px rgba(0, 0, 0, 0.12) !important;
    border-radius: 3px;
    padding: 15px 15px 0;
    overflow: hidden;
}
.main-header .sidebar-toggle:before {
    content: none;
}
</style>
<style>
.dropdown {
    margin-top: 15px;
    margin-right: 10px;
}

.dropdown-menu.logout {
    width: 180px;
    right: 0;
    left: inherit;
    background: #fff;
    box-shadow: 0px 0px 8px 0px rgba(0, 0, 0, 0.2) !important;
    border-radius: 3px;
}

.dropdown-menu.logout li {
    border-bottom: #eee thin solid;
    color: #575757
}

.dropdown-menu.logout li a {
    padding: 10px;
    color: #575757
}

.dropdown-menu.logout li i,
.dropdown-menu.logout li span {
    float: left;
    margin-right: 10px;
    font-size: 15px
}

.navbar-nav>li a img {
    border-radius: 50%;
    margin-right: 10px
}

.navbar-nav>li a span {
    margin-right: 12px;
    font-weight: 500;
}

.nav>li>a:focus,
.nav>li>a:hover {
    background: none;
    color: #333
}
.pp-images {
    background: none;
    height: 40px;
    width: 40px;
    position: relative;
    border-radius: 50%;
    overflow: hidden;
    float: left;
    margin: 0 20px 0 15px;
}
</style>
    