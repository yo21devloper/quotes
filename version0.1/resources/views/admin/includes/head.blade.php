<meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="csrf-token" content="{{csrf_token()}}">

  <title>Dextfx - Admin</title>

  

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  

  <link rel="stylesheet" href="{!! asset('admin_theme/bower_components/bootstrap/dist/css/bootstrap.min.css') !!}">

  <link rel="stylesheet" href="{!! asset('admin_theme/bower_components/font-awesome/css/font-awesome.min.css') !!}">

  <link rel="stylesheet" href="{!! asset('admin_theme/bower_components/Ionicons/css/ionicons.min.css') !!}">

  <link rel="stylesheet" href="{!! asset('admin_theme/dist/css/main.css') !!}">

  <link rel="stylesheet" href="{!! asset('admin_theme/dist/css/custom.css') !!}">

  <!-- fullCalendar -->

  <link rel="stylesheet" href="{!! asset('admin_theme/bower_components/fullcalendar/dist/fullcalendar.min.css') !!}">

  <link rel="stylesheet" href="{!! asset('admin_theme/bower_components/fullcalendar/dist/fullcalendar.print.min.css') !!}" media="print">



  <link rel="stylesheet" type="text/css" href="{!! asset('admin_theme/dist/css//bootstrap-datepicker.min.css') !!}">

  <link rel="stylesheet" type="text/css" href="{!! asset('admin_theme/dist/css/perfect-scrollbar.css') !!}">

  <link rel="icon" href="{{ URL::to('/') }}/assets/image/favicon.ico" type="img/x-icon">

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.1/jquery.toast.min.css">

<style>
.navbar-light .navbar-brand {
    color: rgba(0, 0, 0, .9);
    background: #fc3767;
    background: -moz-linear-gradient(left, #fc3767 0%, #fe9568 100%);
    background: -webkit-linear-gradient(left, #fc3767 0%, #fe9568 100%);
    background: linear-gradient(to right, #fc3767 0%, #fe9568 100%);
    filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#fc3767', endColorstr='#fe9568', GradientType=1);
    -webkit-background-clip: text;
    -moz-background-clip: text;
    -webkit-text-fill-color: transparent;
    -moz-text-fill-color: transparent;
    font-weight: bold;
    font-size: 2.6rem;
    margin-left: 0;
    font-family: 'Baloo Paaji', cursive;
}

</style>


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

  <!--[if lt IE 9]>

  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>

  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

  <![endif]-->

    <!--[if gte IE 9]

    <style type="text/css">

    .gradient {

    filter: none;

    }

    </style>

  <![endif]-->



  <!-- Google Font -->

  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">