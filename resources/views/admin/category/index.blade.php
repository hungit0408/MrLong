@extends('main.admin')
@section('title','Admin Category page')
@section('content')
	<form action="" method="GET" class="form-inline" role="form">
	
		<div class="form-group">
			<label class="sr-only" for="">Gia trị tìm kiếm</label>
			<input type="text" class="form-control" id="" name="_search" placeholder="Nhap gia tri tim kiem" value="{{request()->_search}}">
		</div>
		<button type="submit" class="btn btn-primary">Gửi</button>
		<a href="{{route('admin.category.add')}}" class="btn btn-info" title="">Thêm mới</a>
		
	</form>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>TT</th>
				<th>Tên danh mục</th>
				<th>ID danh mục cha</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($cats as $cat): ?>
			<tr>
				<td>{{$cat['id']}}</td>
				<td>{{$cat['name']}}</td>.
				<td>{{$cat['parent']}}</td>.
				<th><a href="{{route('admin.category.del',['id'=>$cat['id']])}}" class="btn btn-danger "title="" onclick="return confirm('Bạn có chắc chắn?')">Xóa</a></th>
				<th><a href="{{route('admin.category.edit',['id'=>$cat['id']])}}" class="btn btn-info "title="" onclick="return confirm('Bạn có chắc chắn?')">Sửa</a></th>
			</tr>	
		<?php endforeach ?>
		</tbody>
	</table>
	{{ $cats->appends(request()->only('_search'))->links() }}
	
@stop