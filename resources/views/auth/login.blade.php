@extends('layout_auth.base')


@section('content')
<div class="limiter">
   <div class="container-login100">
      <div class="login100-more" style="background-image: url('{{ asset('auth_page/images/bg-03.jpg') }}');"></div>

      <div class="wrap-login100 p-l-50 p-r-50 p-t-120 p-b-50">

         <span class="login100-form-title p-b-20 text-center">
            Sign in
         </span>

         @if (Session::get('fail'))
         <div class="col-md-12 d-flex justify-content-center m-b-20" >
            <div class="col-md-12">
               <p style="font-size:16px;font-weight:600" class="text-center text-danger">{{ Session::get('fail') }}</p>
            </div>
         </div>
         @endif


         <form action="{{ route('checkLogIn') }}" method="post" class="login100-form validate-form">
            @csrf

            <div class="wrap-input100 validate-input" data-validate="Username is required">
               @error('username')
               <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
               @enderror

               <span class="label-input100">Username</span>
               <input value="{{ old('username') }}" class="input100" type="text" name="username" placeholder="Username...">
               <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input" data-validate="Password is required">
               @error('password')
               <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
               @enderror

               <span class="label-input100">Password</span>
               <input class="input100" type="password" name="password" placeholder="*******">
               <span class="focus-input100"></span>
            </div>


            <div class="container-login100-form-btn">
               <div class="wrap-login100-form-btn">
                  <div class="login100-form-bgbtn"></div>
                  <button type="submit" class="login100-form-btn">
                     Sign In
                  </button>
               </div>

               <a href="{{ route('signup') }}" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
                  Sign Out
                  <i class="fa fa-long-arrow-right m-l-5"></i>
               </a>
            </div>
         </form>
      </div>

   </div>
</div>
@endsection