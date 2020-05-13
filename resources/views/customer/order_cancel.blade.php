@extends('main.home')
@section('title','Order Success')
@section('content')
<div class="cart-title-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="car-header-title">
					<h1>HỦY ĐƠN HÀNG</h1>
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
				<h2>ĐƠN HÀNG CỦA BẠN ĐÃ ĐƯỢC HỦY SAU KHI PHẢN HỒI CỦA BẠN ĐƯỢC VIẾT !</h2>
				<br>
				<form action="" method="POST" role="form">
					<div class="col-lg-9 col-md-9">
						<div class="checkbox-form">						
							<h4>Hãy cho chúng tôi cảm giác của bạn để chúng tôi có thể phục vụ bạn tốt hơn vào lần tới )</h4>
							<div class="row">
								<div class="order-notes">
									<div class="checkout-form-list">
										<label>PHẢN HỒI VỀ ĐƠN HÀNG</label>
										<textarea id="checkout-mess" name="description" cols="30" rows="10" placeholder="Feedback for your order" required></textarea>
									</div>									
								</div>
							</div>													
						</div>
						<div class="order-button-payment">
							<input type="submit" value="Send feedback" />
						</div>
					</div>
					@csrf
				</form>
		</div>
		<div class="col-lg-3 col-md-3">
			<a href="{{route('index')}}" class="btn btn-info" title=""><h3>TIẾP TỤC MUA SẮM</h3></a>
		</div>
	</div>
</div>
<br>
<br>
<!-- checkout-area end -->
@stop