@extends('main.admin')
@section('title','Admin Order page')
@section('content')
	<form action="" method="GET" class="form-inline" role="form">
	
		<div class="form-group">
			<label class="sr-only" for="">Gia tri tim kiem</label>
			<input type="text" class="form-control" id="" name="_search" placeholder="Nhap gia tri tim kiem" value="{{request()->_search}}">
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
		<a href="{{route('admin.category.add')}}" class="btn btn-info" title="">Add new</a>
		
	</form>
	<table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th>#</th>
        <th>Mô tả</th>
        <th>Số lượng</th>
        <th>Đơn vị tính VNĐ</th>
        <th>Tổng tiền</th>
      </tr>
    </thead>
    <tbody>
      <?php $num=1; ?>
      @foreach($products as $product)
      <tr>
        <?php 
            $prod=product_id($product['product_id']); 
        ?>
        <th scope="row">{{$num}}</th>
        <td>{{$prod['name']}}</td>
        <td align="right">{{$product->quantity}}</td>
        <td align="right">{{$product->price}}</td>
        <td align="right">{{$product->quantity*$product->price}}</td>
        <?php $num++ ?>
      </tr>
      @endforeach
    </tbody>

    <tfoot>
        <tr>
            <td colspan="3"></td>
            <td align="right">Subtotal VNĐ</td>
            <td align="right">{{cart_value($products)}}</td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td align="right">Chiết khấu:</td>
            <td align="right">0</td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td align="right">Total VNĐ</td>
            <td align="right" class="gray">{{cart_value($products)}}</td>
        </tr>
    </tfoot>
  </table>
@stop