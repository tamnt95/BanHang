@extends('Admin.master')
@section('content')
<!-- general form elements -->
<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Thêm User</h3>
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
	<form action="admin/user/them" method="POST" enctype="multipart/form-data">{{--  Khi cần upload file thì cần sử dụng enctype="multipart/form-data" --}}
		<input type="hidden" name="_token" value="{{csrf_token()}}" />
		<div class="box-body">
			<div class="form-group">
				<label>Họ tên</label>
				<input class="form-control" name="name" placeholder="Nhập họ tên người dùng" />
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control" name="email" placeholder="Nhập địa chỉ Email" />
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu" />
			</div>
			<div class="form-group">
				<label>Nhập lại Password</label>
				<input type="password" class="form-control" name="passwordAgain" placeholder="Nhập lại mật khẩu" />
			</div>
			<div class="form-group">
				<label>Số điện thoại</label>
				<input type="text" class="form-control" name="phone" placeholder="Nhập số điện thoại" />
			</div>
			<div class="form-group">
				<label>Địa chỉ</label>
				<input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ Email" />
			</div>

			<div class="form-group">
				<label>Level người dùng</label>
				<label class="radio-inline">
					<input name="level" value="0" checked="" type="radio">Thường dân
				</label>
				<label class="radio-inline">
					<input name="level" value="1" checked="" type="radio">Admin
				</label>
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