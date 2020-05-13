<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});

*/

Route::get('hello','DemoController@hello');
Route::get('hello2/{name}','DemoController@hello2')->name('hello2');

/*routing, ten-controller@phuong-thucr*/
Route::get('loadRange', 'Customer\CategoryController@loadRange');

Route::get('/','Homecontroller@index')->name('index');

Route::get('register','Customer\Customercontroller@register')->name('cust_register');
Route::post('register','Customer\Customercontroller@register_post')->name('cust_register');

/*create middleware customer_auth cho rieng page customer*/
Route::group(['prefix'=>'customer','namespace'=>'Customer','middleware'=>'customer_auth'],function(){
	route::get('cart','CustomerController@cart')->name('cart');

	route::get('cust_edit','CustomerController@cust_edit')->name('cust_edit');
	route::post('cust_edit','CustomerController@cust_edit')->name('cust_edit');

	route::get('change_pass','CustomerController@cust_changepass')->name('cust_changepass');
	route::post('change_pass','CustomerController@cust_changepass')->name('cust_changepass');


	route::get('add-to-cart/{id}','CartController@add_cart')->name('add_cart');
	route::get('add-to-cart2/{id}','CartController@add_cart2')->name('add_cart_2');

	route::get('update-cart/{id}','CartController@update_cart')->name('update_cart');
	route::get('remove-cart/{id}','CartController@remove_cart')->name('remove_cart');
	route::get('clear-cart','CartController@clear_cart')->name('clear_cart');

	route::get('view-cart','CartController@viewcart')->name('viewcart');
	route::post('view-cart','CartController@viewcart')->name('viewcart');

	route::get('checkout','CartController@checkout')->name('checkout');
	route::post('checkout','CartController@checkout')->name('checkout');

	route::get('order_success','CartController@order_success')->name('order_success');

	route::get('PDFview','CartController@PDFview')->name('ViewInvoice');

	route::get('Vieworder','CartController@Vieworder')->name('Vieworder');

	//List order for customer
	route::get('myOrder','CustomerController@cust_order_list')->name('cust_order_list');

	route::get('confirm_delivered','CustomerController@cust_order_delivered')->name('cust_order_delivered');
	route::post('confirm_delivered','CustomerController@cust_order_delivered')->name('cust_order_delivered');

	route::get('cancel_ord','CustomerController@cust_order_cancel')->name('cust_order_cancel');
	route::post('cancel_ord','CustomerController@cust_order_cancel')->name('cust_order_cancel');

});

/*routing customer login */
Route::get('user/login','Customer\CustomerController@customer_login')->name('cust_login');
Route::post('user/login','Customer\CustomerController@customer_login_post')->name('cust_login');

route::get('logout','Customer\CustomerController@customer_logout')->name('cust_logout');

route::get('forgot_pass','Customer\CustomerController@customer_forgot_pass')->name('forgot_pass');
route::post('forgot_pass','Customer\CustomerController@customer_forgot_pass')->name('forgot_pass');

route::get('forgot_pass_link','Customer\CustomerController@customer_forgot_pass_link')->name('forgot_pass_link');
route::post('forgot_pass_link','Customer\CustomerController@customer_forgot_pass_link')->name('forgot_pass_link');

route::get('cate_show','Customer\CategoryController@cate_show')->name('cate_show');

route::get('search_product','Customer\ProductController@product_search')->name('product_search');
route::post('search_product','Customer\ProductController@product_search')->name('product_search');

route::get('product_view','Customer\ProductController@product_view')->name('product_view');
route::post('product_view','Customer\ProductController@product_view_post')->name('product_view');



/**/

Route::get('about','Homecontroller@about')->name('about');
Route::get('welcome','Homecontroller@welcome');






/*routing register*/


/*route-admin*/
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'auth'],function(){
	Route::get('/','Admincontroller@index')->name('admin.index');

	Route::get('register','Usercontroller@register')->name('register');
	Route::post('register','Usercontroller@post_register')->name('post_register');
	Route::get('user-logout','Usercontroller@logout')->name('admin.user-logout');

	Route::get('changepass','Usercontroller@changepass')->name('admin.changepass');
	Route::post('changepass','Usercontroller@changepass')->name('admin.changepass');

	route::get('editinfo','Usercontroller@editinfo')->name('admin.edit');
	route::post('editinfo','Usercontroller@editinfo')->name('admin.edit');

	Route::get('category','Categorycontroller@index')->name('admin.category');
	Route::get('category-add','Categorycontroller@add_cat')->name('admin.category.add');
	Route::post('category-add','Categorycontroller@add_cat_post')->name('admin.category.add');

	Route::get('banner','Bannercontroller@index')->name('admin.banner');
	Route::get('banner-add','Bannercontroller@add_banner')->name('admin.banner.add');
	Route::post('banner-add','Bannercontroller@add_banner')->name('admin.banner.add');
	Route::get('banner-del/{id}','Bannercontroller@del_banner')->name('admin.banner.del');
	Route::get('banner-edit/{id}','Bannercontroller@edit_banner')->name('admin.banner.edit');
	Route::post('banner-edit/{id}','Bannercontroller@edit_banner')->name('admin.banner.edit');

	Route::get('category-del/{id}','Categorycontroller@del')->name('admin.category.del');

	Route::get('category-edit/{id}','Categorycontroller@edit')->name('admin.category.edit');
	Route::post('category-edit/{id}','Categorycontroller@edit')->name('admin.category.edit');

	Route::get('customer_view','Customercontroller@index')->name('admin.customer');
	Route::post('customer_view','Customercontroller@index')->name('admin.customer');

	Route::get('product','Productcontroller@index')->name('admin.product');
	Route::post('product','Productcontroller@index')->name('admin.product');
	Route::get('product-add','Productcontroller@add_pro')->name('admin.product.add');
	Route::post('product-add','Productcontroller@add_pro')->name('admin.product.add');
	Route::get('product-del','Productcontroller@del_pro')->name('admin.product.del');
	Route::get('product-edit/{id}','Productcontroller@edit_pro')->name('admin.product.edit');
	Route::post('product-edit/{id}','Productcontroller@edit_pro')->name('admin.product.edit');

	Route::get('orders','OrderController@index')->name('admin.order');
	Route::get('orders_delivering','OrderController@orders_delivering')->name('admin_order_delivering');
	Route::get('orders_cancel','OrderController@orders_cancel')->name('admin_order_cancel');

	route::get('Vieworder_admin','OrderController@Vieworder')->name('Vieworder_admin');

	Route::get('update_all','Productcontroller@update_all')->name('admin.product.update');

	Route::get('product-view-feedback','Productcontroller@viewfeedback')->name('admin.product.viewfeedback');
	Route::post('product-view-feedback','Productcontroller@viewfeedback')->name('admin.product.viewfeedback');

	Route::get('del_feedback','Productcontroller@del_feedback')->name('del_feedback');

});

Route::get('admin/login','admin\Usercontroller@login')->name('login');
Route::post('admin/login','admin\Usercontroller@post_login')->name('post_login');

route::get('admin/forgot_pass','admin\Usercontroller@admin_forgot_pass')->name('admin.forgot');
route::post('admin/forgot_pass','admin\Usercontroller@admin_forgot_pass')->name('admin.forgot');

route::get('admin/forgot_pass_link','admin\Usercontroller@admin_forgot_pass_link')->name('admin_forgot_pass_link');
route::post('admin/forgot_pass_link','admin\Usercontroller@admin_forgot_pass_link')->name('admin_forgot_pass_link');

/*route-second page*/
Route::group(['prefix'=>'test','namespace'=>'test'],function(){
	Route::get('/','Testcontroller@index')->name('testhomepage');
});

