@extends('admin.layouts.app')

@section('css')

<link rel="stylesheet" href="{{URL::asset('admin_theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">


@endsection

@section('content')


  <div class="content-wrapper">

    <section class="content container-fluid">


       <!-- page content starts here -->     

        <div class="content-header content-header1">

           <h1 style="float:left;">View Quotes</h1>
           <span class="search-controls" style="float:right;">
             
             <a href="{{url('admin/add_quotes')}}" class="btn btn-default fill"> Add Data </a>
            </span>

        </div>

           

          <div class="box">

            <!-- /.box-header -->

            <div class="box-body">



              <table id="example1" class="table   table-responsive no-padding video-list1">

                <thead>

                <tr>

                  <th># ID </th>

                  <th>Quote Image </th>

                  <th>Description</th>

                  <th>Author Name</th>

                  <th>Keywords</th>

                  <th>Topic</th>

                  <th>Status</th>

                  <th>Action</th>

                </tr>

                </thead>

                <tbody>

                  @if (!empty($quotes))

                  @foreach($quotes as $d)
                  
                <tr>

                  <td>{{$d->id}}</td>

                  <td><img src="{{URL::asset('images/quotes/'.$d->image)}}" style="width:100px;height:75px;"></td>

                  <td>{{$d->description}}</td>

                  <td>{{$d->people->name}}</td>

                  <td>{{$d->keywords}}</td>

                  <td>

                    {{$d->name}}
                    
                  </td>

                  <td style="text-align:center !important">@if($d->status=='1')<i class="fa fa-check"  style="color:green;font-size:22px;">@else <i class="fa fa-times" style="color:red;font-size:22px;text-align:center"> @endif</i></td>

                  <td>

                    <a href="{{url('/admin/edit_quotes/'.$d->id)}}"><i class="fa fa-pencil"></i>

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

                                        <h4 class="modal-title">Delete Quotes</h4>

                                    </div>

                                <form action="{{url('admin/delete_quotes')}}" method="post">

                                {{csrf_field() }}

                                    <div class="modal-body"> Are you want delete the quotes. </div>

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

                                        <h4 class="modal-title">Publish Quotes in Home Page</h4>

                                    </div>

                                <form action="{{url('admin/publish_quotes')}}" method="post">

                                {{csrf_field() }}

                                    <div class="modal-body"> Are you want publish the Quotes. </div>

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

                                        <h4 class="modal-title">Unpublish Quotes</h4>

                                    </div>

                                <form action="{{url('admin/unpublish_quotes')}}" method="post">

                                {{csrf_field() }}

                                    <div class="modal-body"> Are you want unpublish the Quotes. </div>

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

                        categoryName: {

                            required: true

                        }                        

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