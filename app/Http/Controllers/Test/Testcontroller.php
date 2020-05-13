<?php 
	/**
	 * 
	 */
	namespace App\Http\Controllers\Test;
	use App\Http\Controllers\Controller;
	class Testcontroller extends Controller
	{
		
		public function index()
		{
			return view('test.index');
		}
		public function hello2($name)
		{
			echo "hello $name";
		}
	}
 ?>