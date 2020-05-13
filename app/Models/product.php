<?php 
	namespace App\Models;
	use illuminate\Database\Eloquent\Model;
	class product extends Model
	{
		protected $table='product';
		protected $fillable=['name','category_id','description','image','price','sale_price','status','featured','brand_id'];

		
	}
 ?>


