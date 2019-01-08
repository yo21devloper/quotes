<!DOCTYPE html>

<!--

This is a starter template page. Use this page to start your new project from

scratch. This page gets rid of all links and provides the needed markup only.

-->

<html>

<head>

  @include('admin.includes.head')

</head>



<body class="hold-transition skin-blue-light sidebar-mini">

<div class="wrapper">



  <!-- Main Header -->

  <header class="main-header">

    @include('admin.includes.header')

  </header>



  <aside class="main-sidebar">

    @include('admin.includes.sidebar')

  </aside><!-- left-side menu -->



  <div class="content-wrapper">

    <section class="content container-fluid">
      
      <!-- page content ends here -->

    </section><!-- /.content -->

  </div><!-- /.content-wrapper -->



<footer class="main-footer">

@include('admin.includes.footer') 

</footer>



</div>

<!-- ./wrapper -->



@include('admin.includes.foot')



</body>

</html>