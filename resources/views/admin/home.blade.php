@extends('admin.admin_layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="{{url('admin/home')}}">Starlight</a>
          <span class="breadcrumb-item active">Dashboard</span>
        </nav>
  
        <div class="sl-pagebody">
  
          <div class="row row-sm">
            <div class="col-sm-6 col-xl-3">
              <div class="card pd-20 bg-primary py-3 ">
                <div class= "mg-b-10 text-center">
                  <h4 class="tx-16 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Product</h4>
                </div>
                  <h3 class="mg-b-0 tx-white  text-center tx-lato tx-bold">{{ $products }}</h3>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3">
              <div class="card pd-20 bg-info py-3 ">
                <div class= "mg-b-10 text-center">
                  <h4 class="tx-16 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Category</h4>
                </div>
                  <h3 class="mg-b-0 tx-white  text-center tx-lato tx-bold">{{ $categories }}</h3>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3">
              <div class="card pd-20 bg-purple py-3 ">
                <div class= "mg-b-10 text-center">
                  <h4 class="tx-16 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Brand</h4>
                </div>
                  <h3 class="mg-b-0 tx-white  text-center tx-lato tx-bold">{{ $brands }}</h3>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-4">
              <div class="card pd-20 bg-primary py-3 ">
                <div class= "mg-b-10 text-center">
                  <h4 class="tx-16 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Customer</h4>
                </div>
                  <h3 class="mg-b-0 tx-white  text-center tx-lato tx-bold">{{ $users }}</h3>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-4">
              <div class="card pd-20 bg-purple py-3 ">
                <div class= "mg-b-10 text-center">
                  <h4 class="tx-16 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Order</h4>
                </div>
                  <h3 class="mg-b-0 tx-white  text-center tx-lato tx-bold">{{ $orders }}</h3>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3">
              <div class="card pd-20 bg-success py-3 ">
                <div class= "mg-b-10 text-center">
                  <h4 class="tx-16 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total complete Order</h4>
                </div>
                  <h3 class="mg-b-0 tx-white  text-center tx-lato tx-bold">{{ $orders_comple }}</h3>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3">
              <div class="card pd-20 bg-danger py-3 ">
                <div class= "mg-b-10 text-center">
                  <h4 class="tx-16 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total cancel Order</h4>
                </div>
                  <h3 class="mg-b-0 tx-white  text-center tx-lato tx-bold">{{ $orders_cencel }}</h3>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3">
              <div class="card pd-20 bg-success py-3 ">
                <div class= "mg-b-10 text-center">
                  <h4 class="tx-16 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Product Sells</h4>
                </div>
                  <h3 class="mg-b-0 tx-white  text-center tx-lato tx-bold">Tk. {{ $product_sells }}</h3>
              </div>
            </div>
        </div><!-- row -->
        
        <div class="row row-sm mg-t-20">
          <div class="col-xl-8">
            <div class="card overflow-hidden">
              <div class="card-header bg-transparent pd-y-20 d-sm-flex align-items-center justify-content-between">
                <div class="mg-b-20 mg-sm-b-0">
                  <h6 class="card-title mg-b-5 tx-13 tx-uppercase tx-bold tx-spacing-1">Profile Statistics</h6>
                  <span class="d-block tx-12">October 23, 2017</span>
                </div>
                <div class="btn-group" role="group" aria-label="Basic example">
                  <a href="#" class="btn btn-secondary tx-12 active">Today</a>
                  <a href="#" class="btn btn-secondary tx-12">This Week</a>
                  <a href="#" class="btn btn-secondary tx-12">This Month</a>
                </div>
              </div><!-- card-header -->
              <div class="card-body pd-0 bd-color-gray-lighter">
                <div class="row no-gutters tx-center">
                  <div class="col-12 col-sm-4 pd-y-20 tx-left">
                    <p class="pd-l-20 tx-12 lh-8 mg-b-0">Note: Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula...</p>
                  </div><!-- col-4 -->
                  <div class="col-6 col-sm-2 pd-y-20">
                    <h4 class="tx-inverse tx-lato tx-bold mg-b-5">6,112</h4>
                    <p class="tx-11 mg-b-0 tx-uppercase">Views</p>
                  </div><!-- col-2 -->
                  <div class="col-6 col-sm-2 pd-y-20 bd-l">
                    <h4 class="tx-inverse tx-lato tx-bold mg-b-5">102</h4>
                    <p class="tx-11 mg-b-0 tx-uppercase">Likes</p>
                  </div><!-- col-2 -->
                  <div class="col-6 col-sm-2 pd-y-20 bd-l">
                    <h4 class="tx-inverse tx-lato tx-bold mg-b-5">343</h4>
                    <p class="tx-11 mg-b-0 tx-uppercase">Comments</p>
                  </div><!-- col-2 -->
                  <div class="col-6 col-sm-2 pd-y-20 bd-l">
                    <h4 class="tx-inverse tx-lato tx-bold mg-b-5">960</h4>
                    <p class="tx-11 mg-b-0 tx-uppercase">Shares</p>
                  </div><!-- col-2 -->
                </div><!-- row -->
              </div><!-- card-body -->
              <div class="card-body pd-0">
                <div id="rickshaw2" class="wd-100p ht-200"></div>
              </div><!-- card-body -->
            </div><!-- card -->

          </div><!-- col-8 -->
          <div class="col-xl-4 mg-xl-t-0">

            <div class="card pd-20 pd-sm-25">
              <h6 class="card-body-title tx-13">Horizontal Bar Chart</h6>
              <p class="mg-b-20 mg-sm-b-30">A bar chart or bar graph is a chart with rectangular bars with lengths proportional to the values that they represent.</p>
              <canvas id="chartBar4" height="215"></canvas>
            </div><!-- card -->
          </div><!-- col-3 -->
        </div><!-- row -->
  
        </div><!-- sl-pagebody -->
        <footer class="sl-footer mt-5">
          <div class="footer-left">
            <div class="mg-b-2">Copyright &copy; 2017. Starlight. All Rights Reserved.</div>
            <div>Made by ThemePixels.</div>
          </div>
          <div class="footer-right d-flex align-items-center">
            <span class="tx-uppercase mg-r-10">Share:</span>
           </div>
        </footer>
      </div><!-- sl-mainpanel -->



      
      <!-- ########## END: MAIN PANEL ########## -->
    
@endsection

