@extends('main.admin')
@section('title','Admin password change')
@section('content')
<div class="container">
    <form class="form-horizontal" role="form" method="POST" action="">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2>Change password</h2>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="password">Old Password</label>
            </div>
            <div class="col-md-6">
                <div class="form-group has-danger">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
                        <input type="password" name="current_password" class="form-control" id="password"
                               placeholder="Password" >
                    </div>
                </div>
            </div>
        </div>
        @if($errors->has('current_password'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <!-- Put e-mail validation error messages here -->
                <strong>{{$errors->first('current_password')}}</strong>
            </div>          
        @endif
        
                <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="password">New Password</label>
            </div>
            <div class="col-md-6">
                <div class="form-group has-danger">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
                        <input type="password" name="password" class="form-control" id="password"
                               placeholder="Password" >
                    </div>
                </div>
            </div>
        </div>
        @if($errors->has('password'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <!-- Put e-mail validation error messages here -->
                <strong>{{$errors->first('password')}}</strong>
            </div>          
        @endif

        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="password">Confirm Password</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem">
                            <i class="fa fa-repeat"></i>
                        </div>
                        <input type="password" name="confirm_password" class="form-control"
                               id="password-confirm" placeholder="Password" >
                    </div>
                </div>
            </div>
        </div>
        @if($errors->has('confirm_password'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <!-- Put e-mail validation error messages here -->
                <strong>{{$errors->first('confirm_password')}}</strong>
            </div>          
        @endif
        @csrf
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-success"><i class="fa fa-user-plus"></i>Change</button>
            </div>
        </div>
    </form>
</div>
@stop

