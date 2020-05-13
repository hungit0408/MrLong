@extends('main.admin')
@section('title','Admin add banner')
@section('content')
	<form action="" method="POST" class="form" role="form" enctype="multipart/form-data">
		<h3>Add banner</h3>
		<div class="form-group">
			<label >Banner Name</label>
			<input type="text" class="form-control" id="" value="{{$ban->name}}" name="name"  >
		</div>
		@if($errors->has('name'))
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{$errors->first('name')}}
		</div>
		@endif
		<div class="form-group">
			<label>Category</label>
			<select name="category_id" id="input" class="form-control" required="required">
				@foreach($cat as $cats)
				<option value="{{$cats->id}}" @if($cats->id==$ban->category_id) {{'selected'}} @endif >{{$cats->name}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label >Text 1</label>
			<input type="text" class="form-control" id="" name="text1" value="{{$ban->text1}}" >
		</div>


		@if($errors->has('text1'))
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{$errors->first('text1')}}
		</div>
		@endif

		<div class="form-group">
			<label >Text 2</label>
			<input type="text" class="form-control" id="" name="text2" value="{{$ban->text2}}" >
		</div>
		

		@if($errors->has('text2'))
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{$errors->first('text2')}}
		</div>
		@endif

		<div class="form-group">
			<label >Text 3</label>
			<input type="text" class="form-control" id="" name="text3" value="{{$ban->text3}}" >
		</div>
		

		@if($errors->has('text3'))
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{$errors->first('text3')}}
		</div>
		@endif

		<div class="form-group">
			<label >Text 4</label>
			<input type="text" class="form-control" id="" name="text4" value="{{$ban->text4}}" >
		</div>
		

		@if($errors->has('text4'))
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{$errors->first('text4')}}
		</div>
		@endif

		<div class="form-group">
			<label >ảnh banner</label>
			<input type="file" class="form-control" id="" name="img"  >
		</div>
		
		@if($errors->has('img'))
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{$errors->first('img')}}
		</div>
		@endif


		<div class="card-body border-top">
		    <h4>Status</h4>
	        <label class="custom-control custom-radio">
	            <input type="radio" name="status" value="0" class="custom-control-input" @if($ban->status==0) checked="checked" @endif><span class="custom-control-label">Active</span>
	        </label>
	        <label class="custom-control custom-radio custom-control-inline">
	            <input type="radio" name="status" value="1" class="custom-control-input" @if($ban->status==1) checked="checked" @endif><span class="custom-control-label">Disable</span>
	        </label>
		</div>
		
		{{csrf_field()}}
		<button type="submit" class="btn btn-primary">Submit</button>

		protected $fillable=['name','category_id','description','image','price','sale_price','status'];
	</form>
	
@stop