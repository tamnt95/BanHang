<div id="header">
	<div class="header-top">
		<div class="container">
			<div class="pull-left auto-width-left">
				<ul class="top-menu menu-beta l-inline">
					<li><a href=""><i class="fa fa-home"></i> 90-92 Lê Thị Riêng, Bến Thành, Quận 1</a></li>
					<li><a href=""><i class="fa fa-phone"></i> 0163 296 7751</a></li>
				</ul>
			</div>
			<div class="pull-right auto-width-right">
				<ul class="top-details menu-beta l-inline">
					@if(!Auth::user())
					<li><a href="dangki">Đăng kí</a></li>
					<li><a href="dangnhaptemp">Đăng nhập</a></li>
					@else
					<li><a href="{{route('thongtinnguoidung',Auth::user()->id)}}" ><i class="fa fa-user"></i>{{Auth::user()->full_name}}</a></li>
					<li><a href="dangxuat"><i class="fa fa-user"></i>Đăng xuất</a></li>
					@endif
				</ul>
			</div>
			<div class="clearfix"></div>
		</div> <!-- .container -->
	</div> <!-- .header-top -->
	<div class="header-body">
		<div class="container beta-relative">
			<div class="pull-left">
				<a href="index" id="logo"><img src="source/assets/dest/images/logo-cake.png" width="200px" alt=""></a>
			</div>
			<div class="pull-right beta-components space-left ov">
				<div class="space10">&nbsp;</div>
					<div class="beta-comp">
						<form role="search" method="get" id="searchform" action="search">
					        <input type="text" value="" name="key" id="s" placeholder="Nhập từ khóa..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
						
						<select id="nameid" style="width: 300px"  class="select2" {{-- multiple="multiple" --}}>
							<option></option>
							@foreach($sp_select2 as $sp2)
										<option>{{$sp2->name}}</option>
							@endforeach
						</select>
					</div>

					<div class="beta-comp">

						
							<div class="cart">
							<div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (@if(Session::has('cart')){{Session('cart')->totalQty}}@else Trống @endif) <i class="fa fa-chevron-down"></i></div>
							<div class="beta-dropdown cart-body">
								@if(Session::has('cart'))
								@foreach($product_cart as $product)
								<div class="cart-item">
									<a class="cart-item-delete" href="del-cart/{{$product['item']['id']}}"><i class="fa fa-times"></i></a>
									<div class="media">
										<a class="pull-left" href="#"><img src="source/image/product/{{$product['item']['image']}}" alt=""></a>
										<div class="media-body">
											<span class="cart-item-title">{{$product['item']['name']}} x {{$product['qty']}}</span>
											<span class="cart-item-amount">
												@if($product['item']['promotion_price'] == 0)
													<span>{{$product['item']['unit_price']}}</span>
												@else
													<span>{{$product['item']['promotion_price']}}</span>
												@endif
											</span>
										</div>
									</div>
								</div>
								@endforeach
								@endif
								

								<div class="cart-caption">
									<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">@if(Session::has('cart')){{number_format($totalPrice)}} @else 0 @endif đồng</span></div>
									<div class="clearfix"></div>

									<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="dat-hang" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
									</div>
								</div>
							</div>
							</div> <!-- .cart -->
						
					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="index">Trang chủ</a></li>
						<li><a>Loại sản phẩm</a>
							<ul class="sub-menu">
								@foreach($loai_sanpham as $lsp)
								<li><a href="loai-san-pham/{{$lsp->id}}/{{$lsp->TenKhongDau}}.html">{{$lsp->name}}</a></li>
								@endforeach
							</ul>
						</li>
						<li><a href="gioi-thieu">Giới thiệu</a></li>
						<li><a href="lien-he">Liên hệ</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->


	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
	@section('css')
	<style type="text/css" media="screen">
	.select2-container--default .select2-results__option[aria-disabled=true] {
    	display: none;
	}	

	</style>
	@endsection
	@section('script')


	<script type="text/javascript">
		  $("#nameid").select2({
            placeholder: 'Select a Name',
            allowClear: true
            // minimumResultsForSearch: Infinity
        });
		

	</script>
	@endsection