<?php 
	namespace App\Http\Controllers\Admin;
	use App\Http\Controllers\Controller;
	use App\Models\category;
	use App\Models\product;
	use App\Models\orders;
	use App\Models\order_detail;
	use App\Models\Users as Users;
	use Illuminate\Http\Request;
	class OrderController extends MainController
	{
		public function index(Request $req)
		{	
			$users=Users::all();
			$orders=Orders::paginate(5);
			if ($req->_search){
				$orders=Orders::where('id','like','%'.$req->_search.'%')->paginate(5);
				return view('admin.order.index',['orders'=>$orders,'users'=>$users,'page'=>1]);
			}
			return view('admin.order.index',['orders'=>$orders,'users'=>$users]);
		}

		public function Vieworder(Request $req)
		{
			$order=Orders::where('id',$req->id)->first();
			$customer=Users::where('id',$order->customer_id)->first();
			$pro=product::all();
			$products=Order_detail::Where('order_id',$req->id)->get();
			return view('admin.order.vieworder',['order'=>$order,'products'=>$products,'customer'=>$customer,'pro'=>$pro]);
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

		public function orders_delivering(Request $req)
		{
			$order=Orders::where('id',$req->id)->first();
			if ($order!=null)
			{
				if ($order->status>2)
				{
					return redirect()->back()->with('fail','Order da co trang thai');
				}else
				{
					$order->update(['status'=>'2']);
					return redirect()->back()->with('success','Update order success');
				}
			}
			else
			{
				echo('Your order ID not found');
			}
		}

		public function orders_cancel(Request $req)
		{
			$order=Orders::where('id',$req->id)->first();
			if ($order!=null)
			{
				if ($order->status>2)
				{
					return redirect()->back()->with('fail','Order da co trang thai');
				}else
				{
					$order->update(['status'=>'4','admin_comment'=>'Order bi huy vi ly do dac biet, vui long lien he de biet them thong tin chi tiet']);
					return redirect()->back()->with('success','Update order success');
				}
			}
			else
			{
				echo('Your order ID not found');
			}
		}		
	}
 ?>