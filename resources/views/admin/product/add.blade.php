@extends('main.admin')
@section('title','Admin add Product')
@section('content')
	<form action="" method="POST" class="form" role="form" enctype="multipart/form-data">
		Thêm sản phẩm cho cửa hàng
		<div class="form-group">
			<label >Tên sản phẩm</label>
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
			<label >Mô tả cho sản phẩn</label>
			<input type="text" class="form-control" id="" name="description"  >
		</div>

		@if($errors->has('description'))
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{$errors->first('description')}}
		</div>
		@endif

		<div class="form-group">
			<label >Hình ảnh </label>
			<input type="file" class="form-control" id="" name="img"  >
		</div>
		
		@if($errors->has('img'))
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{$errors->first('img')}}
		</div>
		@endif

		<div class="form-group">
			<label >Giá </label>
			<input type="number" class="form-control" id="" name="price"  >
		</div>
		
		@if($errors->has('price'))
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{$errors->first('price')}}
		</div>
		@endif

		<div class="form-group">
			<label >Giá Sale</label>
			<input type="number" class="form-control" id="" name="sale_price"  >
		</div>
		
		@if($errors->has('sale_price'))
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{$errors->first('sale_price')}}
		</div>
		@endif

		<div class="card-body border-top">
		    <h4>Trạng thái</h4>
	        <label class="custom-control custom-radio">
	            <input type="radio" name="status" value="1" class="custom-control-input" checked="checked"><span class="custom-control-label">Active</span>
	        </label>
	        <label class="custom-control custom-radio custom-control-inline">
	            <input type="radio" name="status" value="0" class="custom-control-input"><span class="custom-control-label">Disable</span>
	        </label>
		</div>

		<div class="card-body border-top">
		    <h4>Tình trạng hiện</h4>
	        <label class="custom-control custom-radio">
	            <input type="radio" name="featured" value="1" class="custom-control-input" checked="checked"><span class="custom-control-label">Active</span>
	        </label>
	        <label class="custom-control custom-radio custom-control-inline">
	            <input type="radio" name="featured" value="0" class="custom-control-input"><span class="custom-control-label">Disable</span>
	        </label>
		</div>
		
		{{csrf_field()}}
		<button type="submit" class="btn btn-primary">Submit</button>

		protected $fillable=['name','category_id','description','image','price','sale_price','status'];
	</form>
	
@stop