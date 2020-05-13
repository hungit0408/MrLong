<?php 
	namespace App\Http\Controllers\Admin;
	use App\Http\Controllers\Controller;
	use App\Models\banner;
	use App\Models\category;
	use Illuminate\Http\Request;
	class BannerController extends MainController
	{
		public function index(Request $req)
		{	
			$banners=banner::paginate(5);
			if ($req->_search){
				$banners=banner::where('name','like','%'.$req->_search.'%')->paginate(5);
				return view('admin.banner.index',['banners'=>$banners,'page'=>1]);
			}
			return view('admin.banner.index',['banners'=>$banners]);
		}
		public function del_banner($id)
		{
			$model=banner::find($id);
			if (banner::where('id',$id)->delete())
			{
				return redirect()->back()->with('success','Xoa thanh cong banner '.$model->name);
			}else
			{
				return redirect()->back()->with('fail','Banner '.$model->name.' khong ton tai');
			}
		}
		public function add_banner(Request $req)
		{
			if ($req->isMethod('post'))
			{
				$this->validate($req,
					[
						'name'=>'required|unique:banner,name',
						'category_id'=>'required',
						'text1'=>'required',
						'text2'=>'required',
						'text3'=>'required',
						'text4'=>'required',
						'img'=>'required'
				],
					['required'=>'Ban phai nhap truong :attribute',
					'unique'=>'Ten '.$req->name.' da ton tai'
				]);
				if ($req->hasFile('img')){
					$id=banner::all()->last()->id+1;
					$req->img->move(base_path('upload/banners/'),$id.substr($req->img->getClientOriginalName(),-4));
					$req->merge(['image'=>$id.substr($req->img->getClientOriginalName(),-4)]);
					if (banner::create($req->all()))
					{
						return redirect()->route('admin.banner')->with('success','Add thanh cong banner '.$req->name);
					}else{
						
						return redirect()->route('admin.banner')->with('fail','Add that bai banner '.$req->name);
					}
				}
			}else
			{
				/*$cat=Category::orderBy('name','ASC')->all();*/
				$cat=Category::all();
				return view('admin.banner.add',['cat'=>$cat]);
			}
		}
		

		public function edit_banner($id,Request $req){
			$ban=banner::find($id);
			$ban=banner::where('id',$id)->first();
			if ($req->isMethod('post')){
				if($req->img==null)
				{
					$req->merge(['image'=>$ban->image]);
					$this->validate($req,
						['name'=>'required|unique:banner,name,'.$id,
						'category_id'=>'required',
						'text1'=>'required',
						'text2'=>'required',
						'text3'=>'required',
						'text4'=>'required'],
						['required'=>'Ban phai nhap truong :attribute',
						'unique'=>'Ten '.$req->name.' da ton tai'
					]);
					$req->offsetUnset('_token');
					if (banner::where('id',$id)->update($req->all())){
						return redirect()->route('admin.banner')->with('success','Cap nhat thanh cong'.$req->name);
					}else{
						
						return redirect()->route('admin.banner')->with('fail','Cap nhat that bai'.$req->name);
					};
				};
				$this->validate($req,
					['name'=>'required|unique:banner,name,'.$id,
					'category_id'=>'required',
					'text1'=>'required',
					'text2'=>'required',
					'text3'=>'required',
					'text4'=>'required',
					'img'=>'required'],
					['required'=>'Ban phai nhap truong :attribute',
					'unique'=>'Ten '.$req->name.' da ton tai'
				]);
				$req->offsetUnset('_token');
				if ($req->hasFile('img')){
					$req->img->move(base_path('upload/banners'),$id.substr($req->img->getClientOriginalName(),-4));
					$req->merge(['image'=>$id.substr($req->img->getClientOriginalName(),-4)]);
					$req->offsetUnset('img');
					if (banner::where('id',$id)->update([
						'name'=>$req->name,
						'category_id'=>$req->category_id,
						'text1'=>$req->text1,
						'text2'=>$req->text2,
						'text3'=>$req->text3,
						'text4'=>$req->text4,
						'status'=>$req->status,
						'image'=>$req->image]))
					{
						return redirect()->route('admin.banner')->with('success','Cap nhat thanh cong '.$req->name);
					}
					else
					{
						return redirect()->route('admin.banner')->with('fail','Cap nhat that bai '.$req->name);
					};
				}
				
			};
			$cat=category::all();
			return view('admin.banner.edit',['ban'=>$ban,'cat'=>$cat]);
		}
		
	}
 ?>