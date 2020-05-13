@extends('main.home')
@section('title','View Your Order')
@section('content')
<!-- HOME SLIDER -->
    <div class="cart-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="car-header-title">
                        <h2>Chi tiết đơn hàng</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area product-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="index-7.html">Đơn hàng của bạn <i class="fa fa-angle-right"></i></a></li>
                            <li>Đơn hàng số: {{$order->id}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->
    <!-- cart-main-area start -->
    <div class="cart-main-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">       
                    <div class="table-content table-responsive">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">Trạng thái đơn hàng :</h3>
                            </div>
                            <div class="panel-body">
                                <h2>
                                @switch($order['status'])
                                @case(1)
                                    Processing
                                    @break
                                @case(2)
                                   Delivering...
                                    @break
                                @case(3)
                                    Delivered
                                    @break
                                @default
                                   Cancelled
                                   <br>
                                   {{$order['admin_comment']}}
                                @endswitch
                                </h2>
                                @if(session('status'))
                                <div class="alert alert-warning">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <strong>{{session('status')}}</strong>
                                </div>
                                @endif
                                
                            </div>
                        </div>
                        <table>
                            
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">Sản phẩm</th>
                                    <th class="product-price">Đơn giá(VNĐ)</th>
                                    <th class="product-quantity">Số lượng</th>
                                    <th class="product-subtotal">Tổng giá trị</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($products != null)
                                @foreach($products as $product)
                                <tr>
                                    <?php 
                                        $prod=product_id($product['product_id']); 
                                    ?>
                                    <td class="product-thumbnail"><a href="{{route('product_view',['id'=>$product['product_id']])}}"><img src="{{url('/')}}/upload/{{$prod['image']}}" alt="" /></a></td>
                                    <td class="product-name"><a href="{{route('product_view',['id'=>$product['product_id']])}}">{{$prod['name']}}</a></td>
                                    <td class="product-price"><span class="amount">{{$product['price']}}</span></td>
                                    <td class="product-quantity">{{$product['quantity']}}</td>
                                    <td class="product-subtotal">{{$product['quantity']*$product['price']}}</td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    @csrf
                    <div class="row">
                        <div class="col-md-8 col-sm-7">
                            <div class="buttons-cart">
                                <form action="{{route('ViewInvoice')}}" method="GET" accept-charset="utf-8">
                                    <input type="hidden" name="id" value="{{$order->id}}">
                                    <input type="submit" value="PRINT INVOICE" />
                                </form>
                                <a href="{{route('index')}}">Tiếp tục mua sắm</a>
                            </div>
                            <div class="coupon">
                               
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-5">
                            <div class="cart_totals">
                                <h2>ĐƠN HÀNG</h2>
                                <table>
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Tạm tính</th>
                                            <td><span class="amount">{{cart_value_by_id($order->id)}}</span></td>
                                        </tr>
                                        
                                        <!-- <tr class="shipping">
                                            <th>Shipping</th>
                                            <td>
                                                <ul id="shipping_method">
                                                    <li>
                                                        <input type="radio" />
                                                        <label>
                                                            Flat Rate: <span class="amount">7.00</span>
                                                        </label>
                                                    </li> 
                                                    <li>
                                                        <input type="radio" />
                                                        <label>
                                                            Free Shipping
                                                        </label>
                                                    </li>
                                                    <li></li>
                                                </ul> 
                                                <p><a class="shipping-calculator-button" href="#">Calculate Shipping</a></p>
                                            </td>
                                        </tr> -->
                                        <tr class="order-total">
                                            <th>Tổng giá trị</th>
                                            <td>
                                                <strong><span class="amount">{{cart_value_by_id($order->id)}}.000 VNĐ</span></strong>
                                            </td>
                                        </tr>                                           
                                    </tbody>
                                </table>
                                <div class="wc-proceed-to-checkout">
                                    <a href="{{route('cust_order_delivered',['id'=>$order->id])}}">Xác nhận đơn hàng</a>
                                    <a href="{{route('cust_order_cancel',['id'=>$order->id])}}">Hủy đơn</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cart-main-area end -->
@stop