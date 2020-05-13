@extends('main.admin')
@section('title','Admin Product page')
@section('content')
	<form action="" method="POST" class="form-inline" role="form">
		<h2>Tìm kiếm sản phẩm</h2>
		<div class="form-group">
			<label class="sr-only" for="">label</label>
			<input type="text" class="form-control" name="_search" value="{{request()->_search}} "id="" placeholder="Input field">
		</div>
		@csrf()
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
	<a href="{{route('admin.product.update')}}" class="btn btn-warning"title="">Cập nhật thành công !!!!</a>
<!-- 	@if(Session::has('fail'))
<div class="alert alert-warning">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>{{Session::get('fail')}}</strong>
</div>
@endif

@if(Session::has('success'))
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>{{Session::get('success')}}</strong>
</div>
@endif -->

	<table class="table table-hover">
		<thead>
			<tr>
				<th width="5%">Số TT</th>
				<th width="10%">name</th>
				<th width="15%">tên danh mục</th>
				<th width="20%">Hình ảnh</th>
				<th width="10%">Giá </th>
				<th width="10%">Giảm giá</th>
				<th width="5%">Trạng thái</th>
				<th width="5%">Trạng thái nổi bật </th>
				<th width="5%"> </th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($products as $product): ?>
			<tr>
				<td>{{$product['id']}}</td>
				<td>{{$product['name']}}</td>
				<td>{{$cat[$product['category_id']]->name}}</td>
				<td><img width="50%" src="{{url('upload')}}/{{$product['image']}}" title=""></a></td>
				<td>{{$product['price']}}</td>
				<td>{{$product['sale_price']}}</td>
				<td>{{($product['status']==1)?'Active':'Disabled'}}</td>
				<td>{{($product['featured']==1)?'Trên trang chủ':'Không ở trên'}}</td>
				<td><a href="{{route('admin.product.del',['id'=>$product['id']])}}" class="btn"title=""><i class="fa fa-trash" aria-hidden="true"></i></a>
				<td><a href="{{route('admin.product.edit',['id'=>$product['id']])}}" class="btn"title=""><i class="far fa-edit" aria-hidden="true"></i></a>
				<td><a href="{{route('admin.product.viewfeedback',['id'=>$product['id']])}}" class="btn btn-info"title="">XEM PHẢN HỒI</a></td>
			</tr>	
		<?php endforeach ?>
		</tbody>
	</table>
	{{$products->appends(['_search'=>request()->_search])->links()}}
@stop