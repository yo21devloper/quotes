@extends('layouts.app')
@section('css')
<style>
.masonry-quotes-box .masonry-quotes-icon .share-collection i.active {
    color: #f8416c;
}

</style>
@endsection

@section('content')
    <div class="banner-wrapper">
        <div class="banner">
            <!-- <div class="slider-wall" style="background: url(img/banner.svg) no-repeat;"></div> -->
        <img src="{{URL::asset('img/'.$home->image)}}" alt="" class="w-100">
            <div class="banner-text">
                <h4>{{ucfirst($home->heading)}}</h4>
                <h3>{{$home->paragraph}}</h3>
            </div>
        </div><!-- /.banner -->
    </div><!-- /.banner-wrapper -->


    <div class="quoteslok-quotes-main">
      <div class="container">
        <div class="row">
          
          @php
          $i=1;
          @endphp
          
          @foreach($top50 as $tops)
          @if($i<=3)
          <div class="col-md-4">
            <div class="quotes-home">
              <a href="{{url('topics_related/'.$tops->id)}}">
                  <div class="qotes-img">
                    <img src="@if($i==1) {{URL::asset('img/mask.jpg')}} @elseif($i==2) {{URL::asset('img/mask2.jpg')}} @elseif($i==3) {{URL::asset('img/mask3.jpg')}} @endif" alt="" class="w-100">
                    <div class="qotes-border">
                      <div class="qotes-tex">
                        <div class="quotes-hght">
                          <h4>Top 50</h4>
                          <h5>{{$tops->topic_name}}</h5>
                          <p>Quotes</p>
                        </div><!-- quotes-hght -->
                      </div>
                    </div>
                  </div><!-- qotes-img -->
                </a>

            </div><!-- quotes-home -->
          </div>
          @php
          $i++;
          @endphp
          @endif
          @endforeach

          <div class="col-md-12">
              <a class="nav-link login viewAll" href="{{route('topics50')}}"><span>View All</span></a>
          </div>

        </div><!-- row -->
      </div><!-- container -->
    </div><!-- quoteslok-quotes-main -->



    <div class="quoteslok-tabs">
        <div class="container">
            <div class="quoteslok-tabs-menu navbar-nav-scroll">
                <ul>
                    <li><a class="active" href="#all" id="all">All</a></li>
                    <li><a href="#popular" id="popular">Popular Quotes</a></li>
                    <li><a href="#">Most Loved Quotes</a></li>
                    <li><a href="#">Trending Quotes</a></li>
                </ul>
            </div><!-- /.quoteslok-tabs-menu -->
        </div><!-- /.container -->
    </div><!-- /.quoteslok-tabs -->


    <div class="masonry-wrapper">
    <div class="container" id="all">
        <ul class="grid effect-2" id="grid">
              
          @foreach($quotes as $quote)
          <li>
              <a href="{{url('poster/'.$quote->id)}}">
                <img class="w-100" src="{{URL::asset('images/quotes/'.$quote->image)}}">
              </a>
              <div class="masonry-quotes-box">
                  <div class="masonry-quotes-icon">
                      <div class="heart">

                      @if(!empty(Session::get('user')) && $user=Session::get('user'))
                        @if(!empty($fav) && in_array($quote->id, $fav))
                        <span id="myHeart" onclick="changeHeart({{$quote->id}});"><i class="fa fa-heart active" aria-hidden="true"></i>
                        @else
                        <span id="myHeart" onclick="changeHeart({{$quote->id}});"><i class="fa fa-heart" aria-hidden="true" ></i></span>
                        @endif
                     @else
                     	<span class="btn321" ><i class="fa fa-heart" aria-hidden="true" style="color:#cccccc;"></i></span>
                     @endif

                        
                      </div>
                      <div class="share-collection">
                      @if(!empty(Session::get('user')) && $user=Session::get('user'))
                        @if(!empty($coll) && in_array($quote->id, $coll))
                        <a class="addcollection"  data-toggle="modal"  data-id="{{$quote->id}}" data-dismiss= "modal" ><i class="fa fa-plus-circle active" aria-hidden="true"></i></a>
                        @else
                        <a href="#mycollectionsubmit" data-toggle="modal" class="addcollection"  data-id="{{$quote->id}}" data-dismiss= "modal" ><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                        @endif
                      @else
                     	<span class="btn123" ><i class="fa fa-plus-circle" aria-hidden="true" style="color:#cccccc;"></i></span>
                     @endif
                        <i class="fa fa-share quotelink" aria-hidden="true"></i>
                      </div>
                  </div><!-- /.masonry-quotes-icon -->

                  <div class="masonry-content">
                    <p>{{$quote->description}}</p>
                    <a  class="quotelink" href="{{url('people-innerside/'.$quote->people->id)}}"><h6>{{$quote->people->name}}</h6></a>
                  </div><!-- /.masonry-content -->

                  <div class="masonry-related-links">
                        @php
                        $i=1;
                        $value=count($quote->topics);
                        @endphp
                        @foreach($quote->topics as $relatedtopic)
                        <a class="quotelink" href="{{url('topics_related/'.$relatedtopic->topicname->id)}}">{{$relatedtopic->topicname->topic_name}}  @if($i!=$value),@endif</a>
                        @php
                        $i++;
                        @endphp
                        @endforeach
                  </div><!-- /.masonry-related-links -->
              </div><!-- /.masonry-quotes-box -->
              
          </li>
          @endforeach
            </ul><!-- /.grid -->
    </div><!-- /.container -->
</div><!-- /.masonry-wrapper -->

<div class="clearfix"></div>





<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script>
var globalVariable;
$('.addcollection').click(function(){
    globalVariable=$(this).data('id');
    var quoteid=$(this).attr('id');
    $("#approve_id").val(quoteid); 
    $("#mycollectionsubmit").modal('show');      
})
</script>
    

<div class="modal fade modal-center bd-example-modal-lm forgot" id="mycollectionsubmit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                 </button>
                 <h5 class="header">You want add this quote on the collection</h5>
                     <div class="form-group" style="margin: 25px 0px;">
                        @foreach($collections as $collname)
                        <input type="checkbox"  onclick="changePlus({{$collname->id}});"  style="border-right:none;" value="{{$collname->id}}">{{$collname->collectionname}}<br>
                        @endforeach

                    </div>
            </div>
      <p style="border-top:1px solid #f3f3f3;text-align:center;padding:15px;">

                        <a href="{{url('profile')}}"  class="login_modal_forgot">Back to profile page</a>
      </p>
        </div>
    </div>
</div><!--End forgot -->



@endsection
@section('js')

 @if(!empty(Session::get('error_code')) && Session::get('error_code') == 1)

<script>
$('document').ready(function() {
$(function() {

      $('#sign_social').modal('show');

});
});

</script>

@endif

@if(!empty(Session::get('error_code')) && Session::get('error_code') == 8)

<script>
$('document').ready(function() {
$(function() {

      $('#login').modal('show');

});
});

</script>

@endif

 @if(!empty(Session::get('error_code')) && Session::get('error_code') == 2)

<script>
$('document').ready(function() {
$(function() {

      $('#passwordwrong').modal('show');

});
});

</script>

@endif

 @if(!empty(Session::get('error_code')) && Session::get('error_code') == 3)

<script>
$('document').ready(function() {
$(function() {

      $('#emailwrong').modal('show');

});
});

</script>

@endif

 @if(!empty(Session::get('error_code')) && Session::get('error_code') == 4)

<script>
$('document').ready(function() {
$(function() {

      $('#forgotpassword').modal('show');

});
});

</script>

@endif

 @if(!empty(Session::get('error_code')) && Session::get('error_code') == 5)

<script>
$('document').ready(function() {
$(function() {

      $('#something').modal('show');

});
});

</script>

@endif

 @if(!empty(Session::get('error_code')) && Session::get('error_code') == 7)

<script>
$('document').ready(function() {
$(function() {

      $('#verifyemail').modal('show');

});
});

</script>

@endif


    <script src="{{URL::asset('js/typeahead.min.js')}}"></script>
<script>
    $(document).ready(function(){
    $('input.typeahead').typeahead({
        name: 'typeahead',
        remote:'search?key=%QUERY',
        limit : 30
    });
});
    </script>
@endsection
