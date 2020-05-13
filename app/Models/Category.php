<?php 
	namespace App\Models;
	use illuminate\Database\Eloquent\Model;
	class Category extends Model
	{
		protected $table='category';

		protected $fillable=['name','status','parent'];

		public function getChilds()
		{
			return $this->hasMany('App\Models\category','parent','id');
		}

	}
 ?>

