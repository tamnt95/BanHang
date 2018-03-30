@extends('Admin.master')
@section('content')
<!-- general form elements -->
<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Thêm sản phẩm</h3>
	</div>
	<!-- /.box-header -->
	<!-- form start -->
	@if(count($errors)>0)
	<div class="alert alert-danger">
		@foreach($errors->all() as $err)
		{{$err}}<br>
		@endforeach
	</div>
	@endif

	@if(session('thongbao'))
	<div class="alert alert-success">
		{{session('thongbao')}}
	</div>

	@endif
	<form action="admin/sanpham/them" method="POST" enctype="multipart/form-data">{{--  Khi cần upload file thì cần sử dụng enctype="multipart/form-data" --}}
		<input type="hidden" name="_token" value="{{csrf_token()}}" />
		<div class="box-body">
			<div class="form-group">
				<label>Tên sản phẩm</label>
				<input type="text" class="form-control" id="name" name="name" value="">
			</div>
			<div class="form-group">
				<label>Loại sản phẩm</label>
				<select class="form-control" name="TheLoai">
					@foreach($theloai as $tl)
					<option value="{{$tl->id}}">{{$tl->name}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label>Giá</label>
				<input type="text" class="form-control" id="unit_price" name="unit_price" value="">
			</div>
			<div class="form-group">
				<label>Giá khuyến mãi</label>
				<input type="text" class="form-control" id="promotion_price" name="promotion_price" value="">
			</div>
			<div class="form-group">
				<label>Unit(Đơn vị)</label>
				<input type="text" class="form-control" id="unit" name="unit" value="">
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Mô tả</label>
				<textarea id="description" name="description" class="form-control" rows="3"></textarea>
			</div>
			<div class="form-group">
				<label>Hình ảnh</label>
				<p>
					<img width="400px" src="">
				</p>
				<input type="file" name="image" class="form-control"/>
			</div>
			{{-- <div class="form-group">
				<label for="exampleInputFile">File input</label>
				<input type="file" id="exampleInputFile">

				<p class="help-block">Example block-level help text here.</p>
			</div>
			<div class="checkbox">
				<label>
					<input type="checkbox"> Check me out
				</label>
			</div> --}}
		</div>
		<!-- /.box-body -->

		<div class="box-footer">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	</form>
</div>
<!-- /.box -->
@endsection
@section('css')
<style type="text/css" media="screen">
.box{
	position: relative;
	border-radius: 3px;
	background: #ffffff;
	border-top: 3px solid #d2d6de;
	margin-bottom: 20px;
	width: 84%;
	box-shadow: 0 1px 1px rgba(0,0,0,0.1);
	float: right;
	margin-right: 5px;
	margin-top: 10px;
}
</style>
@endsection