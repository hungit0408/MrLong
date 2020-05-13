@extends('main.admin')
@section('title','Admin Order page')
@section('content')
	<form action="" method="GET" class="form-inline" role="form">
	
		<div class="form-group">
			<label class="sr-only" for="">Gia tri tim kiem</label>
			<input type="text" class="form-control" id="" name="_search" placeholder="Nhap gia tri tim kiem" value="{{request()->_search}}">
		</div>
		<button type="submit" class="btn btn-primary">Tìm kiếm</button>
		<a href="{{route('admin.category.add')}}" class="btn btn-info" title="">thêm mới</a>
		
	</form>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Đơn hàng số</th>
				<th>Trạng thái</th>
				<th>Tên khách hàng</th>
				<th>Giá trị đơn hàng</th>
				<th>Ngày xử lý</th>
				<th>Xem đơn hàng</th>
				<th>Xem hóa đơn</th>
				<th>Hành động</th>
			</tr>
		</thead>
		<tbody>
			@if($orders != null)
			@foreach($orders as $key => $order)
			<tr>
				<td><a href="">{{$order['id']}}</a></td>
				@switch($order['status'])
				@case(1)
					<td><a href="">Processing</a></td>
					@break
				@case(2)
					<td><a href="">Delivering...</a></td>
					@break
				@case(3)
					<td><a href="">Delivered</a></td>
					@break
				@default
					<td><a href="">Cancelled</a></td>
				@endswitch
				<td>{{user_name($order['customer_id'])}}</td>
				<td><span class="amount">{{cart_value_by_id($order['id'])}}</span></td>
				<td><span class="amount">20-10-2099</span></td>
				<td><a href="{{route('Vieworder_admin',['id'=>$order['id']])}}">Xem đơn hàng</a></td>
				<td><a href="{{route('ViewInvoice',['id'=>$order['id']])}}">Xem hóa đơn</a></td>
				<td>
					<a href="{{route('admin_order_delivering',['id'=>$order['id']])}}" title="Confirm Order Delivering"><i class="fa fa-check"></i></a>
					<a href="{{route('admin_order_cancel',['id'=>$order['id']])}}" title="Cancel Your Order"><i class="fa fa-times"></i></a>
				</td>
			</tr>
			@endforeach
			@endif
		</tbody>
	</table>
	{{ $orders->appends(request()->only('_search'))->links() }}
	
@stop