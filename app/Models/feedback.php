<?php 
	namespace App\Models;
	use illuminate\Database\Eloquent\Model;
	class feedback extends Model
	{
		protected $table='feedback';
		protected $fillable=['product_id','name','email','feedback','created_at','rating'];
	}
 ?>



