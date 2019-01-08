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
           <h1>Change Password</h1>
        </div>

        <div class="box" style="border:none">
            <div class="container-fluid" style="padding: 30px;">
                <div class="row">
                    @php
                    $error=json_decode(session('error'));

                    @endphp
                    
                    @if (!empty($error->current_password) && $error->current_password['0'] != '')
                        <div class="alert alert-danger">
                            {{ $error->current_password['0'] }}
                        </div>
                    @endif
                    @if (!empty($error->password) && $error->password['0'] != '')
                        <div class="alert alert-danger">
                            {{ $error->password['0'] }}
                        </div>
                    @endif
                    @if (!empty($error->password_confirmation) && $error->password_confirmation['0'] != '')
                        <div class="alert alert-danger">
                            {{ $error->password_confirmation['0'] }}
                        </div>
                    @endif
                    @if(empty($error->current_password) && empty($error->password) && empty($error->password_confirmation) && !empty(session('error')) )
                    <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                                <form action="{{route('updatepassword')}}" method="post">
                                    {{csrf_field()}}
                                    <div class="row edit-client-detail">
                                        <div class="col-md-3">
                                            <label><strong>Current Password:</strong></label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="password" class="form-control" value="" name="current_password" placeholder="Current Password" />
                                        </div>
                                    </div>
                                    <div class="row edit-client-detail">
                                        <div class="col-md-3">
                                            <label><strong>New Password:</strong></label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="password" name="password" class="form-control" value="" placeholder="New Password" />
                                        </div>
                                    </div>

                                    <div class="row edit-client-detail">
                                        <div class="col-md-3">
                                            <label><strong>Confirm Password:</strong></label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="password" name="password_confirmation" class="form-control" value="" placeholder="Password confirm" />
                                        </div>
                                    </div>

                                    <div class="edit-button">
                                        <a href="{{route('my_profile')}}" class="btn btn-danger no-bg btn-radius no-margin">Cancel</a>
                                        <button type="submit" class="btn btn-danger btn-radius">Save Password</button>
                                    </div>
                                </form>

                                </div>


                </div>
            </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

@endsection