<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\Order_Product;
use App\Models\Customer;
use App\Models\Setting;
use Session;
use URL;
use View;
use DB;

class ordersController extends Controller
{
    # orders page
    public function orders()
    {
    	$Orders  = Order::latest()->get();

    	return view('orders.orders',compact('Orders'));
    }



    # edit
    public function Edit($id)
    {
        $ord = Order::where('id',$id)->with('OrderProducts.Product','Customer','Country','City')->latest()->first();
        return view('orders.edit_order',compact('ord'));
    }

    # delete order
    public function Deleteorder($id)
    {
    	$order = Order::findOrFail($id);
        MakeReport('بحذف طلب '.$order->id);
    	$order->delete();
        Session::flash('success','تم حذف الطلب');
        return back();
    }



}
