<?php 
	namespace App\Http\Controllers\Admin;
	use App\Http\Controllers\Controller;
	use App\Models\Users;
	use Illuminate\Http\Request;
	class CustomerController extends MainController
	{
		public function index(Request $req)
		{
			$customer=Users::paginate(5);
			if($req->_search)
			{
				$customer=Users::where('name','like','%'.$req->_search.'%')->paginate(5);
				return view('admin.customer.index',['customers'=> $customer,'page'=>1]);

			}
			return view('admin.customer.index',['customers'=> $customer]);
		}
	}
 ?>