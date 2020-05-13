@extends('main.admin')
@section('title','Admin add banner')
@section('content')
	<form action="" method="POST" class="form" role="form" enctype="multipart/form-data">
		<h3>Add banner</h3>
		<div class="form-group">
			<label >Tên Banner </label>
			<input type="text" class="form-control" id="" name="name"  >
		</div>
		@if($errors->has('name'))
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{$errors->first('name')}}
		</div>
		@endif
		<div class="form-group">
			<label>Danh mục</label>
			<select name="category_id" id="input" class="form-control" required="required">
				<option value=""></option>
				@foreach($cat as $cats)
				<option value="{{$cats->id}}">{{$cats->name}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label >Text 1</label>
			<input type="text" class="form-control" id="" name="text1"  >
		</div>


		@if($errors->has('text1'))
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{$errors->first('text1')}}
		</div>
		@endif

		<div class="form-group">
			<label >Text 2</label>
			<input type="text" class="form-control" id="" name="text2"  >
		</div>
		

		@if($errors->has('text2'))
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{$errors->first('text2')}}
		</div>
		@endif

		<div class="form-group">
			<label >Text 3</label>
			<input type="text" class="form-control" id="" name="text3"  >
		</div>
		

		@if($errors->has('text3'))
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{$errors->first('text3')}}
		</div>
		@endif

		<div class="form-group">
			<label >Text 4</label>
			<input type="text" class="form-control" id="" name="text4"  >
		</div>
		

		@if($errors->has('text4'))
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{$errors->first('text4')}}
		</div>
		@endif

		<div class="form-group">
			<label >Ảnh Banner </label>
			<input type="file" class="form-control" id="" name="img"  >
		</div>
		
		@if($errors->has('img'))
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{$errors->first('img')}}
		</div>
		@endif


		<div class="card-body border-top">
		    <h4>Trạng thái</h4>
	        <label class="custom-control custom-radio">
	            <input type="radio" name="status" value="0" class="custom-control-input" checked="checked"><span class="custom-control-label">Active</span>
	        </label>
	        <label class="custom-control custom-radio custom-control-inline">
	            <input type="radio" name="status" value="1" class="custom-control-input"><span class="custom-control-label">Disable</span>
	        </label>
		</div>
		
		{{csrf_field()}}
		<button type="submit" class="btn btn-primary">Submit</button>

		protected $fillable=['name','category_id','description','image','price','sale_price','status'];
	</form>
	
@stop