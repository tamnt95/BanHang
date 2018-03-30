<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Bill;
use App\BillDetail;

class OrderController extends Controller
{
  	public function getDanhSachOrder()
	{
		// $customer = Customer::all();
		$bill = Bill::all();
		return view('Admin.Order.danhsachOrder',compact('bill'));
	}
	public function getChiTietOrder($id)
	{
		$bill = Bill::find($id);

		$bill_detail = BillDetail::where('id_bill',$id)->get();
		//dd($bill_detail);
		
		return view('Admin.Order.chitietOrder',compact('bill','bill_detail'));
	}
}
