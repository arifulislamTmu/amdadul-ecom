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
    public function product_show($type)
    {
        $result = null;
        $data = [];
        if ($type == 1) {
            $result = 'CCTV';
        } elseif ($type == 2) {
            $result = 'Electronics';
        } elseif ($type == 3) {
            $result = 'Industial';
        } else {
            $result = null;
        }
        $data['products'] = Product::where('product_status', 1)->where('product_type', $result)->orderBy('id', 'desc')->paginate(28);
        $data['sliders'] = SliderModel::where('product_status', 1)->latest()->offset(0)->limit(8)->get();
        $data['categoris'] = Category::where('status', 1)->latest()->get();
        $data['brands'] = Brand::where('status', 1)->latest()->get();

        return $data;
        // return view('pages.all-product', compact('products', 'categoris', 'brands', 'products_se', 'sliders'));
    }

    // product ajax pagenation details page

    public function pagenation()
    {
        $products = Product::where('product_status', 1)->orderBy('id', 'desc')->paginate(28);
        return view('pages.ajax-pagenation', compact('products'))->render();
    }

    //  product ajax pagenation details page

    // category product search details page

/*     public function category_product_search(Request $request, $id)
    {
        $data = [''];
        $data['products'] = Product::where('product_status', 1)->where('category_name', $id)->orderBy('id', 'desc')->paginate(28);
        if ($data['products'] > 0) {
            dd($data);
        }
        return $data;
    }
 */
    public function category_product_search(Request $request, $id)
    {
        $data = [];
        $products = Product::where('product_status', 1)->where('category_name', $id)->orderBy('id', 'desc')->paginate(28);

       $data['products'] = $products;
        return $data;
    }

    public function brand_product_search(Request $request, $id)
    {
        $data = [''];
        $data['products'] = Product::where('product_status', 1)->where('brand_name', $id)->orderBy('id', 'desc')->paginate(28);
        return $data;
    }

    public function deals_product()
    {
        $data = [''];
        $deal_type = "today_deals";
        $data['products'] = Product::where('product_status', 1)->where('deal_type', $deal_type)->orderBy('id', 'desc')->paginate(16);
        return $data;
    }

    public function price_product_search(Request $request)
    {
        $products = Product::whereBetween('product_price', [$request->max_range, $request->min_range])
            ->orderBy('id', 'desc')
            ->paginate(28);
        return view('pages.ajax-price_search', compact('products'))->render();
    }

    public function soft_by_product(Request $request)
    {
        $sort = '';
        if ($request->sort_by_type == 'high_peice') {
            $sort = 'DESC';
        } elseif ($request->sort_by_type == 'low_price') {
            $sort = 'ASC';
        }
        if ($request->sort_by_type == 'date') {
            $products = Product::Orderby('created_at', 'DESC')->paginate(28);
            return view('pages.ajax-sort_by_search', compact('products'))->render();
        }
        $products = Product::Orderby('product_price', $sort)->paginate(28);
        return view('pages.ajax-sort_by_search', compact('products'))->render();
    }

    public function product_detail($pro_id)
    {
        $viewBag = [];
        // only for ajax
        //   $viewBag['products_se'] = Product::where('id', 0)->latest()->get();
        // only for ajax end
        $viewBag['product_details'] = Product::where('id', $pro_id)->get();
        $viewBag['product_images'] = Product::where('id', $pro_id)->get(['product_img_one', 'product_img_two', 'product_img_three', 'product_img_four', 'product_img_five', 'product_img_six']);
        foreach ($viewBag['product_details'] as $prod_ids) {
            $viewBag['cate_id'] = $prod_ids->category_name;
        }
        $viewBag['related_product'] = Product::where('category_name', $viewBag['cate_id'])
            ->where('id', '!=', $pro_id)
            ->latest()
            ->get();
        return $viewBag;
        return view('pages.product-details', compact('product_details', 'cat_product', 'products_se'));
    }

    public function category_product($id)
    {
        // only for ajax
        $products_se = Product::where('id', 0)->latest()->get();
        // only for ajax end
        $products = Product::where('product_status', 1)->where('category_name', $id)->orderBy('id', 'desc')->paginate(40);
        $sliders = SliderModel::where('product_status', 1)->latest()->offset(0)->limit(8)->get();
        $categoris = Category::where('status', 1)->latest()->get();
        $brands = Brand::where('status', 1)->latest()->get();
        return view('pages.all-product-by-category', compact('products', 'categoris', 'brands', 'products_se', 'sliders'));
    }

    public function brand_product($id)
    {
        // only for ajax
        $products_se = Product::where('id', 0)->latest()->get();
        // only for ajax end
        $products = Product::where('product_status', 1)->where('brand_name', $id)->orderBy('id', 'desc')->paginate(40);
        $sliders = SliderModel::where('product_status', 1)->latest()->offset(0)->limit(8)->get();
        $categoris = Category::where('status', 1)->latest()->get();
        $brands = Brand::where('status', 1)->latest()->get();
        return view('pages.all-product-by-category', compact('products', 'categoris', 'brands', 'products_se', 'sliders'));
    }
}
