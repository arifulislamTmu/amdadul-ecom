<?php

use App\Http\Controllers\AboutPageController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PdfController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ChekoutController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\Frontend\AllproductController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishListController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home',  [HomeController::class,'index'])->name('home');
Route::get('/admin/home', [AdminController::class,'index']);
Route::get('admin', [LoginController::class,'showLoginForm'])->name('admin.login');
Route::post('admin',[LoginController::class,'login']);

// Route::get('admin/logout','AdminController@logut')->name('admin.logout');
Route::get('admin/logout',[AdminController::class,'logut'])->name('admin.logout');
Route::get('/', 'FrontendController@index');

// Backend Category page 
Route::get('category/',[CategoryController::class, 'index'])->name('addcatehory');
Route::post('/category-add',[CategoryController::class, 'catehoryAdd'])->name('add.category');
Route::get('/category-edit/{id}',[CategoryController::class, 'editCategory'])->name('edit.category');
Route::get('/delete-category/{del_id}',[CategoryController::class, 'DeleteCategory'])->name('delete.category');
Route::post('/category-update',[CategoryController::class, 'UpdateCategory'])->name('update.category');
Route::get('cat-status-dactive/{d_id}',[CategoryController::class, 'statasdeactive']);
Route::get('cat-status-active/{a_id}',[CategoryController::class, 'statasactive']);

// about page 
Route::get('about-us/',[AboutPageController::class,'index'])->name('about.us');
Route::post('/about-add',[AboutPageController::class, 'about_add'])->name('add.about');
Route::get('about-us-delete/{id}',[AboutPageController::class,'abouts_Delete'])->name('delete.about');


// Backend Brand page 
Route::get('brand/',[BrandController::class, 'index'])->name('addbrand');
Route::post('/brand-add',[BrandController::class, 'brandAdd'])->name('add.brand');
Route::get('/brand-edit/{id}',[BrandController::class, 'editbrand'])->name('edit.brand');
Route::get('/delete-brand/{del_id}',[BrandController::class, 'Deletebrand'])->name('delete.brand');
Route::post('/brand-update',[BrandController::class, 'Updatebrand'])->name('update.brand');
Route::get('status-dactive/{d_id}',[BrandController::class, 'statasdeactive']);
Route::get('status-active/{a_id}',[BrandController::class, 'statasactive']);

// Product page
Route::get('product-page/', [ProductController::class,'index'])->name('addproduct');
Route::post('/product-add', [ProductController::class,'productAdded'])->name('add.product');
Route::get('product-list/', [ProductController::class,'productList'])->name('product.list');
Route::post('/price-discount-add', [ProductController::class,'priceDiscountAdd'])->name('price.discount.add');
Route::get('prod-status-dactive/{prod_id}', [ProductController::class,'deactive_prod']);
Route::get('prod-status-active/{prod_id}', [ProductController::class,'active_prod']);
Route::get('product-edit/{id}',[ProductController::class,'productedit']);
Route::post('/product-update/{pro_id}', [ProductController::class,'productUpdate'])->name('update.product');
Route::post('/product-image/{pro_id}', [ProductController::class,'productImage'])->name('update.image');
Route::get('delete-product/{prod_id}',[ProductController::class,'product_delete'])->name('delete.product');

// Coupon page 
Route::get('/coupon-page',[CouponController::class,'index'])->name('copon_page');
Route::post('/cuopon-create',[CouponController::class,'addCoupon'])->name('add.copon');
Route::get('coupon-edit-page/{copon_id}',[CouponController::class,'edit_copon']);
Route::post('/update-coupon',[CouponController::class,'update_copon'])->name('update.copon');
Route::get('copon-status-dactive/{d_id}',[CouponController::class, 'statasdeactive']);
Route::get('copon-status-active/{a_id}',[CouponController::class, 'statasactive']);
Route::get('delete-copon/{copon_id}', [CouponController::class,'delete_copon'])->name('delete.copon');

//order list
Route::get('order/list', [CouponController::class,'order_list'])->name('order.list');

// Route::get('order/list/auto', [CouponController::class,'order_auto_reload']);
Route::get('oreder/details/{order_id}', [CouponController::class,'order_id']);
Route::get('order/status/{status_id}', [CouponController::class,'order_status']);
Route::get('order/raedy/{status_ready}', [CouponController::class,'order_status_rady']);
Route::get('order/raedy/success/{status_success}', [CouponController::class,'order_status_success']);
Route::get('order-hidden/{order_id}', [CouponController::class,'order_list_hide']);
Route::get('order/list/remove', [CouponController::class,'order_list_remove'])->name('order.list.remove');

// PDF controller  invoice
Route::get('generate-pdf/{order_id}',[PdfController::class,'generate_pdf']);
Route::get('/download-pdf',[PdfController::class,'download_pdf']);


// slider start 
Route::get('slider-page/', [SliderController::class,'s_index'])->name('addslider');
Route::post('/slider-add', [SliderController::class,'s_productAdded'])->name('add.slider');
Route::get('slider-list/', [SliderController::class,'s_productList'])->name('slider.list');
Route::get('slider-status-dactive/{prod_id}', [SliderController::class,'s_deactive_prod']);
Route::get('slider-status-active/{prod_id}', [SliderController::class,'s_active_prod']);
Route::get('slider-edit/{id}',[SliderController::class,'s_productedit']);
Route::post('/slider-update/{pro_id}', [SliderController::class,'s_productUpdate'])->name('update.slider');
Route::post('/slider-image/{pro_id}', [SliderController::class,'s_productImage'])->name('slider.image');
Route::get('delete/slider/{prod_id}',[SliderController::class,'s_product_delete'])->name('delete.slider');

//logo
Route::get('create/logo/',[SliderController::class,'create_logo'])->name('create.logo');
Route::post('/logo-add', [SliderController::class,'logo_add'])->name('add.logo');




//admin backend end

// User Control  page 
Route::get('user-list/', [UserController::class,'user_list'])->name('all-user.list');


// fontend contorller
Route::get('addToCart/{cart_id}',[CartController::class,'cartadd']);
Route::get('cart/',[CartController::class,'cart_page']);
Route::get('cart/remove/{cart_id}',[CartController::class,'cart_remove']);

// buy now page 
Route::post('/buy-now',[CartController::class,'buy_now_add'])->name('buynow.product');

Route::get('check/out/buy',[CartController::class,'checkout_buy_page']);
Route::post('/procces/order/buy',[OrderController::class,'proccessTo_check_buyNow'])->name('procces.order.buy');
Route::get('/buynow/order-complate', [FrontendController::class,'orderSuccesfullyCompalte']);

// all product show 
Route::get('all-product/', [AllproductController::class,'product_show'])->name('all.product');
Route::get('product/details/{prod_id}', [AllproductController::class,'product_detail'])->name('product.details');
Route::get('shopping/cart/list',[CartController::class,'cart_list_page']);
Route::get('about/page', [FrontendController::class,'about_page'])->name('about.page');
Route::get('contact/page', [FrontendController::class,'contact_page'])->name('contact.page');
Route::get('all-product/search', [FrontendController::class,'search_all_product'])->name('search.product');

// all product details ajax show 
Route::get('/product/detail/ajax/',[FrontendController::class,'product_details']);
Route::get('/product/add-to-cart/{product_id}',[CartController::class,'add_to_cart']);


//pagenation for ajax
Route::get('/pagenation/paginate-data',[AllproductController::class,'pagenation']);

//category wise search product Ajax
Route::get('/product/category/search',[AllproductController::class,'category_product_search']);
Route::get('/product/brand/search',[AllproductController::class,'brand_product_search']);
Route::get('/product/price/search',[AllproductController::class,'price_product_search']);
Route::get('/product/soft/by',[AllproductController::class,'soft_by_product']);


//cart product remove 
Route::get('/product/cart/remove',[CartController::class,'cart_product_remove']);
//cart product Update 
Route::get('/product/cart/update',[CartController::class,'cart_product_update']);
//cart product decriment 
Route::get('/product/cart/decriment',[CartController::class,'cart_product_decrement']);
//apply coupone
Route::post('coupon/apply',[CartController::class,'apply_copon']);
//user delete copon
Route::get('coupon/r/', [CartController::class,'couponremove'])->name('couponr');


//checkout pager
Route::get('check/out',[ChekoutController::class,'index']);
Route::post('/procces/order/',[OrderController::class,'proccessTo_check'])->name('procces.order');
Route::get('my-profile/',[OrderController::class,'my_profile']);
Route::get('my-profile/ajax',[OrderController::class,'my_profile_ajax']);
Route::get('my-oder-details/{order_id}',[OrderController::class,'my_order_details'])->name('my.order.details');
Route::get('my-oder-cancel/{orde_id}',[OrderController::class,'my_order_cancel'])->name('my.order.cancel');
Route::post('my/password/change',[OrderController::class,'my_password_change'])->name('password.change');
Route::post('update/user', [OrderController::class,'user_update'])->name('update.user.account');

//Whishlist Controller
Route::get('wishlist/page',[WishListController::class,'index']);
Route::get('add/wishlist/',[WishListController::class,'add_wisshlist']);
Route::get('wishlist/remove/{prod_id}',[WishListController::class,'product_remove']);


//category wish product show
Route::get('/product/category/{cat_id}', [AllproductController::class,'category_product']);

//brand wish product show
Route::get('/product/brand/{brand_id}', [AllproductController::class,'brand_product']);

Route::get('/clear_cache', function () {

    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('optimize:clear');
 
    dd("Cache is cleared");

});