<?php 
	namespace App\Http\Controllers\Customer;
	use App\Http\Controllers\Controller;
	use App\Models\Category;
	use App\Models\product;
	use App\Models\feedback;
	use Illuminate\Http\Request;
	/**
	 * 
	 */
	class ProductController extends Controller
	{
		
		function product_view(Request $req)
		{
			if ($req->id)
			{
				$product=product::where('id',$req->id)->first();
				$products_related=product::where('category_id',$product->category_id)->get();
				$product_feedback=feedback::where('product_id',$req->id)->get();
				return view('product_view',['product'=>$product,'products_related'=>$products_related,'product_feedback'=>$product_feedback]);
			}else
			{
				return redirect()->route('index');
			}
		}

		function product_view_post(Request $req)
		{
			if ($req->isMethod('POST'))
			{
				$this->validate($req,[
					'name'=>'required',
					'email'=>'required',
					'feedback'=>'required',
					'rating'=>'required'
				],['name.required'=>'You must input your name',
				'email.required'=>'You must input your email',
				'feedback.required'=>'You must write a feedback',
				// 'feedback.min'=>'Feedback must be at least 20 character',
				'rating.required'=>'You should rate our product'
				]);
				feedback::create($req->all());
				return redirect()->back();
			};
		}

		function product_search(Request $req)
		{
			if ($req->isMethod('GET'))
			{
				$name=$req->_name;
				if (isset($req->_sort))
				{
					$_sort=$req->_sort;
					switch ($_sort) {
						case 0:
							$text1='name';
							$text2='ASC';
							break;
						case 1:
							$text1='price';
							$text2='';
						case 2:
							$text1='price';
							$text2='DESC';
						default:
							# code...
							break;
					}
				}else
				{
					$_sort=0;
					$text1='name';
					$text2='ASC';
				}
				$products=product::where('name','like','%'.$name.'%')->orderBy($text1,$text2)->paginate(10);
				$category_root=category::where('parent','0')->get();
				return view('search_product',['products'=>$products,'category_root'=>$category_root,'_name'=>$name,'_sort'=>$_sort]);
			}
		}
	}
 ?>