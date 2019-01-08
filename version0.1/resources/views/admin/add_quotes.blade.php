@extends('admin.layouts.app')

@section('css') 

<link rel="stylesheet" type="text/css" href="{{URL::asset('js/jquery.dropdown.css')}}">
<style>
        li.dropdown-option.dropdown-chose
        {
            background-color: #053aa5;
            color: white;
        }
        span.dropdown-selected
        {
            margin:2px;
        }
        .dropdown-chose-list span:before {
    margin-right: 5px;
}
.dropdown-display .dropdown-chose-list {
    display: -webkit-inline-box;
    word-break: break-all;
    white-space: pre-line;
}

.alert{
    display: inline-block;
    max-width: 100%;
    padding:0px;
    margin-bottom:0px;
    font-weight: 700;
}
    </style>
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


@endsection

@section('content')

  <div class="content-wrapper">

    <section class="content container-fluid">



       <!-- page content starts here -->     

        <div class="content-header">

           <h1>Add Quotes</h1>
            

       </div>

           

       <div class="box" style="border:none">

          <div class="box-content">

              

            <form class="form-horizontal edit-banner"  method="post" action="{{url('admin/submit_quotes')}}" enctype="multipart/form-data">

                

                 {{ csrf_field()}} 



                <div class="box-body">



                  <div class="form-group">

                    <label >Topic:<span class="required"> * </span></label>

                </div>

                    <div class="dropdown-sin-2" style="margin-left:25%;margin-bottom: 10px;width:50%;text-align: center">

                        <select class="form-control" multiple="multiple" id="topic_name" name="topic_id[]" placeholder="select">
                    

                        <option value=""></option>

                        @foreach($topics  as $topic)

                        <option value="{{$topic->id}}">{{$topic->topic_name}}</option>

                        @endforeach
                        
                        </select>

                        
                     </div>

                     <p style="text-align:center;margin-bottom: 0px;"><span class="alert" id="alert" style="color:red"></span></p>
                     

                <div class="form-group">

                    <label >Author Name:<span class="required"> * </span></label>

                </div>

                    <div class="form-group">

                        <select class="form-control" name="people_id">
                        <option value=""></option>
                        @foreach($peoples as $people)
                        <option value="{{$people->id}}">{{$people->name}}</option>
                        @endforeach
                        </select>

                     </div>

                <div class="form-group">

                    <label >Quotes:<span class="required"> * </span></label>

                </div>

                    <div class="form-group">

                         <textarea class="form-control mymce" name="description" style="height:100px;"></textarea>

                     </div>

                <div class="form-group">

                    <label >Quote Image:<span class="required"> * </span></label>

                </div>

                    <div class="form-group">

                        <input type="file" name="image">

                     </div>

                <div class="form-group">

                    <label >Keywords:</label>

                </div>

                    <div class="form-group">

                        <input type="text" class="form-control" name="keywords">

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
                        
                        image:{
                            required: true,
                        },
                    }

                });

             $('.edit-banner').submit(function()
                {
                    var input = $('#topic_name').val();
                    console.log(input);

                    if(input == '')
                    {
                        document.getElementById("alert").innerHTML = "Please choose the topic.";
                        return false;
                    }  
                          
            });

            }); 

        </script>
<script type="text/javascript" src="{{URL::asset('js/mock.js')}}"></script>

  <script src="{{URL::asset('js/jquery.dropdown.js')}}"></script>
          <script> 
    $('.dropdown-sin-2').dropdown({
      input: '<input type="text" maxLength="20" placeholder="Search">'
    });
  </script>

@endsection

@endsection