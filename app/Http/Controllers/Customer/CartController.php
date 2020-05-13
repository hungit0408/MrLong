<?php 
	namespace App\Http\Controllers\Customer;
	use App\Http\Controllers\Controller;
	use App\Models\Category;
	use App\Models\product;
	use App\Models\Orders;
	use App\Models\Order_detail;
	use App\Models\Users;
	use App\Http\Helpers\Cart;
	use Illuminate\Http\Request;
	use Auth;
	use PDF;

	/**
	 * 
	 */
	class CartController extends Controller
	{
		
		public function add_cart($id,Cart $cart)
		{
			$pro = Product::find($id);
			if ($pro){
				$cart->add($pro);
			}
			return redirect()->route('viewcart');
		} 

		public function add_cart2($id,Cart $cart)
		{
			$pro = Product::find($id);
			if ($pro){
				$cart->add($pro);
			}

			 $message = [
		      'success' => true,
		      'msg' => 'Thêm Sản Phẩm Vào Giỏ Hành Thành Công',
		      'tong_so_luong' => 12
		 	 ];
			
			echo json_encode($message);
		}

		public function update_cart($id)
		{

		} 
		public function remove_cart($id,Cart $cart)
		{
			$cart->remove($id);
			return redirect()->route('viewcart');
		} 
		public function clear_cart()
		{
			session(['cart'=>null]);
			return redirect()->route('viewcart');
		}
		public function viewcart(Request $req,Cart $cart)
		{
			if ($req->isMethod('POST'))
			{
				$cart=session('cart');
				$vali=[];
				/*foreach ($req->all() as $key => $value)
				{
					$k=(string)$value;
					if ($key!='_token') {$vali[$k]='required|integer|min:0';}
				}
				dd($vali);
				$this->validate($req,$vali,
					[
						'integer'=>'Must be integer',
						'min'=>'Phai lon hon hoac bang 0'
					]
				);*/
				foreach ($req->all() as $key => $value) {
					$cart[$key]['quantity']=$value;
					/*dd((($value<0)and(is_int($value))));*/
					if (!(ctype_digit($value))||(($value<0)and(is_int($value))))
					{
						if ($key!='_token')
						{
							return redirect()->back()->with('status','You must input number and larger than 0');
						} 
					}
					if ($value==0)
					{
						unset($cart[$key]);
					}
				}
				unset($cart['_token']);
				session(['cart'=>$cart]);
				return redirect()->route('viewcart');
			}else
			{
				return view('customer.cart');
			}
		} 

		public function checkout(Request $req)
		{	
			if ($req->isMethod('POST'))
			{
				if(session('cart')==null)
				{
					return redirect()->route('checkout')->with('status','Your cart is empty');
				}
				Orders::create(['customer_id'=>Auth::user()->id,'country'=>$req->country,'name'=>$req->name,'address'=>$req->address,'town'=>$req->town,'email'=>$req->email,'phone'=>$req->phone,'description'=>$req->description,'status'=>1]);
				$ord=Orders::all()->last()->id;
				foreach (session('cart') as $product)
				{
					order_detail::create(['order_id'=>$ord,'product_id'=>$product['id'],'price'=>$product['price'],'quantity'=>$product['quantity']]);
				}

				//for send email purpose
				$order=Orders::all()->last();
				$customer=Users::where('id',$order->customer_id)->first();
				$pro=product::all();
				$products=Order_detail::Where('order_id',$order->id)->get();
				/*return view('emails.orderconfirm', ['order'=>$order,'products'=>$products,'customer'=>$customer,'pro'=>$pro]);*/
				\Mail::send('emails.orderconfirm', ['order'=>$order,'products'=>$products,'customer'=>$customer,'pro'=>$pro], function($message) use($req)
				{
				    $message->to(Auth::user()->email, Auth::user()->name)->subject('Order Confirmation #'.$req->id);
				});
				session(['cart'=>null]);
				return view('customer.order_success',['order_id'=>$ord]);
			}else
			{
				return view('customer.checkout');
			}
		}

		public function order_success(Request $req)
		{
			return view('customer.order_success',['order_id'=>$req->order_id]); 
		}

		public function Vieworder(Request $req)
		{
			$order=Orders::where('id',$req->id)->first();
			$customer=Users::where('id',$order->customer_id)->first();
			$pro=product::all();
			$products=Order_detail::Where('order_id',$req->id)->get();
			return view('Vieworder',['order'=>$order,'products'=>$products,'customer'=>$customer,'pro'=>$pro]);
		}

		public function PDFview(Request $req)
		{
			$order=Orders::where('id',$req->id)->first();
			$customer=Users::where('id',$order->customer_id)->first();
			$pro=product::all();
			$products=Order_detail::Where('order_id',$req->id)->get();
			$pdf = PDF::loadView('Viewinvoice',['order'=>$order,'products'=>$products,'customer'=>$customer,'pro'=>$pro]);
			return $pdf->stream('customers.pdf');
		}

		public function Api_category()
		{
			return session('cart');
		}
	}
 ?>