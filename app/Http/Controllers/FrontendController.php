<?php

namespace App\Http\Controllers;

use App\AboutPage;
use App\Brand;
use App\Category;
use App\Order;
use App\Product;
use App\SliderModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
session_start();
class FrontendController extends Controller
{
    public function index()
    {
        $viewBag = [];
        // only for ajax
        $products_se = Product::where('id',0)->latest()->get();
       // only for ajax end
        $viewBag['products'] = Product::where('product_status',1)->latest()->offset(0)->limit(16)->get();
        $viewBag['sliders'] = SliderModel::where('product_status',1)->latest()->offset(0)->limit(8)->get();
        $viewBag['side_sliders'] = SliderModel::where('product_status',1)->latest()->offset(0)->limit(2)->get();
        $viewBag['categoris'] = Category::where('status', 1)->latest()->offset(0)->limit(8)->get();
        $viewBag['brands'] = Brand::where('status', 1)->latest()->offset(0)->limit(8)->get();
        $viewBag['products_brand'] = Product::where('product_status',1)->latest()->offset(0)->limit(16)->get();
       return $viewBag;
        return view('pages.index', compact('products','categoris','brands','products_brand','products_se','sliders','side_sliders'));

    }

  function Category($id){
    $viewBag['products'] = null;
    $viewBag['products'] = Product::where('product_status',1)->where('category_name',$id)->latest()->offset(0)->limit(16)->get();
    return $viewBag;
}



    // ajax product details page
    public function product_details(Request $request)
    {
        $products_se = Product::where('id',$request->product_id)->latest()->get();
        return view('pages.search_result', compact('products_se'))->render();
    }
    // ajax product details page  END

  public function about_page()
  {
    $about_page = AboutPage::latest()->get();
    return view('pages.about_page',compact('about_page'));
  }
public function contact_page()
{
    return view('pages.contact_page');
}

public function orderSuccesfullyCompalte()
{
   $order_id =  Order::where('user_id', session_id())->orderBy('created_at', 'DESC')->limit('1')->get();
    foreach($order_id as $or_id){
    $id = $or_id->id;
    }
    $join_table = DB::table('orders')
    ->join('order_items', 'orders.id', '=', 'order_items.order_id')
    ->join('shippings', 'orders.id', '=', 'shippings.order_id')
    ->join('products', 'order_items.product_id', '=', 'products.id')
    ->select('order_items.*','orders.*', 'products.product_img_one','products.product_price','products.product_name','shippings.frist_name','shippings.phone','shippings.address_holdding')
    ->where('orders.id', $id )->orderBy('order_items.created_at', 'DESC')->get();

    return view('pages.buy-now-order-success', compact('join_table'));
}


public function search_all_product(Request $request)
{


    $products = DB::table('products')
    ->join('brands', 'products.brand_name', '=', 'brands.id')
    ->join('categories', 'products.category_name', '=', 'categories.id')
    ->where('products.product_name', 'LIKE', "%{$request->search_product}%")
    ->orWhere('categories.category_name', 'LIKE', "%{$request->search_product}%")
    ->orWhere('brands.brand_name', 'LIKE', "%{$request->search_product}%")
    ->select('products.*')
    ->paginate(30);

  return view('pages.only_search_result', compact('products'));
}




}
