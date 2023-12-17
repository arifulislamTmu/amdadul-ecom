<?php
namespace App\Http\Controllers;
use App\Brand;
use App\Cart;
use App\Category;
use App\Product;
use App\SliderModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
session_start();
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Login chek korar jonno ei code

        // only for ajax 
        $products_se = Product::where('id',0)->latest()->get();
       // only for ajax end
        $products = Product::where('product_status',1)->latest()->get();
        $sliders = SliderModel::where('product_status',1)->latest()->offset(0)->limit(8)->get();
        $side_sliders = SliderModel::where('product_status',1)->latest()->offset(0)->limit(2)->get();
        $categoris = Category::where('status', 1)->latest()->get();
        $brands = Brand::where('status', 1)->latest()->get();
        $products_brand = Product::where('product_status',1)->latest()->get();

        $sub_total = Cart::all()->where('user_ip',  session_id())->sum(function($t){
            return  $t->price * $t->qty;
            });

            $cart_join_prod = DB::table('products')
            ->join('carts', 'products.id', '=', 'carts.product_id')
            ->where('user_ip',  session_id())
            ->get(); 

        if(Cart::where('user_ip',  session_id())->count() >=1){
            return view('pages.checkout_this',compact('sub_total', 'cart_join_prod'));
        }else{
           return view('pages.index', compact('products','categoris','brands','products_brand','products_se','sliders','side_sliders'));
        }
       
      
    }
}
