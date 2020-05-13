@extends('main.admin')
@section('content')

<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="col-md-12">
						    <h2>Reset password</h2>
						    <hr>
						</div>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="" method="POST" role="form" style="display: block;">
									<div class="form-group">
										<input type="email" name="email" class="form-control" placeholder="Please enter your Email" value="">
									</div>
									@if($errors->has('email'))
									<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										<strong>{{$errors->first('email')}}</strong> 
									</div>
									@endif
									@if(Session::has('success'))
									<div class="alert alert-info">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										<strong>{{Session::get('success')}}</strong> 
									</div>
									@endif
									@if(Session::has('fail'))
									<div class="alert alert-info">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										<strong>{{Session::get('fail')}}</strong> 
									</div>
									@endif
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Submit">
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