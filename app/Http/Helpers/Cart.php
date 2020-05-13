<?php 
	namespace App\Http\Helpers;
	class Cart
	{
		public $items=[];

		public function __construct()
		{
			$this->items=session('cart') ? session('cart'):[];
		}

		function Add($pro)
		{
			if (isset($this->items[$pro->id]))
			{
				$this->items[$pro->id]['quantity']+=1;
			}else
			{
				$this->items[$pro->id]=[
					'id'=>$pro->id,
					'name'=>$pro->name,
					'image'=>$pro->image,
					'price'=>($pro->sale_price ? $pro->sale_price : $pro->price),
					'quantity'=>1
				];
			};
			session(['cart'=>$this->items]);
			return true;
			
		}

		function Remove($id)
		{
			if (isset($this->items[$id]))
			{
				unset($this->items[$id]);
				session(['cart'=>$this->items]);
				return true;
			};
		}

		function Clear()
		{

		}

		function Update()
		{

		}
	}
	
 ?>