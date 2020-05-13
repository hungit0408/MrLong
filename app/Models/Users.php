<?php 
	namespace App\Models;
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Notification\Notifiable;
	use Illuminate\Foundation\Auth\User as Authenticatable;

	class Users extends Model
	{
		/*use Notifiable;*/
		protected $table='users';
		protected $fillable=['name','email','phone','password','address','group_name', 'created_at'];
	}
 ?>



