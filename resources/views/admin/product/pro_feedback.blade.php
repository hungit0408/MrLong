@extends('main.admin')
@section('title','Admin view product')
@section('content')
	<div class="card">
	    <h5 class="card-header">Phản hồi về sản phẩm</h5>
	    @if(Session::has('status'))
	    <div class="alert alert-success">
	    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	    	<strong>{{Session::get('status')}}</strong>
	    </div>
	    @endif
	    @foreach($feedback as $fb)
	    <div class="card-body">
	        <div class="list-group">
	            <a href="javascript:void(0)" class="list-group-item list-group-item-action flex-column align-items-start">
	                <div class="d-flex w-100 justify-content-between">
	                    <h3 class="mb-1">Tên: {{$fb->name}}</h3>
	                    <h5 class="mb-1">Email: {{$fb->email}}</h5>
	                    <small class="text-muted">{{$fb->updated_at}}</small>
	                </div>
	                <p class="mb-1">Nội dung phản hồi: {{$fb->feedback}}</p>
	                <div> Bình chọn sản phẩm:
	                	@for ($i = 1; $i <= 5; $i++)
	                	@if($i<=$fb->rating) 
	                	<i class="fa fa-star" style="color: #FFD21D"></i>
	                	@else
	                	<i class="fa fa-star"></i>								
	                	@endif
	                	@endfor	
	                </div>
	                <small class="text-muted"></small>
	                <a href="{{route('del_feedback',['id'=>$fb->id])}}" title="" onclick="return confirm('Bạn có chắc xóa phản hồi?')"><i class="fa fa-window-close" aria-hidden="true"></i></a>
	            </a>
	        </div>
	    </div>
	    @endforeach
	</div>
@stop