<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;

class SlideController extends Controller
{
	public function getDanhSach(){
		$slide = Slide::all();
		return view('Admin.slide.danhsach',['slide'=>$slide]);
	}
	public function getThem(){
		$slide = Slide::all();
		return view('Admin.slide.them',['slide'=>$slide]);
	}
	function postThem(Request $request){
		//dd($request);
		$this->validate($request,[
			'Ten' => 'required',
			'NoiDung' => 'required',
		],[
			'Ten.required'=>'Bạn chưa nhập tên',
			'NoiDung.required'=>'Bạn chưa nhập nội dung',
		]);
		$slide = new Slide;
		$slide->Ten = $request->Ten;
		$slide->NoiDung = $request->NoiDung;
		$slide->link = $request->link;
		if($request->has('link'))
			$slide->link = $request->link;

		if($request->hasFile('image'))
		{
			$file = $request->file('image');
        $duoi = $file->getClientOriginalExtension();//Kiểm tra đuôi up ảnh lên có đúng định dạng không
        
        
        if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') // != khác
        {
        	return redirect('slide/them')->with('thongbao','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
        }
        //Kiểm tra hình đã tồn tại chưa
        $name = $file->getClientOriginalName();
        $image = str_random(4)."_". $name;
        while(file_exists("source/image/slide".$image)) //check trường hợp trên random cũng ra trùng ảnh thì random thêm lần nữa đến khi hết trùng
        {
        	$image = str_random(4)."_". $name;
        }
        $file->move("source/image/slide",$image);
        $slide->image = $image;
    }
    else
    {
    	$slide->image = "";
    }
    $slide->save();
    return redirect('slide/them')->with('thongbao','Thêm thành công');
}
public function getSua($id){
	   	$slide = Slide::find($id); //khi nhận id ở getSua($id) thì tìm thể loại id
	   	return view('Admin.Slide.sua',compact('slide')); // tìm xong thì truyền thông tin thể loại sang trang sửa
	   }
	   function postSua(Request $request,$id){

	   	$slide = Slide::find($id);
	   	$this->validate($request,[
	   		'Ten' => 'required',
	   		'NoiDung' => 'required',
	   	],[
	   		'Ten.required'=>'Bạn chưa nhập tên',
	   		'NoiDung.required'=>'Bạn chưa nhập nội dung',
	   	]);
	   	$slide->Ten = $request->Ten;
	   	$slide->NoiDung = $request->NoiDung;
	   	$slide->link = $request->link;
	   	if($request->has('link'))
	   		$slide->link = $request->link;

	   	if($request->hasFile('image'))
	   	{
	   		$file = $request->file('image');


            $duoi = $file->getClientOriginalExtension();//Kiểm tra đuôi up ảnh lên có đúng định dạng không
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') // != khác
            {
            	return redirect('slide/sua/'.$id)->with('thongbao','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            //Kiểm tra hình đã tồn tại chưa
            $name = $file->getClientOriginalName();
            $image = str_random(4)."_". $name;
            while(file_exists("source/image/slide".$image)) //check trường hợp trên random cũng ra trùng ảnh thì random thêm lần nữa đến khi hết trùng
            {
            	$image = str_random(4)."_". $name;
            }
            $file->move("source/image/slide",$image);
            if($slide->image){
            	@unlink("public/source/image/slide".$slide->image);
            }
            $slide->image = $image;
            
        }
        $slide->save();
        return redirect('slide/sua/'.$id)->with('thongbao','Sửa thành công');
    }


    public function getXoa($id) //B8
    {
    	$slide = Slide::find($id);
    	$slide->delete();
    	return redirect('slide/danhsach')->with('thongbao','Bạn đã xóa thành công');
    }

}
