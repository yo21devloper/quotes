@extends('admin.layouts.app')

@section('css') 

@endsection

@section('content')

  <div class="content-wrapper">

    <section class="content container-fluid">



       <!-- page content starts here -->     

        <div class="content-header">

           <h1>Edit Social Link</h1>

       </div>

           

       <div class="box" style="border:none">

          <div class="box-content">

              

            <form class="form-horizontal edit-services"  method="post" action="{{url('admin/update_sociallinks')}}" enctype="multipart/form-data">

                

                 {{ csrf_field()}} 



                <div class="box-body">



                  <div class="form-group">

                    <label >Facebook Link:</label>

                </div>

                    <div class="form-group">

                        <input type="hidden" class="form-control" name="id" value="{{$code->id}}">
                        <input type="text" class="form-control" name="facebook" value="{{$code->facebook}}">
                     </div>

                <div class="form-group">

                    <label >Twitter Link:</label>

                </div>

                   <div class="form-group">

                        <input type="text" class="form-control" name="twitter" value="{{$code->twitter}}">
                     </div>


                 <div class="form-group">

                    <label >Instagran Link:</label>

                </div>

                    <div class="form-group">

                        <input type="text" class="form-control" name="instagram" value="{{$code->instagram}}">
                     </div>
                     
                     
                <div class="form-group">

                    <label >Linkedin Link:</label>

                </div>

                    <div class="form-group">

                        <input type="text" class="form-control" name="linkedin" value="{{$code->pinterest}}">
                     </div>

                <div class="form-group">
                        <label >You Tube Link:</label>
                </div>
              
                    <div class="form-group">

                        <input type="text" class="form-control" name="youtube" value="{{$code->youtube}}">
                     </div>

                <div class="form-group">

                        <label >Vimeo Link:</label>

                </div>

                    <div class="form-group">

                        <input type="text" class="form-control" name="vimeo" value="{{$code->vimeo}}">
                     </div>
                

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

             $(document).ready(function(){

                $('.edit-services').validate({



                    rules: {                       

                        facebook: {

                            required: true

                        },
                        twitter: {

                            required: true

                        },
                        instagram: {

                            required: true

                        },
                        callnow: {

                            required: true

                        },

                    }

                });

            });

        </script>

@endsection

@endsection