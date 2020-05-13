@extends('main.home')
@section('title','Welcome to Oriania')
@section('content')
<div class="container">
    <form class="form-horizontal" role="form" method="POST" action="">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2>Đăng ký New User</h2>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="name">Tên</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user"></i></div>
                        <input type="text" name="name" class="form-control" id="name"
                               placeholder="John Doe" autofocus>
                    </div>
                </div>
            </div>
        </div>
        @if($errors->has('name'))
            <div class="alert alert-danger">
            	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            	<!-- Put e-mail validation error messages here -->
            	<strong>{{$errors->first('name')}}</strong>
            </div>         	
        @endif
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="email">Địa chỉ E-Mail</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
                        <input type="email" name="email" class="form-control" id="email"
                               placeholder="you@example.com"  autofocus>
                    </div>
                </div>
            </div>
        </div>
        @if($errors->has('email'))
            <div class="alert alert-danger">
            	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            	<!-- Put e-mail validation error messages here -->
            	<strong>{{$errors->first('email')}}</strong>
            </div>         	
        @endif
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="password">Số điện thoại</label>
            </div>
            <div class="col-md-6">
                <div class="form-group has-danger">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
                        <input type="number" name="phone" class="form-control" id="password"
                               placeholder="Password" >
                    </div>
                </div>
            </div>
        </div>
        @if($errors->has('phone'))
            <div class="alert alert-danger">
            	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            	<!-- Put e-mail validation error messages here -->
            	<strong>{{$errors->first('phone')}}</strong>
            </div>         	
        @endif
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="password">Mật khẩu</label>
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
                <label for="password">Xác nhận mật khẩu</label>
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
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label>Địa chỉ</label>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <div class="">
                		<input type="" name="address" id="input" class="form-control" value="" title="">
                    </div>
                </div>
            </div>
        </div>
        @if($errors->has('address'))
            <div class="alert alert-danger">
            	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            	<!-- Put e-mail validation error messages here -->
            	<strong>{{$errors->first('address')}}</strong>
            </div>         	
        @endif
        <input type="hidden" name="group_name" id="input" class="form-control" value="2"  title="">
        @csrf
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-success"><i class="fa fa-user-plus"></i>Đăng ký</button>
            </div>
        </div>
    </form>
</div>
@stop