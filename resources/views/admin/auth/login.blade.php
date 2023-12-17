@extends('admin.admin_layouts')

@section('admin_content')

<div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

    <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
      <div class="signin-logo tx-center tx-24 tx-bold tx-inverse"><span class="tx-info tx-normal">  Admin Panel</span></div>
      <div class="tx-center mg-b-20">Sellspoints.com </div>
      <form method="POST" action="{{ route('admin.login') }}">
        @csrf
      <div class="form-group">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div><!-- form-group -->
      <div class="form-group">
    
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <button type="submit" class="btn btn-info btn-block">  {{ __('Login') }}</button>
    </form>
    </div><!-- login-wrapper -->
  </div>
  
    
@endsection

