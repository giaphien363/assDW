<!DOCTYPE html>
<html lang="en">

<head>
   <title>Register</title>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!--===============================================================================================-->
   <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
   <link rel="stylesheet" type="text/css" href="{{ asset('auth_page/vendor/bootstrap/css/bootstrap.min.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ asset('auth_page/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ asset('auth_page/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ asset('auth_page/fonts/iconic/css/material-design-iconic-font.min.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ asset('auth_page/vendor/animate/animate.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ asset('auth_page/vendor/css-hamburgers/hamburgers.min.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ asset('auth_page/vendor/animsition/css/animsition.min.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ asset('auth_page/vendor/select2/select2.min.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ asset('auth_page/vendor/daterangepicker/daterangepicker.css') }}">

   <link rel="stylesheet" type="text/css" href="{{ asset('auth_page/css/util.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ asset('auth_page/css/main.css') }}">
   <!--===============================================================================================-->
</head>

<body style="background-color: #7eaa89;">


   {{-- content --}}
   @yield('content')
   {{-- end content --}}


   <!--===============================================================================================-->
   <script src="{{ asset('auth_page/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
   <script src="{{ asset('auth_page/vendor/animsition/js/animsition.min.js') }}"></script>
   <script src="{{ asset('auth_page/vendor/bootstrap/js/popper.js') }}"></script>
   <script src="{{ asset('auth_page/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
   <script src="{{ asset('auth_page/vendor/select2/select2.min.js') }}"></script>
   <script src="{{ asset('auth_page/vendor/daterangepicker/moment.min.js') }}"></script>
   <script src="{{ asset('auth_page/vendor/daterangepicker/daterangepicker.js') }}"></script>
   <script src="{{ asset('auth_page/vendor/countdowntime/countdowntime.js') }}"></script>
   <!--===============================================================================================-->
   <script src="{{ asset('auth_page/js/main.js') }}"></script>

</body>

</html>