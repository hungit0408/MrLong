@extends('main.home')
@section('title','Welcome to Oriania')
@section('content')
<!-- blog-header-area start -->	
<div class="shop-header-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="shop-header-title">
					<h1>Sản phẩm của cửa hàng</h1>
					<div class="shop-menu">
						<ul>
							<li><a href="#">Tất cả</a></li>
							@foreach($category_root as $cate)
								<li><a href="{{route('cate_show',['id'=>$cate->id])}}">{{$cate->name}}</a></li>
							@endforeach
						</ul>							
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- blog-header-area end -->
<!-- breadcrumb-area start -->
<div class="breadcrumb-area shop-breadcrumb">
	<div class="container">
		<div class="breadcrumb">
			<ul>
				<li><a href="{{route('index')}}">Trang chủ <i class="fa fa-angle-right"></i></a></li>
				<li>Cửa hàng</li>
			</ul>
		</div>
	</div>
</div>
<!-- breadcrumb-area end -->
<!-- blog-main-area start -->
<div class="blog-main-area">
	<div class="container">
		<div class="row">
			<!-- sidebar start -->
			<div class="col-lg-3 col-md-3 col-sm-12">
				<!-- shop-categories start -->
				<div class="shop-categories shop-space">
					<h2 class="shop-sidebar-title"><span>Danh mục gần đây</span></h2>
					<ul class="sidebar-menu">
						@foreach($category_root as $cate)
							<li><a href="{{route('cate_show',['id'=>$cate->id])}}">{{$cate->name}}</a> <span> (17)</span></li>
						@endforeach
					</ul>
				</div>
				<!-- shop-categories end -->
				<!-- shop-filter start -->
				<div class="shop-filter shop-space">
					<h2 class="shop-sidebar-title"><span>Xem sản phẩm theo giá</span></h2>
					<div class="info_widget">
						<div class="price_filter">
							<div id="slider-range1"></div>
							<input type="hidden" id="maxmimum_price">
							<input type="hidden" id="minumum_price">
							<div class="price_slider_amount">
								<div id="amount">
									500,000 - 2,000,000 VND
								</div>

								<input type="submit"  value="Lọc"/>
							</div>
							
						</div>
					</div>						
				</div>
				<!-- shop-filter end -->
				<!-- shop-featured start -->
				<div class="shop-featured shop-space">
					<h2 class="shop-sidebar-title"><span>Khuyến mãi</span></h2>
					<div class="shop-product">
						<div class="shop-pro-img">
							<a href="#"><img src="img/product/shop/1.jpg" alt="" /></a>
						</div>
						<div class="shop-pro-content">
							<h3 class="shop-pro-name"><a href="#">Street consequat</a></h3>
							<div class="shop-price">
								<span class="shop-new">150.000 VNĐ</span>
							</div>
							<div class="shop-rating">
								<a href="#"><i class="fa fa-star"></i></a>
								<a href="#"><i class="fa fa-star"></i></a>
								<a href="#"><i class="fa fa-star"></i></a>
								<a href="#"><i class="fa fa-star"></i></a>
							</div>
						</div>
					</div>
					<div class="shop-product">
						<div class="shop-pro-img">
							<a href="#"><img src="img/product/shop/2.jpg" alt="" /></a>
						</div>
						<div class="shop-pro-content">
							<h3 class="shop-pro-name"><a href="#">Etiam molestie</a></h3>
							<div class="shop-price">
								<span class="shop-old">230.000 VNĐ</span>
								<span class="shop-new">220.000 VNĐ</span>
							</div>
							<div class="shop-rating">
								<a href="#"><i class="fa fa-star"></i></a>
								<a href="#"><i class="fa fa-star"></i></a>
								<a href="#"><i class="fa fa-star"></i></a>
								<a href="#"><i class="fa fa-star"></i></a>
							</div>
						</div>
					</div>
					<div class="shop-product">
						<div class="shop-pro-img">
							<a href="#"><img src="img/product/shop/3.jpg" alt="" /></a>
						</div>
						<div class="shop-pro-content">
							<h3 class="shop-pro-name"><a href="#">Aenean eu tristique</a></h3>
							<div class="shop-price">
								<span class="shop-old">80.000 VNĐ</span>
								<span class="shop-new">70.000 VNĐ</span>
							</div>
							<div class="shop-rating">
								<a href="#"><i class="fa fa-star"></i></a>
								<a href="#"><i class="fa fa-star"></i></a>
								<a href="#"><i class="fa fa-star"></i></a>
								<a href="#"><i class="fa fa-star"></i></a>
							</div>
						</div>
					</div>
				</div>
				<!-- shop-featured end -->										
			</div>
			<!-- sidebar end -->
			<div class="col-lg-9 col-md-9 col-sm-12">
				<div class="row">
					<!-- toolbar start -->
					<div class="col-md-12 col-sm-12">
						<div class="toolbar">
							<div class="view-mode">
								<a class="grid active" href="shop.html"><i class="fa fa-th-large"></i></a>
								<a class="list" href="shop-list.html"><i class="fa fa-th-list"></i></a>
							</div>
							<div class="toolbar-form">
								<form action="#">
									<div class="tolbar-select">
										<p>Sắp xếp sản phẩm theo giá</p>
										<select id="filter-sort">
										  <option value="ASC">Mặc định</option>
										  <option value="ASC">Sắp xếp giá: low to high</option>
										  <option value="DESC">Sắp xếp giá: high to low</option>
										</select> 
									</div>
								</form>								
							</div>
						</div>
					</div>
					<!-- toolbar end -->
					<!-- shop-product-details start -->
					<div class="shop-product-details items">
						<div id="loadProduct">
							@foreach ($products as $product)
							<!-- single-features start -->
							<div class="col-md-4 col-sm-4">
								<div class="single-features">
									<span class="sale-text">Sale</span>
									<div class="product-img">
										<a href="{{route('product_view',['id'=>$product->id])}}">							
											<img class="first-img icon" src="{{url('/')}}/upload/{{$product->image}}" style="height: 300px;" alt="cart icon" />
											<img class="second-img" src="{{url('/')}}/upload/{{$product->image}}"  alt="" />
										</a>
										<a class="modal-view" href="#" data-toggle="modal" data-target="#productModal{{$product->id}}">Xem nhanh</a>
										<div class="action-buttons">
											<img class="icon" style="position: absolute" src="{{url('/')}}/upload/{{$product->image}}" alt="cart icon">
											<a class="add-to-cart @if(!Auth::user()) not-login @else my-btn @endif" href="{{route('add_cart_2',['id'=>$product->id])}}" data-id="{{$product->id}}"><i class="fa fa-shopping-cart"></i> <span>Add to cart</span></a>
											<a class="favourite" href="#"><i class="fa fa-heart-o"></i></a>
											<a class="compare" href="#"><i class="fa fa-toggle-off"></i></a>
										</div>
									</div>
									<div class="product-content">
										<div class="pro-rating">
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star"></i></a>
											<a href="#"><i class="fa fa-star-o"></i></a>
										</div>
										<h5><a href="{{route('product_view',['id'=>$product->id])}}">{{$product->name}}</a></h5>
										<!-- <span class="old-price">{{$product->price}}VNĐ</span> -->
										<span class="old-price">920.000 VNĐ</span>
										<span class="pro-price">{{$product->price}}VNĐ</span>
									</div>
								</div>
							</div>
							<!-- single-features end -->
							@endforeach
						</div>
					<!-- shop-product-details end -->
					<!-- toolbar start -->
					<div class="col-md-12 col-sm-12">
						<div class="toolbar toolbar-border">
							<div class="view-mode">
								<a class="grid active" href="shop.html"><i class="fa fa-th-large"></i></a>
								<a class="list" href="shop-list.html"><i class="fa fa-th-list"></i></a>
							</div>
							<div class="page-number">
								{{$products->appends(request()->only('_name'))->links()}}
							</div>
							<div class="toolbar-form">
								<form action="#">
									<div class="tolbar-select">
										<p>Sắp xếp</p>
										<select id="filter-sort">
										  <option value="ASC"> Mặc định</option>
										  <option value="ASC">Sắp xếp giá: low to high</option>
										  <option value="DESC">Sắp xếp giá: high to low</option>
										</select> 
									</div>
								</form>								
							</div>
						</div>
					</div>
					<!-- toolbar end -->						
				</div>
			</div>
		</div>
	</div>
</div>
<!-- blog-main-area end -->
@stop

@section('quickviewproduct')

<div id="quickview-wrapper">
	@foreach ($products as $product)
	<!-- Modal -->
	<div class="modal fade" id="productModal{{$product->id}}" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<div class="modal-product">
						<div class="product-images">
							<div class="main-image images">
								<img alt="" src="{{url('/')}}/upload/{{$product->image}}">
							</div>
						</div><!-- .product-images -->
						
						<div class="product-info">
							<h1>{{$product->name}}</h1>
							<div class="price-box">
								<p class="price"><span class="special-price"><span class="amount">{{$product->price}} VNĐ</span></span></p>
							</div>
							<a href="{{route('product_view',['id'=>$product->id])}}" class="see-all">Xem sản phẩm đặc sắc</a>
							<div class="quick-add-to-cart">
								<form method="post" class="">
									<div class="numbers-row">
										<input type="number" id="french-hens" value="1">
									</div>
									<button class="single_add_to_cart_button" type="submit">Thêm vào giỏ hàng</button>
								</form>
							</div>
							<div class="quick-desc">
								{{$product->description}}
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
@section('javascript')
<script type="text/javascript">
	$(document).ready(function(){

		function fetch_data()
		{
			var maxmimum_price = $('#maxmimum_price').val();
			var minumum_price = $('#minumum_price').val();
			var optionSort = $('#filter-sort').val();
			var action = "load";
			$.ajax({
				url: "{{ url('loadRange') }}",
				method: "GET",
				data: {maxmimum_price: maxmimum_price, minumum_price: minumum_price,
					 action: action, optionSort: optionSort},
				success: function(data)
				{
					$('#loadProduct').html(data);
				}
			});
		}

		$('#slider-range1').slider({
			range: true,
			min: 500000,
			max: 2000000,
			values: [500000, 2000000],
			step: 250000,
			stop: function(event, ui)
			{
				$('#amount').html(ui.values[0] + ' - ' + ui.values[1] + ' VND');
				$('#maxmimum_price').val(ui.values[1]);
				$('#minumum_price').val(ui.values[0]);
				fetch_data();
			}
		});

		$('#filter-sort').change(function(){
			fetch_data();
		});
	});
</script>
@endsection
@stop
