<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="facebook-domain-verification" content="yvchifedw1j82b27zn92myzmupd1bw" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('product_list')</title>
    @php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
        }
        use App\Product;
        $products_list_meta = Product::get()->all();
    @endphp

    <meta name="keywords" content=" @foreach ( $products_list_meta as $item) {{  $item->product_slug }}, @endforeach">
    <meta name="description" content=" @foreach ( $products_list_meta as $item) {{  $item->product_slug }}, @endforeach">
    <meta name="author" content="sellspoints.com">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('frotend') }}/assets/images/icons/favicon-32x32.png">
    <meta name="apple-mobile-web-app-title" content="sellspoints.com">
    <meta name="application-name" content="sellspoints.com">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{asset('frotend') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('frotend') }}/assets/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="{{asset('frotend') }}/assets/css/plugins/magnific-popup/magnific-popup.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('frotend') }}/assets/css/style.css">

    <!-- alertify alert er jonno  -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    
    <!-- alertify alert er jonno  -->
    

<!-- Meta Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '676481734025705');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=676481734025705&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->

</head>

<body>
    <div class="page-wrapper">
        <header class="header">
            <div class="header-top" >
                <div class="container">
                    <div class="header-right" >
                        <ul class="top-menu">
                            <li>
                                <a href="#">Links</a>
                                <ul >
                                    @php
                                      $count =  App\Wishlist::where('user_ip', session_id())->count();
                                      $count_order =  App\Order::where('user_id', session_id())->count();
                                      $logo =  App\Websitelogo::find(1);
                                    @endphp
                                    @if($count_order>0)
                                     <li><a href="{{ url('/buynow/order-complate') }}"><i class="icon-heart-o"></i>My Order <span>({{  $count_order  }})</span></a></li>
                                   @endif
                                     <li><a href="{{ url('wishlist/page') }}"><i class="icon-heart-o"></i>My Wishlist <span>({{  $count  }})</span></a></li>
                                  @if(Auth::check())
                                    <li><a href="{{ url('my-profile/') }}"><i class="icon-user"></i>My Profile</a></li>
                                    @else
                                    <li><a href="{{ route('login') }}"><i class="icon-user"></i>Login</a></li>
                                    @endif
                                </ul>
                            </li>
                        </ul><!-- End .top-menu -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-top -->

            <div class="header-middle sticky-header">
                <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>
                        <style>
                            .name_logo{
                                font-size: 34px;
                                font-weight: 700;
                            }
                        </style>
                        <a href="{{url('/')}}" class=" name_logo">
                          @if($logo->header_logo != '')
                            <img src="{{ asset($logo->header_logo) }}" alt="" width="125" height="25">
                            @else
                            SellsPoints
                       @endif
                        </a>
                        <nav class="main-nav">
                            <ul class="menu sf-arrows">
                                <li class="megamenu-container @yield('home')">
                                    <a href="{{url('/')}}" class="">Home</a>
                                </li>
                                <li class=" @yield('product')">
                                    <a href="{{ route('all.product') }}" class="sf-with-ul">Product</a>
                                </li>
                                <li class=" @yield('about')">
                                    <a href="{{ route('about.page') }}">About</a>
                                </li>
                                <li class=" @yield('contact')">
                                    <a href="{{ route('contact.page') }}">Contact</a>
                                </li>
                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .header-left -->
               

                    <div class="header-right">
                        <div class="header-search1">
                            <form action="{{ route('search.product') }}" method="get">
                                @csrf
                                <div class="header-search-wrapper1 show">
                                    <label for="q" class="sr-only">Search</label>
                                    <input type="search" class="form-control" name="search_product" id="q" placeholder="Search in..." required>
                                </div><!-- End .header-search-wrapper -->
                                <button class="search-toggle1" ><i class="icon-search"></i></button>
                            </form>
                        </div><!-- End .header-search -->
                     <style>
                        @media screen and (max-width: 768px) {
                        
                        .cart-dropdown .dropdown-menu, .compare-dropdown .dropdown-menu {
                            display: block;
                            width: 230px;
                            margin: 1px 0 0;
                            padding: 8px 5px;
                           
                        }
                        .dropdown-cart-action .btn {
                        font-size: 1.1rem;
                        }
                     }
                     </style>
                     
                     @php
                       
                            use App\Cart;
                            $total = App\Cart::all()->where('user_ip', session_id())->sum(function($t){
                            return  $t->price * $t->qty;
                            });
                            $qty = App\Cart::all()->where('user_ip',  session_id())->sum('qty');
                            $results = DB::table('products')
                            ->join('carts', 'products.id', '=', 'carts.product_id')->where('user_ip',  session_id())
                            ->get();
                        @endphp
                        <div class="dropdown cart-dropdown   @if($results->count() >=1)show @else @endif" id="cart_realaod">

                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                <i class="icon-shopping-cart"></i>
                                <span class="cart-count"> {{  $qty }}</span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-cart-products">
                                    @if($results->count() >=1)
                                    @foreach ( $results  as $product_cart )
                                    <div class="product product_data">
                                        <div class="product-cart-details">
                                            <h4 class="product-title">
                                                <a >{{ $product_cart->product_name }}</a>
                                            </h4>
                                            <span class="cart-product-info">
                                                <span class="cart-product-qty">{{ $product_cart->qty }}</span>
                                                x     <span>&#2547; </span>{{ $product_cart->product_price }}
                                            </span>
                                        </div>
                                        <figure class="product-image-container">
                                            <a class="product-image">
                                                <img src="{{asset($product_cart->product_img_one) }}" alt="{{ $product_cart->product_name }}">
                                            </a>
                                        </figure>
                                        <input type="hidden" value="{{ $product_cart->id }}" id="cart_remove_id_valu" >
                                        <a href=""  id="cart_remove_id"  class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                    </div>
                                    @endforeach
                                    
                                <div class="dropdown-cart-total">
                                    <span>Total</span>

                                    <span class="cart-total-price">     <span>&#2547; </span>&nbsp;{{  number_format($total,2) }}</span>
                                </div><!-- End .dropdown-cart-total -->
                            
                                <div class="dropdown-cart-action">
                                    <a href="{{ url('shopping/cart/list') }}" class="btn btn-primary">View Cart</a>
                                    <a href="{{ url('/check/out/buy') }}" class="btn btn-outline-primary-2"><span>Buy Now</span><i class="icon-long-arrow-right"></i></a>
                                </div><!-- End .dropdown-cart-total -->
                                @else
                                <p class="text-danger text-center"> No Product in Cart</p>
                                @endif
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .cart-dropdown -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->
        </header><!-- End .header -->

    @yield('content')
 

        <footer class="footer footer-dark">
        	<div class="footer-middle">
	            <div class="container">
	            	<div class="row">
	            		<div class="col-sm-4 col-lg-4">
	            			<div class="widget widget-about">
                             
	            			    @if($logo->footer_logo != '')
                                <img src="{{ asset($logo->footer_logo) }}" alt="" class="footer-logo" alt="Footer Logo" width="135" height="25">
                                @else
                                 <h1 class="text-white"> SellsPoints</h1>
                           @endif
	            				<p>Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. </p>

	            				<div class="social-icons">
	            					<a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
	            					<a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
	            					<a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
	            					<a href="#" class="social-icon" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
	            					<a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
	            				</div><!-- End .soial-icons -->
	            			</div><!-- End .widget about-widget -->
	            		</div><!-- End .col-sm-6 col-lg-3 -->

	            		<div class="col-sm-4 col-lg-4">
	            			<div class="widget">
	            				<h4 class="widget-title">Useful Links</h4><!-- End .widget-title -->

	            				<ul class="widget-list">
	            					<li><a href="{{ url('/about/page') }}">About Us</a></li>
	            					<li><a href="#">How to shop </a></li>
	            					<li><a href="{{ url('/contact/page') }}">Contact us</a></li>
	            					{{-- <li><a href="{{ url('/login') }}">Log in</a></li> --}}
	            				</ul><!-- End .widget-list -->
	            			</div><!-- End .widget -->
	            		</div><!-- End .col-sm-6 col-lg-3 -->

	            		<div class="col-sm-4 col-lg-4">
	            			<div class="widget">
	            				<h4 class="widget-title">My Account</h4><!-- End .widget-title -->
	            				<ul class="widget-list">
	            					<li><a href="{{ url('/login') }}">Sign In</a></li>
	            					<li><a href="{{ url('/shopping/cart/list') }}">View Cart</a></li>
	            					<li><a href="{{ url('/wishlist/page') }}">My Wishlist</a></li>
	            					<li><a href="{{ url('/my-profile') }}">Track My Order</a></li>
	            				</ul><!-- End .widget-list -->
	            			</div><!-- End .widget -->
	            		</div><!-- End .col-sm-6 col-lg-3 -->
	            	</div><!-- End .row -->
	            </div><!-- End .container -->
	        </div><!-- End .footer-middle -->

	        <div class="footer-bottom">
	        	<div class="container">
	        		<p class="footer-copyright">Copyright © @php
                        echo date('Y');
                    @endphp <a class="text-light fs-4" href="https://www.facebook.com/profile.php?id=100008056331714" target="_blank"> Developed by : Ariful Islam</a></p><!-- End .footer-copyright -->
	        		<figure class="footer-payments">
	        			<img src="{{asset('frotend') }}/assets/images/payments.png" alt="Payment methods" width="272" height="20">
	        		</figure><!-- End .footer-payments -->
	        	</div><!-- End .container -->
	        </div><!-- End .footer-bottom -->
        </footer><!-- End .footer -->
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-close"></i></span>

            <form  action="{{ route('search.product') }}" method="get"class="mobile-search">
                @csrf
                <label for="mobile-search" class="sr-only">Search</label>
                <input type="search" class="form-control"name="search_product"  id="mobile-search" placeholder="Search in..." required>
                <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
            </form>
       
            
            <nav class="mobile-nav">
                <ul class="mobile-menu">
                    <li class="active">
                        <a href="{{url('/')}}">Home</a>
                    </li>
                    <li>
                        <a href="{{ url('/all-product') }}"> Product</a>
                    </li>
                    @if($count_order>0)
                    <li><a href="{{ url('/buynow/order-complate') }}"><i class="icon-shopping-cart"></i>My Order <span>({{  $count_order  }})</span></a></li>
                  @endif
                    <li><a href="{{ url('wishlist/page') }}"><i class="icon-heart-o"></i>My Wishlist <span>({{  $count  }})</span></a></li>
               
                    <li><a href="{{ url('/about/page') }}">About Us</a></li>
                    <li><a href="{{ url('/contact/page') }}">Contact us</a></li>
                    @if(Auth::check())
                   <li><a href="{{ url('my-profile/') }}"><i class="icon-user"></i>My Profile</a></li>
                   @else
                   <li><a href="{{ route('login') }}"><i class="icon-user"></i>Login</a></li>
                   @endif
                </ul>
            </nav><!-- End .mobile-nav -->

            <div class="social-icons">
                <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
            </div><!-- End .social-icons -->
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->

    <!-- End .modal -->

    {{-- <div class="container newsletter-popup-container mfp-hide" id="newsletter-popup-form">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="row no-gutters bg-white newsletter-popup-content">
                    <div class="col-xl-3-5col col-lg-7 banner-content-wrap">
                        <div class="banner-content text-center">
                            <img src="{{asset('frotend') }}/assets/images/popup/newsletter/logo.png" class="logo" alt="logo" width="60" height="15">
                            <h2 class="banner-title">get <span>25<light>%</light></span> off</h2>
                            <p>Subscribe to the Molla eCommerce newsletter to receive timely updates from your favorite products.</p>
                            <form action="#">
                                <div class="input-group input-group-round">
                                    <input type="email" class="form-control form-control-white" placeholder="Your Email Address" aria-label="Email Adress" required>
                                    <div class="input-group-append">
                                        <button class="btn" type="submit"><span>go</span></button>
                                    </div>
                                </div>
                            </form>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="register-policy-2" required>
                                <label class="custom-control-label" for="register-policy-2">Do not show this popup again</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2-5col col-lg-5 ">
                        <img src="{{asset('frotend') }}/assets/images/popup/newsletter/img-1.jpg" class="newsletter-img" alt="newsletter">
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- alertify alert er jonno  -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <!-- alertify alert er jonno  -->
      <script>
        @if (session('success'))
        alertify.set('notifier','position', 'top-right');
        alertify.success('<strong class=" d-flex align-items-center justify-content-start">&nbsp; <i class="icon ion-ios-checkmark d-flex align-items-center font_size"></i> {{ session("success") }}</strong>');
        @endif
        @if (session('success_delete'))
        alertify.set('notifier','position', 'top-right');
        alertify.warning('<strong class="text-danger d-flex align-items-center justify-content-start">&nbsp; <i class="icon ion-ios-checkmark d-flex align-items-center font_size"></i> {{ session("success_delete") }}</strong>');
        @endif
      </script>
      
    <!-- alertify alert er jonno  -->

    <!-- Plugins JS File -->
    <script src="{{asset('frotend') }}/assets/js/jquery.min.js"></script>
  
    <script src="{{asset('frotend') }}/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('frotend') }}/assets/js/jquery.hoverIntent.min.js"></script>
    <script src="{{asset('frotend') }}/assets/js/jquery.waypoints.min.js"></script>
    <script src="{{asset('frotend') }}/assets/js/superfish.min.js"></script>
    <script src="{{asset('frotend') }}/assets/js/owl.carousel.min.js"></script>
    {{-- <script src="{{asset('frotend') }}/assets/js/wNumb.js"></script> --}}
    <script src="{{asset('frotend') }}/assets/js/nouislider.min.js"></script>
    <script src="{{asset('frotend') }}/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="{{asset('frotend') }}/assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="{{asset('frotend') }}/assets/js/isotope.pkgd.min.js"></script>
    <!-- Main JS File -->
    
    <script src="{{asset('frotend') }}/assets/js/bootstrap-input-spinner.js"></script>
    <script src="{{asset('frotend') }}/assets/js/jquery.elevateZoom.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

    <script src="{{asset('frotend') }}/assets/js/main.js"></script>
  


</body>
    @include('layouts.ajax.ajax')
</html>