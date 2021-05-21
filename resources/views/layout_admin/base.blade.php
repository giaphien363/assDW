<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>@yield('title')</title>

   <!-- nav -->
   @include('layout_admin.link_header')
   <!-- end nav -->
</head>


<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
   <div class="wrapper">

      <!-- Preloader -->
      <div class="preloader flex-column justify-content-center align-items-center">
         <img class="animation__wobble" src="{{ asset('admin_page/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
      </div>


      <!-- nav -->
      @include('layout_admin.nav')
      <!-- end nav -->

      {{-- sidebar --}}
      @if (Auth::guard('admin')->check() && str_starts_with($_SERVER['REQUEST_URI'], '/admin'))
      @include('layout_admin.admin_sidebar')
      @else
      @include('layout_admin.sidebar')
      @endif

      {{-- end sidebar --}}

      @yield('content')

      <!-- /.content-wrapper -->

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
         <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->

   </div>
   <!-- ./wrapper -->

   @include('layout_admin.script')

</body>

</html>