<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use Auth;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Validator::extend('check_old_pass', function ($attribute, $value, $parameters, $validator) 
        {
            return \Hash::check($value, \Auth::user()->password);
        });

        \View::composer('*',function($view){
            $cates=Category::orderBy('name','DESC')->where('status',1)->get();
            $cates_full=Category::orderBy('name','DESC')->get();
            $user=Auth::user();
            //Global categories 
          
            
            $view->with([
                'cates'=>$cates,
                'user'=>$user,
                'cates_full'=>$cates_full,
            ]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
