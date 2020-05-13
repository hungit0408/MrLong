@extends('main.admin')
@section('title','Admin Edit Category')
@section('content')
	<form action="" method="POST" class="form" role="form">
		Edit Category
		<div class="form-group">
			<label >Tên danh mục</label>
			<input id="inputDefault" type="text" name="name" value="{{$cat->name}}" placeholder="Category name"  class="form-control">
		</div>

		@if($errors->has('name'))
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{$errors->first('name')}}
		</div>
		@endif
		
		<div class="form-group">
            <label for="input-select">Lựa chọn danh mục cha</label>
            <select class="form-control" id="input-select" name="parent" required="required">
                <option value="0">None</option>
                @foreach($cates as $cate)
                <option value="{{$cate->id}}" @if($cate->id==$cat->parent) {{'selected'}} @endif >{{$cate->name}}</option>
                @endforeach
            </select>
        </div>
		
		<div class="card-body border-top">
		    <h4>Status</h4>
	        <label class="custom-control custom-radio">
	            <input type="radio" name="status" value="1" class="custom-control-input" @if($cat->status==1) checked="checked" @endif><span class="custom-control-label">Active</span>
	        </label>
	        <label class="custom-control custom-radio custom-control-inline">
	            <input type="radio" name="status" value="0" class="custom-control-input" @if($cat->status==0) checked="checked" @endif><span class="custom-control-label">Disable</span>
	        </label>
		</div>
		
		{{csrf_field()}}
		<button type="submit" class="btn btn-primary">Update</button>
	</form>
	
@stop