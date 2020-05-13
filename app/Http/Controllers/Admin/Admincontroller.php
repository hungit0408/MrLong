<?php 
	/**
	 * 
	 */
	namespace App\Http\Controllers\Admin;
	use App\Http\Controllers\Controller;
	use Auth;
	use App\Models\Users;
	use App\Models\Orders;
	use App\Models\product;
	class AdminController extends MainController
	{
		public function index()
		{
			$user_count = Users::where('group_name', '!=', '0')->count();
			$user_new_percent = ($user_count/Users::count())*100;
			$orders_total = Orders::count();
			$orders = Orders::orderBy('created_at', 'Desc')->limit('4')->get();

			$producs_total = product::count();
			$best_seller = product::where('status','1')->orderBy('sum_sell','DESC')->take(12)->count();
			$order_processing = Orders::where('status', '2')->get()->count();
			$orders_cancel = Orders::where('status', '4')->get()->count();
			$name=Auth::user()->name;
			return view('admin.index',['name'=>$name, 'user_count'=>$user_count, 'user_percent' => $user_new_percent, 'orders_total' => $orders_total, 'orders' => $orders, 'best_seller' => $best_seller, 'producs_total'=> $producs_total,'order_processing'=>$order_processing,'orders_cancel'=>$orders_cancel]);
		}
	}
 ?>