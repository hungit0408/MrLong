<?php 
	namespace App\Http\Controllers\Admin;
	use App\Http\Controllers\Controller;
	use App\Models\category;
	use App\Models\product;
	use Illuminate\Http\Request;
	class CategoryController extends MainController
	{
		public function index(Request $req)
		{	
			$cats=Category::paginate(5);
			if ($req->_search){
				$cats=Category::where('name','like','%'.$req->_search.'%')->paginate(5);
				return view('admin.category.index',['cats'=>$cats,'page'=>1]);
			}
			return view('admin.category.index',['cats'=>$cats]);
		}
		public function del($id)
		{
			$model=category::find($id);
			print_r($model);
			$number=product::where('category_id',$id)->count();
			if ($number==0){
				Category::where('id',$id)->delete();
				return redirect()->back()->with('success','Xoa thanh cong category'.$model->name);
			}else
			{
				return redirect()->back()->with('fail','Category '.$model->name.' khong rong');
			}
		}
		public function add_cat()
		{
			return view('admin.category.add');
		}
		public function add_cat_post(Request $req)
		{
			$this->validate($req,
				['name'=>'required|unique:category,name'],
				['required'=>'Ban phai nhap truong :attribute',
				'unique'=>'Ten '.$req->name.' da ton tai'
			]);
			if (category::create($req->all())){
				return redirect()->route('admin.category')->with('success','Add thanh cong category '.$req->name);
			}else{
				
				return redirect()->route('admin.category')->with('fail','Add that bai category '.$req->name);
			}
		}

		public function edit($id,Request $req){
			$cat=category::find($id);
			$cat=category::where('id',$id)->first();
			if ($req->isMethod('post')){
				$this->validate($req,
					['name'=>'required|unique:category,name,'.$id],
					['required'=>'Ban phai nhap truong :attribute',
					'unique'=>'Ten '.$req->name.' da ton tai'
				]);
				$req->offsetUnset('_token');
				if (category::where('id',$id)->update($req->all())){
					return redirect()->route('admin.category')->with('success','Cap nhat thanh cong'.$req->name);
				}else{
					
					return redirect()->route('admin.category')->with('fail','Cap nhat that bai'.$req->name);
				};
			};
			return view('admin.category.edit',['cat'=>$cat]);
		}

		
	}
 ?>