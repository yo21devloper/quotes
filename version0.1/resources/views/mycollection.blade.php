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
<div class="modal fade modal-center bd-example-modal-lm forgot" id="create_collection" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                 </button>
                 <h5 class="header">Create New Collecton</h5>
                 <p>You want to create the collection.</p>
                 <form class="login_modal forgot_password" action="{{url('/mycollectionsubmit')}}" method="post">
                  {{csrf_field()}}
                     <div class="form-group" style="margin: 25px 0px;">
                     <div class="input-group">
            <input type="text" class="form-control"  placeholder="Collection Name" name="collectionname" style="border-right:none;">
            <div class="input-group-addon">
              <img src="{{URL::asset('js/md-add-circle.svg')}}" class="icon" >
            </div>
          </div>
                    </div>
                        <input type="submit" class="login" value="submit">
                </form>
            </div>
      <p style="border-top:1px solid #f3f3f3;text-align:center;padding:15px;">

                        <a href="{{url('/')}}"  class="login_modal_forgot">Back to home page</a>
      </p>
        </div>
    </div>
</div><!--End forgot -->




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
      <a href="#" data-toggle="modal" data-dismiss= "modal" data-target="#create_collection" style="left: 14%;position: absolute;top: 30%;text-align: center;">
				<p class="title_collection"><img src="{{URL::asset('vectorpaint.svg')}}" style="height:59px;margin-bottom: 30px;"></p><p  style="color:#949494;font-weight:600;font-size:16px;text-align: center">Create New Collection</p>
            </a>        
		</li>
		
		@if(!empty($quotedata1) && count($quotedata1) > '0')
		@php
		$i=0;
		@endphp

		@foreach($quotedata1 as $data)		
		<li style="padding: 20px;
		@if($i=='0' || $i=='6' || $i=='12' )
		background-color: #ffe0d3;
		@elseif($i=='1' || $i=='7' || $i=='13')
		background-color: #d5fff6;
		@elseif($i=='2' || $i=='8' || $i=='14')
		background-color: #FFD3D3;
		@elseif($i=='3' || $i=='9' || $i=='15')
		background-color: #FFF0D3;
		@elseif($i=='4' || $i=='10' || $i=='16')
		background-color: #E2FFD3;
		@elseif($i=='5' || $i=='11' || $i=='17')
		background-color: #D3EBFF;

		@endif
		width:240px;height:270px;margin:15px;box-shadow: 1px 1px 5px rgba(0,0,0,0.2);">
			<a href="{{url('mycollectiondata/'.$data->id)}}" class="title_name">
				<p class="title_collection">{{ucfirst($data->collectionname)}}</p><p style="    color: #bdaba3;font-size:16px;text-align: center"></p>
            </a>        
		</li>
		
		@php
		$i++;
		@endphp
		
		@endforeach
		@endif
        </ul>

      </div>
    </div>
</section>
@endsection
