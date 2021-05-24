@extends('layout_auth.base')


@section('content')
<div class="limiter">
   <div class="container-login100">
      <div class="login100-more" style="background-image: url('{{ asset('auth_page/images/bg-01.jpg') }}');"></div>

      <div class="wrap-login100 p-l-50 p-r-50 p-t-52 p-b-50">
         <span class="login100-form-title p-b-20 text-center">
            Sign Up
         </span>

         @if (Session::get('fail'))
         <div class="col-md-12 d-flex justify-content-center m-b-20">
            <div class="col-md-12">
               <p style="font-size:16px;font-weight:600" class="text-center text-danger">{{ Session::get('fail') }}</p>
            </div>
         </div>
         @endif


         <form enctype="multipart/form-data" action="{{ route('checkSignUp') }}" method="post" class="login100-form validate-form">
            @csrf

            <div class="wrap-input100 validate-input" data-validate="Full Name is required">
               @error('fullname')
               <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
               @enderror

               <span class="label-input100">Full Name*</span>
               <input class="input100" type="text" name="fullname" placeholder="Full Name..." value="{{ old('fullname') }}">
               <span class="focus-input100"></span>

            </div>

            <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
               @error('email')
               <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
               @enderror

               <span class="label-input100">Email*</span>
               <input class="input100" type="email" name="email" value="{{ old('email') }}" placeholder="Email addess...">
               <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input" data-validate="Username is required">
               @error('username')
               <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
               @enderror

               <span class="label-input100">Username*</span>
               <input class="input100" type="text" name="username" value="{{ old('username') }}" placeholder="Username...">
               <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input" data-validate="Phone number is required">
               @error('phone')
               <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
               @enderror

               <span class="label-input100">Phone number*</span>
               <input class="input100" type="tel" name="phone" value="{{ old('phone') }}" placeholder="Phone number...">
               <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input" data-validate="Your address is required">
               @error('address')
               <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
               @enderror

               <span class="label-input100">Your address*</span>
               <input class="input100" type="text" name="address" value="{{ old('address') }}" placeholder="Your address...">
               <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input" data-validate="Password is required">
               @error('password')
               <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
               @enderror

               <span class="label-input100">Password*</span>
               <input class="input100" type="password" name="password" placeholder="********">
               <span class="focus-input100"></span>
            </div>


            <div class="wrap-input100 validate-input" data-validate="Repeat Password is required">

               @error('repeat-pass')
               <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
               @enderror

               <span class="label-input100">Repeat Password*</span>
               <input class="input100" type="password" name="repeat-pass" placeholder="********">
               <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 ">
               @error('file-img')
               <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
               @enderror

               <div class="custom-file">
                  <label class="label-input100 custom-file-label" for="customFile">Profile image</label>
                  <input type="file" name="file_img" id="customFile" accept="image/png, image/jpeg, image/jpg">
               </div>
            </div>


            <div class="flex-m w-full p-b-33">
               <div class="contact100-form-checkbox">
                  <input checked class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                  <label class="label-checkbox100" for="ckb1">
                     <span class="txt1">
                        I agree to the
                        <a href="#" class="txt2 hov1">
                           Terms of User
                        </a>
                     </span>
                  </label>
               </div>
            </div>

            <div class="container-login100-form-btn">
               <div class="wrap-login100-form-btn">
                  <div class="login100-form-bgbtn"></div>
                  <button type="submit" class="login100-form-btn">
                     Sign Up
                  </button>
               </div>

               <a href="{{ route('login') }}" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
                  Sign in
                  <i class="fa fa-long-arrow-right m-l-5"></i>
               </a>
            </div>
         </form>
      </div>

   </div>
</div>
@endsection