@extends('main.admin')
@section('title','Admin Order page')
@section('content')
	<form action="" method="GET" class="form-inline" role="form">
	
		<div class="form-group">
			<label class="sr-only" for="">Gia tri tim kiem</label>
			<input type="text" class="form-control" id="" name="_search" placeholder="Nhap gia tri tim kiem" value="{{request()->_search}}">
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
		<a href="{{route('register')}}" class="btn btn-info" title="">Thêm mới customer</a>
		
	</form>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Số TT</th>
				<th>Tên người dùng</th>
				<th>email</th>
				<th>Số ĐT</th>
				<th>password</th>
				<th>Địa chỉ</th>
				<th>group_name</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($customers as $cus): ?>
			<tr>
				<td>{{$cus['id']}}</td>
				<td>{{$cus['name']}}</td>
				<td>{{$cus['email']}}</td>
				<td>{{$cus['phone']}}</td>
				<td>{{$cus['password']}}</td>
				<td>{{$cus['address']}}</td>
				<td>{{$cus['group_name']}}</td>
			</tr>	
		<?php endforeach ?>
		</tbody>
	</table>
	{{$customers->links()}}
@stop