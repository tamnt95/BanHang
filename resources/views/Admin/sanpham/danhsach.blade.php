admin/@extends('Admin.master')
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
      <table class="table no-margin" >
        <thead>
          <tr align="center">
            <th>Order ID</th>
            <th>Tên sản phẩm</th>
            <th>Loại sản phẩm</th>
            <th>Giá</th>
            <th>Giá khuyến mãi</th>
            <th>Image</th>
            <th>Unit(Đơn vị)</th>
            <th>Delete</th>
            <th>Edit</th>
          </tr>
        </thead>
        <tbody>
          @foreach($sanpham as $sp)
          <tr >
            <td>{{$sp->id}}</td>
            <td>{{$sp->name}}</td>
            <td>{{$sp->product_type->name}}</td>{{--  relationship product_type lấy từ liên kết ở model Product --}}
            <td>{{$sp->unit_price}}</td>
            <td>{{$sp->promotion_price}}</td>
            <td><img width="100px" src="source/image/product/{{$sp->image}}"></td>
            <td>{{$sp->unit}}</td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/sanpham/xoa/{{$sp->id}}"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/sanpham/sua/{{$sp->id}}">Edit</a></td>
          </tr>
          @endforeach
          
        </tbody>
      </table>
      <div style="text-align: center;">
        {{$sanpham->links()}} {{-- Phân trang trong laravel --}}
      </div>
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
