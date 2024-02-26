<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\OrderItem;
use App\Shipping;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

session_start();
class OrderController extends Controller
{
  public function proccessTo_check(Request $request)

  {
  /*   dd($request->all()); */
    $validData = $request->validate([
        'shippingUserName' => 'required',
        'shippingAddress' => 'required',
        'shippingUserEmail' => 'required|email',
        'shippingPhone' => 'required|numeric'
    ]);

    $order_id = Order::insertGetId([
      'user_id' => $request->userId,
      'invoice' =>  mt_rand(10000000, 99999999),
      'payemnt_type' => 1,
      'total' => $request->total,
      'payment_inside'=> 1,
      'subtotal' => $request->subtotal,
      'copon_discount' => 0,
      'created_at' => Carbon::now(),
    ]);


      foreach ($request->cartItemsDetails as $cart) {
        OrderItem::insert([
          'order_id' => $order_id,
          'product_id' => $cart['id'],
          'product_qty' => $cart['quantity'],
          'product_size' => 1,
          'product_color' => 1,
          'created_at' => Carbon::now(),
        ]);
      }
      Shipping::insert([
        'order_id' => $order_id,
        'frist_name' => $request->shippingUserName,
        'last_name' => $request->userId,
        'phone' => $request->shippingPhone,
        'email' => $request->shippingUserEmail,
        'country' => "Bangladesh",
        'division' => $request->divisionName,
        'district' =>  $request->districtName,
        'thana' => $request->upazilaName,
        'address_holdding' => $request->shippingAddress,
        'created_at' => Carbon::now(),
      ]);

     /*  if (Session::has('copon')) {
        session()->forget('copon');
      } */

      return response()->json([
                'status' => true,
                'message' => 'Order Successfully Done',
             ], 200);
  }

  public function my_profile()
  {
    if (Auth::check()) {
     $users = User::where('id', Auth::id())->get();
      $orders =  Order::where('user_id', Auth::user()->id)->latest()->get();
      return view('pages.my_profile', compact('orders','users'));
    } else {
      return redirect()->route('login');
    }
  }


  public function myDashboard($id)
  {
    $data = [];
     $data['orders']  = Order::select('order_status', DB::raw('count(*) as count'))
     ->where('user_id', $id)
     ->groupBy('order_status')
     ->get();
     $data['totalOrderCount'] = Order::where('user_id', $id)->count();
     $data['recentOrder'] = Order::where('user_id', $id)->latest()->limit(4)->get();

    return $data;
  }
  public function allOrders($id)
  {
    $data = [];
     $data['orders'] = Order::where('user_id', $id)->latest()->paginate(15);

    return $data;
  }



  public function my_profile_ajax()
  {
    if (Auth::check()) {
     $users = User::where('id', Auth::id())->get();
      $orders =  Order::where('user_id', Auth::user()->id)->latest()->get();
      return view('pages.my_profile_reload', compact('orders','users'));
    } else {
      return redirect()->route('login');
    }
  }
  /* public function my_order_details($invoice_no)
  {
    $order = Order::where('invoice',$invoice_no)->first();
    $shippings = Shipping::where('order_id', $order->id)->orderBy('id', 'desc')->get();
    $order_items = OrderItem::where('order_id',  $order->id)->get();
    return view('pages.order-details', compact('shippings', 'order_items'));
  } */

  public function my_order_details($invoice_no)
  {
    $order = Order::with([
        'shippings' => function ($query) {
            $query->with(['divisions:id,name', 'districts:id,name','upazilas:id,name']);
        },
        'orderItems.product'
    ])->where('invoice', $invoice_no)->first();
      if (!$order) {
          return abort(404);
      }
      return $order;
      //return view('pages.order-details', compact('order'));
  }



  public function my_order_cancel($oder_id)
  {
     Order::where('id',$oder_id)->update([
      'order_status'=>5,
      'updated_at'=>Carbon::now(),
  ]);
    return redirect()->back()->with('success', 'Successfully Order cancel');
  }


public function my_password_change(Request $request)
{
   $request->validate([
      'old_pass'=>'required',
      'new_pass'=>'required|min:6',
      'confirm_pass'=>'required|min:6',
   ]);
  Auth::user()->id;
$db_pass = Auth::user()->password;
  if(Hash::check($request->old_pass,$db_pass)){
   if($request->new_pass==$request->confirm_pass){
    User::find(Auth::user()->id)->update([
      'password'=>Hash::make($request->confirm_pass),
      'updated_at'=>Carbon::now(),
    ]);
    return redirect()->back()->with('success', 'Password Successfully Change');

   }else{
    return redirect()->back()->with('success_delete', 'New password & Confirm Password Not Match');
   }
  }else{
    return redirect()->back()->with('success_delete', 'Password Not Change, Old Password Not Match ');
  }

}

public function user_update(Request $request)
{
    $request->validate([
      'name'=>'required',
      'last_name'=>'required',
      'phone'=>'required|unique:users,phone',
      'email'=>'required',
      'district'=>'required',
      'thana'=>'required',
      'division'=>'required',
      'address_holdding'=>'required',
    ]);

   $user = User::where('id',$request->user_id)->update([
      'name'=>$request->name,
      'last_name'=>$request->last_name,
      'phone'=>$request->phone,
      'email'=>$request->email,
      'district'=>$request->district,
      'thana'=>$request->thana,
      'division'=>$request->division,
      'address_holdding'=>$request->address_holdding,
    ]);

    return redirect()->back()->with('success','Profile Successfuly Updated');
}

// Proccess to check out buy now page
public function proccessTo_check_buyNow(Request $request)
{
  $request->validate([
    'frist_name' => 'required',
    'phone' => 'required',
    'email' => 'required',
    'country' => 'required',
    'division' => 'required',
    'district' => 'required',
    'thana' => 'required',
    'address_holdding' => 'required'
  ]);
  $order_id = Order::insertGetId([
    'user_id' => session_id(),
    'invoice' =>  mt_rand(10000000, 99999999),
    'payemnt_type' => $request->payment_type,
    'total' => $request->total,
    'payment_inside'=>$request->payment_inside,
    'subtotal' => $request->subtotal,
    'copon_discount' => $request->discount,
    'created_at' => Carbon::now(),
  ]);

  $carts = Cart::where('user_ip',  session_id())->latest()->get();

  if ($carts->count() >= 1) {
    foreach ($carts as $cart) {
      OrderItem::insert([
        'order_id' => $order_id,
        'product_id' => $cart->product_id,
        'product_qty' => $cart->qty,
        'product_size' => $cart->product_size,
        'product_color' => $cart->product_color,
        'created_at' => Carbon::now(),
      ]);
    }
    Shipping::insert([
      'order_id' => $order_id,
      'frist_name' => $request->frist_name,
      'last_name' => $request->last_name,
      'phone' => $request->phone,
      'email' => $request->email,
      'country' => $request->country,
      'division' => $request->division,
      'district' => $request->district,
      'thana' => $request->thana,
      'address_holdding' => $request->address_holdding,
      'created_at' => Carbon::now(),
    ]);

    if (Session::has('copon')) {
      session()->forget('copon');
    }

    $carts = Cart::where('user_ip',  session_id())->delete();

    return redirect()->to('/buynow/order-complate')->with('success', 'Order successfuly Submit');
  } else {
    return redirect()->route('all.product')->with('success_delete', 'Cart Is empty Please try Again');
  }
}


}
