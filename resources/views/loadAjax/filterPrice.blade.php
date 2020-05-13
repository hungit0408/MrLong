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
				<a class="modal-view" href="#" data-toggle="modal" data-target="#productModal{{$product->id}}">Quick View</a>
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
				<span class="old-price">${{$product->price}}</span>
				<span class="pro-price">${{$product->price}}</span>
			</div>
		</div>
	</div>
	<!-- single-features end -->
	@endforeach