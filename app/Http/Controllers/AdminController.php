<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $products = Product::count();
       $categories = Category::count();
       $brands = Brand::count();
       $users = User::count();
       $orders = Order::count();
       $orders_comple = Order::where('order_status',4)->count();
       $orders_cencel = Order::where('order_status',5)->count();
       $product_sells = Order::where('order_status',4)->sum('total');
      return view('admin.home',compact('products','categories','brands','users','orders','orders_comple','orders_cencel','product_sells'));
    }

public function logut()
{
   Auth::logout();
   return redirect()->route('admin.login');
}


   
}
