@extends('main.home')
@section('title','Order Success')
@section('content')
<div class="cart-title-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="car-header-title">
					<h1>ĐƠN HÀNG XỬ LÝ THÀNH CÔNG</h1>
				</div>
			</div>
		</div>
	</div>
</div>

<br>
<!-- order-success-area start -->
<div class="checkout-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-9">		
				<h2>ĐƠN HÀNG ĐÃ ĐƯỢC GỬI TỚI MAIL CỦA BẠN</h2>
				<br>
				<h2>Cảm ơn bạn đã tin tưởng mua sắm !</h2>
				<br>
				@if(isset($order_id))
				<p>Your order # is <a href="" title="">{{$order_id}}</a></p>
				<p>Billing Address</p>
				<p>Shipping Address</p>
				<p>Click <a href="{{route('ViewInvoice',['id'=>$order_id])}}" title="">để</a> xem hóa đơn của mình</p>
				@endif 
			</div>	
				<div class="col-lg-3 col-md-3">
					<a href="{{route('index')}}" class="btn btn-info" title=""><h3>TIẾP TỤC MUA SẮM</h3></a>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- checkout-area end -->
@stop