@extends('Admin.master')
@section('content')
<!-- general form elements -->
<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Thêm thể loại sản phẩm</h3>
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
	<form action="admin/slide/them" method="POST" enctype="multipart/form-data">{{--  Khi cần upload file thì cần sử dụng enctype="multipart/form-data" --}}
		<input type="hidden" name="_token" value="{{csrf_token()}}" />
		<div class="box-body">
			<div class="form-group">
				<label>Tên Slide</label>
				<input type="text" class="form-control" id="Ten" name="Ten" value="">
			</div>
			<div class="form-group">
				<label>Nội dung</label>
				<input type="text" class="form-control" id="NoiDung" name="NoiDung" value="">
			</div>
			<div class="form-group">
				<label>Link</label>
				<input type="text" class="form-control" id="link" name="link" value="">
			</div>
          <div class="form-group">
          	<label>Hình ảnh</label>
          	<p>
          		<img width="400px" src="">
          	</p>
          	<input type="file" name="image" class="form-control"/>
          </div>
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