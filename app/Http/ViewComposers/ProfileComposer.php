<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\ProductType;
use App\Product;
use App\Cart;
use Session;
use App\User;

class profileComposer
{
	//  protected  $loai_sanpham;

	// public function __construct(ProductType $loai_sanpham)
 //    {
 //        // Dependencies automatically resolved by service container...
 //        $this->loai_sanpham = ProductType::all();
 //    }
	
	public function compose(View $view)
	{	
		$loai_sanpham = ProductType::all();
		$sp_select2 = Product::all();
		
		$view->with('loai_sanpham',$loai_sanpham);
		$view->with('sp_select2', $sp_select2);

		if(Session('cart')){
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(
                    [
                        'cart'=>Session::get('cart'),
                        'product_cart'=>$cart->items,
                        'totalPrice'=>$cart->totalPrice,
                        'totalQty'=>$cart->totalQty
                    ]
                );
            }
	}
}