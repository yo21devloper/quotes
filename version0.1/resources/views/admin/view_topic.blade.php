@extends('admin.layouts.app')

@section('css')

<link rel="stylesheet" href="{{URL::asset('admin_theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

@endsection

@section('content')



  <div class="content-wrapper">

    <section class="content container-fluid">



       <!-- page content starts here -->     

        <div class="content-header content-header1">

           <h1 style="float:left;">View Topics</h1>

        </div>





        <div class="box" style="border:none">

          <div class="box-content">

              

            <form class="form-horizontal add-category"  method="post" action="{{url('admin/submit_topic')}}" enctype="multipart/form-data">

                

                 {{ csrf_field()}} 



                <div class="box-body">

                

                <div class="form-group">

                    <label class="col-md-2">Topic Name:<span class="required"> * </span></label>

                      <div class="col-md-3">  

                        <input type="text" name="name" class="form-control">

                      </div>

                      <label class="col-md-2">Topic Image:<span class="required"> * </span></label>

                      <div class="col-md-3">  

                        <input type="file" name="image" class="form-control">

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

                  <th>Topic Name </th>

                  <th>Image</th>

                  <th>Top50</th>

                  <th>Action</th>

                </tr>

                </thead>

                <tbody>

                  @if (!empty($topics))



                  @foreach($topics as $d)



                <tr>

                  <td>{{$d->id}}</td>

                  <td>{{$d->topic_name}}</td>


                  <td><img src="{{URL::asset('images/'.$d->image)}}" style="width:100px;height:75px;"></td>

                  <td style="text-align:center !important">@if($d->top50=='1')<i class="fa fa-check"  style="color:green;font-size:22px;">@else <i class="fa fa-times" style="color:red;font-size:22px;text-align:center"> @endif</i></td>

                  <td>

                    <a href="#edit{{$d->id}}" data-toggle="modal"><i class="fa fa-pencil"></i>

                    </a>

                    <a href="#delete{{$d->id}}" data-toggle="modal"><i class="fa fa-trash"></i></a>

                    @if($d->top50=='0')
                      <a href="#publish{{$d->id}}" data-toggle="modal">
                        <i class="fa fa-check"  style="color:green !important;font-size:22px;"></i>
                      </a>
                    @else 
                      <a href="#unpublish{{$d->id}}" data-toggle="modal">
                          <i class="fa fa-times" style="color:red;font-size:22px;text-align:center"> 
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

                                        <h4 class="modal-title">Delete Topic</h4>

                                    </div>

                                <form action="{{url('admin/delete_topic')}}" method="post">

                                {{csrf_field() }}

                                    <div class="modal-body"> Are you want delete the Topic. </div>

                                    <input type="hidden" name="id" value="{{$d->id}}">

                                    <div class="modal-footer">

                                        <button type="button" class="btn" style="border: 1px solid;background: white;width:80px ! important" data-dismiss="modal">Close</button>

                                        <input type="submit" class="btn green">

                                    </div>

                                </form>

                                </div>

                        </div>

                    </div>



              

                     <!-- Edit Model -->



                                <div class="modal fade" id="edit{{ $d->id }}" tabindex="-1"  aria-hidden="true" role="basic">

                                        <div class="modal-dialog">

                                            <div class="modal-content">

                                                <div class="modal-header">

                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

                                                    <h4 class="modal-title">Edit Topic</h4>

                                                </div>

                                            <form action="{{url('admin/update_topic')}}"  method="post" enctype="multipart/form-data">

                                            {{csrf_field() }}

                                                <div class="modal-body">

                                                    <label >Topic Name:<span class="required"> * </span></label>

                                                </div>

                                                <div class="modal-body"> 

                                                    <input type="text" name="topic_name" class="form-control" value="{{$d->topic_name}}" required="required">

                                                </div>

                                                <div class="modal-body">

                                                <label>Topic Image:</label>

                                                </div>

                                                <div class="modal-body">

                                                  <input type="file" name="image" class="form-control">

                                                </div>

                                                <input type="hidden" name="old_image" value="{{$d->image}}">

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

                                        <h4 class="modal-title">Publish Topic in Top50</h4>

                                    </div>

                                <form action="{{url('admin/publish_topic')}}" method="post">

                                {{csrf_field() }}

                                    <div class="modal-body"> Are you want publish the Topic in Top50. </div>

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

                                        <h4 class="modal-title">Unpublish Topic</h4>

                                    </div>

                                <form action="{{url('admin/unpublish_topic')}}" method="post">

                                {{csrf_field() }}

                                    <div class="modal-body"> Are you want unpublish the Topic in Top50. </div>

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

             $(document).ready(function(){

                $('.add-category').validate({



                    rules: {                       

                        name: {

                            required: true

                        },
                        image:{
                            required: true                          
                        }                        

                    }

                });

            });

        </script>



<script src="{{URL::asset('/admin_theme/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>

<script src="{{URL::asset('/admin_theme/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

<!-- <script src="{{URL::asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script> -->

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

  })

</script>







@endsection

@endsection