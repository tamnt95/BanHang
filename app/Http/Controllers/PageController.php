<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\ProductType;
use App\Product;
use App\Cart;
use Session;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;

use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
	// private $loai_sanpham; //Khai báo property để sử dụng view share
	// public function __construct(){ 
	// 	$this->loai_sanpham = ProductType::all();
	// 	View()->share('loai_sanpham',$this->loai_sanpham);
	// }
    public function getIndex(){
    	$slide = Slide::all();
    	$new_product = Product::where('new',1)->paginate(4);
    	// return view('Page.trangchu',['slide'=>$slide]);
    	$sanpham_khuyenmai = Product::where('promotion_price','<>',0)->paginate(8);
    	return view('Page.trangchu',compact('slide','new_product','sanpham_khuyenmai'));
    }
    public function getLoaiSP($id){
    	$loaisanpham = ProductType::find($id);
    	$sp_khac = Product::where('id_type','<>',$id)->inRandomOrder()->take(3)->get();
    	$sanpham = Product::where('id_type',$id)->paginate(6); //Tìm tất cả sna pham có id = id Loại Tin tìm về và sử dụng phân trang
    	return view('Page.loai_sanpham',compact('sanpham','loaisanpham','sp_khac'));
    }
    function getChiTietSP(Request $request){ //cach 2 ko can truyen id hu tren ma truyen bang request
        $ctsanpham = Product::where('id',$request->id)->first();
        $ctsanpham_khac = Product::where('id_type',$ctsanpham->id_type)->inRandomOrder()->take(3)->get();
    	return view('Page.chitiet_sanpham',compact('ctsanpham','ctsanpham_khac'));
    }
    function getLienHe(){
    	return view('Page.lienhe');
    }
    function getGioiThieu(){
    	return view('Page.gioithieu');
    }
    function getAddtoCart(Request  $request,$id){
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product,$id);
        $request->session()->put('cart',$cart);
        return redirect()->back();

    }
    function getDelItemCart($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }
    function getDatHang(){
        return view('Page.dat_hang');
    }
    function postDatHang(Request $request){
        $cart = Session::get('cart');

        $customer = new Customer; //lưu thông tin khách hàng
        $customer->name = $request->name; // $request->name; là trỏ tới name trong thẻ input
        $customer->gender = $request->gender;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->phone_number = $request->phone;
        $customer->note = $request->note;
        $customer->save();

        //lưu hóa đơn
        $bill = new Bill;
        $bill->id_customer = $customer->id; // lúc này đã lưu r
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $request->payment_method;
        $bill->note = $request->note;
        $bill->save();

        //vì giỏ hàng có nhiều sản phẩm nên dùng foreach để lưu
        foreach ($cart->items as $key => $value) {
            # code...
                 //lưu chi tiết hóa đơn
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = ($value['price']/$value['qty']); // dùng đơn giá chia cho số lượng để ra giá gốc sp
            $bill_detail->save();

        }
        Session::forget('cart');
        return redirect()->back()->with('thongbao','Đặt hàng thành công');
    }

    function getLogin(){
        return view('Page.dangnhap');
    }
    function postLogin(Request $request){
    //dd($request);

        $this->validate($request,[
            'email'=>'required',
            'password' => 'required|min:3|max:32',
        ],[
            'email.required'=> ' Bạn chưa nhập Email',
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'password.min'=>'Mật khẩu có ít nhất 3 kí tự',
            'password.max'=>'Mật khẩu có nhiều nhất 32 kí tự',
        ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect('index');
        }
        else
        {
            return redirect('login')->with('thongbao','Đăng nhập thất bại');
        }
    }
    function getDangXuat(){
        Auth::logout();
        return redirect('index');
    }

    function getDangKi(){
        return view('Page.dangki');
    }
    function postDangKi(Request $request){
        $this->validate($request,[
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email', //Ở unipue chú ý unique:users phải trùng với users trong sql
            'password' => 'required|min:3|max:32',
            'passwordAgain' => 'required|same:password',
        ],[
            'name.required'=>'Bạn chưa nhập họ tên người dùng',
            'name.min'=>'Tên người dùng phải có ít nhất 3 kí tự',
            'emai.required'=>'Bạn chưa nhập Email',
            'email.email'=>'Bạn chưa nhập đúng cấu trúc Email',
            'email.unique'=>'Email này đã tồn tại',
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'password.min'=>'Mật khẩu có ít nhất 3 kí tự',
            'password.max'=>'Mật khẩu có nhiều nhất 32 kí tự',
            'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu',
            'passwordAgain.same'=>'Mật khẩu chưa chính xác',
        ]);
        $user = new User;
        $user->full_name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;

        // $user->passwordAgain = bcrypt($request->passwordAgain);

        $user->save();
        return redirect('dangnhaptemp')->with('thongbao','Bạn đã đăng ký thành công');
    }
    function getSearch(Request $request){
        $product = Product::where('name','like','%'.$request->key.'%')->orWhere('unit_price',$request->key)->get();
        return view('Page.search',compact('product'));
    }



    function getDangNhapTemp(){
        return view('Page.dangnhaptemp');
    }
    function postDangNhapTemp(Request $request){
    //dd($request);

        $this->validate($request,[
            'email'=>'required',
            'password' => 'required|min:3|max:32',
        ],[
            'email.required'=> ' Bạn chưa nhập Email',
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'password.min'=>'Mật khẩu có ít nhất 3 kí tự',
            'password.max'=>'Mật khẩu có nhiều nhất 32 kí tự',
        ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect('index');
        }
        else
        {
            return redirect('dangnhaptemp')->with('thongbao','Đăng nhập thất bại');
        }
    }
    function getNguoiDung($id){
        if(Auth::check()) // check nguoi dung da dang nhap chua, neu chua dang nhap thi tra ve trang dang nhap
        return view('Page.nguoidung',['user' => Auth::user()]);
        else
            return redirect('dangnhaptemp')->with('thongbao','Bạn chưa Đăng Nhập!');
    }
    function postNguoiDung(Request $request)
    
    {

   
        $this->validate($request,
            [
                'name' => 'required|min:3',
            ],
            [
                'name.required'=>'Bạn chưa nhập họ tên người dùng',
                'name.min'=>'Tên người dùng phải có ít nhất 3 kí tự',
            ]);
        $user = Auth::user();
        $user->full_name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;

        if($request->changePassword == "on")
        {

            $this->validate($request,
                [
                    'password' => 'required|min:3|max:32',
                    'passwordAgain' => 'required|same:password',
                ],
                [
                    'password.required'=>'Bạn chưa nhập mật khẩu',
                    'password.min'=>'Mật khẩu có ít nhất 3 kí tự',
                    'password.max'=>'Mật khẩu có nhiều nhất 32 kí tự',
                    'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu',
                    'passwordAgain.same'=>'Mật khẩu chưa chính xác',
                ]);
            $user->password = bcrypt($request->password);
        }

        $user->save();
        return redirect('nguoidung/'.$user->id)->with('thongbao','Sửa thành công');
    }

}
