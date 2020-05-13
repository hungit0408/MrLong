<?php 
	namespace App\Http\Controllers\Admin;
	use Auth;
	use App\Http\Controllers\Controller;
	/**
	 * 
	 */
	class MainController extends Controller
	{
		
		function __construct()
		{
			$this->middleware(function($request,$next)
			{
				if (Auth::user()->group_name==0)
				{
					return $next($request);
				}else
				{
					return redirect()->route('index');
				}
			});
		}
	}
 ?>