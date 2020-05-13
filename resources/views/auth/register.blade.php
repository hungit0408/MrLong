@extends('main.admin')
@section('content')
	<div class="container">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<form action="" method="POST" role="form">
				<legend>Đăng kí</legend>
			
				<div class="form-group">
					<label for="">Tên</label>
					<input type="text" class="form-control" name="name" id="" placeholder="Input field">
					@if($errors->has('name'))
					<div class="help-block">
						{{$errors->first('name')}}
					</div>
					@endif
					<label for="">Email</label>
					<input type="email" class="form-control" name="email" id="" placeholder="Input field">
					@if($errors->has('email'))
					<div class="help-block">
						{{$errors->first('email')}}
					</div>
					@endif
					<label for="">Phone</label>
					<input type="number" class="form-control" name="phone" id="" placeholder="Input field">
					@if($errors->has('phone'))
					<div class="help-block">
						{{$errors->first('phone')}}
					</div>
					@endif
					<label for="">Password</label>
					<input type="password" class="form-control" name="password" id="" placeholder="Input field">
					@if($errors->has('password'))
					<div class="help-block">
						{{$errors->first('password')}}
					</div>
					@endif
					<label for="">Xác nhận lại  Password</label>
					<input type="password" class="form-control" name="confirm_password" id="" placeholder="Input field">
					@if($errors->has('confirm_password'))
					<div class="help-block">
						{{$errors->first('confirm_password')}}
					</div>
					@endif
					<label for="">Địa chỉ</label>
					<input type="text" class="form-control" name="address" id="" placeholder="Input field">
					@if($errors->has('address'))
					<div class="help-block">
						{{$errors->first('address')}}
					</div>
					@endif
					<label for="">Group name</label>
					<input type="text" class="form-control" name="group_name" id="" placeholder="Input field">
					@if($errors->has('group_name'))
					<div class="help-block">
						{{$errors->first('group_name')}}
					</div>
					@endif
				</div>
				@csrf
				<button type="submit" class="btn btn-primary">Gửi</button>
			</form>
		</div>
	</div>
@stop