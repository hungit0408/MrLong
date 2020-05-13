<?php 
	namespace App\Http\Controllers\Admin;
	use App\Http\Controllers\Controller;
	use App\Models\Users;
	use illuminate\Http\Request;
	use Illuminate\Support\Facades\Hash;
	use Auth;
	/**
	 * 
	 */
	class Usercontroller extends Controller
	{
		
		public function login()
		{
			if (Auth::user())
			{
				return redirect()->route('admin.index');
			}
			return view('auth.login');
		}
		public function post_login(Request $req)
		{
			if (Auth::attempt($req->only('email','password'),$req->has('remember')))
			{
				session(['cart'=>null]);
				return redirect()->Route('admin.index')->with('success','Dang nhap thanh cong');
			}else 
			{
				return redirect()->back()->with('error','Sai thong tin dang nhap');
			}
		}

/*protected $fillable=['name','email','phone','password','address','group_name'];*/
		public function register()
		{
			return view('auth.register');
		}
		public function post_register(Request $req)
		{
			$this->validate($req,[
				'name'=>'required|min:6',
				'email'=>'required|unique:Users,email',
				'phone'=>'required|unique:Users,phone',
				'password'=>'required|min:6',
				'confirm_password'=>'required|same:password',
				'address'=>'required',
				'group_name'=>'required'
			],[
				'required'=>'ban phai nhap truong :attribute',
				'min'=>':attribute toi thieu 6 ky tu',
				'unique'=>':attribute da ton tai',
				'same'=>':attribute khong duoc trung khop voi :other'
			]);

			$pass=bcrypt($req->password);
			$req->offsetUnset('_token','password','confirm_password');
			$req->merge(['password'=>$pass]);
			Users::create($req->all());
			return redirect()->back();
			/*dd($req->all());*/
		}
		function logout(){
			Auth::logout();
			session(['cart'=>null]);
			return redirect()->Route('login')->with('success','See u again');
		}
		function changepass(Request $req){
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
								return redirect()->Route('login')->with('success','See u again');
							}else{
								return redirect()->back()->with('error','Tai khoan khong hop le');
							}				/*$req->merge(['password'=>$cust->password])*/
						}
						else
						{
							return view('auth.change-pass');
						}
		}

		public function editinfo(Request $req)
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
				return view('auth.edit_info',['cust'=>$cust]);
			}
		}


		public function admin_forgot_pass(Request $req)
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
					\Mail::send('emails.reset_pass_admin', ['token' => $token,'name' => $user->first()->name], function($message) use($req,$user)
					{
					    $message->to($req->email, $user->first()->name)->subject('Oriania Admin Reset Password Link');
					});

					return redirect()->back()->with('success','Please check your email');

				}else{
					return redirect()->back()->with('fail','Opps, There was a error, Please try again');
				}

			}else
			{
				return view('auth.forgot_pass');
			}
		}

		public function admin_forgot_pass_link(Request $req)
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
						return redirect()->Route('login')->with('success','Password reset success !!!');
					}else{
						return redirect()->back()->with('fail','Opps, There was a error, Please try again');
					}

				}else{
					return view('auth.forgot_pass_link',['user'=>$user]);
				}
			}else{
				echo('link fail');
			}
		} 
	}
 ?>