@extends('Admin.master')
@section('content')
<!-- TABLE: LATEST ORDERS -->
<div class="box box-info" style="margin">
  <div class="box-header with-border">
    <h3 class="box-title">Danh sách loại sản phẩm</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="table-responsive">
      <table class="table no-margin">
        <thead>
          <tr align="center">
            <th>Order ID</th>
            <th>Tên loại</th>
            <th>Tên không dấu</th>
            <th>Image</th>
            <th>Delete</th>
            <th>Edit</th>
          </tr>
        </thead>
        <tbody>
          @foreach($theloai as $tl)
          <tr >
            <td>{{$tl->id}}</td>
            <td>{{$tl->name}}</td>
            <td>{{$tl->TenKhongDau}}</td>
            <td><img width="100px" src="source/image/product/{{$tl->image}}"></td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="theloai/xoa/{{$tl->id}}"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="theloai/sua/{{$tl->id}}">Edit</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.table-responsive -->
  </div>
  <!-- /.box-body -->
  <div class="box-footer clearfix">
    <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
  </div>
  <!-- /.box-footer -->
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
