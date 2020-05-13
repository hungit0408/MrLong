<?php 
	/**
	 * 
	 */
	namespace App\Http\Controllers;

	class Democontroller extends Controller
	{
		
		public function hello()
		{
			echo "hello";
		}
		public function hello2($name)
		{
			echo "hello $name";
		}
	}
 ?>