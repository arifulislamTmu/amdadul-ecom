<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin tamplate</title>
    <!-- vendor css -->
    <link href="{{asset('backend')}}/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{asset('backend')}}/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="{{asset('backend')}}/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="{{asset('backend')}}/lib/rickshaw/rickshaw.min.css" rel="stylesheet">

    <link href="{{asset('backend')}}/lib/highlightjs/github.css" rel="stylesheet">
    <link href="{{asset('backend')}}/lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="{{asset('backend')}}/lib/select2/css/select2.min.css" rel="stylesheet">

    <link href="{{asset('backend')}}/lib/medium-editor/medium-editor.css" rel="stylesheet">
    <link href="{{asset('backend')}}/lib/medium-editor/default.css" rel="stylesheet">
    <link href="{{asset('backend')}}/lib/summernote/summernote-bs4.css" rel="stylesheet">

  
    <!-- alertify alert er jonno  -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <!-- alertify alert er jonno  -->

    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{asset('backend')}}/css/starlight.css">
  </head>

  <body>

  @guest('admin')
  
  @else
    <!-- ########## START: LEFT PANEL ########## -->
    <div class="sl-logo"><a href="{{url('admin/home')}}"><i class="icon ion-android-star-outline"></i> Admin Panel</a></div>
    <div class="sl-sideleft">
      <div class="input-group input-group-search">
        <input type="search" name="search" class="form-control" placeholder="Search">
        <span class="input-group-btn">
          <button class="btn"><i class="fa fa-search"></i></button>
        </span><!-- input-group-btn -->
      </div><!-- input-group -->

      <div class="sl-sideleft-menu ">
        <a href="{{url('admin/home')}}" class="sl-menu-link   @yield('categorys')">
          <div class="sl-menu-item ">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Manage Category</span>
          </div>
        </a>
        <ul class="sl-menu-sub nav flex-column ">
          <li class="nav-item "><a href="{{ route('addcatehory') }}" class="nav-link @yield('category-sub')">Create-Category</a></li>
        </ul>
      </div>
      <div class="sl-sideleft-menu">
        <a href="" class="sl-menu-link @yield('brands')">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Manage Brand</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{ route('addbrand') }}" class="nav-link @yield('brand-sub')">Create Brand</a></li>
        </ul>
      </div>

      <div class="sl-sideleft-menu">
        <a href="" class="sl-menu-link @yield('products')">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Manage Product</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{ route('addproduct') }}" class="nav-link @yield('product-sub')">Create Product</a></li>
          <li class="nav-item"><a href="{{ route('product.list')}}" class="nav-link @yield('product-sub-list')">Product List</a></li>
        </ul>
      </div>
      <div class="sl-sideleft-menu">
        <a href="" class="sl-menu-link @yield('copon')">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Manage Cuopon</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{ route('copon_page') }}" class="nav-link @yield('copon-sub')">Add New Coupon</a></li>
        </ul>
      </div>

      <div class="sl-sideleft-menu">
        <a href="" class="sl-menu-link @yield('user')">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Manage User</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{ route('all-user.list') }}" class="nav-link @yield('user-sub')">User List</a></li>
        </ul>
      </div>

      
      <div class="sl-sideleft-menu">
        <a href="" class="sl-menu-link @yield('order')">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Manage Order</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{ route('order.list') }}" class="nav-link @yield('order-sub')">Order List</a></li>
          <li class="nav-item text-danger"><a href="{{ route('order.list.remove') }}" class="nav-link @yield('order-sub')">Remove  List</a></li>
        </ul>
      </div>

      <div class="sl-sideleft-menu">
        <a href="" class="sl-menu-link @yield('slider')">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Manage Slider</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{ route('addslider') }}" class="nav-link @yield('slider-sub')">Slider Add</a></li>
        </ul>
      </div>
      <div class="sl-sideleft-menu">
        <a href="" class="sl-menu-link @yield('about')">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Manage About page</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{ route('about.us') }}" class="nav-link @yield('about-sub')">About page</a></li>
        </ul>
      </div>
      
      <!-- <div class="sl-sideleft-menu">-->
      <!--  <a href="" class="sl-menu-link">-->
      <!--    <div class="sl-menu-item">-->
      <!--      <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>-->
      <!--      <span class="menu-item-label">Manage Logo</span>-->
      <!--    </div>-->
      <!--  </a>-->
      <!--  <ul class="sl-menu-sub nav flex-column">-->
      <!--    <li class="nav-item"><a href="{{ route('create.logo') }}" class="nav-link">Set logo</a></li>-->
      <!--  </ul>-->
      <!--</div>-->
      
      <div class="sl-sideleft-menu">
        <a href="" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Dashboard 2</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="blank.html" class="nav-link">Blank Page</a></li>
          <li class="nav-item"><a href="page-signin.html" class="nav-link">Signin Page</a></li>
        </ul>
      </div>

      <br>
    </div><!-- sl-sideleft -->
        <!-- ########## END: LEFT PANEL ########## -->

        <!-- ########## START: HEAD PANEL ########## -->
    <div class="sl-header">
      
      <div class="sl-header-left">
        
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
  
      </div><!-- sl-header-left -->
      <div class="sl-header-right">
        <div class=""><a  href="{{route('order.list')}}">Order List</a></div>
        <nav class="nav">
          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name">{{Auth::user()->name}}</span>
              <img src="{{asset('backend')}}/img/img3.jpg" class="wd-32 rounded-circle" alt="">
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-200">
              <ul class="list-unstyled user-profile-nav">
                <li><a href=""><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
                <li><a href="{{route('admin.logout')}}"><i class="icon ion-power"></i> Sign Out</a></li>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
        <div class="navicon-right">
          <a id="btnRightMenu" href="" class="pos-relative">
            <i class="icon ion-ios-bell-outline"></i>
            <!-- start: if statement -->
            <span class="square-8 bg-danger"></span>
            <!-- end: if statement -->
          </a>
        </div><!-- navicon-right -->
      </div><!-- sl-header-right -->
    </div><!-- sl-header -->
    
    @endguest


@yield('admin_content')
  <style>
    .font_size{
      font-size: 30px;
    }
  </style>
    <!-- ########## END: MAIN PANEL ########## -->

    <!-- alertify alert er jonno  -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <!-- alertify alert er jonno  -->
      <script>
        @if (session('success'))
        alertify.set('notifier','position', 'top-right');
        alertify.success('<strong class="text-light d-flex align-items-center justify-content-start">&nbsp; <i class="icon ion-ios-checkmark d-flex align-items-center font_size"></i> {{ session("success") }}</strong>');
        @endif
        @if (session('success_delete'))
        alertify.set('notifier','position', 'top-right');
        alertify.warning('<strong class="text-danger d-flex align-items-center justify-content-start">&nbsp; <i class="icon ion-ios-checkmark d-flex align-items-center font_size"></i> {{ session("success_delete") }}</strong>');
        @endif
      </script>
      
    <!-- alertify alert er jonno  -->

    <script src="{{asset('backend')}}/lib/jquery/jquery.js"></script>
    
      <script src="{{asset('backend')}}/lib/medium-editor/medium-editor.js"></script>
    <script src="{{asset('backend')}}/lib/summernote/summernote-bs4.min.js"></script>
   
    <script>
      $(function(){
        'use strict';

        // Inline editor
        var editor = new MediumEditor('.editable');

        // Summernote editor
        $('#summernote').summernote({
          height: 120,
          tooltip: false
        })
        $('#summernote2').summernote({
          height: 120,
          tooltip: false
        })
         $('#summernote3').summernote({
          height: 120,
          tooltip: false
        })
        $('#summernote4').summernote({
          height: 120,
          tooltip: false
        })
        
      });
    </script>

    <script>
      $(function(){
        'use strict';

        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_',
          }
        });

        $('#datatable2').DataTable({
          bLengthChange: false,
          searching: false,
          responsive: true
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
    </script>

  <script>
    $(document).ready(function(){
        setInterval(function() {
            $("#datatable1").load('<?php echo url("order/list/auto");?>').fadeIn("slow");
        }, 20000);
    });

</script>
    <script src="{{asset('backend')}}/lib/popper.js/popper.js"></script>
    <script src="{{asset('backend')}}/lib/bootstrap/bootstrap.js"></script>
    <script src="{{asset('backend')}}/lib/jquery-ui/jquery-ui.js"></script>
    <script src="{{asset('backend')}}/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="{{asset('backend')}}/lib/jquery.sparkline.bower/jquery.sparkline.min.js"></script>
    <script src="{{asset('backend')}}/lib/d3/d3.js"></script>
    <script src="{{asset('backend')}}/lib/rickshaw/rickshaw.min.js"></script>
    <script src="{{asset('backend')}}/lib/chart.js/Chart.js"></script>
    <script src="{{asset('backend')}}/lib/Flot/jquery.flot.js"></script>
    <script src="{{asset('backend')}}/lib/Flot/jquery.flot.pie.js"></script>
    <script src="{{asset('backend')}}/lib/Flot/jquery.flot.resize.js"></script>
    <script src="{{asset('backend')}}/lib/flot-spline/jquery.flot.spline.js"></script>
    <script src="{{asset('backend')}}/lib/highlightjs/highlight.pack.js"></script>
    <script src="{{asset('backend')}}/lib/datatables/jquery.dataTables.js"></script>
    <script src="{{asset('backend')}}/lib/datatables-responsive/dataTables.responsive.js"></script>
    <script src="{{asset('backend')}}/lib/select2/js/select2.min.js"></script>
    <script src="{{asset('backend')}}/js/starlight.js"></script>
    <script src="{{asset('backend')}}/js/ResizeSensor.js"></script>
    <script src="{{asset('backend')}}/js/dashboard.js"></script>


  </body>
</html>
