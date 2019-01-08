@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="http://206.189.126.187/districtmaid/public/admin/css/custom.css">
<style>
.main-header {
    position: relative;
    max-height: 100px;
    z-index: 1030;
    background: #fff;
}
.main-header .logo {
    -o-transition: width 0.3s ease-in-out;
    transition: width 0.3s ease-in-out;
    display: block;
    float: left;
    font-size: 20px;
    line-height: 50px;
    text-align: center;
    width: 320px;
    font-family: 'Montserrat', sans-serif;
    padding: 0 15px;
    font-weight: 300;
    overflow: hidden;
}
.main-sidebar{
    padding-top: 100px;
}
</style>
@endsection

@section('content')
         
 <div class="content-wrapper">
    <section class="content container-fluid">

        <div class="content-header">
           <h1>Edit Profile</h1>
        </div>

        <div class="box" style="border:none">
            <div class="container-fluid" style="padding: 30px;">
                <div class="row">

                            @php
                    $error=json_decode(session('error'));

                    @endphp
                    
                    @if (!empty($error->email) && $error->email['0'] != '')
                        <div class="alert alert-danger">
                            {{ $error->email['0'] }}
                        </div>
                    @endif

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                                <form action="{{route('update_email')}}" method="post">
                                    {{csrf_field()}}
                                    <div class="row edit-client-detail">
                                        <div class="col-md-2">
                                            <label><strong>New E-mail:</strong></label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text"  name="email" class="form-control" value="{{Auth::user()->email}}" placeholder="Enter E-mail" />
                                        </div>
                                    </div>
                                    <div class="row edit-client-detail">
                                        <div class="col-md-2">
                                            <label><strong>New Name:</strong></label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text"  name="name" class="form-control" value="{{Auth::user()->name}}" placeholder="Enter Name" />
                                        </div>
                                    </div>
                                    <div class="edit-button">
                                        <a href="{{route('my_profile')}}" class="btn btn-danger no-bg btn-radius no-margin" >Cancel</a>
                                        <button type="submit" class="btn btn-danger btn-radius">Save E-mail</button>
                                    </div>
                                </form>
                                </div>
            </div>
        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

@endsection