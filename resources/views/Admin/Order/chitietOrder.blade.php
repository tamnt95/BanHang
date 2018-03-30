@extends('Admin.master')
@section('content')
<!-- TABLE: LATEST ORDERS -->

<div class="box box-info" style="margin">
  <div class="box-header with-border">
    <h3 class="box-title">Chi tiết đơn hàng</h3>

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
           {{-- <th>Khách hàng</th> --}}
           <th>Sản phẩm</th>
           <th>Loại sản phẩm</th>
           <th>Hình ảnh</th>
           <th>Số lượng</th>
           <th>Đơn vị</th>
           <th>Giá</th>

       </tr>
   </thead>
   <tbody>
    @foreach($bill_detail as $bd)
    <tr >
       {{--  <td>{{$bd->bill->customer->name}}</td> --}}

       <td>{{$bd->product->name}}</td>
       <td>{{$bd->product->product_type->name}}</td>
       <td>
          <img style="width: 100px;" src="source/image/product/{{$bd->product->image}}">
      </td>
      <td>{{$bd->quantity}}</td>
      <td>{{$bd->product->unit}}</td>
      <td>{{$bd->unit_price}}</td>  
  </tr>
  @endforeach

</tbody>
</table>
</div>
<!-- /.table-responsive -->
</div>
<!-- /.box-body -->
<div class="box-footer clearfix">
    <div class="box3 box-primary" style="border-top-color: #f39c12;">
        <div class="box-body box-profile" style="float: left; width: 35%;" >
            <img class="profile-user-img img-responsive img-circle" src="source/image/product/26239872_2089047434661780_1384622075900905199_n.jpg" alt="User profile picture">

            <h3 class="profile-username text-center">{{$bill->customer->name}}</h3>

            <p class="text-muted text-center">{{$bill->customer->gender}}</p>

            <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                    <b>Email</b> <a class="pull-right">{{$bill->customer->email}}</a>
                </li>
                <li class="list-group-item">
                    <b>Địa chỉ</b> <a class="pull-right">{{$bill->customer->address}}</a>
                </li>
                <li class="list-group-item">
                    <b>Số điện thoại</b> <a class="pull-right">{{$bill->customer->phone_number}}</a>
                </li>
                
            </ul>

            <a href="admin/khachhang/danhsachOrder" class="btn btn-primary btn-block"><b>Giao hàng</b></a>
        </div>
        <div class="box-body box-profile" style="float: right; width: 65%;"> 
            <div class="nav-tabs-custom" ">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Thông tin hóa đơn</a></li>
              <li><a href="#timeline" data-toggle="tab">Ghi chú</a></li>

            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                    <b>Hình thức thanh Toán</b> <a class="pull-right">{{$bill->payment}}</a>
                </li>
                <li class="list-group-item">
                    <b>Ngày đặt hàng</b> <a class="pull-right">{{$bill->date_order}}</a>
                </li>
                <li class="list-group-item">
                    <b>Tổng tiền</b> <a class="pull-right">{{$bill->total}}</a>
                </li>
                
            </ul>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  
                  <li>
                    <i class="fa fa-envelope bg-blue"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> {{$bill->date_order}}</span>

                      <h3 class="timeline-header"><a >{{$bill->customer->name}}</a> yêu cầu của khách hàng</h3>

                      <div class="timeline-body">
                        {{$bill->note}}
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-primary btn-xs">Read more</a>
                        <a class="btn btn-danger btn-xs">Delete</a>
                      </div>
                    </div>
                  </li>
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
        </div>
    </div>
   {{--  <div class="box1 box-warning" style="border-top-color: #f39c12;">
        <div class="form-group has-error">
            <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> Ghi chú</label>
            <textarea type="text" style="height: 250px;" class="form-control" id="inputError">{{$bill->note}}</textarea>
            <span class="help-block">Yêu cầu của khách hàng</span>
        </div>

    </div> --}}
</div>
<!-- /.box-footer -->
</div>
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
.box3{
  position: relative;
  border-radius: 3px;
  background: #ffffff;
  border-top: 3px solid #d2d6de;
  margin-bottom: 20px;
  width: 100%;
  box-shadow: 0 1px 1px rgba(0,0,0,0.1);
  float: left;
  margin-top: 10px;
}

</style>
@endsection
