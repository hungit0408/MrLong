@extends('main.home')
@section('title','Your Cart')
@section('content')
<!-- HOME SLIDER -->

	<div class="cart-title-area">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="car-header-title">
						<h2>Giỏ hàng</h2>
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
							<li>Giỏ hàng </li>
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
			@if(Session::has('status'))
			  <div class="alert alert-success">
			    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			    {{Session::get('status')}}
			  </div>
			@endif
			<div class="row">
				<div class="col-md-12">
					<form action="" method="POST">				
						<div class="table-content table-responsive">
							<table>
								<thead>
									<tr>
										<th class="product-thumbnail">Hình ảnh</th>
										<th class="product-name">Sản phẩm </th>
										<th class="product-price">Giá tiền</th>
										<th class="product-quantity">Số lượng</th>
										<th class="product-subtotal">Tổng tiền</th>
										<th class="product-remove">Remove</th>
									</tr>
								</thead>
								<tbody>
									@if(session('cart') != null)
									@foreach(session('cart') as $product)
									<tr>
										<td class="product-thumbnail"><a href="{{route('product_view',['id'=>$product['id']])}}"><img src="{{url('/')}}/upload/{{$product['image']}}" alt="" /></a></td>
										<td class="product-name"><a href="{{route('product_view',['id'=>$product['id']])}}">{{$product['name']}}</a></td>
										<td class="product-price"><span class="amount">{{$product['price']}}</span></td>
										<td class="product-quantity"><input type="number" name="{{$product['id']}}" value="{{$product['quantity']}}" pattern="" title=""/></td>
										<td class="product-subtotal">{{$product['quantity']*$product['price']}}</td>
										<td class="product-remove"><a href="{{route('remove_cart',['id'=>$product['id']])}}"><i class="fa fa-times"></i></a></td>
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
									<input type="submit" value="Cập nhật giỏ hàng" />
									<a href="#">Tiếp tục mua hàng</a>
								</div>
								<div class="coupon">
									<h3>Voucher</h3>
									<p>Nhập mã phiếu giảm giá của bạn nếu bạn có.</p>
									<input type="text" placeholder="Nhập mã khuyến mại" />
									<input type="submit" value="Áp dụng phiếu giảm giá" />
								</div>
							</div>
							<div class="col-md-4 col-sm-5">
								<div class="cart_totals">
									<h2>Tổng số giỏ hàng</h2>
									<table>
										<tbody>
											<tr class="cart-subtotal">
												<th>Tổng số lượng</th>
												<td><span class="amount">{{cart_value(session('cart'))}}</span></td>
											</tr>
											<tr class="shipping">
												<th>Phí Shipping</th>
												<td>
													<ul id="shipping_method">
														<li>
															<input type="radio" />
															<label>
																Giá shipping: <span class="amount">15.000VNĐ/KM</span>
															</label>
														</li>
														<li>
															<input type="radio" />
															<label>
																Free shipping<span class="amount">Hóa đơn từ 500K</span>
															</label>
														</li>
														<li></li>
													</ul>
													
												</td>
											</tr>
											<tr class="order-total">
												<th>Tổng tiền</th>
												<td>
													<strong><span class="amount">{{cart_value(session('cart'))}} VNĐ</span></strong>
												</td>
											</tr>											
										</tbody>
									</table>
									<div class="wc-proceed-to-checkout">
										<a href="{{route('checkout')}}">Kiểm tra trước khi xử lý</a>
									</div>
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