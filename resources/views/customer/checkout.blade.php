@extends('main.home')
@section('title','Order Success')
@section('content')
<div class="cart-title-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="car-header-title">
					<h2>Kiểm tra thông tin</h2>
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
						<li><a href="index-7.html">Trang chủ<i class="fa fa-angle-right"></i></a></li>
						<li>Kiểm tra thông tin</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- breadcrumb-area end -->
<!-- coupon-area start -->
<div class="coupon-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="coupon-accordion">
					<!-- ACCORDION START -->
					<h3>Phản hồi khách hàng? Nhấn vào đây để đăng nhập</h3>
					<div class="coupon-content">
						<div class="coupon-info">
							<p class="coupon-text">Đăng nhập để tự động điền thông tin của bạn</p>
							<form action="#">
								<p class="form-row-first">
									<label>Tên đăng nhập hoặc email<span class="required">*</span></label>
									<input type="text" />
								</p>
								<p class="form-row-last">
									<label>Mật khẩu <span class="required">*</span></label>
									<input type="text" />
								</p>
								<p class="form-row">					
									<input type="submit" value="Login" />
									<label>
										<input type="checkbox" />
										 Nhớ mật khẩu?
									</label>
								</p>
								<p class="lost-password">
									<a href="#">Quên mật khẩu?</a>
								</p>
							</form>
						</div>
					</div>
					<!-- ACCORDION END -->	
					<!-- ACCORDION START -->
					<h3>Có phiếu giảm giá? Nhấn vào đây để nhập mã của bạn</h3>
					<div class="coupon-checkout-content">
						<div class="coupon-info">
							<form action="#">
								<p class="checkout-coupon">
									<input type="text" placeholder="Nhập mã giảm giá" />
									<input type="submit" value="Áp dụng mã giảm giá" />
								</p>
							</form>
						</div>
					</div>
					<!-- ACCORDION END -->						
				</div>
			</div>
		</div>
	</div>
</div>
<!-- coupon-area end -->
<!-- checkout-area start -->
<div class="checkout-area">
	<div class="container">
		<div class="row">
			<form action="" method="POST" role="form">
				<div class="col-lg-6 col-md-6">
					<div class="checkbox-form">						
						<h3>Chi tiết thanh toán</h3>
						<div class="row">
							<div class="col-md-12">
								<div class="country-select">
									<label>Quốc gia<span class="required">*</span></label>
									<select name="country">
									  <option value="vietnam">Viet Nam</option>
									  <option value="usa">USA</option>
									  <option value="thailand">Thailand</option>
									</select> 										
								</div>
							</div>

							<div class="col-md-12">
								<div class="checkout-form-list">
									<label>Họ và tên<span class="required">*</span></label>										
									<input type="text" name="name" value="{{auth::user()->name}}" placeholder="" />
								</div>
							</div>
							<div class="col-md-12">
								<div class="checkout-form-list">
									<label>Địa chỉ<span class="required">*</span></label>
									<input type="text" name="address" value="{{auth::user()->address}}" placeholder="Street address" />
								</div>
							</div>
							<div class="col-md-12">
								<div class="checkout-form-list">
									<label>Thị trấn/Thành phố<span class="required">*</span></label>
									<input type="text" name="town" required placeholder="Thị trấn/Thành phố" />
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="checkout-form-list">
									<label>Địa chỉ Email  <span class="required">*</span></label>										
									<input type="email" value="{{auth::user()->email}}" name="email" placeholder="" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="checkout-form-list">
									<label>Số điện thoại<span class="required">*</span></label>										
									<input type="text" value="{{auth::user()->phone}}"name="phone" placeholder="Postcode / Zip" />
								</div>
							</div>

							<input type="hidden" name="description" value="As your order" placeholder="">
							

							<div class="col-md-12">
								<div class="checkout-form-list create-acc">	
									<input id="cbox" type="checkbox" />
									<label>Tạo một tài khoản?</label>
								</div>
								<div id="cbox_info" class="checkout-form-list create-account">
									<p>Create an account by entering the information below. If you are a returning customer please login at the top of the page.</p>
									<label>Account password  <span class="required">*</span></label>
									<input type="password" placeholder="password" />	
								</div>
							</div>								
						</div>
						<div class="different-address">
								<div class="ship-different-title">
									<h3>
										<label>Gửi hàng đến một địa chỉ khác?</label>
										<input id="ship-box" type="checkbox" />
									</h3>
								</div>
							<div id="ship-box-info" class="row">
								<div class="col-md-12">
									<div class="country-select">
										<label>Quốc gia<span class="required">*</span></label>
										<select>
										  <option value="vietnam">Viet Nam</option>
										  <option value="usa">USA</option>
										  <option value="thailand">Thailand</option>
										</select> 										
									</div>
								</div>
								<div class="col-md-6">
									<div class="checkout-form-list">
										<label>First Name <span class="required">*</span></label>										
										<input type="text" placeholder="" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="checkout-form-list">
										<label>Last Name <span class="required">*</span></label>										
										<input type="text" placeholder="" />
									</div>
								</div>
								<div class="col-md-12">
									<div class="checkout-form-list">
										<label>Tên công ty</label>
										<input type="text" placeholder="" />
									</div>
								</div>
								<div class="col-md-12">
									<div class="checkout-form-list">
										<label>Địa chỉ<span class="required">*</span></label>
										<input type="text" placeholder="Street address" />
									</div>
								</div>
								<div class="col-md-12">
									<div class="checkout-form-list">									
										<input type="text" placeholder="Apartment, suite, unit etc. (optional)" />
									</div>
								</div>
								<div class="col-md-12">
									<div class="checkout-form-list">
										<label>Thành phố /thị trấn<span class="required">*</span></label>
										<input type="text" placeholder="Thị trấn/thành phố" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="checkout-form-list">
										<label>State / Quốc gia <span class="required">*</span></label>										
										<input type="text" placeholder="" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="checkout-form-list">
										<label>Postcode/ Zip <span class="required">*</span></label>										
										<input type="text" placeholder="Postcode / Zip" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="checkout-form-list">
										<label>Địa chỉ Email <span class="required">*</span></label>										
										<input type="email" placeholder="" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="checkout-form-list">
										<label>Phone  <span class="required">*</span></label>										
										<input type="text" placeholder="Postcode / Zip" />
									</div>
								</div>								
							</div>
							<div class="order-notes">
								<div class="checkout-form-list">
									<label>Ghi chú đặt hàng</label>
									<textarea id="checkout-mess" cols="30" rows="10" placeholder="Ghi chú về đơn đặt hàng của bạn, ví dụ ghi chú đặc biệt để giao hàng" ></textarea>
								</div>									
							</div>
						</div>													
					</div>
				</div>	
				<div class="col-lg-6 col-md-6">
					<div class="your-order">
						<h3>Đơn hàng của bạn</h3>
						<div class="your-order-table table-responsive">
							<table>
								<thead>
									<tr>
										<th class="product-name">Sản phẩm</th>
										<th class="product-total">Tổng</th>
									</tr>							
								</thead>
								<tbody>
									@if(session('cart')!=null)
									@foreach(session('cart') as $product)
									<tr class="cart_item">
										<td class="product-name">
											{{$product['name']}} <strong class="product-quantity"> × {{$product['quantity']}}</strong>
										</td>
										<td class="product-total">
											<span class="amount">{{$product['price']*$product['quantity']}}</span>
										</td>
									</tr>
									@endforeach
									@endif
								</tbody>
								<tfoot>
									<tr class="cart-subtotal">
										<th>TỔNG GIỎ HÀNG</th>
										<td><span class="amount">{{cart_value(session('cart'))}}</span></td>
									</tr>
									<tr class="shipping">
										<th>Shipping</th>
										<td>
											<ul>
												<li>
													<input type="radio" />
													<label>
														Shipping: <span class="amount">15.000VNĐ</span>
													</label>
												</li>
												<li>
													<input type="radio" />
													<label>Free Shipping:</label>
												</li>
												<li></li>
											</ul>
										</td>
									</tr>
									<tr class="order-total">
										<th>TỔNG SỐ ĐƠN HÀNG</th>
										<td><strong><span class="amount">{{cart_value(session('cart'))}} VNĐ</span></strong>
										</td>
									</tr>								
								</tfoot>
							</table>
						</div>
						<div class="payment-method">
							<div class="payment-accordion">
								<!-- ACCORDION START -->
								<h3>Chuyển Khoản Trực Tiếp</h3>
								<div class="payment-content">
									<p>Thanh toán trực tiếp vào tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng ID đơn hàng của bạn làm tài liệu tham khảo thanh toán. Đơn hàng của bạn sẽ không được giao cho đến khi tiền được xóa trong tài khoản của chúng tôi</p>
								</div>
								<!-- ACCORDION END -->	
								<!-- ACCORDION START -->
								<h3>Thanh Toán Séc</h3>
								<div class="payment-content">
									<p>Vui lòng gửi séc của bạn đến Tên Cửa hàng, Phố Cửa hàng, Cửa hàng Thị trấn, Cửa hàng Bang / Quận, Mã bưu điện</p>
								</div>
								<!-- ACCORDION END -->	
								<!-- ACCORDION START -->
								<h3>PayPal <img src="{{url('/')}}/public/img/cart/payment.png" alt="" /></h3>
								<div class="payment-content">
									<p>Thanh toán qua PayPal; bạn có thể thanh toán bằng thẻ tín dụng nếu bạn không có tài khoản PayPal.</p>
								</div>
								<!-- ACCORDION END -->									
							</div>
							@csrf
							<div class="order-button-payment">
								<input type="submit" value="Đặt hàng" />
							</div>
							@if(session('status'))
							<div class="alert alert-warning">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<strong>{{session('status')}}</strong>
							</div>
							@endif
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- checkout-area end -->
@stop