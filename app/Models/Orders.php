<?php 
	namespace App\Models;
	use illuminate\Database\Eloquent\Model;
	class Orders extends Model
	{
		protected $table='orders';
		protected $fillable=['customer_id','country','name','address','town','email','phone','description','admin_comment','status', 'created_at'];
	}
 ?>



