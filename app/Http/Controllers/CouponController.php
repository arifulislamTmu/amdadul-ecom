<?php

namespace App\Http\Controllers;

use App\Copon;
use App\Order;
use App\OrderItem;
use App\Shipping;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Ui\Presets\React;
use Illuminate\Support\Facades\Session;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
       $coupons = Copon::latest()->get();
       return view('admin.copon.copon', compact('coupons'));
    }
    public function addCoupon(Request $request)
    {
        $request->validate([
            'coupon_name'=>'required|unique:copons,coupon_name',
            'discount'=>'required'
        ]);

        Copon::insert([
            'coupon_name'=>$request->coupon_name,
            'discount'=>$request->discount,
            'created_at'=>Carbon::now()
        ]);
        return redirect()->back()->with('success', 'Coupon Created Success');
    }


    public function edit_copon($id)
    {
        
        $get_copon = DB::table('copons')->where('id', '=', $id)->get();
        $coupons = Copon::latest()->get();
        // echo "<pre>";
        // print_r($get_copon);
        // echo"</pre>";
     return view('admin.copon.editcopon', compact('get_copon','coupons'));
    }

    public function update_copon(Request $request)
    {

        $request->validate([
            'coupon_name'=>'required|unique:copons,coupon_name',
        ]);

        Copon::find($request->copon_id)->update([
            'coupon_name'=>$request->coupon_name,
            'updated_at'=>Carbon::now()
        ]);
        return redirect()->route('copon_page')->with('success', 'Coupon Updated Success');
    }

    public function statasdeactive($id)
    {
      Copon::findOrfail($id)->update([
        'status'=>'0',
        'updated_at'=>Carbon::now()
      ]);
      return redirect()->route('copon_page')->with('success', 'Coupon Deactive Success');
    }
    
    public function statasactive($id)
    {
      Copon::findOrfail($id)->update([
        'status'=>'1',
        'updated_at'=>Carbon::now()
      ]);
      return redirect()->route('copon_page')->with('success', 'Coupon active Success');
    }
    public function delete_copon($id)
    {
        Copon::find($id)->delete();
        return redirect()->route('copon_page')->with('success_delete', 'Coupon Successfuly Deleted');
    }

    //order list

    public function order_list()
    {
        $order_list = Order::where('order_hide_status',1)->orderBy('id','desc')->get();
        return view('admin.orderlist.order-list', compact('order_list'));
    }

    public function order_list_remove()
    {
        $order_list_remove = Order::where('order_hide_status',2)->orderBy('id','desc')->get();
        return view('admin.orderlist.order-list-remove', compact('order_list_remove'));
    }
    


    public function order_id($order_id)
    {
       $shipping = Shipping::where('order_id',$order_id)->get();
        
      $order_items = OrderItem::where('order_id', $order_id)->get();
      
       return view('admin.orderlist.order-details', compact('shipping','order_items'));
    }

    public function order_status($stutas_change)
    {
        $shipping = Order::where('id',$stutas_change)->update([
            'order_status'=>2,
            'updated_at'=>Carbon::now(),
        ]);
        return redirect()->back()->with('success','Order Accepted');
    }

    public function order_status_rady($stutas_change)
    {
        $shipping = Order::where('id',$stutas_change)->update([
            'order_status'=>3,
            'updated_at'=>Carbon::now(),
        ]);
        return redirect()->back()->with('success','Proccess to Delivery');
    }
    public function order_status_success($stutas_change)
    {
        $shipping = Order::where('id',$stutas_change)->update([
            'order_status'=>4,
            'updated_at'=>Carbon::now(),
        ]);
        return redirect()->back()->with('success','Order Delivery success');
    }

    public function order_auto_reload()
    {
        $order_list_auto = Order::where('order_hide_status',1)->orderBy('id','desc')->get();
        return view('admin.orderlist.order-list_auto', compact('order_list_auto'));
    }

    public function order_list_hide($order_id)
    {
    //    $all = Order::where('id',$order_id)->get();

     Order::where('id',$order_id)->update([
        'order_hide_status'=>2,
        'updated_at'=>Carbon::now(),
    ]);

    
       return redirect()->back()->with('success','Order succesfuly Remove');
    }
}
