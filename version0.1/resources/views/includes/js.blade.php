    <script src="{{URL::asset('js/jquery.min.js')}}"></script>
    <script src="{{URL::asset('js/popper.min.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('js/modernizr.custom.js')}}"></script>
    <script src="{{URL::asset('js/masonry.pkgd.min.js')}}"></script>
    <script src="{{URL::asset('js/imagesloaded.js')}}"></script>
    <script src="{{URL::asset('js/classie.js')}}"></script>
    <script src="{{URL::asset('js/AnimOnScroll.js')}}"></script>
    <script src="{{URL::asset('js/custom.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.1/jquery.toast.min.js"></script>



@if (session('success'))



<script type="text/javascript">



$.toast({



    heading: 'Success',



    text: '{{ session('success') }}',



    showHideTransition: 'slide',



    position: 'top-right',



    stack: 2,



    icon: 'success'



});



</script>



@php



	session()->forget('success');



@endphp



@endif







@if (session('error'))



<script type="text/javascript">



$.toast({



    heading: 'Error',



    text: '{{ session('error') }}',



    position: 'bottom-right',



    stack: 2,



    icon: 'error',



    loader: true,        // Change it to false to disable loader



    loaderBg: '#9EC600'  // To change the background



})



</script>



@php



	session()->forget('error');



@endphp



@endif



<script>
    $(".btn321").click(function() {
    $("#loginplease").modal("show");
    });

</script>

<script>
    $(".btn123").click(function() {
    $("#loginplease").modal("show");
    });

</script>


<script>
function changeHeart($quoteid) {
  var id = $quoteid;
    $.ajax({
                type: "POST",
                url: "http://206.189.126.187/quotes/public/myfavoritesubmit",
                data: {'quoteid' : id,_token: '{{csrf_token()}}' },
                success: function(data) {

if(data == 'success')
{
$.toast({



    heading: 'Success',



    text: 'Quote add successfully on your favorite list',



    showHideTransition: 'slide',



    position: 'top-right',



    stack: 2,



    icon: 'success'



});
}
else if(data == 'error')
{

$.toast({



    heading: 'Success',



    text: 'Quote remove from your favorite list successfully ',



    showHideTransition: 'slide',



    position: 'top-right',



    stack: 2,



    icon: 'success'



});
  
}

else if(data == 'error_code')
{
    $(function() {

      $('#loginplease').modal('show');

});
    
}
                }
    });
    console.log($quoteid);
}
</script>


<script>
function changePlus($collectionid) {
    var collectionid = $collectionid;
    console.log(collectionid);
    var quotesid = globalVariable;
    console.log(quotesid);
    $.ajax({
                type: "POST",
                url: "http://206.189.126.187/quotes/public/mycollectionsubmit",
                data: {'quoteid' : quotesid,'collectionid':collectionid, _token: '{{csrf_token()}}' },
                success: function(data) {

if(data == 'success')
{
$.toast({



    heading: 'Success',



    text: 'Quote add successfully on your collection list',



    showHideTransition: 'slide',



    position: 'top-right',



    stack: 2,



    icon: 'success'



});
}
else if(data == 'error')
{

$.toast({



    heading: 'Success',



    text: 'Quote remove from your collection list successfully ',



    showHideTransition: 'slide',



    position: 'top-right',



    stack: 2,



    icon: 'success'



});
  
}

else if(data == 'error_code')
{
    $(function() {

      $('#loginplease').modal('show');

});

}
                }
    });
    console.log(quotesid);
}
</script>



