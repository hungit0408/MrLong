<?php 
	namespace App\Http\Controllers\Customer;
	use App\Http\Controllers\Controller;
	use App\Models\Users as Users;
	use App\Models\Orders;
	use illuminate\Http\Request;
	use Illuminate\Support\Facades\Hash;
	use Auth;
	/**
	 * 
	 */
	class CustomerController extends Controller
	{
		public function register()
		{
			return view('Customer.register');
		}
		public function register_post(Request $req)
		{
			$this->validate($req,[
				'name'=>'required|min:6',
				'email'=>'required|unique:Users,email',
				'phone'=>'required|unique:Users,phone',
				'password'=>'required|min:6',
				'confirm_password'=>'required|same:password',
				'address'=>'required',
				'group_name'=>'required'
			],
			[
				'required'=>'Phai nhap :attribute',
				'unique'=>':attribute da ton tai',
				'same'=>'Mat khau :attribute confirm khong chinh xac :other'
			]);
			$pass=bcrypt($req->password);
			$req->offsetUnset('_token','password','confirm_password');
			$req->merge(['password'=>$pass]);
			
			Users::create($req->all());
			return redirect()->route('cust_login')->with('success','Moi ban dang nhap');
			/*
			Users::create($req->all());
			return redirect()->back();*/
		}

		public function cust_edit(Request $req)
		{
			$id=Auth::user()->id;
			$cust=users::where('id',$id)->first();
			if ($req->isMethod('POST'))
			{
				$this->validate($req,[
					'name'=>'required',
					'email'=>'required|unique:users,email,'.$id,
					'phone'=>'required|unique:users,phone,'.$id,
					'address'=>'required'
				],[
					'required'=>':attribute khong duoc de trong',
					'unique'=>':attribute da ton tai'
				]);
				$req->offsetUnset('_token');
				if (users::where('id',$id)->update($req->all()))
				{
					return redirect()->back()->with('success','Update thanh cong');	
				}else{
					return redirect()->back()->with('fail','Cap nhat that bai');	
				}
				/*$req->merge(['password'=>$cust->password])*/
			}
			else
			{
				return view('Customer.edit_info',['cust'=>$cust]);
			}
		}
		public function cust_changepass(Request $req)
		{
			if ($req->isMethod('POST'))
			{
				$this->validate($req,[
					'current_password' => 'required|check_old_pass',
					'password' => 'required',
					'confirm_password' => 'required|same:password'
				],[
					'current_password.required' => 'Yeu cau nhap mat khau cu',
					'password.required'=>'Yeu cau nhap mat khau moi' ,
					'confirm_password.required'=>'Yeu cau nhap lai mat khau moi' ,
					'confirm_password.same'=>'Mat khau moi khong khop' ,
					'current_password.check_old_pass' => 'Mat khau khong khop'
				]);
				if (Auth::user()->update(['password'=>bcrypt($req->password)]))
				{
					Auth::logout();
					session(['cart'=>null]);
					return redirect()->Route('cust_login')->with('success','See u again');
				}else{
					return redirect()->back()->with('error','Tai khoan khong hop le');
				}				/*$req->merge(['password'=>$cust->password])*/
			}
			else
			{
				return view('Customer.change_pass');
			}
		}

		function customer_login(){
			if (Auth::user())
			{
				return redirect()->route('index');
			}
			return view('auth.login_customer');
		}

		function customer_login_post(Request $req)
		{
			if (Auth::attempt(['email'=>$req->email,'password'=>$req->password],$req->has('remember')))
			{
				session(['cart'=>null]);
				return redirect()->route('index')->with('success','Hello '.Auth::user()->name);
			}else
			{
				return redirect()->back()->with('error','Tai khoan khong hop le');
			}
		}

		function customer_logout(){
			Auth::logout();
			session(['cart'=>null]);
			return redirect()->Route('index')->with('success','See u again');
		}
		
		public function customer_forgot_pass(Request $req)
		{
			if ($req->isMethod('POST')){
				$this->validate($req,
					['email'=>'required|exists:users,email'],
					['required'=>'Please Enter your Email',
					'exists'=>'This email does not exist in database']);
				$token = str_random(100);
				$user=Users::where('email',$req->email);
				if ($user->update(['reset_token'=>$token]))
				{
					\Mail::send('emails.reset_pass_customer', ['token' => $token,'name' => $user->first()->name], function($message) use($req,$user)
					{
					    $message->to($req->email, $user->first()->name)->subject('Oriania Customer Reset Password Link');
					});

					return redirect()->back()->with('success','Please check your email');

				}else{
					return redirect()->back()->with('fail','Opps, There was a error, Please try again');
				}

			}else
			{
				return view('customer.forgot_pass');
			}
		}

		public function customer_forgot_pass_link(Request $req)
		{
			if ((Users::where('reset_token',$req->token)->first()<>null)&($req->token<>null))
			{
				$user=Users::where('reset_token',$req->token);
				if ($req->isMethod('POST'))
				{
					$this->validate($req,[
						'password'=>'required',
						'confirm_password'=>'required|same:password'
					],[
						'required'=>'Ban phai nhap :attribute',
						'same'=>'Mat khau nhap lai chua chinh xac'
					]);
					$pass=bcrypt($req->password);
					if (Users::where('reset_token',$req->token)->update(['password'=>$pass,'reset_token'=>'']))
					{
						return redirect()->Route('cust_login')->with('success','Password reset success !!!');
					}else{
						return redirect()->back()->with('fail','Opps, There was a error, Please try again');
					}

				}else{
					return view('customer.forgot_pass_link',['user'=>$user]);
				}
			}else{
				echo('link fail');
			}
		} 

		public function cust_order_list(Request $req)
		{
			$orders=Orders::where('customer_id',Auth::user()->id)->get();
			if ($req->isMethod('POST'))
			{

			}
			return view('customer.cust_order_list',['orders'=>$orders]);
		}

		public function cust_order_delivered(Request $req)
		{
			$order=Orders::where('id',$req->id)->first();
			if ($order!=null)
			{
				if ($order->customer_id==Auth::user()->id)
				{
					if ($order->status==3)
					{
						return redirect()->back()->with('status','Your Order Number '.$order->id.' has been delivered already');
					}
					if ($order->status==4)
					{
						return redirect()->back()->with('status','Your Order Number '.$order->id.' has been canceled already');
					}
					if ($req->isMethod('POST'))
					{
						$order->update(['status'=>'3','description'=>$req->description]);
						return redirect()->route('cust_order_list');
					}else
					{
						return view('customer.order_delivered',['order'=>$order]);
					}
				}
				else
				{
					echo('Your order ID not found');
				}
			}
			else
			{
				echo('Your order ID not found');
			}
		}

		public function cust_order_cancel(Request $req)
		{
			$order=Orders::where('id',$req->id)->first();
			if ($order!=null)
			{
				if ($order->customer_id==Auth::user()->id)
				{
					if ($order->status==3)
					{
						return redirect()->back()->with('status','Your Order Number '.$order->id.' has been delivered already');
					}
					if ($order->status==4)
					{
						return redirect()->back()->with('status','Your Order Number '.$order->id.' has been canceled already');
					}
					if ($req->isMethod('POST'))
					{
						$order->update(['status'=>'4','description'=>$req->description]);
						return redirect()->route('cust_order_list');
					}else
					{
						return view('customer.order_cancel',['order'=>$order]);
					}
				}
				else
				{
					echo('Your order ID not found');
				}
			}
			else
			{
				echo('Your order ID not found');
			}
		}
	
	}
 ?>