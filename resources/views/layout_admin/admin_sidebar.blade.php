<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">


   <!-- Sidebar -->
   <div class="sidebar" style="margin-top:20px">


      <!-- Sidebar user panel (optional) -->
      <div class="user-panel pb-3 mb-3 d-flex">
         <div class="image">
            <img src="{{ asset('/images') }}/{{ Auth::guard('admin')->user()->image }}" class="img-circle elevation-2" alt="User Image">
         </div>
         <div class="info">
            <a href="#" class="d-block"> {{ Auth::guard('admin')->user()->fullname }}</a>
         </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
         <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
               <button class="btn btn-sidebar">
                  <i class="fas fa-search fa-fw"></i>
               </button>
            </div>
         </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
               <a href="{{ route('admin.dashboard') }}" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Admin Dashboard</p>
               </a>
            </li>

            <li class="nav-item">
               <a href="{{ route('admin.showuser') }}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                     Show Users
                  </p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{ route('admin.showrole') }}" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                     Show Role
                  </p>
               </a>
            </li>

            <li class="nav-item">
               <a href="{{ route('admin.showobject') }}" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                     Show Object
                  </p>
               </a>
            </li>

            <li class="nav-item">
               <a href="{{ route('admin.showrole.user') }}" class="nav-link">
                  <i class="nav-icon fas fa-chart-pie"></i>
                  <p>
                     Show Role Users
                  </p>
               </a>
            </li>
            
            <li class="nav-item">
               <a href="{{ route('admin.showroleobject') }}" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                     Show Role Object
                  </p>
               </a>
            </li>

            <li class="nav-item">
               <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>
                     Forms
                     <i class="fas fa-angle-left right"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="javascrip:void(0)" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>General Elements</p>
                     </a>
                  </li>

               </ul>
            </li>
            

         </ul>
      </nav>
      <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
</aside>