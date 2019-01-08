@extends('layouts.app')


@section('css')
<style>

	@media (max-width:576px){
		.grid{
			text-align: center;
	
		}
		.grid li{
			text-align: center;
			left: 0;
			right: 0;
			margin-left: auto !important;
			margin-right: auto !important;
		}
	}
</style>

@endsection

@section('content')
    <div class="banner-wrapper">
        <div class="banner">
            <!-- <div class="slider-wall" style="background: url(img/banner.svg) no-repeat;"></div> -->
        <img src="{{URL::asset('img/banner.svg')}}" alt="" class="w-100">
            <div class="banner-text">
                <h4>My Collections</h4>
            </div>
        </div><!-- /.banner -->
    </div><!-- /.banner-wrapper -->

<div class="masonry-wrapper" style="background:#fff !important;">
    <div class="container">
        <ul class="grid effect-2" id="grid">
		
		<li style="padding: 20px;background-color: #f3f3f3;width:240px;height:270px;margin:15px;border: 2px dashed #ddd;">
			<a href="{{url('/')}}" style="left: 14%;position: absolute;top: 30%;
      text-align: center;">
				<p style="text-align: center;"><img src="{{URL::asset('vectorpaint.svg')}}" style="height:59px;margin-bottom: 30px;"></p><p style="color:#949494;font-weight:600;font-size:16px;text-align: center">Create New Collection</p>
            </a>        
		</li>

        </ul>

      </div>
    </div>
</section>
@endsection
