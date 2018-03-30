<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return view('welcome');
});

Route::get('admin/dangnhap','UserController@getdangnhapAdmin');
Route::post('admin/dangnhap','UserController@postdangnhapAdmin');
Route::get('admin/logout','UserController@getDangXuatAdmin');



Route::get('index','PageController@getIndex');

Route::get('loai-san-pham/{id}/{TenKhongDau}.html','PageController@getLoaiSP');

Route::get('chi-tiet-san-pham/{id}','PageController@getChiTietSP');

Route::get('lien-he','PageController@getLienHe');

Route::get('gioi-thieu','PageController@getGioiThieu');

Route::get('add-to-cart/{id}','PageController@getAddtoCart');

Route::get('del-cart/{id}',['as'=>'xoagiohang','uses'=>'PageController@getDelItemCart']);

Route::get('dat-hang','PageController@getDatHang');
Route::post('dat-hang','PageController@postDatHang');

// Route::get('login','PageController@getLogin');
// Route::post('login','PageController@postLogin');
Route::get('dangxuat','PageController@getDangXuat');


Route::get('dangki','PageController@getDangKi');
Route::post('dangki','PageController@postDangKi');

Route::get('search','PageController@getSearch');

Route::get('dangnhaptemp','PageController@getDangNhapTemp');
Route::post('dangnhaptemp','PageController@postDangNhapTemp');

Route::get('nguoidung/{id}','PageController@getNguoiDung')->name('thongtinnguoidung');
Route::post('nguoidung','PageController@postNguoiDung')->name('nguoidungSua');\

Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
	Route::group(['prefix'=>'theloai'],function(){
		//truy cập admin/theloai/danhsach||sua||them
		Route::get('danhsach','TheLoaiController@getDanhSach');

		Route::get('sua/{id}','TheLoaiController@getSua');
		Route::post('sua/{id}','TheLoaiController@postSua');

		Route::get('them','TheLoaiController@getThem');
		Route::post('them','TheLoaiController@postThem');

		Route::get('xoa/{id}','TheLoaiController@getXoa');
	});
	Route::group(['prefix'=>'sanpham'],function(){
		Route::get('danhsach','SanPhamController@getDanhSach');

		Route::get('sua/{id}','SanPhamController@getSua');
		Route::post('sua/{id}','SanPhamController@postSua');

		Route::get('them','SanPhamController@getThem');
		Route::post('them','SanPhamController@postThem');

		Route::get('xoa/{id}','SanPhamController@getXoa');
	});
	Route::group(['prefix'=>'slide'],function(){
		Route::get('danhsach','SlideController@getDanhSach');

		Route::get('sua/{id}','SlideController@getSua');
		Route::post('sua/{id}','SlideController@postSua');

		Route::get('them','SlideController@getThem');
		Route::post('them','SlideController@postThem');

		Route::get('xoa/{id}','SlideController@getXoa');
	});
	Route::group(['prefix'=>'user'],function(){
		Route::get('danhsach','UserController@getDanhSach');

		Route::get('sua/{id}','UserController@getSua');
		Route::post('sua/{id}','UserController@postSua');

		Route::get('them','UserController@getThem');
		Route::post('them','UserController@postThem');

		Route::get('xoa/{id}','UserController@getXoa');
	});
	Route::group(['prefix'=>'khachhang'],function(){
		Route::get('danhsach','UserController@getDanhSachCustomer');

		Route::get('danhsachOrder','OrderController@getDanhSachOrder');
		Route::get('chitietOrder/{id}','OrderController@getChiTietOrder');
	});
});