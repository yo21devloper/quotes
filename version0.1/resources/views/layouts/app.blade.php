<!DOCTYPE html>

<html lang="en">

<head>

@include('includes.meta')

@include('includes.css')


@yield('css')

<style>

label.error

{

	color:firebrick;

	font-size: 14px;

}

</style>

</head>

<body>

    
        @include('includes.header')

 

@yield('content')



<footer>



@include('includes.footer')

</footer><!-- footer -->

<div class="footer-end">
    <div class="container">
        <p class="text-center">Quoteslok &#9400; 2017</p>
    </div>
  </div>

@include('includes.js')

@yield('js')

</body>

</html>

