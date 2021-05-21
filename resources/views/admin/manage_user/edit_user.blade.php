@extends('layout_auth.base')
@section('title' , 'Edit User')

@section('content')
<div class="limiter">
   <div class="container-login100">
      <div class="login100-more" style="background-image: url('{{ asset('auth_page/images/bg-01.jpg') }}');"></div>

      <div class="wrap-login100 p-l-50 p-r-50 p-t-52 p-b-50">
         <span class="login100-form-title p-b-20 text-center">
            Edit account
         </span>

         @if (Session::get('fail'))
         <div class="col-md-12 d-flex justify-content-center m-b-20">
            <div class="col-md-12">
               <p style="font-size:16px;font-weight:600" class="text-center text-danger">{{ Session::get('fail') }}</p>
            </div>
         </div>
         @endif


         <form action="{{ route('admin.handle.edit', ['id'=>$data['id']]) }}" method="post" class="login100-form validate-form" enctype="multipart/form-data">
            @csrf

            <div class="wrap-input100 validate-input" data-validate="Full Name is required">
               @error('fullname')
               <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
               @enderror

               <span class="label-input100">Full Name*</span>
               <input class="input100" type="text" name="fullname" placeholder="Full Name..." value="{{ $data['fullname'] }}">
               <span class="focus-input100"></span>

            </div>

            <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
               @error('email')
               <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
               @enderror

               <span class="label-input100">Email*</span>
               <input class="input100" type="email" name="email" value="{{ $data['email'] }}" placeholder="Email addess...">
               <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 ">
               <span class="label-input100">Username*</span>
               <input disabled class="input100" value="{{$data['username']}}">
               <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 ">
               <span class="label-input100">Phone number*</span>
               <input disabled class="input100" value="{{ $data['phone'] }}">
               <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input" data-validate="Your address is required">
               <span class="label-input100">Your address*</span>
               <input class="input100" type="text" name="address" value="{{ $data['address']  }}">
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
            <div class="wrap-input100 ">
               <div class="form-group">
                  <label>Status</label>
                  <select name="status" class="form-control select2" style="width: 100%;">
                     <option selected="selected">{{ $data['status']  }}</option>
                     @if ($data['status']==1)
                     <option>0</option>
                     @else
                     <option>1</option>
                     @endif
                  </select>
               </div>
            </div>

            <div class="wrap-input100 validate-input" data-validate="Password is required">
               @error('password')
               <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
               @enderror

               <span class="label-input100">Password*</span>
               <input class="input100" type="password" name="password" placeholder="********">
               <span class="focus-input100"></span>
            </div>


            <div class="container-login100-form-btn">
               <div class="wrap-login100-form-btn">
                  <div class="login100-form-bgbtn"></div>
                  <button type="submit" class="login100-form-btn">
                     Submit
                  </button>
               </div>
               <a href="{{ route('admin.showuser') }}" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
                 Back
                  <i class="fa fa-long-arrow-right m-l-5"></i>
               </a>
            </div>
         </form>
      </div>

   </div>
</div>
@endsection