@extends('main.home')
@section('title','Welcome to Oriania')
@section('content')
<!-- HOME SLIDER -->
	<div class="slider-wrap">
		<div class="fullwidthbanner-container" >
			<div class="fullwidthbanner1">
				<ul>
				<!-- SLIDE  -->
					<li data-transition="parallaxtoright,parallaxtoleft" data-slotamount="7" data-masterspeed="600"  data-saveperformance="off" >
						<!-- MAIN IMAGE -->
						<img src="{{url('/')}}/public/img/slider/slider-1/slider1.jpg"  alt="slider1"  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
						<!-- LAYERS -->

						<!-- LAYER NR. 1 -->
						<div class="tp-caption sfl" 
							 data-x="334" 
							 data-y="68"  
							data-speed="1500" 
							data-start="1000" 
							data-easing="easeOutExpo" 
							data-elementdelay="0.1" 
							data-endelementdelay="0.1" 
							 data-endspeed="300" 

							style="z-index: 5;"><img src="{{url('/')}}/public/img/slider/slider-1/img-slider1.png" alt=""> 
						</div>

						<!-- LAYER NR. 2 -->
						<div class="tp-caption title-11 customin tp-resizeme" 
							 data-x="652" 
							 data-y="161"  
							data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:3;scaleY:3;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" 
							data-speed="1000" 
							data-start="2000" 
							data-easing="easeOutExpo" 
							data-splitin="none" 
							data-splitout="none" 
							data-elementdelay="0.1" 
							data-endelementdelay="0.1" 
							 data-endspeed="300" 

							style="z-index: 6; max-width: auto; max-height: auto; white-space: nowrap;">Streetwear meets 80s punk 
						</div>

						<!-- LAYER NR. 3 -->
						<div class="tp-caption title-2 customin tp-resizeme" 
							 data-x="655" 
							 data-y="197"  
							data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:2;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" 
							data-speed="1000" 
							data-start="3000" 
							data-easing="easeOutExpo" 
							data-splitin="none" 
							data-splitout="none" 
							data-elementdelay="0.1" 
							data-endelementdelay="0.1" 
							 data-endspeed="300" 

							style="z-index: 7; max-width: auto; max-height: auto; white-space: nowrap;">New trend 
						</div>

						<!-- LAYER NR. 4 -->
						<div class="tp-caption title-3 customin tp-resizeme" 
							 data-x="661" 
							 data-y="316"  
							data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:2;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" 
							data-speed="1000" 
							data-start="4000" 
							data-easing="easeOutExpo" 
							data-splitin="none" 
							data-splitout="none" 
							data-elementdelay="0.1" 
							data-endelementdelay="0.1" 
							 data-endspeed="300" 

							style="z-index: 8; max-width: 480px; max-height: 78px; white-space: normal;">Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. 
						</div>

						<!-- LAYER NR. 5 -->
						<div class="tp-caption customin" 
							 data-x="950" 
							 data-y="400"  
							data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:2;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" 
							data-speed="500" 
							data-start="4500" 
							data-easing="Power3.easeInOut" 
							data-elementdelay="0.1" 
							data-endelementdelay="0.1" 
							 data-endspeed="300" 

							style="z-index: 9;"><a href="#" target="_blank"><img src="{{url('/')}}/public/img/slider/slider-1/shopping.jpg" alt=""></a> 
						</div>
					</li>
					<?php $num=0; ?>
					@foreach ($banner as $ban)
					<?php $num++; ?>
				<!-- SLIDE  -->
					<li data-transition="parallaxtoright,parallaxtoleft" data-slotamount="7" data-masterspeed="600"  data-saveperformance="off" >
						<!-- MAIN IMAGE -->
						<img src="{{url('upload/banners')}}/{{$ban['image']}}"  alt="slider{{$num}}"  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
						<!-- LAYERS -->

						<!-- LAYER NR. 1 -->
						<div class="tp-caption title-22 tp-fade tp-resizeme" 
							 data-x="350" 
							 data-y="150"  
							data-speed="300" 
							data-start="1500" 
							data-easing="Power3.easeInOut" 
							data-splitin="none" 
							data-splitout="none" 
							data-elementdelay="0.1" 
							data-endelementdelay="0.1" 
							 data-endspeed="300" 

							style="z-index: 5; max-width: auto; max-height: auto; white-space: nowrap;">{{$ban['text1']}} 
						</div>

						<!-- LAYER NR. 2 -->
						<div class="tp-caption home2-title-1 tp-fade tp-resizeme" 
							 data-x="355" 
							 data-y="209"  
							data-speed="300" 
							data-start="2500" 
							data-easing="Power3.easeInOut" 
							data-splitin="none" 
							data-splitout="none" 
							data-elementdelay="0.1" 
							data-endelementdelay="0.1" 
							 data-endspeed="300" 

							style="z-index: 6; max-width: auto; max-height: auto; white-space: nowrap;">{{$ban['text2']}} 
						</div>

						<!-- LAYER NR. 3 -->
						<div class="tp-caption home2-title-2 tp-fade tp-resizeme" 
							 data-x="351" 
							 data-y="283"  
							data-speed="300" 
							data-start="3500" 
							data-easing="Power3.easeInOut" 
							data-splitin="none" 
							data-splitout="none" 
							data-elementdelay="0.1" 
							data-endelementdelay="0.1" 
							 data-endspeed="300" 

							style="z-index: 7; max-width: ; max-height: ; white-space: nowrap;">{{$ban['text3']}} 
						</div>

						<!-- LAYER NR. 4 -->
						<div class="tp-caption tp-fade" 
							 data-x="351" 
							 data-y="334"  
							data-speed="300" 
							data-start="4500" 
							data-easing="Power3.easeInOut" 
							data-elementdelay="0.1" 
							data-endelementdelay="0.1" 
							 data-endspeed="300" 

							style="z-index: 8;"><a href="{{route('cate_show',['id'=>$ban['category_id']])}}" target="_blank"><img src="{{url('/')}}/public/img/slider/slider-1/shopping.jpg" alt=""></a> 
						</div>
					</li>
					@endforeach	
				</ul>
			</div>
		</div>
	</div>
	<!-- HOME SLIDER END -->
	<!-- promotion-area start -->
	<div class="promotion-area">
		<div class="container">
			<div class="row">
				<!-- single-promo start -->
				<div class="col-lg-4 col-md-4 col-sm-4">
					<div class="single-promo">
						<a href="#"><img src="{{url('/')}}/public/img/promotion/1.jpg" alt="" /></a>
					</div>
				</div>
				<!-- single-promo end -->
				<!-- single-promo start -->
				<div class="col-lg-4 col-md-4 col-sm-4">
					<div class="single-promo">
						<a href="#"><img src="{{url('/')}}/public/img/promotion/2.jpg" alt="" /></a>
					</div>
				</div>
				<!-- single-promo end -->
				<!-- single-promo start -->
				<div class="col-lg-4 col-md-4 col-sm-4">
					<div class="single-promo">
						<a href="#"><img src="{{url('/')}}/public/img/promotion/3.jpg" alt="" /></a>
					</div>
				</div>
				<!-- single-promo end -->
			</div>
		</div>
	</div>
	<!-- promotion-area end -->
	<!-- features-area start -->
	<div class="features-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="section-heading">
						<h3>Sản phẩm đặc sắc</h3>
					</div>
				</div>
			</div>	
			<div class="row">
				<div class="features-curosel items">
					@foreach($featured_pro as $product)
					<!-- single-features start -->
					<div class="col-md-3">
						<div class="single-features">
							<div class="product-img">
								<a href="#">								
									<img class="first-img" src="{{url('/')}}/upload/{{$product->image}}" alt="" />
									<img class="second-img" src="{{url('/')}}/upload/{{$product->image}}" alt="" />
								</a>
								<a class="modal-view" href="#" data-toggle="modal" data-target="#productModal{{$product->id}}">Xem nhanh</a>
								<div class="action-buttons">
									<img class="icon" style="position: absolute" src="{{url('/')}}/upload/{{$product->image}}" alt="cart icon">
									<a class="add-to-cart @if(!Auth::user()) not-login @else my-btn @endif" href="{{route('add_cart_2',['id'=>$product->id])}}" data-id="{{$product->id}}"><i class="fa fa-shopping-cart"></i> <span>Thêm vào giỏ</span></a>
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
								<h5><a href="{{route('product_view',['id'=>$product->id])}}">{{$product->name}}</a></h5>
								<span class="pro-price">{{$product->price}} VNĐ</span>
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
	<!-- banner-area start -->
	<div class="banner-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-4">
					<div class="single-banner banner-space">
						<a href="#"><img src="{{url('/')}}/public/img/banner/1.jpg" alt="" /></a>
					</div>
					<div class="single-banner">
						<a href="#"><img src="{{url('/')}}/public/img/banner/2.jpg" alt="" /></a>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4">
					<div class="single-banner banner-space">
						<a href="#"><img src="{{url('/')}}/public/img/banner/3.jpg" alt="" /></a>
					</div>	
					<div class="single-banner">
						<a href="#"><img src="{{url('/')}}/public/img/banner/4.jpg" alt="" /></a>
					</div>					
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4">
					<div class="single-banner banner-space">
						<a href="#"><img src="{{url('/')}}/public/img/banner/5.jpg" alt="" /></a>
					</div>
					<div class="single-banner">
						<a href="#"><img src="{{url('/')}}/public/img/banner/6.jpg" alt="" /></a>
					</div>				
				</div>
			</div>
		</div>
	</div>
	<!-- banner-area end -->
	<!-- category-area start -->
	<div class="category-area">
		<div class="container">	
			<div class="row">
				<div class="sale-curosel1">
					<div class="col-lg-4 col-md-4 col-sm-12">
						<div class="sale-title">
							<h3>Mặt hàng bán chạy</h3>
						</div>					
						<div class="sale-curosel">
							<!-- product start -->
							<div class="single-features">
								<span class="sale-text">Sale</span>
								<div class="product-img">
									<a href="#">
										<img class="first-img" src="{{url('/')}}/public/img/product/3.jpg" alt="" />
										<img class="second-img" src="{{url('/')}}/public/img/product/4.jpg" alt="" />
									</a>
									<a class="modal-view" href="#" data-toggle="modal" data-target="#productModal">Xem nhanh</a>									
									<div class="action-buttons">
										<a class="add-to-cart @if(!Auth::user()) not-login @else my-btn @endif" href="#"><i class="fa fa-shopping-cart"></i> <span>Thêm vào giỏ</span></a>
										<a class="favourite" href="#"><i class="fa fa-heart-o"></i></a>
										<a class="compare" href="#"><i class="fa fa-toggle-off"></i></a>
									</div>
								</div>
								<div class="timer">
									<!-- Đếm thời gian khuyến mãi -->
									<div data-countdown="2020/05/16"></div>
								</div>								
								<div class="product-content">
									<div class="pro-rating">
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star-o"></i></a>
									</div>
									<h5><a href="#">Jean Street Etiam  </a></h5>
									<span class="old-price">230.000 VNĐ</span>
									<span class="pro-price">220.000 VNĐ</span>
								</div>
							</div>
							<!-- product end -->
							<!-- product start -->
							<div class="single-features">
								<span class="sale-text">Sale</span>
								<div class="product-img">
									<a href="#">
										<img class="first-img" src="{{url('/')}}/public/img/product/5.jpg" alt="" />
										<img class="second-img" src="{{url('/')}}/public/img/product/6.jpg" alt="" />
									</a>
									<a class="modal-view" href="#" data-toggle="modal" data-target="#productModal">Xem nhanh</a>
									<div class="action-buttons">
										<a class="add-to-cart @if(!Auth::user()) not-login @else my-btn @endif" href="#"><i class="fa fa-shopping-cart"></i> <span>Thêm vào giỏ</span></a>
										<a class="favourite" href="#"><i class="fa fa-heart-o"></i></a>
										<a class="compare" href="#"><i class="fa fa-toggle-off"></i></a>
									</div>
								</div>
								<div class="timer">
									<div data-countdown="2020/05/15"></div>
								</div>								
								<div class="product-content">
									<div class="pro-rating">
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star-o"></i></a>
									</div>
									<h5><a href="#">Aenean eu tristique</a></h5>
									<span class="old-price">80.00VNĐ</span>
									<span class="pro-price">70.00VNĐ</span>
								</div>
							</div>
							<!-- product end -->
							<!-- product start -->
							<div class="single-features">
								<span class="sale-text">Sale</span>
								<div class="product-img">
									<a href="#">
										<img class="first-img" src="{{url('/')}}/public/img/product/10.jpg" alt="" />
										<img class="second-img" src="{{url('/')}}/public/img/product/11.jpg" alt="" />
									</a>
									<a class="modal-view" href="#" data-toggle="modal" data-target="#productModal">Xem nhanh</a>
									<div class="action-buttons">
										<a class="add-to-cart @if(!Auth::user()) not-login @else my-btn @endif" href="#"><i class="fa fa-shopping-cart"></i> <span>Add to cart</span></a>
										<a class="favourite" href="#"><i class="fa fa-heart-o"></i></a>
										<a class="compare" href="#"><i class="fa fa-toggle-off"></i></a>
									</div>
								</div>
								<div class="timer">
									<div data-countdown="2020/08/20"></div>
								</div>								
								<div class="product-content">
									<div class="pro-rating">
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star-o"></i></a>
									</div>
									<h5><a href="#">Phasellus vel hendrerit</a></h5>
									<span class="old-price">100.000VNĐ</span>
									<span class="pro-price">80.000VNĐ</span>
								</div>
							</div>
							<!-- product end -->
						</div>
					</div>
				</div> 
				<div class="col-lg-8 col-md-8 col-sm-12">
					<div class="category-tab">
						<div>

						  <!-- Nav tabs -->
						  <ul class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Sản phẩm Hot</a></li>
							<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Bán chạy</a></li>
							<li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Top bình chọn</a></li>
						  </ul>

						  <!-- Tab panes -->
						  <div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="home">
								<div class="row">
									<div class="category-curosel">
										<?php $num=0; ?>
										@foreach($new_pro as $product)
										<?php $num+=1; ?>
										@if($num % 3==1)
										<div class="col-md-6">
										@endif
											<!-- single-category-tab start -->
											<div class="single-category-tab">
												<div class="single-features">
													<div class="product-img">
														<a href="{{route('product_view',['id'=>$product->id])}}">
															<img class="first-img" src="{{url('/')}}/upload/{{$product->image}}" alt="" />
															<img class="second-img" src="{{url('/')}}/upload/{{$product->image}}" alt="" />
														</a>
													</div>
													<div class="product-content">
														<div class="pro-rating">
															<a href="#"><i class="fa fa-star"></i></a>
															<a href="#"><i class="fa fa-star"></i></a>
															<a href="#"><i class="fa fa-star"></i></a>
															<a href="#"><i class="fa fa-star"></i></a>
														</div>
														<h5><a href="{{route('product_view',['id'=>$product->id])}}">{{$product->name}}</a></h5>
														<span class="pro-price">{{$product->price}}VNĐ</span>
													</div>
												</div>				
											</div>
											<!-- single-category-tab end -->
										@if($num % 3==0)
										</div>
										@endif
										@endforeach
										
									</div>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane" id="profile">
								<div class="row">
									<div class="category-curosel">
										<?php $num=0; ?>
										@foreach($best_sell_pro as $product)
										<?php $num+=1; ?>
										@if($num % 3==1)
										<div class="col-md-6">
										@endif
											<!-- single-category-tab start -->
											<div class="single-category-tab">
												<div class="single-features">
													<div class="product-img">
														<a href="{{route('product_view',['id'=>$product->id])}}">
															<img class="first-img" src="{{url('/')}}/upload/{{$product->image}}" alt="" />
															<img class="second-img" src="{{url('/')}}/upload/{{$product->image}}" alt="" />
														</a>
													</div>
													<div class="product-content">
														<div class="pro-rating">
															<a href="#"><i class="fa fa-star"></i></a>
															<a href="#"><i class="fa fa-star"></i></a>
															<a href="#"><i class="fa fa-star"></i></a>
															<a href="#"><i class="fa fa-star"></i></a>
														</div>
														<h5><a href="{{route('product_view',['id'=>$product->id])}}">{{$product->name}}</a></h5>
														<span class="pro-price">{{$product->price}}VNĐ</span>
													</div>
												</div>				
											</div>
											<!-- single-category-tab end -->
										@if($num % 3==0)
										</div>
										@endif
										@endforeach
									</div>
								</div>							
							</div>
							<div role="tabpanel" class="tab-pane" id="messages">
								<div class="row">
									<div class="category-curosel">
										<?php $num=0; ?>
										@foreach($best_rate_pro as $product)
										<?php $num+=1; ?>
										@if($num % 3==1)
										<div class="col-md-6">
										@endif
											<!-- single-category-tab start -->
											<div class="single-category-tab">
												<div class="single-features">
													<div class="product-img">
														<a href="{{route('product_view',['id'=>$product->id])}}">
															<img class="first-img" src="{{url('/')}}/upload/{{$product->image}}" alt="" />
															<img class="second-img" src="{{url('/')}}/upload/{{$product->image}}" alt="" />
														</a>
													</div>
													<div class="product-content">
														<div class="pro-rating">
															<a href="#"><i class="fa fa-star"></i></a>
															<a href="#"><i class="fa fa-star"></i></a>
															<a href="#"><i class="fa fa-star"></i></a>
															<a href="#"><i class="fa fa-star"></i></a>
														</div>
														<h5><a href="{{route('product_view',['id'=>$product->id])}}">{{$product->name}}</a></h5>
														<span class="pro-price">{{$product->price}}VNĐ</span>
													</div>
												</div>				
											</div>
											<!-- single-category-tab end -->
										@if($num % 3==0)
										</div>
										@endif
										@endforeach
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
	<!-- category-area end -->
	<!-- testimonial-area start -->
	<div class="testimonial-area">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="testimonial">
						<div class="single-testimonial">
							<!-- testimonial-list start -->
							<div class="testimonial-list">
								<div class="test-content">
									<span><i class="fa fa-quote-left"></i></span>
									<p>Các mặt hàng được hoàn thành tỷ mỉ,sản phẩm đẹp mắt bền đẹp,sáng tạo và đội ngũ bán hàng ,chăm sóc khách hàng nhiệt tình,tận tâm!</p>
								</div>
								<div class="test-img">
									<img src="{{url('/')}}/public/img/testimonial/2.jpg" alt="" />
									<div class="test-author">
										<span class="test-name">Nguyễn Kim thi</span>
										<span class="test-title">CEO of Maketing</span>
									</div>
								</div>							
							</div>
							<!-- testimonial-list end -->
							<!-- testimonial-list start -->
							<div class="testimonial-list">
								<div class="test-content">
									<span><i class="fa fa-quote-left"></i></span>
									<p>Tôi rất hài lòng vào những sản phẩm mà cửa hàng hợp thời trang,hợp phong cách bắt kịp xu hướng mới nhất hiện nay.</p>
								</div>
								<div class="test-img">
									<img src="{{url('/')}}/public/img/testimonial/1.jpg" alt="" />
									<div class="test-author">
										<span class="test-name">Elizabeth Taylor</span>
										<span class="test-title">Nhà thiết kế</span>
									</div>
								</div>							
							</div>
							<!-- testimonial-list start -->

							<!-- testimonial-list start -->
							<div class="testimonial-list">
								<div class="test-content">
									<span><i class="fa fa-quote-left"></i></span>
									<p>Nhưng đôi khi ngay cả những sản phẩm của cửa hàng làm toát lên vẻ đẹp của chính bạn!</p>
								</div>
								<div class="test-img">
									<img src="{{url('/')}}/public/img/testimonial/2.jpg" alt="" />
									<div class="test-author">
										<span class="test-name">Katherine Sullivan</span>
										<span class="test-title">Khách hàng </span>
									</div>
								</div>							
							</div>
							<!-- testimonial-list end -->							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- testimonial-area end -->
	<!-- recent-post-area start -->
	<div class="recent-post-area">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-heading">
						<h3>Bài viết gần đây</h3>
					</div>					
				</div>
				<div class="clear"></div>
				<div class="recent-post-curosel">
					<!-- recent-post start -->
					<div class="col-lg-4 col-md-4 col-sm-4">
						<div class="recent-post">
							<div class="post-thumb">
								<a href="#"><img src="{{url('/')}}/public/img/blog/r1.jpg" alt="" /></a>
							</div>
							<div class="post-info">
								<span class="recent-post-date">Ngày 20 tháng 4 năm 2020</span>
								<h3><a href="#">Nghỉ lễ phải đi “săn sale” thì mới là công dân “yêu nước"</a></h3>
								<p>Những sản phẩm “MÂM 𝐒𝐀𝐋𝐄" TO NHẤT Vịnh Bắc Bộ: váy vóc sang chảnh, blazer thanh lịch, đồ jean phong cách, áo phông </p>
								<a class="read-more" href="#">Đọc thêm</a>
								<span class="recent-comment"><a href="#"><i class="fa fa-comment-o"></i> 0 Bình luận</a></span>
							</div>
						</div>
					</div>
					<!-- recent-post start -->
					<!-- recent-post start -->
					<div class="col-lg-4 col-md-4 col-sm-4">
						<div class="recent-post">
							<div class="post-thumb">
								<a href="#"><img src="{{url('/')}}/public/img/blog/r2.jpg" alt="" /></a>
							</div>
							<div class="post-info">
								<span class="recent-post-date">Ngày 10 tháng 4 năm 2020</span>
								<h3><a href="#">HÀNG LOẠT SẢN PHẨM HÈ GIẢM GIÁ CỰC MẠNH</a></h3>
								<p>Trở nên thật mảnh mai là ước mơ của không ít các cô gái. Ngày nay, càng nhiều các cô gái bị ám ảnh bởi cân nặng, cố mọi cách để trở nên thật gầy</p>
								<a class="read-more" href="#">Xem thêm</a>
								<span class="recent-comment"><a href="#"><i class="fa fa-comment-o"></i> 0 bình luận</a></span>
							</div>
						</div>
					</div>
					<!-- recent-post start -->
					<!-- recent-post start -->
					<div class="col-lg-4 col-md-4 col-sm-4">
						<div class="recent-post">
							<div class="post-thumb">
								<a href="#"><img src="{{url('/')}}/public/img/blog/r3.jpg" alt="" /></a>
							</div>
							<div class="post-info">
								<span class="recent-post-date">Ngày 10 tháng 4 năm 2020</span>
								<h3><a href="#">Toàn sản phẩm BESTSELLER</a></h3>
								<p>Giữa tiết trời mùa hạ nóng nực, việc lên đồ thôi cũng khiến chúng ta thật đau đầu. Những gì bạn cần cho để "sống sót" qua thời tiết ẩm ương này</p>
								<a class="read-more" href="#">Xem thêm</a>
								<span class="recent-comment"><a href="#"><i class="fa fa-comment-o"></i> 0 bình luận</a></span>
							</div>
						</div>
					</div>
					<!-- recent-post start -->
					<!-- recent-post start -->
					<div class="col-lg-4 col-md-4 col-sm-4">
						<div class="recent-post">
							<div class="post-thumb">
								<a href="#"><img src="{{url('/')}}/public/img/blog/r4.jpg" alt="" /></a>
							</div>
							<div class="post-info">
								<span class="recent-post-date">Ngày 10 tháng 4 năm 2020</span>
								<h3><a href="#">TẾT ĐỘC LẬP – RỦ CẠ CỨNG MUA SẬP</a></h3>
								<p>Ánh nắng của mùa xuân là ánh nắng dịu dàng và đẹp đẽ nhất, không vàng rực rỡ như nắng hạ nhưng không hề hiu hắt đìu hiu nắng thu</p>
								<a class="read-more" href="#">read more</a>
								<span class="recent-comment"><a href="#"><i class="fa fa-comment-o"></i> 0 comments</a></span>
							</div>
						</div>
					</div>
					<!-- recent-post start -->
					<!-- recent-post start -->
					<div class="col-lg-4 col-md-4 col-sm-4">
						<div class="recent-post">
							<div class="post-thumb">
								<a href="#"><img src="{{url('/')}}/public/img/blog/r5.jpg" alt="" /></a>
							</div>
							<div class="post-info">
								<span class="recent-post-date">December 1,2014</span>
								<h3><a href="#">Maecenas ultricies sed odio</a></h3>
								<p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero</p>
								<a class="read-more" href="#">read more</a>
								<span class="recent-comment"><a href="#"><i class="fa fa-comment-o"></i> 0 comments</a></span>
							</div>
						</div>
					</div>
					<!-- recent-post start -->
				</div>
			</div>
		</div>
	</div>
	<!-- recent-post-area end -->
	<!-- brand-area start -->
	<div class="brand-area">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-heading">
						<h3>Đối tác</h3>
					</div>				
				</div>
				<div class="col-md-12">
					<div class="brand-curosel">
						<!-- brand-img start -->
						<div class="brand-img">
							<a href="#"><img src="{{url('/')}}/public/img/brand/1.jpg" alt="" /></a>
						</div>
						<!-- brand-img end -->
						<!-- brand-img start -->
						<div class="brand-img">
							<a href="#"><img src="{{url('/')}}/public/img/brand/2.jpg" alt="" /></a>
						</div>
						<!-- brand-img end -->
						<!-- brand-img start -->
						<div class="brand-img">
							<a href="#"><img src="{{url('/')}}/public/img/brand/3.jpg" alt="" /></a>
						</div>
						<!-- brand-img end -->
						<!-- brand-img start -->
						<div class="brand-img">
							<a href="#"><img src="{{url('/')}}/public/img/brand/1.jpg" alt="" /></a>
						</div>
						<!-- brand-img end -->
						<!-- brand-img start -->
						<div class="brand-img">
							<a href="#"><img src="{{url('/')}}/public/img/brand/2.jpg" alt="" /></a>
						</div>
						<!-- brand-img end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- brand-area end -->
@stop