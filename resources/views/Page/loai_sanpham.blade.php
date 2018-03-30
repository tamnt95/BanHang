@extends('master')

@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index">Home</a> / <span>{{$loaisanpham->name}}</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							@foreach($loai_sanpham as $lsp)
							<li><a href="loai-san-pham/{{$lsp->id}}/{{$lsp->TenKhongDau}}.html">{{$lsp->name}}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>{{$loaisanpham->name}}</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($sanpham)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($sanpham as $sp)
								<div class="col-sm-4">
									<div class="single-item" style="margin-top: 20px;">
										@if($sp->promotion_price != 0)
											<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
											<a href="chi-tiet-san-pham/{{$sp->id}}"><img style="width: 270px;height: 320px;" src="source/image/product/{{$sp->image}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$sp->name}}</p>
											<p class="single-item-price">
												@if($sp->promotion_price == 0)
													<span class="flash-sale" >$ {{$sp->unit_price}} VND</span>
												@else
													<span class="flash-del">$ {{$sp->unit_price}}</span>
													<span class="flash-sale">{{$sp->promotion_price}} VND</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption" style="padding-top: 10px;">
											<a class="add-to-cart pull-left" href="add-to-cart/{{$sp->id}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="chi-tiet-san-pham/{{$sp->id}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach	
							</div>
							<div style="text-align: center;">
								{{$sanpham->links()}} {{-- Phân trang trong laravel --}}
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản phẩm khác</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($sp_khac)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($sp_khac as $spk)
								<div class="col-sm-4">
									<div class="single-item" style="margin-top: 20px;">
										@if($spk->promotion_price != 0)
											<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
											<a href="chi-tiet-san-pham/{{$spk->id}}"><img style="width: 270px;height: 320px;" src="source/image/product/{{$spk->image}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$spk->name}}</p>
											<p class="single-item-price">
												@if($spk->promotion_price == 0)
													<span class="flash-sale" >$ {{$spk->unit_price}} VND</span>
												@else
													<span class="flash-del">$ {{$spk->unit_price}}</span>
													<span class="flash-sale">{{$spk->promotion_price}} VND</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption" style="padding-top: 10px;">
											<a class="add-to-cart pull-left" href="add-to-cart/{{$spk->id}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="chi-tiet-san-pham/{{$spk->id}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection