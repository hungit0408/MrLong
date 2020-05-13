@extends('main.admin')
@section('title','Change your info')
@section('content')
<div class="container">
    <form class="form-horizontal" role="form" method="POST" action="">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2>Edit User</h2>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="name">Name</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user"></i></div>
                        <input type="text" name="name" class="form-control" id="name"
                               value="{{$cust->name}}" autofocus>
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
                <label for="email">E-Mail Address</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
                        <input type="email" name="email" class="form-control" id="email"
                               placeholder="you@example.com" value="{{$cust->email}}" autofocus>
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
                <label for="password">Phone</label>
            </div>
            <div class="col-md-6">
                <div class="form-group has-danger">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-address-card"></i></div>
                        <input type="number" name="phone" class="form-control" id="password"
                               placeholder="Password" value="{{$cust->phone}}">
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
                <label>Address</label>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <div class="">
                		<input type="" name="address" id="input" class="form-control" value="{{$cust->address}}" title="">
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
        <input type="hidden" name="group_name" id="input" class="form-control" value="0"  title="">
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