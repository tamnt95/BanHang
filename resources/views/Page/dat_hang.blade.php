@extends('master')

@section('content')

<div class="container">
	<div id="content">

		<form action="dat-hang" method="post" class="beta-form-checkout">
			<input type="hidden" name="_token"	value="{{csrf_token()}}">
			<div class="row">@if(Session::has('thongbao'))<div class="alert alert-success">{{Session::get('thongbao')}}@endif</div>
			<div class="row">
				<div class="col-sm-6">
					<h4>Đặt hàng</h4>
					<div class="space20">&nbsp;</div>

					<div class="form-block">
						@if(!Auth::user())
						<label for="name">Họ tên*</label>
						<input type="text" id="name" name="name" placeholder="Họ tên" required>
						@else
						<label for="name">Họ tên*</label>
						<input type="text" id="name" name="name" placeholder="Họ tên" required readonly value="{{Auth::user()->full_name}}">
						@endif
					</div>
					<div class="form-block">
						@if(!Auth::user())
						<label>Giới tính </label>
						<input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
						<input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Nữ</span>
						@endif



					</div>

					<div class="form-block">
						@if(!Auth::user())
							<label for="email">Email*</label>
							<input type="email" id="email" name="email" required placeholder="expample@gmail.com">
						@else
							<label for="email">Email*</label>
							<input type="email" id="email" name="email" style="background-color: #e9e5e5;" required  readonly value="{{Auth::user()->email}}">
						@endif
					</div>

					<div class="form-block">
						@if(!Auth::user())
							<label for="adress">Địa chỉ*</label>
							<input type="text" id="address" name="address" placeholder="Street Address" required>
						@else
							<label for="adress">Địa chỉ*</label>
							<input type="text" id="address" name="address" placeholder="Street Address" required readonly value="{{Auth::user()->address}}">
						@endif
					</div>


					<div class="form-block">
						@if(!Auth::user())
							<label for="phone">Điện thoại*</label>
							<input type="text" id="phone" name="phone" required>
						@else
							<label for="phone">Điện thoại*</label>
							<input type="text" id="phone" name="phone" required readonly value="{{Auth::user()->phone}}">
						@endif
					</div>

					<div class="form-block">
						<label for="notes" >Ghi chú</label>
						<textarea id="notes" name="note"></textarea>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="your-order">
						<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
						<div class="your-order-body" style="padding: 0px 10px">
							<div class="your-order-item">
								<div>
									@if(Session::has('cart'))
									@foreach($product_cart as $cart)
									<!--  one item	 -->
									<div class="media">
										<img width="25%" src="source/image/product/{{$cart['item']['image']}}" alt="" class="pull-left">
										<div class="media-body">
											<p class="font-large">{{$cart['item']['name']}}</p>
											<span class="color-gray your-order-info">Số lượng: {{$cart['qty']}}</span>
											<span class="color-gray your-order-info">Đơn giá: {{$cart['price']}}</span>
										</div>
									</div>
									@endforeach
									@endif
									<!-- end one item -->
									
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="your-order-item">
								<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
								<div class="pull-right"><h5 class="flash-sale">
								@if(Session::has('cart')){{number_format($totalPrice)}}@else 0 @endif VND</h5></div>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>

						<div class="your-order-body">
							<ul class="payment_methods methods">
								<li class="payment_method_bacs">
									<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
									<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
									<div class="payment_box payment_method_bacs" style="display: block;">
										Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
									</div>						
								</li>

								<li class="payment_method_cheque">
									<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="" >
									<label for="payment_method_cheque">Chuyển khoản </label>
									<div class="payment_box payment_method_cheque" style="display: none;">
										Chuyển tiền đến tài khoản sau:
										<br>- Số tài khoản: 123 456 789
										<br>- Chủ TK: Nguyễn A
										<br>- Ngân hàng ACB, Chi nhánh TPHCM
									</div>						
								</li>

							</ul>
						</div>

						<div class="text-center"><button type="submit" class="beta-btn primary" href="#">Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
					</div> <!-- .your-order -->
				</div>
			</div>
		</form>
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection