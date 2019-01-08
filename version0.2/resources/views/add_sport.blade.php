@extends('layouts.app')

@section('css') 

<link rel="stylesheet" type="text/css" href="{{URL::asset('css/pignose.calendar.min.css')}}"/> 
<link rel="stylesheet" type="text/css" href="{{URL::asset('wickedpicker/dist/wickedpicker.min.css')}}">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<script src="{{URL::asset('tinymce/js/tinymce/tinymce.min.js')}}"></script>
  <script>
  tinymce.init({
    mode : "specific_textareas",
    editor_selector : 'tinymce'
  });
  </script>

<style>
    .error_msg{ color: red; }
</style>
@endsection

@section('content')

  <div class="content-wrapper">
    <section class="content container-fluid">
       <!-- page content starts here -->     
        <div class="content-header">
           <h1>Add Sport</h1>
        </div>
        <div class="box" style="border:none">
          <div class="box-content">
                <form class="form-horizontal add-sport"  method="post" action="{{route('submit_sport')}}" enctype="multipart/form-data">
                    {{ csrf_field()}} 
                    <div class="box-body">
                        <div class="form-group">
                            <label >Sport Name:<span class="required"> * </span></label>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="SportName" id="SportName">

                        </div>

                    </div>

                    <div class="box-body">
                        <div class="form-group">
                            <label >Sport Type:<span class="required"> * </span></label>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="SportType" id="SportType">

                        </div>

                    </div>

                    <div class="box-body">
                        <div class="form-group">
                            <label >Start Date:<span class="required"> * </span></label>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control input-calendar" name="StartDate">
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="form-group">
                            <label >Start Time:<span class="required"> * </span></label>
                        </div>
                        <div class="form-group">
                                <input type="text" name="StartTime" class="form-control timepicker" id="StartTime"/>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="form-group">
                            <label >End Time:<span class="required"> * </span></label>
                        </div>
                        <div class="form-group">
                                <input type="text" name="EndTime" class="form-control timepicker"/>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="form-group">
                            <label >Address:</label>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="Address" style="height:100px;"></textarea>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="form-group">
                            <label >Description:</label>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="Description" style="height:100px;"></textarea>
                        </div>
                    </div>

                    <div class="input_fields_wrap box-body">
    					
    					<div class="form-group">
    						<label >Team:</label>
    					</div>
    					<div class="form-group">
    						<input type="text" class="form-control" name="Team[]">
    					</div>
    					
    					<div class="form-group">
    						<label >Logo:</label>
    					</div>
    					<div class="form-group">
    						<input type="file" class="form-control" name="Logo[]">
    					</div>
					</div>
    					<div class="form-group">
    						<button class=" btn btn-default fill pull-left add_field_button">Add More Fields</button>
    					</div>

                    
                    <div class="box-body">
                        <div class="form-group">
                            <label >Banner Image:</label>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="BannerImg" type="file" >
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="form-group">
                            <label >Buy Ticket Url:</label>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="BuyTicketURL" style="height:100px;"></textarea>
                        </div>
                    </div>

                        <div class="modal-footer center-btn" style="display: flex;justify-content: center">
                        <button type="submit" class="btn btn-default fill pull-left" name="saveBtn" id="saveBtn">Update</button>
                        <button type="button" class="btn btn-default outline pull-left" data-dismiss="modal" onclick="history.go(-1);">Cancel</button>
                        </div>

                </form>
            </div><!-- /.box-content -->
        </div><!-- box -->
      <!-- page content ends here -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->



@section('js')
<script src="{{ URL::asset('/js/jquery.validate.min.js')}}" type="text/javascript"></script>

<script src="{{ URL::asset('/js/additional-methods.min.js')}}" type="text/javascript"></script>

<script>
$(document).ready(function(){


                $('.add-sport').validate({

                    rules: {                       

                        SportName: {
                           required: true,
                        },
                        SportType: {
                           required: true,
                        },
                        StartDate: {

                           required: true,

                        },
                        StartTime: {

                           required: true,

                        },
                        EndTime: {

                           required: true,
                        },
                        
                        Address:{
                            required: true,
                        },
                        Description:{
                            required: true,
                        },
                        BannerImg:{
                            required: true,
                        },
                        BuyTicketURL:{
                            required: true,
                        },
                        "Team[]":"required",
                        "Logo[]":"required",
                    }

                });
});
</script>

<script>
	$(document).ready(function() {
	var max_fields      = 10; //maximum input boxes allowed
	var wrapper   		= $(".input_fields_wrap"); //Fields wrapper
	var add_button      = $(".add_field_button"); //Add button ID
	
	var x = 1; //initlal text box count
	$(add_button).click(function(e){ //on add input button click
		e.preventDefault();
		if(x < max_fields){ //max input box allowed
			x++; //text box increment
			$(wrapper).append('<div><div class="form-group"><label >Team:</label></div><div class="form-group"><input type="text" class="form-control" name="Team[]" value=""></div><div class="form-group"><label >Logo:</label></div><div class="form-group"><input type="file" class="form-control" name="Logo[]" value=""></div><a href="#" class="remove_field">Remove</a></div>'); //add input box
		}
	});
	
	$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault(); $(this).parent('div').remove(); x--;
	})
});

</script>

<script>
    $(function () {
        
       
                    function onApplyHandler(date, context) 
                    {
                        var $element = context.element;
                        var $calendar = context.calendar;
                        var $box = $element.siblings('.box').show();
                        var text = 'You applied date ';

                        if (date[0] !== null) {
                            text += date[0].format('YYYY-MM-DD');
                        }

                        if (date[0] !== null && date[1] !== null) {
                            text += ' ~ ';
                        }
                        else if (date[0] === null && date[1] == null) {
                            text += 'nothing';
                        }

                        if (date[1] !== null) {
                            text += date[1].format('YYYY-MM-DD');
                        }

                        $box.text(text);
                    }

                            var today = new Date();
                            var dd = today.getDate()-1;
                            var mm = today.getMonth()+1; //January is 0!
                            var yyyy = today.getFullYear();

                            if(dd<10) {
                                dd = '0'+dd
                            } 

                            if(mm<10) {
                                mm = '0'+mm
                            } 

                            today = yyyy + '-' + mm + '-' + dd ;
                            // Input Calendar
                            $('.input-calendar').pignoseCalendar({
                                apply: onApplyHandler,
                                buttons: true, // It means you can give bottom button controller to the modal which be opened when you click.
                                disabledRanges: [
                                    ['1970-01-01', today],
                                ]
                            });

                    });
</script>

<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script>
    $(document).ready(function(){
    $('input.timepicker').timepicker({});

});


    $('.eventStartTimetimepicker').timepicker({
    timeFormat: 'h:mm p',
    interval: 30,
    minTime: '0',
    maxTime: '11:45pm',
    defaultTime: document.getElementById("eventStartTime").value,
    startTime: document.getElementById("eventStartTime").value,
    dynamic: false,
    dropdown: true,
    scrollbar: true
});

    $('.eventEndTimetimepicker').timepicker({
    timeFormat: 'h:mm p',
    interval: 30,
    minTime: '0',
    maxTime: '11:45pm',
    defaultTime: document.getElementById("eventEndTime").value,
    startTime: document.getElementById("eventEndTime").value,
    dynamic: false,
    dropdown: true,
    scrollbar: true
});
    </script>

<script type="text/javascript" src="{{URL::asset('js/pignose.calendar.full.min.js')}}"></script>


@endsection

@endsection