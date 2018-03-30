<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    //
    protected $table = "type_products";
    //Sản phẩm và loại sản phẩm quan hệ 1 nhiều. 1 loại sản phẩm có nhiều sản phẩm
    //trong hàm hasMany id là id của chính nó là id của product_type
    public function product(){
    	return $this->hasMany('App\Product','id_type','id'); 
    }
}
