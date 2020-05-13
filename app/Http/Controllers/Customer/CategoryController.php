<?php 
	namespace App\Http\Controllers\Customer;
	use App\Http\Controllers\Controller;
	use App\Models\Category;
	use App\Models\product;
	use Illuminate\Http\Request;
	/**
	 * 
	 */
	class CategoryController extends Controller
	{
		
		function cate_show(Request $req)
		{	
			if ($req->id)
			{
				$id=$req->id;
				$category_root=category::where('parent','0')->get();
				$products=product::where('category_id',$id)->paginate(12);
				return view('categoryshow',['products'=>$products,'category_root'=>$category_root]);
			}else
			{
				$id=$req->id;
				$category_root=category::where('parent','0')->get();
				$products=product::paginate(12);
				return view('categoryshow',['products'=>$products,'category_root'=>$category_root]);
			}
			
		}

		public function loadRange(Request $req)
		{
			if($req->action == "load")
			{
				$maximum_price = $req->maxmimum_price;
				$minimum_price = $req->minumum_price;

				$products = product::where('status', '1');

				if(isset($maximum_price) && isset($minimum_price))
				{

					$products = $products->whereBetween('price', [$minimum_price, $maximum_price]);
				}

				if(isset($req->optionSort))
				{
					$products = $products->orderBy('price', $req->optionSort);
				}

				$products = $products->get();

				return view('loadAjax.filterPrice', ['products' => $products]);
			}
		}
	}
 ?>