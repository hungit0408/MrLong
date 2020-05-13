<?php 
	/**
	 * 
	 */
	namespace App\Http\Controllers;
	use Auth;
	use App\Models\banner;
	use App\Models\product;
	use Illuminate\Http\Request;
	
	class HomeController extends Controller
	{
		public function index()
		{
			$banner=banner::where('status','0')->get();
			$featured_pro=product::where('status','1')->where('featured','1')->get();
			$new_pro=product::where('status','1')->orderBy('created_at','ASC')->take(12)->get();
			$best_sell_pro=product::where('status','1')->orderBy('sum_sell','DESC')->take(12)->get();
			$best_rate_pro=product::where('status','1')->orderBy('rating','DESC')->take(12)->get();
			return view('home',['banner'=>$banner,'featured_pro'=>$featured_pro,'new_pro'=>$new_pro,'best_sell_pro'=>$best_sell_pro,'best_rate_pro'=>$best_rate_pro]);
		}
		public function about()
		{
			return view('about');
		}
		public function welcome()
		{
			echo "welcome";
		}

		public function register()
		{
			return view('customer.register');
		}

		
	}
 ?>