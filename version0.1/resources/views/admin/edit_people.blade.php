@extends('admin.layouts.app')

@section('css') 

@endsection

@section('content')

  <div class="content-wrapper">

    <section class="content container-fluid">



       <!-- page content starts here -->     

        <div class="content-header">

           <h1>Edit People Profile</h1>

       </div>

           

       <div class="box" style="border:none">

          <div class="box-content">

              

            <form class="form-horizontal add-category"  method="post" action="{{url('admin/update_people')}}" enctype="multipart/form-data">

                

                 {{ csrf_field()}} 



                <div class="box-body">



                  <div class="form-group">

                    <label>Name:<span class="required"> * </span></label>

                </div>

                    <div class="form-group">

                        <input type="hidden" class="form-control" name="id" value="{{$people->id}}">
                        <input type="text" class="form-control" name="name" value="{{$people->name}}">
                     </div>


                <div class="form-group">

                    <label>Position:<span class="required"> * </span></label>

                </div>

                    <div class="form-group">

                        <input type="text" class="form-control" name="position" value="{{$people->position}}">
                     </div>

                <div class="form-group">

                    <label>Date of Birth:<span class="required"> * </span></label>

                </div>

                    <div class="form-group">

                        <input type="text" class="form-control calendar" placeholder="MM/DD/YYYY" name="date" value="{{$people->date}}" id="datepicker" onchange="myFunction()">
                     </div>

                <div class="form-group">

                    <label >Horoscope:</label>

                </div>

                   <div class="form-group">

                        <input type="text" class="form-control" name="horoscope" id="horoscope" value="{{$people->horoscope}}">
                     </div>
                <div class="form-group">

                    <label >Image:</label>

                </div>

                <div class="form-group">
                    <input type="file" name="image" class="form-control">
                 </div>

                 <div class="form-group">
                    <img src="{{URL::asset('images/people/'.$people->image)}}" style="width:100px;height:75px;">
                 </div>

                 <input type="hidden" name="old_image" class="form-control" value="{{$people->image}}">

              <div class="modal-footer center-btn" style="display: flex;justify-content: center">

                <button type="submit" class="btn btn-default fill pull-left" name="saveBtn" id="saveBtn">Save</button>

                <button type="button" class="btn btn-default outline pull-left" data-dismiss="modal" onclick="history.go(-1);">Cancel</button>

              </div>

          </form>

            



          </div><!-- /.box-content -->

        </div><!-- box -->

      <!-- page content ends here -->



    </section><!-- /.content -->

</div><!-- /.content-wrapper -->



@section('js')
<script>
function myFunction() {
    var datepicker = document.getElementById("datepicker").value;
   
   var zodiac = ''; 

   var datepicker1 = new Date(datepicker);
   var month = datepicker1.getMonth()+1;    
   var day = datepicker1.getDate();

   if ( ( month == 3 && day > 20 ) || ( month == 4 && day < 20 ) ) 
    { 
      zodiac = "Aries"; 
    } 
   else if ( ( month == 4 && day > 19 ) || ( month == 5 && day < 21 ) ) { zodiac = "Taurus"; } 
   else if ( ( month == 5 && day > 20 ) || ( month == 6 && day < 21 ) ) { zodiac = "Gemini"; } 
   else if ( ( month == 6 && day > 20 ) || ( month == 7 && day < 23 ) ) { zodiac = "Cancer"; } 
   else if ( ( month == 7 && day > 22 ) || ( month == 8 && day < 23 ) ) { zodiac = "Leo"; } 
   else if ( ( month == 8 && day > 22 ) || ( month == 9 && day < 23 ) ) { zodiac = "Virgo"; } 
   else if ( ( month == 9 && day > 22 ) || ( month == 10 && day < 23 ) ) { zodiac = "Libra"; } 
   else if ( ( month == 10 && day > 22 ) || ( month == 11 && day < 22 ) ) { zodiac = "Scorpio"; } 
   else if ( ( month == 11 && day > 21 ) || ( month == 12 && day < 22 ) ) { zodiac = "Sagittarius"; } 
   else if ( ( month == 12 && day > 21 ) || ( month == 1 && day < 20 ) ) { zodiac = "Capricorn"; } 
   else if ( ( month == 1 && day > 19 ) || ( month == 2 && day < 19 ) ) { zodiac = "Aquarius"; } 
   else if ( ( month == 2 && day > 18 ) || ( month == 3 && day < 21 ) ) { zodiac = "Pisces"; } 
 
    console.log(datepicker1);
    console.log(zodiac);

     document.getElementById('horoscope').value = zodiac;
}

</script>
<script>

             $(document).ready(function(){

                $('.add-category').validate({



                    rules: {                       

                        name: {

                            required: true

                        },
                        position: {

                            required: true

                        },
                        horoscope: {

                            required: true

                        },
                        
                        date: {

                            required: true
                        },                        

                    }

                });

            });

        </script>

@endsection

@endsection