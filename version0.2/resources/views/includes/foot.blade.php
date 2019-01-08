<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{!! asset('bower_components/jquery/dist/jquery.min.js') !!}"></script>
<script src="{!! asset('bower_components/bootstrap/dist/js/bootstrap.min.js') !!}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- fullCalendar -->
<script src="{!! asset('bower_components/moment/moment.js') !!}"></script>
<script src="{!! asset('dist/js/modernizr.js') !!}"></script>
<script src="{!! asset('dist/js/main.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/jquery.toast.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/jquery.validate.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/additional-methods.min.js') !!}"></script>

@if (session('success'))
	<script type="text/javascript">
		$.toast({
			heading: 'Success',
			text: '{{ session('success') }}',
			showHideTransition: 'slide',
			position: 'bottom-right',
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
$(document).ready(function(){
  var pathname = window.location.pathname;
  var pathArray = pathname.split( '/' );
  var slug = pathArray[pathArray.length - 1];
  console.log(pathArray[pathArray.length - 1]);
  var selector = '.sidebar-menu li';
  //$(selector).on('click', function(){
      $(selector).removeClass('active');
      $('#side-'+slug).addClass('active');
  //});
});
</script>
<!-- <script>
  $(document).ready(function(){
    //$(document).on('click','#submit-login',function(){    
    var OneSignal = window.OneSignal || [];
    console.log(OneSignal);
    OneSignal.push(function() {
      OneSignal.getUserId(function(userId) {
      var path={!! json_encode(url('/')) !!}; 
      $.ajax({
        url:path+"/player_id_session",
        method:"POST",
        data:{"_token":"{{ csrf_token() }}","id":userId},
        success:function(data){
        }
      });
    });

    });
    //});
  });
</script>
 -->
 <script>
$(function(){

    //call a function to handle file upload on select file
    $('#inputFile').on('change', fileUpload);
});

function fileUpload(event){

    //get selected file
    files = event.target.files;

    //form data check the above bullet for what it is  
    var data = new FormData(); 
        var file = files[0];
            data.append('file', file, file.name);
            //create a new XMLHttpRequest
            var xhr = new XMLHttpRequest();       
            //post file data for upload
            xhr.open('POST', 'change_profile', true);  
            xhr.send(data);
}
</script>

<script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#image_upload_preview').attr('src', e.target.result);
                    $('#image_upload_preview1').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#inputFile").change(function() {
            $(".pp-images").addClass("imgshow");
            $(".pp-images").addClass("imgshow1");
            readURL(this);
        });
        $(".removePic").click(function() {
            $("#image_upload_preview").attr('src', 'http://206.189.126.187/districtmaid/public/admin/img/avtar-img.png');
            $("#image_upload_preview1").attr('src', 'http://206.189.126.187/districtmaid/public/admin/img/avtar-img.png');
            $(".pp-images").removeClass("imgshow1");
        });
    </script>
<script>
    $(".removePic").click(function() {
            $.ajax({
                type: "POST",
                url: "remove_pic",
                data: {_token: '{{csrf_token()}}' },
                success: function(data) {
        }
    });
            });
</script>