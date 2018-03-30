<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products"; 
    //Sản phẩm và loại sản phẩm quan hệ 1 nhiều. 1 sản phẩm thuộc về 1 loại sản phẩm nào đó
    //trong hàm belongsTo id là id của chính nó là id của product

    public function product_type(){
    	return $this->belongsTo('App\ProductType','id_type','id'); 
    }
    public function bill_detail(){
    	return $this->hasMany('App\BillDetail','id_product','id');
    }

}
