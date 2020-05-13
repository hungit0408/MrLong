<?php 
	namespace App\Models;
	use illuminate\Database\Eloquent\Model;
	class banner extends Model
	{
		protected $table='banner';
		protected $fillable=['name','image','text1','text2','text3','text4','category_id','status'];
	}
 ?>


