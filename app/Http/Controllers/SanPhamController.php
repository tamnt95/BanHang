<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductType;

class SanPhamController extends Controller
{
	public function getDanhSach(){
		$sanpham = Product::paginate(10);
    	return view('Admin.sanpham.danhsach',['sanpham'=>$sanpham]);
	}
	public function getThem(){
   	 	$theloai = ProductType::all();
    	return view('Admin.sanpham.themsanpham',['theloai'=>$theloai]);
    }
    function postThem(Request $request){
    	$this->validate($request,
    		[
    			'name' => 'required|unique:products,name|min:3|max:100'
    		],
    		[
    			'name.required' => 'Bạn chưa nhập tên thể loại',
    			'name.unique' => 'Tên sản phẩm đã tồn tại',
    			'name.min'=>'Tên sản phẩm phải có độ dài từ 3 đến 100 ký tự',
    			'name.max'=>'Tên sản phẩm phải có độ dài từ 3 đến 100 ký tự',
    		]
    	);
    	$sanpham = new Product;
        $sanpham->name = $request->name;
        $sanpham->id_type = $request->TheLoai;
        $sanpham->description = $request->description;
        $sanpham->unit_price = $request->unit_price;
        $sanpham->promotion_price = $request->promotion_price;
        $sanpham->unit = $request->unit;

        if($request->hasFile('image'))
    	{
    		$file = $request->file('image');
    	

            $duoi = $file->getClientOriginalExtension();//Kiểm tra đuôi up ảnh lên có đúng định dạng không
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') // != khác
            {
            	return redirect('sanpham/them')->with('thongbao','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            //Kiểm tra hình đã tồn tại chưa
            $name = $file->getClientOriginalName();
            $image = str_random(4)."_". $name;
            while(file_exists("source/image/product".$image)) //check trường hợp trên random cũng ra trùng ảnh thì random thêm lần nữa đến khi hết trùng
            {
            	$image = str_random(4)."_". $name;
            }
            $file->move("source/image/product",$image);
            if($sanpham->image){
            	@unlink("public/source/image/product".$sanpham->image);
            }
            $sanpham->image = $image;
            
        }
        $sanpham->save();
        return redirect('sanpham/them')->with('thongbao','Thêm thành công');
    }
    
    public function getSua($id){
   	 	$sanpham = Product::find($id); //khi nhận id ở getSua($id) thì tìm thể loại id
        $theloai = ProductType::all();
    	return view('Admin.sanpham.suasanpham',compact('sanpham','theloai')); // tìm xong thì truyền thông tin thể loại sang trang sửa
    }
    function postSua(Request $request,$id){
   
    	$sanpham = Product::find($id);
    	$this->validate($request,
    		[
    			'name' => 'required|unique:type_products,name|min:3|max:100'
    		],
    		[
    			'name.required' => 'Bạn chưa nhập tên thể loại',
    			'name.unique' => 'Tên thể loại đã tồn tại',
    			'name.min'=>'Tên thể loại phải có độ dài từ 3 đến 100 ký tự',
    			'name.max'=>'Tên thể loại phải có độ dài từ 3 đến 100 ký tự',
    		]
    	);
        $sanpham->name = $request->name;
        $sanpham->id_type = $request->TheLoai;
        $sanpham->description = $request->description;
        $sanpham->unit_price = $request->unit_price;
        $sanpham->promotion_price = $request->promotion_price;
        $sanpham->unit = $request->unit;

        if($request->hasFile('image'))
    	{
    		$file = $request->file('image');
    	

            $duoi = $file->getClientOriginalExtension();//Kiểm tra đuôi up ảnh lên có đúng định dạng không
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') // != khác
            {
            	return redirect('sanpham/sua/'.$id)->with('thongbao','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            //Kiểm tra hình đã tồn tại chưa
            $name = $file->getClientOriginalName();
            $image = str_random(4)."_". $name;
            while(file_exists("source/image/product".$image)) //check trường hợp trên random cũng ra trùng ảnh thì random thêm lần nữa đến khi hết trùng
            {
            	$image = str_random(4)."_". $name;
            }
            $file->move("source/image/product",$image);
            if($sanpham->image){
            	@unlink("public/source/image/product".$sanpham->image);
            }
            $sanpham->image = $image;
            
        }
        $sanpham->save();
        return redirect('sanpham/sua/'.$id)->with('thongbao','Sửa thành công');
    }


    public function getXoa($id) //B8
    {
    	$sanpham = Product::find($id);
        $sanpham->delete();
    	return redirect('sanpham/danhsach')->with('thongbao','Bạn đã xóa thành công');
    }
}
