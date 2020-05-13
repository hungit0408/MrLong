<?php  
	$categories=[];
	foreach ($cates as $cat) {
		$categories[]=$cat;
	}
	function showcate($categories,$parent=0,$char=''){
		foreach ($categories as $key => $cat) {
			if ($cat['parent']==$parent)
			{
				echo('<option value="'.$cat['id'].'">'.$char.$cat['name'].'</option>');
				echo '<hr>';
				unset($categories[$key]);
				showcate($categories,$cat['id'],$char.'--');
			}
		}
	}
?>
@extends('main.admin')
@section('title','Admin add Category')
@section('content')

	<form action="" method="POST" class="form" role="form">
		Thêm danh mục
		<div class="form-group">
			<label >Tên danh mục</label>
			<input id="inputDefault" type="text" name="name" placeholder="Category name"  class="form-control">
		</div>
		
        <div class="form-group">
            <label for="input-select">Lựa chọn danh mục cha</label>
            <select class="form-control" id="input-select" name="parent" required="required">
                <option value="0">None</option>
                <?php showcate($categories,0,''); ?>
                <!-- @foreach($cates as $cat)
                <option value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach -->
            </select>
        </div>
		
		@if($errors->has('name'))
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{$errors->first('name')}}
		</div>
		@endif
		<div class="card-body border-top">
		    <h4>Status</h4>
	        <label class="custom-control custom-radio">
	            <input type="radio" name="status" value="1" class="custom-control-input" checked="checked"><span class="custom-control-label">Active</span>
	        </label>
	        <label class="custom-control custom-radio custom-control-inline">
	            <input type="radio" name="status" value="0" class="custom-control-input"><span class="custom-control-label">Disable</span>
	        </label>
		</div>
		
		{{csrf_field()}}
		<button type="submit" class="btn btn-primary">Gửi</button>
	</form>
@stop