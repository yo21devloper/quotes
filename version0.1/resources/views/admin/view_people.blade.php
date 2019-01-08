@extends('admin.layouts.app')

@section('css')

<link rel="stylesheet" href="{{URL::asset('admin_theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">


@endsection

@section('content')



  <div class="content-wrapper">

    <section class="content container-fluid">



       <!-- page content starts here -->     

        <div class="content-header content-header1">

           <h1 style="float:left;">View Peoples Profile</h1>

        </div>





        <div class="box" style="border:none">

          <div class="box-content">

              

            <form class="form-horizontal add-category"  method="post" action="{{url('admin/submit_people')}}" enctype="multipart/form-data">

                

                 {{ csrf_field()}} 



                <div class="box-body">

                

                <div class="form-group">

                    <label class="col-md-2">Name:<span class="required"> * </span></label>

                      <div class="col-md-4">  

                        <input type="text" name="name" class="form-control">

                      </div>

                      <label class="col-md-2">Image:<span class="required"> * </span></label>

                      <div class="col-md-4">  

                        <input type="file" name="image" class="form-control">

                      </div>
                  </div>

                  <div class="form-group">

                    <label class="col-md-2">Date Of Birth:<span class="required"> * </span></label>

                    <div class="col-md-4">  

                        <input type="text" class="form-control calendar" placeholder="MM/DD/YYYY" name="date"  id="datepicker" onchange="myFunction()">

                      </div>

                      <label class="col-md-2">Horoscope:<span class="required"> * </span></label>

                    <div class="col-md-4">  

                        <input type="text" class="form-control" name="horoscope" id="horoscope">

                      </div>
                </div>

                  <div class="form-group">

                      <label class="col-md-2">Position:<span class="required"> * </span></label>

                      <div class="col-md-8">  

                        <input type="text" name="position" class="form-control">

                      </div>

                    <input type="submit" class="btn btn-primary col-md-2">

                </div>

               </div>

                 

            </form>

            



          </div><!-- /.box-content -->

        </div><!-- box -->

           

          <div class="box">

            <!-- /.box-header -->

            <div class="box-body">



              <table id="example1" class="table   table-responsive no-padding video-list1">

                <thead>

                <tr>

                  <th># ID </th>

                  <th>Name </th>

                  <th>Image</th>

                  <th>Position</th>

                  <th>Date Of Birth</th>

                  <th>Horoscope</th>

                  <th>Status</th>

                  <th>Action</th>

                </tr>

                </thead>

                <tbody>

                  @if (!empty($peoples))



                  @foreach($peoples as $d)



                <tr>

                  <td>{{$d->id}}</td>

                  <td>{{$d->name}}</td>


                  <td><img src="{{URL::asset('images/people/'.$d->image)}}" style="width:100px;height:75px;"></td>

                  <td>{{$d->position}}</td>

                  <td>{{$d->date}}</td>

                  <td>{{$d->horoscope}}</td>

                  <td style="text-align:center !important">@if($d->status=='1')<i class="fa fa-check"  style="color:green;font-size:22px;">@else <i class="fa fa-times" style="color:red;font-size:22px;text-align:center"> @endif</i></td>

                  <td>

                    <a href="{{url('/admin/edit_people/'.$d->id)}}"><i class="fa fa-pencil"></i>

                    </a>

                    <a href="#delete{{$d->id}}" data-toggle="modal"><i class="fa fa-trash"></i></a>

                    @if($d->status=='0')
                      <a href="#publish{{$d->id}}" data-toggle="modal">
                        <i class="fa fa-check"  style="color:green !important;font-size:22px;"></i>
                      </a>
                    @else 
                      <a href="#unpublish{{$d->id}}" data-toggle="modal">
                          <i class="fa fa-times" style="color:red !important;;font-size:22px;text-align:center"> 
                        </i>
                      </a>
                    @endif

                  </td>

                </tr>

                <!-- Delete Model -->



                    <div class="modal fade" id="delete{{ $d->id }}" tabindex="-1"  aria-hidden="true" role="basic">

                            <div class="modal-dialog modal-sm">

                                <div class="modal-content">

                                    <div class="modal-header">

                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

                                        <h4 class="modal-title">Delete People Profile</h4>

                                    </div>

                                <form action="{{url('admin/delete_people')}}" method="post">

                                {{csrf_field() }}

                                    <div class="modal-body"> Are you want delete the people profile. </div>

                                    <input type="hidden" name="id" value="{{$d->id}}">

                                    <div class="modal-footer">

                                        <button type="button" class="btn" style="border: 1px solid;background: white;width:80px ! important" data-dismiss="modal">Close</button>

                                        <input type="submit" class="btn green">

                                    </div>

                                </form>

                                </div>

                        </div>

                    </div>


                        <div class="modal fade" id="publish{{ $d->id }}" tabindex="-1"  aria-hidden="true" role="basic">

                            <div class="modal-dialog modal-sm">

                                <div class="modal-content">

                                    <div class="modal-header">

                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

                                        <h4 class="modal-title">Publish People in Home Page</h4>

                                    </div>

                                <form action="{{url('admin/publish_people')}}" method="post">

                                {{csrf_field() }}

                                    <div class="modal-body"> Are you want publish the People Profile. </div>

                                    <input type="hidden" name="id" value="{{$d->id}}">

                                    <div class="modal-footer">

                                        <button type="button" class="btn" style="border: 1px solid;background: white;width:80px ! important" data-dismiss="modal">Close</button>

                                        <input type="submit" class="btn green">

                                    </div>

                                </form>

                                </div>

                        </div>

                    </div>


                    <div class="modal fade" id="unpublish{{ $d->id }}" tabindex="-1"  aria-hidden="true" role="basic">

                            <div class="modal-dialog modal-sm">

                                <div class="modal-content">

                                    <div class="modal-header">

                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

                                        <h4 class="modal-title">Unpublish People Profile</h4>

                                    </div>

                                <form action="{{url('admin/unpublish_people')}}" method="post">

                                {{csrf_field() }}

                                    <div class="modal-body"> Are you want unpublish the people profile. </div>

                                    <input type="hidden" name="id" value="{{$d->id}}">

                                    <div class="modal-footer">

                                        <button type="button" class="btn" style="border: 1px solid;background: white;width:80px ! important" data-dismiss="modal">Close</button>

                                        <input type="submit" class="btn green">

                                    </div>

                                </form>

                                </div>

                        </div>

                    </div>



                @endforeach

                @else

                <tr>

                    Data is no exist.

                </tr>

                @endif

                </tfoot>

              </table>

            </div>

            <!-- /.box-body -->

          </div>

      

          <!-- /.box -->

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
                        image: {

                            required: true
                        },
                        date: {

                            required: true
                        },                        

                    }

                });

            });

        </script>



<script src="{{URL::asset('/admin_theme/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>

<script src="{{URL::asset('/admin_theme/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

<script>

  $(function () {

    $('#example1').DataTable()

    $('#example2').DataTable({

      'paging'      : true,

      'lengthChange': false,

      'searching'   : false,

      'ordering'    : true,

      'info'        : true,

      'autoWidth'   : false

    })

  });
 
    
</script>

@endsection

@endsection