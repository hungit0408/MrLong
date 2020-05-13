<?php 
	use App\Models\Orders;
	use App\Models\Order_detail;
	use App\Models\feedback;
	use App\Models\Users;
	use App\Models\product;
	function cart_value($cart)
	{
		$total=0;
		if ($cart==null){return 0;}
		foreach ($cart as $product) 
		{
			$total+=$product['quantity']*$product['price'];
		};
		return $total;
	}

	function cart_value_by_id($id)
	{
		$cart=Order_detail::Where('order_id',$id)->get();
		$total=0;
		if ($cart==null){return 0;}
		foreach ($cart as $product) 
		{
			$total+=$product['quantity']*$product['price'];
		};
		return $total;
	}

	function cart_quatities($cart)
	{
		$total=0;
		if ($cart==null){return 0;}
		foreach ($cart as $product) 
		{
			$total+=$product['quantity'];
		};
		return $total;
	}

	function all_order_value()
	{
		$orders=Orders::where('customer_id',Auth::user()->id)->get();
		$total=0;
		if ($orders==null){return 0;}
		foreach ($orders as $ord)
		{
			$total+=cart_value_by_id($ord['id']);
		}
		return $total;
	}

	function feedback_average($id)
	{
		if (feedback::where('product_id',$id)->count()==0)
		{
			$average=0;
		}else
		{
			$average=feedback::where('product_id',$id)->avg('rating');
		};
		return $average;
	}

	function sum_sell($id)
	{
		$orders=Orders::all();
		$order_detail=Order_detail::where('product_id',$id)->get();
		$sum=0;
		foreach ($order_detail as $key => $order) 
		{
			$od=Orders::where('id',$order['order_id'])->first();
			if ($od['status']==3)
			{
				$sum+=$order['price']*$order['quantity'];
			}
		};
		return $sum;
	}

	function user_name($id)
	{
		$name=Users::where('id',$id)->first()->name;
		return $name;
	}

	function product_id($id)
	{
		$pro=product::where('id',$id)->first();
		return $pro;
	}

?>