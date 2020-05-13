@extends('main.home')
@section('content')

<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Đăng nhập</a>
							</div>
							<div class="col-xs-6">
								<a href="{{route('cust_register')}}" id="register-form-link">Đăng ký</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="" method="POST" role="form" style="display: block;">
									<div class="form-group">
										<input type="email" name="email" class="form-control" placeholder="Email" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" class="form-control" placeholder="Password">
									</div>
									<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Remember Me</label>
									</div>
									@if(Session::has('error'))
									<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										<strong>Sai thong tin dang nhap</strong> 
									</div>
									@endif
									@if(Session::has('success'))
									<div class="alert alert-info">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										<strong>{{Session::get('success')}}</strong> 
									</div>
									@endif
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="{{route('forgot_pass')}}" tabindex="5" class="forgot-password">Forgot Password?</a>
												</div>
											</div>
										</div>
									</div>
					
									{{csrf_field()}}
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- <div class="container">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<form action="" method="POST" role="form">
				<legend>Login form</legend>
			
				<div class="form-group">
					<label for="">Email</label>
					<input type="email" class="form-control" name="email" id="" placeholder="Input field">
					<label for="">Password</label>
					<input type="password" class="form-control" name="password" id="" placeholder="Input field">
				</div>
				<input type="text" name="_token" value="{{csrf_token()}}" placeholder="">
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div> -->

@stop