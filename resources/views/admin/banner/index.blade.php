@extends('main.admin')
@section('title','Admin Banner page')
@section('content')
	<form action="" method="GET" class="form-inline" role="form">
	
		<div class="form-group">
			<label class="sr-only" for="">Gia tri tim kiem</label>
			<input type="text" class="form-control" id="" name="_search" placeholder="Nhap gia tri tim kiem" value="{{request()->_search}}">
		</div>
		<button type="submit" class="btn btn-primary">Gửi</button>
		<a href="{{route('admin.banner.add')}}" class="btn btn-info" title="">thêm mới</a>
		
	</form>
	<table class="table table-hover">
		<thead>
			<tr>
				<th width="5%">Số</th>
				<th width="10%">Tên banner</th>
				<th width="10%">danh mục</th>
				<th width="10%">Hình ảnh</th>
				<th width="10%">Text 1</th>
				<th width="10%">Text 2</th>
				<th width="10%">Text 3</th>
				<th width="10%">Text 4</th>
				<th width="10%">Trạng thái</th>
				<th width="5%">Xóa </th>
				<th width="5%">sửa</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($banners as $banner): ?>
			<tr>
				<td>{{$banner['id']}}</td>
				<td>{{$banner['name']}}</td>.
				<td>{{$banner['category_id']}}</td>
				<td><img width="100%" src="{{url('upload/banners')}}/{{$banner['image']}}" title=""></a></td>
				<td>{{$banner['text1']}}</td>
				<td>{{$banner['text2']}}</td>
				<td>{{$banner['text3']}}</td>
				<td>{{$banner['text4']}}</td>
				<td>{{($banner['status']==0)?'Active':'Disabled'}}</td>
				<th><a href="{{route('admin.banner.del',['id'=>$banner['id']])}}" class="btn  "title="" onclick="return confirm('Bạn có chắc chắn?')"><i class="fa fa-trash" aria-hidden="true"></i></a></th>
				<th><a href="{{route('admin.banner.edit',['id'=>$banner['id']])}}" class="btn  "title="" onclick="return confirm('Bạn có chắc chắn không?')"><i class="far fa-edit"></i></a></th>
			</tr>	
		<?php endforeach ?>
		</tbody>
	</table>
	{{ $banners->appends(request()->only('_search'))->links() }}
	
@stop