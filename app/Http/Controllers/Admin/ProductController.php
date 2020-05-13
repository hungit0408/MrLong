<?php 
	namespace App\Http\Controllers\Admin;
	use App\Http\Controllers\Controller;
	use App\Models\product;
	use App\Models\Category;
	use App\Models\feedback;
	use Illuminate\Http\Request;

	class ProductController extends MainController
	{
		public function index(Request $req)
		{
			$pro=product::paginate(10);
			$cat=category::all();
			if ($req->_search)
			{
				$pro=product::where('name','like','%'.$req->_search.'%')->paginate(10);
				return view('admin.product.index',['products'=>$pro,'cat'=>$cat,'page'=>1]);
			};
			return view('admin.product.index',['products'=> $pro,'cat'=>$cat]);
			
		}

		public function add_pro(Request $req)
		{
			if ($req->isMethod('post'))
			{
				$this->validate($req,
					[
						'name'=>'required|unique:product,name',
						'description'=>'required',
						'category_id'=>'required',
						'img'=>'required',
						'price'=>'required|integer|min:1',
						'sale_price'=>'required|integer|min:1',
						'status'=>'required',
						'featured'=>'required'
				],
					['required'=>'Ban phai nhap truong :attribute',
					'unique'=>'Ten '.$req->name.' da ton tai',
					'integer'=>'Ban phai nhap so nguyen',
					'min'=>'Gia phai lon hon 0'
				]);
				if ($req->hasFile('img')){
					$id=product::all()->last()->id+1;
					$req->img->move(base_path('upload'),$id.substr($req->img->getClientOriginalName(),-4));
					$req->merge(['image'=>$id.substr($req->img->getClientOriginalName(),-4)]);
					$req->merge(['brand_id'=>'0']);
					if (product::create($req->all()))
					{
						return redirect()->route('admin.product')->with('success','Add thanh cong san pham '.$req->name);
					}else{
						
						return redirect()->route('admin.product')->with('fail','Add that bai san pham '.$req->name);
					}
				}
			}else
			{
				/*$cat=Category::orderBy('name','ASC')->all();*/
				$cat=Category::all();
				return view('admin.product.add',['cat'=>$cat]);
			}
		}

		public function edit_pro($id,Request $req)
		{
			$pro=product::where('id',$id)->first();
			if ($req->isMethod('post')){
				if($req->img==null)
				{
					$req->merge(['image'=>$pro->image]);
					$this->validate($req,
						['name'=>'required|unique:product,name,'.$id,
						'description'=>'required',
						'category_id'=>'required',
						'price'=>'required',
						'sale_price'=>'required',
						'status'=>'required',
						'featured'=>'required'],
						['required'=>'Ban phai nhap truong :attribute',
						'unique'=>'Ten '.$req->name.' da ton tai'
					]);
					$req->offsetUnset('_token');
					if (product::where('id',$id)->update($req->all())){
						return redirect()->route('admin.product')->with('success','Cap nhat thanh cong'.$req->name);
					}else{
						
						return redirect()->route('admin.product')->with('fail','Cap nhat that bai'.$req->name);
					};
				};
				$this->validate($req,
					['name'=>'required|unique:product,name,'.$id,
						'description'=>'required',
						'category_id'=>'required',
						'img'=>'required',
						'price'=>'required',
						'sale_price'=>'required',
						'status'=>'required',
						'featured'=>'required'],
					['required'=>'Ban phai nhap truong :attribute',
					'unique'=>'Ten '.$req->name.' da ton tai'
				]);
				$req->offsetUnset('_token');
				if ($req->hasFile('img')){
					$req->img->move(base_path('upload'),$id.substr($req->img->getClientOriginalName(),-4));
					$req->merge(['image'=>$id.substr($req->img->getClientOriginalName(),-4)]);
					$req->offsetUnset('img');
					if (product::where('id',$id)->update([
						'name'=>$req->name,
						'description'=>$req->description,
						'category_id'=>$req->category_id,
						'price'=>$req->price,
						'sale_price'=>$req->sale_price,
						'featured'=>$req->featured,
						'status'=>$req->status,
						'image'=>$req->image]))
					{
						return redirect()->route('admin.product')->with('success','Cap nhat thanh cong '.$req->name);
					}
					else
					{
						return redirect()->route('admin.product')->with('fail','Cap nhat that bai '.$req->name);
					};
				}
				
			};
			$cat=category::all();
			return view('admin.product.edit',['pro'=>$pro,'cat'=>$cat]);
		}

		public function del_pro(Request $req)
		{
			if ($req->id)
			{
				$number=feedback::where('product_id',$req->id)->count();
				if ($number==0)
				{
					if (product::where('id',$req->id)->delete()) 
					{
						return redirect()->route('admin.product')->with('success','Delete success');
					}else
					{
						return redirect()->route('admin.product')->with('fail','Product not found');
					}
				}else
				{
					return redirect()->route('admin.product')->with('fail','Product has feedback');
				}
			}
			else
			{
				return redirect()->back();
			}
		}

		public function viewfeedback(Request $req)
		{
			if ($req->id)
			{
				if (product::where('id',$req->id))
				{
					$feedback=feedback::where('product_id',$req->id)->get();
					$num=feedback::where('product_id',$req->id)->count();
					return view('admin.product.pro_feedback',['feedback'=>$feedback,'num'=>$num]);
				}
			}else
			{
				return redirect()->back();
			}
		}

		public function del_feedback(Request $req)
		{
			if ($req->id)
			{
				if (feedback::where('id',$req->id)->delete())
				{
					return redirect()->back()->with('status','Delete Feedback success');
				}else
				{
					return redirect()->back()->with('status','Delete Feedback Fail');
				}
			}
		}

		public function update_all()
		{
			$products=product::all();
			foreach ($products as $key => $product) 
			{
				$id=$product->id;
				$fb=feedback_average($id);
				$ss=sum_sell($id);
				product::where('id',$id)->update(['rating'=>$fb,'sum_sell'=>$ss]);
				product::where('id',$id)->update(['sum_sell'=>sum_sell($id)]);
			};
			return redirect()->route('admin.product')->with('success','Cap nhat thanh cong ');			
		}

	}
 ?>