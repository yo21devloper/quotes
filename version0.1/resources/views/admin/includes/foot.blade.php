<script src="{{URL::asset('admin_theme/js/jquery.min.js')}}"></script>

<script src="{{URL::asset('admin_theme/js/bootstrap.min.js')}}"></script>

<!-- fullCalendar -->

<script src="{{URL::asset('admin_theme/js/moment.js')}}"></script>

<script src="{{URL::asset('admin_theme/js/fullcalendar.min.js')}}"></script>

<script src="{{URL::asset('admin_theme/js/modernizr.js')}}"></script>

<script src="{{URL::asset('admin_theme/js/jquery.timepicker.js')}}"></script>

<script src="{{URL::asset('admin_theme/js/bootstrap-datepicker.min.js')}}"></script>

<script src="{{URL::asset('admin_theme/js/perfect-scrollbar.js')}}"></script>

<script src="{{URL::asset('admin_theme/js/main.js')}}"></script>

<script src="{{URL::asset('admin_theme/js/jquery.validate.min.js')}}" type="text/javascript"></script>

<script src="{{URL::asset('admin_theme/js/additional-methods.min.js')}}" type="text/javascript"></script>

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