@extends('master')

@section('content')
<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space60">&nbsp;</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="beta-products-list">
						<h4>Tìm kiếm</h4>
						<div class="beta-products-details">
							<p class="pull-left">Tìm thấy {{count($product)}} sản phẩm</p>
							<div class="clearfix"></div>
						</div>

						<div class="row">
							@foreach($product as $np)
							<div class="col-sm-3">
								<div class="single-item" style="margin-top: 20px;">
									@if($np->promotion_price != 0)
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
									<div class="single-item-header">
										<a href="chi-tiet-san-pham/{{$np->id}}"><img style="width: 270px;height: 320px;" src="source/image/product/{{$np->image}}" alt=""></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$np->name}}</p>
										<p class="single-item-price">
											@if($np->promotion_price == 0)
											<span class="flash-sale" >$ {{$np->unit_price}} VND</span>
											@else
											<span class="flash-del">$ {{$np->unit_price}}</span>
											<span class="flash-sale">{{$np->promotion_price}} VND</span>
											@endif
										</p>
									</div>
									<div class="single-item-caption" style="padding-top: 10px;">
										<a class="add-to-cart pull-left" href="add-to-cart/{{$np->id}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="chi-tiet-san-pham/{{$np->id}}">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div> <!-- .beta-products-list -->
				</div>
			</div> <!-- end section with sidebar and main content -->


		</div> <!-- .main-content -->
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection