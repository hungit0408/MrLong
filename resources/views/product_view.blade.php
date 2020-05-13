@extends('main.home')
@section('title','Welcome to Oriania')
@section('content')
	<!-- breadcrumb-area start -->
	<div class="breadcrumb-area product-breadcrumb">
		<div class="container">
			<div class="breadcrumb">
				<ul>
					<li><a href="index-7.html">Trang chủ<i class="fa fa-angle-right"></i></a></li>
					<li><a href="shop-2.html">Cửa hàng <i class="fa fa-angle-right"></i></a></li>
					<!-- <li><a href="#"> Accessories <i class="fa fa-angle-right"></i></a></li> -->
					<li>{{$product->name}} </li>
				</ul>
			</div>
		</div>
	</div>
	<!-- breadcrumb-area end -->
	<!-- blog-main-area start -->
	<div class="product-main-area">
		<div class="container">
			<div class="row">
				<!-- product-page-photo start -->
				<div class="col-lg-7 col-md-7 col-sm-5">
					<div class="product-page-photo">
						<a href="#"><img src="{{url('/')}}/upload/{{$product->image}}" alt="" /></a>
					</div>
				</div>
				<!-- product-page-photo end -->
				<div class="col-lg-5 col-md-5 col-sm-7">
					<div class="product-page-content">
						<div class="pro-page-title">
							<h1>{{$product->name}}</h1>
							<div class="product-nav">
								<a href="#"><i class="fa fa-angle-left"></i></a>
								<a href="#"><i class="fa fa-angle-right"></i></a>
							</div>
						</div>
						<div class="product-page-rating">
						@for ($i=1;$i<='5';$i++)
							@if($i<=feedback_average($product->id))
							<a href="#"><i class="fa fa-star"></i></a>
							@else
							<a href="#"><i class="fa fa-star-o"></i></a>
							@endif
						@endfor
						{{number_format(feedback_average($product->id),2)}}
						</div>
						<div class="stock-status">
							<p>SALE UP TO </p>
						</div>
						<div class="product-page-price">
							<!-- <span class="old-price">{{$product->price}} VNĐ</span> -->
							<span class="old-price">920.000 VNĐ</span>
							<span class="pro-price">{{$product->price}} VNĐ</span>
						</div>
						<div class="pro-shor-desc">
							<p>{{$product->description}}</p>
						</div>
						<div class="product-total-cart">
							<form action="#">
								<input type="number" value="1" />
								<button type="submit"><a class="add-to-cart @if(!Auth::user()) not-login @else my-btn @endif" href="{{route('add_cart_2',['id'=>$product->id])}}">Thêm vào giỏ</a></button>
							</form>
						</div>
						<div class="product-wishlist">
							<a href="#"><i class="fa fa-heart-o"></i></a>
							<a href="#"><i class="fa fa-toggle-off"></i></a>
						</div>
						<div class="product-meta">
							<span class="posted-in">danh mục:
								<a href="#"> Dress</a>,
								<a href="#"> Kids</a>,
								<a href="#"> Shoes</a>.
							</span>
							<span class="tag-in">Thẻ tag :
								<a href="#"> Hot</a>,
								<a href="#"> Flash Sale</a>!
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="product-share-icon">
						<a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
						<a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
						<a class="pinterest" href="#"><i class="fa fa-pinterest"></i></a>
						<a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a>
						<a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="product-tab">
						<div>
						  <!-- Nav tabs -->
						  <ul class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Mô tả</a></li>
							<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Đánh giá sản phẩm ({{$product_feedback->count()}})</a></li>
						  </ul>

						  <!-- Tab panes -->
						  <div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="home">
								<div class="product-page-tab-content">
									<p>{{$product->description}}</p>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane" id="profile">
								<div class="product-page-comments">
									@if($product_feedback->count() !=0 )
									<h2>Có {{$product_feedback->count()}} đánh giá về {{$product->name}}</h2>
									@foreach($product_feedback as $feedback)
									<ul>
										<li>
											<div class="product-comments comment">
												<!-- <img src="" alt="" /> -->
												<img src="{{url('/')}}/public/img/blog/comments/2.jpg" alt="" />
												<div class="product-comments-content">
													<p><strong>{{$feedback->name}}</strong> -
														<span>{{$feedback->created_at}}:</span>
														<span class="pro-comments-rating">
															@for ($i = 1; $i <= 5; $i++)
															@if($i<=$feedback->rating) 
															<i class="fa fa-star" style="color: #FFD21D"></i>
															@else
															<i class="fa fa-star"></i>								
															@endif
															@endfor								
														</span>
													</p>
													<div class="desc">
														{{$feedback->feedback}}
													</div>
													@if ((Auth::user()->group_name==0)or(Auth::user()->email==$feedback->email))
													<a href="{{route('del_feedback',['id'=>$feedback->id])}}" title="" onclick="return confirm('Are you sure want to delete this feedback?')"><i class="fa fa-window-close" aria-hidden="true"></i></a>
													@endif
												</div>
											</div>
										</li>
									</ul>
									@endforeach
									@else
									<h2>0 bình luận về  {{$product->name}}</h2>
									@endif

									<div class="review-form-wrapper">
										<h3>Thêm đánh giá về sản phẩm</h3>
										<form action="" id="frm1" method="POST" role="form">
											<input type="text" name="name" placeholder="your name"/>
											@if($errors->has('name'))
											<div class="alert alert-danger">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
												<strong>{{$errors->first('name')}}</strong>
											</div>
											@endif
											<input type="email" name="email" placeholder="your email"/>
											@if($errors->has('email'))
											<div class="alert alert-danger">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
												<strong>{{$errors->first('email')}}</strong>
											</div>
											@endif
											<input type="hidden" id="rating" name="rating" value="" placeholder="">
											<div class="your-rating">
												<h5>Đánh giá của bạn</h5>
												<span onclick="setrating(2)" id="rate2">
													<a href="javascript:void(0);"><i class="fa fa-star"></i></a>
													<a href="javascript:void(0);"><i class="fa fa-star"></i></a>
												</span>
												<span onclick="setrating(3)" id="rate3"> 
													<a href="javascript:void(0);"><i class="fa fa-star"></i></a>
													<a href="javascript:void(0);"><i class="fa fa-star"></i></a>
													<a href="javascript:void(0);"><i class="fa fa-star"></i></a>
												</span>
												<span onclick="setrating(4)" id="rate4">
													<a href="javascript:void(0);"><i class="fa fa-star"></i></a>
													<a href="javascript:void(0);"><i class="fa fa-star"></i></a>
													<a href="javascript:void(0);"><i class="fa fa-star"></i></a>
													<a href="javascript:void(0);"><i class="fa fa-star"></i></a>
												</span>
												<span onclick="setrating(5)" id="rate5">
													<a href="javascript:void(0);"><i class="fa fa-star"></i></a>
													<a href="javascript:void(0);"><i class="fa fa-star"></i></a>
													<a href="javascript:void(0);"><i class="fa fa-star"></i></a>
													<a href="javascript:void(0);"><i class="fa fa-star"></i></a>
													<a href="javascript:void(0);"><i class="fa fa-star"></i></a>
												</span>
											</div>
											@if($errors->has('rating'))
											<div class="alert alert-danger">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
												<strong>{{$errors->first('rating')}}</strong>
											</div>
											@endif
											<textarea id="product-message" name="feedback" cols="30" rows="10" placeholder="Đánh giá của bạn"></textarea>
											@if($errors->has('feedback'))
											<div class="alert alert-danger">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
												<strong>{{$errors->first('feedback')}}</strong>
											</div>
											@endif
											<input type="hidden" name="product_id" value="{{$product->id}}" placeholder="">
											@csrf
											<input type="submit" value="Gửi" />
										</form>
									</div>
								</div>
							</div>
						  </div>
						</div>					
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- blog-main-area end -->
	<!-- features-area start -->
	<div class="features-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="section-heading">
						<h3>Sản phẩm liên quan</h3>
					</div>
				</div>
			</div>	
			<div class="row">
				<div class="features-curosel">
					@foreach($products_related as $pro)
					<!-- single-features start -->
					<div class="col-md-3">
						<div class="single-features">
							<div class="product-img">
								<a href="#">								
									<img class="first-img" src="{{url('/')}}/upload/{{$pro->image}}" alt="" />
									<img class="second-img" src="{{url('/')}}/upload/{{$pro->image}}" alt="" />
								</a>
								<a class="modal-view" href="#" data-toggle="modal" data-target="#productModal{{$pro->id}}">Xem nhanh</a>
								<div class="action-buttons">
									<a class="add-to-cart" href="{{route('add_cart',['id'=>$pro->id])}}"><i class="fa fa-shopping-cart"></i> <span>Thêm vào giỏ</span></a>
									<a class="favourite" href="#"><i class="fa fa-heart-o"></i></a>
									<a class="compare" href="#"><i class="fa fa-toggle-off"></i></a>
								</div>
							</div>
							<div class="product-content">
								<div class="pro-rating">
									<a href="#"><i class="fa fa-star"></i></a>
									<a href="#"><i class="fa fa-star"></i></a>
									<a href="#"><i class="fa fa-star"></i></a>
									<a href="#"><i class="fa fa-star"></i></a>
								</div>
								<h5><a href="#">{{$pro->name}}</a></h5>
								<span class="pro-price">{{$pro->price}}</span>
							</div>
						</div>
					</div>
					<!-- single-features end -->
					@endforeach
					
				</div>
			</div>	
		</div>
	</div>
	<!-- features-area end -->	
@stop

@section('quickviewproduct')

<div id="quickview-wrapper">
	@foreach ($products_related as $pro)
	<!-- Modal -->
	<div class="modal fade" id="productModal{{$pro->id}}" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<div class="modal-product">
						<div class="product-images">
							<div class="main-image images">
								<img alt="" src="{{url('/')}}/upload/{{$pro->image}}">
							</div>
						</div><!-- .product-images -->
						
						<div class="product-info">
							<h1>{{$pro->name}}</h1>
							<div class="price-box">
								<p class="price"><span class="special-price"><span class="amount">{{$pro->price}}</span></span></p>
							</div>
							<a href="{{route('product_view',['id'=>$pro->id])}}" class="see-all">Xem tất cả đồ hot</a>
							<div class="quick-add-to-cart">
								<form method="post" class="cart">
									<div class="numbers-row">
										<input type="number" id="french-hens" value="1">
									</div>
									<button class="single_add_to_cart_button" type="submit">Thêm vào giỏ</button>
								</form>
							</div>
							<div class="quick-desc">
								{{$pro->description}}
							</div>
							<div class="social-sharing">
								<div class="widget widget_socialsharing_widget">
									<h3 class="widget-title-modal">Chia sẻ sản phẩm </h3>
									<ul class="social-icons">
										<li><a target="_blank" title="Facebook" href="#" class="facebook social-icon"><i class="fa fa-facebook"></i></a></li>
										<li><a target="_blank" title="Twitter" href="#" class="twitter social-icon"><i class="fa fa-twitter"></i></a></li>
										<li><a target="_blank" title="Pinterest" href="#" class="pinterest social-icon"><i class="fa fa-pinterest"></i></a></li>
										<li><a target="_blank" title="Google +" href="#" class="gplus social-icon"><i class="fa fa-google-plus"></i></a></li>
										<li><a target="_blank" title="LinkedIn" href="#" class="linkedin social-icon"><i class="fa fa-linkedin"></i></a></li>
									</ul>
								</div>
							</div>
						</div><!-- .product-info -->
					</div><!-- .modal-product -->
				</div><!-- .modal-body -->
			</div><!-- .modal-content -->
		</div><!-- .modal-dialog -->
	</div>
	<!-- END Modal -->
	@endforeach
</div>

<script>
	function setrating(i)
	{
		frm=document.forms['frm1'];
		frm1.rating.value=i;
		for(var x = 2; x<=5 ;x++){
			rate=document.getElementById('rate'+x);
			console.log(rate.innerHTML);
			rate.innerHTML="";
			if (x == i)
			{
				for(var j = 2; j<=x+1 ; j++)
				{
					console.log(x);
					rate.innerHTML+='<i class="fa fa-star">';
				}
			}else
			{
				for(var j = 2; j<=x+1 ; j++)
				{
					console.log(x);
					rate.innerHTML+='<a href="javascript:void(0);"><i class="fa fa-star"></i></a>';
				}
			}
			console.log(rate.innerHTML);
		}
		console.log(rate);
		frm.rate.value=i;
	}

	filterComment();
	//loc comment
	function filterComment()
	{
		setInterval(() => {
			var filterWorld = ["con cho","concho", "fuck","ngu vkl",];
			var listComment = document.querySelectorAll('.comment');
			
			var rgx = new RegExp(filterWorld.join("|"), "gi");
			function workFilter(str)
			{
				return str.replace(rgx, "**********");
			}


			for(let i=0; i<listComment.length; i++)
			{
				listComment[i].childNodes[5].getElementsByClassName("desc")[0].textContent
				= workFilter(listComment[i].childNodes[5].getElementsByClassName("desc")[0].textContent.trim());
			}
		}, 50);
	}

</script>
@stop