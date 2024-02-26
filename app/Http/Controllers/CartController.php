<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Copon;
use App\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

session_start();


class CartController extends Controller
{
    public function cartAdd(Request $request, $id)
    {
        $sessionUser = $request->query('sessionUser');
        $qty = $request->query('qty', 1);
        if( $sessionUser==1){
         $userSessionId = session_id();
        }else{
            $userSessionId = $sessionUser;
        }
        $product = Product::where('id', $id)->select('product_price')->first();
        $cartItem = Cart::where('product_id', $id)->where('user_ip', $userSessionId)->first();

        if ($cartItem) {
            $cartItem->increment('qty', $qty);
            $cartItem = Cart::join('products', 'carts.product_id', '=', 'products.id')
            ->select('carts.*',
                    'products.product_img_one',
                    'products.product_name')
            ->where('carts.user_ip', $userSessionId)
            ->get();
            $totalPrice = 0;
            $CountItems = 0;
            foreach ($cartItem as $cart) {
            $totalPrice += $cart->price * $cart->qty;
            $CountItems++;
            }
            return response()->json([
                'msg' => 'Product already in cart and updated',
                'cartItem' => $cartItem,
                'totalPrice' => $totalPrice,
                'CountItems' => $CountItems,
                'userSessionId' => $userSessionId,
            ]);
        } else {
          Cart::create([
                'product_id' => $id,
                'price' => $product->product_price,
                'qty' => $qty,
                'user_ip' => $userSessionId,
            ]);
           $cartItem = Cart::join('products', 'carts.product_id', '=', 'products.id')
           ->select('carts.*',
           'products.product_img_one',
           'products.product_name')
            ->where('carts.user_ip', $userSessionId)
            ->get();

           $totalPrice = 0;
            $CountItems = 0;
            foreach ($cartItem as $cart) {
            $totalPrice += $cart->price * $cart->qty;
            $CountItems++;
            }
            return response()->json([
                'msg' => 'Product added to cart',
                'cartItem' => $cartItem,
                'totalPrice' => $totalPrice,
                'CountItems' => $CountItems,
                'userSessionId' => $userSessionId,
            ]);
        }
    }

    function getCartValue($id) {
      $cartItem = Cart::with('cart')->where('user_ip', $id)->get();
      $totalPrice = 0;
      $CountItems = 0;
      foreach ($cartItem as $cartItem) {
          $totalPrice += $cartItem->price * $cartItem->qty;
          $CountItems++;
      }
        return response()->json([
            'msg' => 'Show cart product',
            'cartItem' => $cartItem,
            'totalPrice' => $totalPrice,
            'CountItems' => $CountItems,
            'userSessionId' => $id,
        ]);
    }

   public function cart_page()
   {
      $sub_total = Cart::all()->where('user_ip',  session_id())->sum(function ($t) {
         return  $t->price * $t->qty;
      });
      $carts = Cart::where('user_ip',  session_id())->get();
      return view('pages.cartpage', compact('carts', 'sub_total'));
   }

   //bad dite hobe

   public function cart_remove($id)
   {
      Cart::find($id)->delete();
      return redirect()->back()->with('success_delete', 'Cart item remove');
   }

   //bad dite hobe








   //ajux add to cart
   public function add_to_cart(Request $request, $product_id)
   {
      $request->validate([
         'product_size' => 'required',
         'product_color' => 'required',
         'qty' => 'required',
      ]);

      $product_id = $product_id;
      $qty = $request->qty;
      $product_price = $request->product_price;
      $product_size = $request->product_size;
      $product_color = $request->product_color;

      $check = Cart::where('product_id', $product_id)->where('user_ip',  session_id())->first();
      if ($check) {
         // Cart::where('product_id', $product_id)->increment('qty');
         // return redirect()->back()->with('success', 'product allready Cart');
         Cart::insert([
            'product_id' => $product_id,
            'price' => $product_price,
            'qty' => $qty,
            'product_size' => $product_size,
            'product_color' => $product_color,
            'user_ip' =>  session_id()
         ]);
         return redirect()->back()->with('success', 'product add to Cart');
      } else {
         Cart::insert([
            'product_id' => $product_id,
            'price' => $product_price,
            'qty' => $qty,
            'product_size' => $product_size,
            'product_color' => $product_color,
            'user_ip' =>  session_id()
         ]);
         return redirect()->back()->with('success', 'product add to Cart');
      }
   }

   public function buy_now_add(Request $request)
   {
      $request->validate([
         'product_size' => 'required',
         'product_color' => 'required',
         'qty' => 'required',
      ]);

      $product_id = $request->product_id;
      $qty = $request->qty;
      $product_price = $request->product_price;
      $product_size = $request->product_size;
      $product_color = $request->product_color;

      $check = Cart::where('product_id', $product_id)->where('user_ip',  session_id())->first();
      if ($check) {
         Cart::insert([
            'product_id' => $product_id,
            'price' => $product_price,
            'qty' => $qty,
            'product_size' => $product_size,
            'product_color' => $product_color,
            'user_ip' =>  session_id()
         ]);
         return redirect('check/out/buy')->with('success', 'product add to Cart');
         // Cart::where('product_id', $product_id)->increment('qty');
         // return redirect('check/out/buy')->with('success', 'product allready Cart');
      } else {
         Cart::insert([
            'product_id' => $product_id,
            'price' => $product_price,
            'qty' => $qty,
            'product_size' => $product_size,
            'product_color' => $product_color,
            'user_ip' =>  session_id()
         ]);
         return redirect('check/out/buy')->with('success', 'product add to Cart');
      }

   }




   // remove cart itmem
   public function cart_product_remove(Request $request,$id)
   {
      Cart::find($id)->delete();
      $sessionUser = $request->query('sessionUser');
      $cartItem = Cart::join('products', 'carts.product_id', '=', 'products.id')
      ->select('carts.*',
      'products.product_img_one',
      'products.product_name')
       ->where('carts.user_ip', $sessionUser)
       ->get();

      $totalPrice = 0;
       $CountItems = 0;
       foreach ($cartItem as $cart) {
       $totalPrice += $cart->price * $cart->qty;
       $CountItems++;
       }
       return response()->json([
           'msg' => 'Successfully done',
           'cartItem' => $cartItem,
           'totalPrice' => $totalPrice,
           'CountItems' => $CountItems,
           'userSessionId' => $sessionUser,
       ]);

      return redirect()->back()->with('success_delete', 'Cart item remove');
   }

   // remove cart list page
   public function cart_list_page()
   {
      $sub_total = Cart::all()->where('user_ip',  session_id())->sum(function ($t) {
         return  $t->price * $t->qty;
      });
      $carts = Cart::where('user_ip',  session_id())->get();

      return view('pages.cart-list', compact('carts', 'sub_total'));
   }

   //cart product update
   public function cart_product_update(Request $request, $id)
   {
      $sessionUser = $request->query('sessionUser');
      Cart::where('id', $id)->increment('qty');

      $cartItem = Cart::join('products', 'carts.product_id', '=', 'products.id')
      ->select('carts.*',
      'products.product_img_one',
      'products.product_name')
       ->where('carts.user_ip', $sessionUser)
       ->get();

      $totalPrice = 0;
       $CountItems = 0;
       foreach ($cartItem as $cart) {
       $totalPrice += $cart->price * $cart->qty;
       $CountItems++;
       }
       return response()->json([
           'msg' => 'Successfully done',
           'cartItem' => $cartItem,
           'totalPrice' => $totalPrice,
           'CountItems' => $CountItems,
           'userSessionId' => $sessionUser,
       ]);
   }
   //cart product decriment
   public function cart_product_decrement(Request $request , $id)
   {
    $sessionUser = $request->query('sessionUser');
    Cart::where('id', $id)->decrement('qty');

    $cartItem = Cart::join('products', 'carts.product_id', '=', 'products.id')
    ->select('carts.*',
    'products.product_img_one',
    'products.product_name')
     ->where('carts.user_ip', $sessionUser)
     ->get();

    $totalPrice = 0;
     $CountItems = 0;
     foreach ($cartItem as $cart) {
     $totalPrice += $cart->price * $cart->qty;
     $CountItems++;
     }
     return response()->json([
         'msg' => 'Successfully done',
         'cartItem' => $cartItem,
         'totalPrice' => $totalPrice,
         'CountItems' => $CountItems,
         'userSessionId' => $sessionUser,
     ]);

   }

   //apply Copon in cart product
   public function apply_copon(Request $request)
   {
      $sub_total = Cart::all()->where('user_ip',  session_id())->sum(function ($t) {
         return  $t->price * $t->qty;
      });
      $chack = Copon::where('coupon_name', $request->copon_name)->first();

      if ($chack) {
         Session::put('copon', [
            'coupon_name' => $chack->coupon_name,
            'coupon_discount' => $chack->discount,
            'discount_amount' => $sub_total * ($chack->discount / 100)
         ]);
         return redirect()->back()->with('success', 'Successfuly Coupon Added');
      } else {
         return redirect()->back()->with('success_delete', 'Invalid Coupon please Try Again');
      }
   }


   // Coupun remove
   public function couponremove()
   {
      if (Session::has('copon')) {
         session()->forget('copon');
         return redirect()->back()->with('success_delete', 'Succesfuly Coupon destroy');
      }
   }

   public function checkout_buy_page()
   {
    $sub_total = Cart::all()->where('user_ip',  session_id())->sum(function($t){
        return  $t->price * $t->qty;
        });

        $cart_join_prod = DB::table('products')
        ->join('carts', 'products.id', '=', 'carts.product_id')
        ->where('user_ip',  session_id())
        ->get();
        return view('pages.check-out-buy-page',compact('sub_total', 'cart_join_prod'));
   }


}
