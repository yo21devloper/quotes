@extends('admin.layouts.app')

@section('css') 
<link rel="stylesheet" href="{{URL::asset('cropbox/YUI/example/style.css')}}" type="text/css" />
<style>
        .container
        {
            top: 10%; left: 10%; right: 0; bottom: 0;
        }
        .action
        {
            width: 700px;
            height: 30px;
            margin: 10px 0;
        }
        .cropped>img
        {
            margin-right: 10px;
        }
        .imageBox {
            width:700px;
            height: 525px;
        }
        .imageBox .thumbBox{
            width: 300px;
            height: 450px;
            top:0;
            left:0;
            right:0;
            bottom: 0;
            margin: auto;
        }
        @media (max-width:767px){
            .imageBox,
            .action {
                width:450px;
            }
        }
        @media (max-width:576px){
            .imageBox,
            .action {
                width:350px;
            }
        }
    </style>
    <script src="http://yui.yahooapis.com/3.17.2/build/yui/yui-min.js"></script>
    <script src="{{URL::asset('cropbox/YUI/cropbox.js')}}"></script>

@endsection

@section('content')

  <div class="content-wrapper">

    <section class="content container-fluid">



       <!-- page content starts here -->     

        <div class="content-header">

           <h1>Edit Home</h1>
            

       </div>

           

       <div class="box" style="border:none">

          <div class="box-content">

              

            <form class="form-horizontal edit-banner"  method="post" action="{{url('admin/update_home')}}" enctype="multipart/form-data">

                

                 {{ csrf_field()}} 



                <div class="box-body">

                <div class="form-group">

                    <label >Heading:</label>

                </div>

                    <div class="form-group">

                        <input type="text" class="form-control" name="heading" value="{{$home->heading}}">

                     </div>

                <div class="form-group">

                    <label >Paragraph:<span class="required"> * </span></label>

                </div>

                    <div class="form-group">

                         <textarea class="form-control mymce" name="paragraph" style="height:100px;">{{$home->paragraph}}</textarea>

                     </div>

                <div class="form-group">

                    <label >Banner Image:<span class="required"> * </span></label>

                </div>

                    <div class="form-group">

                        <input type="file" name="image">

                     </div>

                <img src="{{URL::asset('img/'.$home->image)}}" style="width:100px;height:75px;">


                <input type="hidden" name="old_image" value="{{$home->image}}">

                <input type="hidden" name="id" value="{{$home->id}}">

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


                $('.edit-banner').validate({

                    rules: {                       

                        topic_id: {

                           required: true,
                        },
                        people_id: {

                           required: true,

                        },
                        description: {

                           required: true,

                        },
                        keywords: {

                           required: true,
                        },
                        
                    }

                });

            });


        </script>

@endsection

@endsection