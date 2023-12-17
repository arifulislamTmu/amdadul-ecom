@extends('admin.admin_layouts')
@section('user') active show-sub @endsection
@section('user-sub') active @endsection
@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ url('/admin/home') }}">Home</a>
            <span class="breadcrumb-item active">User Page</span>
          </nav>
        <div class="sl-pagebody">
            <div class="row">
                <div class="col-12">
                    <div class="card pd-20 pd-sm-40">
                        <h6 class="card-body-title">User list</h6>
                        <div class="table-wrapper">
                          <table id="datatable1" class="table display responsive nowrap">
                            <thead>
                              <tr>
                                <th class="wd-10p">Sl.</th>
                                <th class="wd-15p">User name</th>
                                <th class="wd-20p">User e-mail</th>
                                <th class="wd-20p">User Phone</th>
                                <th class="wd-20p">Order Details</th>
                                <th class="wd-20p">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                $count = 1;
                                ?>
                              @foreach ($users AS $user)
                              <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td><a class="btn btn-outline-primary">Order Detail</a></td>
                                <td>
                                  <a href="" class="btn btn-success btn-sm"><i class="icon ion-edit"></i></a>
                                  <a href=""onclick="return confirm('Are you sure to delete this User..?');"   class="btn btn-danger  btn-sm"><i class="icon ion-trash-b"></i></a>
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div><!-- table-wrapper -->
                      </div><!-- card -->
                </div>
        
            </div>
        </div><!-- sl-pagebody -->
      </div><!-- sl-mainpanel -->

@endsection

