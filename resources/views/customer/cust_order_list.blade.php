@extends('main.home')
@section('title','Order List')
@section('content')
<!-- HOME SLIDER -->
	<div class="cart-title-area">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="car-header-title">
						<h2>Danh sách đơn hàng</h2>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- breadcrumb-area start -->
	<div class="breadcrumb-area product-breadcrumb">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="breadcrumb">
						<ul>
							<li><a href="index-7.html">Trang chủ <i class="fa fa-angle-right"></i></a></li>
							<li>Danh sách đơn hàng của tôi</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- breadcrumb-area end -->
	<!-- cart-main-area start -->
	<div class="cart-main-area">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					@if(session('status'))
                    <div class="alert alert-warning">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>{{session('status')}}</strong>
                    </div>
                    @endif
					<form action="" method="POST">				
						<div class="table-content table-responsive">
							<table>
								<thead>
									<tr>
										<th class="product-thumbnail">Số đơn hàng</th>
										<th class="product-name">Trạng thái</th>
										<th class="product-name">Giá trị </th>
										<th class="product-price">Ngày xử lý</th>
										<th class="product-quantity">Xem đơn hàng </th>
										<th class="product-subtotal">Xem hóa đơn</th>
										<th class="product-remove">Hành động</th>
									</tr>
								</thead>
								<tbody>
									@if($orders != null)
									@foreach($orders as $key => $order)
									<tr>
										<td class="product-name"><a href="">{{$order['id']}}</a></td>
										@switch($order['status'])
										@case(1)
											<td class="product-name"><a href="">Processing</a></td>
											@break
										@case(2)
											<td class="product-name"><a href="">Delivering...</a></td>
											@break
										@case(3)
											<td class="product-name"><a href="">Delivered</a></td>
											@break
										@default
											<td class="product-name"><a href="">Cancelled</a></td>
										@endswitch
										<td class="product-price"><span class="amount">{{cart_value_by_id($order['id'])}}</span></td>
										<td class="product-price"><span class="amount">20-10-2020</span></td>
										<td class="product-quantity"><a href="{{route('Vieworder',['id'=>$order['id']])}}">Xem đơn hàng</a></td>
										<td class="product-quantity"><a href="{{route('ViewInvoice',['id'=>$order['id']])}}">Xem hóa đơn</a></td>
										<td class="product-remove">
											<a href="{{route('cust_order_delivered',['id'=>$order['id']])}}" title="Confirm Order Delivered"><i class="fa fa-check"></i></a>
											<a href="{{route('cust_order_cancel',['id'=>$order['id']])}}" title="Cancel Your Order"><i class="fa fa-times"></i></a>
										</td>
									</tr>
									@endforeach
									@endif
								</tbody>
							</table>
						</div>
						@csrf
						<div class="row">
							<div class="col-md-8 col-sm-7">
								<div class="buttons-cart">
							
								</div>
								<div class="coupon">
									
								</div>
							</div>
							<div class="col-md-4 col-sm-5">
								<div class="cart_totals">
									<h2>Tổng giá trị đơn hàng của bạn</h2>
									<table>
										<tbody>
											<tr class="order-total">
												<th>Tổng</th>
												<td>
													<strong><span class="amount">{{all_order_value()}}.000 VNĐ</span></strong>
												</td>
											</tr>											
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</form>	
				</div>
			</div>
		</div>
	</div>
	<!-- cart-main-area end -->
@stop