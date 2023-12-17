<?php

namespace App\Http\Controllers\Frontend;

use App\Brand;
use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\SliderModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AllproductController extends Controller
{

  //product list page 

  public function product_show()
  {
    // only for ajax 
    $products_se = Product::where('id', 0)->latest()->get();
    // only for ajax end
    $products = Product::where('product_status', 1)->orderBy('id', 'desc')->paginate(28);
    $sliders = SliderModel::where('product_status',1)->latest()->offset(0)->limit(8)->get();
    $categoris = Category::where('status', 1)->latest()->get();
    $brands = Brand::where('status', 1)->latest()->get();
    return view('pages.all-product', compact('products', 'categoris','brands','products_se','sliders'));
  }

  // product ajax pagenation details page 

  public function pagenation()
  {
    $products = Product::where('product_status', 1)->orderBy('id', 'desc')->paginate(28);
    return view('pages.ajax-pagenation', compact('products'))->render();
  }

  //  product ajax pagenation details page 

  // category product search details page 

  public function category_product_search(Request $request)
  {
    $products = Product::where('product_status', 1)->where('category_name', $request->category_id)->orderBy('id', 'desc')->paginate(28);
    return view('pages.ajax-category_product', compact('products'))->render();
  }

  public function brand_product_search(Request $request)
  {
    $products = Product::where('product_status', 1)->where('brand_name', $request->brand_id)->orderBy('id', 'desc')->paginate(28);
    return view('pages.ajax-brand_product', compact('products'))->render();
  }

  public function price_product_search(Request $request)
  {
    $products = Product::whereBetween('product_price', [$request->max_range, $request->min_range])->orderBy('id', 'desc')->paginate(28);
    return view('pages.ajax-price_search', compact('products'))->render();
  }
  
  public function soft_by_product(Request $request)
  {
    $sort = "";
    if($request->sort_by_type=='high_peice'){
      $sort = "DESC";
    }else if($request->sort_by_type=='low_price'){
      $sort = "ASC";
    }
    if($request->sort_by_type=='date'){
      $products =  Product::Orderby('created_at','DESC')->paginate(28);
      return view('pages.ajax-sort_by_search', compact('products'))->render();
  
    }
    $products =  Product::Orderby('product_price',$sort)->paginate(28);
    return view('pages.ajax-sort_by_search', compact('products'))->render();


  }

  public function product_detail($pro_id)
  {
    // only for ajax 
    $products_se = Product::where('id', 0)->latest()->get();
    // only for ajax end
    $product_details = Product::where('id', $pro_id)->get();

    foreach ($product_details  as $prod_ids) {
      $cate_id =  $prod_ids->category_name;
    }
    $cat_product =  Product::where('category_name', $cate_id)->where('id', '!=', $pro_id)->latest()->get();

    return view('pages.product-details', compact('product_details', 'cat_product', 'products_se'));
  }


 public function category_product ($id){
 // only for ajax
 $products_se = Product::where('id', 0)->latest()->get();
 // only for ajax end
  $products = Product::where('product_status', 1)->where('category_name',$id)->orderBy('id', 'desc')->paginate(40);
  $sliders = SliderModel::where('product_status',1)->latest()->offset(0)->limit(8)->get();
  $categoris = Category::where('status', 1)->latest()->get();
  $brands = Brand::where('status', 1)->latest()->get();
  return view('pages.all-product-by-category', compact('products', 'categoris','brands','products_se','sliders'));
 }

 public function brand_product ($id){
    // only for ajax
    $products_se = Product::where('id', 0)->latest()->get();
    // only for ajax end
     $products = Product::where('product_status', 1)->where('brand_name',$id)->orderBy('id', 'desc')->paginate(40);
     $sliders = SliderModel::where('product_status',1)->latest()->offset(0)->limit(8)->get();
     $categoris = Category::where('status', 1)->latest()->get();
     $brands = Brand::where('status', 1)->latest()->get();
     return view('pages.all-product-by-category', compact('products', 'categoris','brands','products_se','sliders'));
    }

 

}
