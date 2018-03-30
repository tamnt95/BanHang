<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductType;
use App\Product;

class TheLoaiController extends Controller
{
    //
	public function getDanhSach(){
    	$theloai = ProductType::all();  //luu danh sach cac the loai lay dc tu model theloai
    	return view('Admin.theloai.danhsach',['theloai'=>$theloai]);
    }
    public function getSua($id){
   	 	$theloai = ProductType::find($id); //khi nhận id ở getSua($id) thì tìm thể loại id
    	//dd($theloai);
    	return view('Admin.theloai.sua',['theloai'=>$theloai]); // tìm xong thì truyền thông tin thể loại sang trang sửa
    }
    function postSua(Request $request,$id){
   
    	$theloai = ProductType::find($id);
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
        $theloai->name = $request->name;
        $theloai->description = $request->description;
        $theloai->TenKhongDau = changeTitle($request->name);

        if($request->hasFile('image'))
    	{
    		$file = $request->file('image');
    	

            $duoi = $file->getClientOriginalExtension();//Kiểm tra đuôi up ảnh lên có đúng định dạng không
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') // != khác
            {
            	return redirect('theloai/sua/'.$id)->with('thongbao','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            //Kiểm tra hình đã tồn tại chưa
            $name = $file->getClientOriginalName();
            $image = str_random(4)."_". $name;
            while(file_exists("source/image/product".$image)) //check trường hợp trên random cũng ra trùng ảnh thì random thêm lần nữa đến khi hết trùng
            {
            	$image = str_random(4)."_". $name;
            }
            $file->move("source/image/product",$image);
            if($theloai->image){
            	@unlink("public/source/image/product".$theloai->image);
            }
            $theloai->image = $image;
            
        }
        $theloai->save();
        return redirect('theloai/sua/'.$id)->with('thongbao','Sửa thành công');
    }
    public function getThem(){
   	 	$theloai = ProductType::all();
    	return view('Admin.theloai.them',['theloai'=>$theloai]);
    }
    function postThem(Request $request){
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
    	$theloai = new ProductType;
        $theloai->name = $request->name;
        $theloai->description = $request->description;
        $theloai->TenKhongDau = changeTitle($request->name);

        if($request->hasFile('image'))
    	{
    		$file = $request->file('image');
    	

            $duoi = $file->getClientOriginalExtension();//Kiểm tra đuôi up ảnh lên có đúng định dạng không
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') // != khác
            {
            	return redirect('theloai/them')->with('thongbao','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            //Kiểm tra hình đã tồn tại chưa
            $name = $file->getClientOriginalName();
            $image = str_random(4)."_". $name;
            while(file_exists("source/image/product".$image)) //check trường hợp trên random cũng ra trùng ảnh thì random thêm lần nữa đến khi hết trùng
            {
            	$image = str_random(4)."_". $name;
            }
            $file->move("source/image/product",$image);
            if($theloai->image){
            	@unlink("public/source/image/product".$theloai->image);
            }
            $theloai->image = $image;
            
        }
        $theloai->save();
        return redirect('theloai/them')->with('thongbao','Thêm thành công');
    }
    public function getXoa($id) //B8
    {
    	$theloai = ProductType::find($id); //Tìm ra các loại tin với id loại tin truyền vào
      	$id_type = Product::where('id_type',$theloai->id)->delete(); //Tìm ra comment và xóa tất cả comment thuộc cái tin tức đó
      	$theloai->delete();//xóa tin tức
      	return redirect('theloai/danhsach')->with('thongbao','Xóa thành công');
    }
}
