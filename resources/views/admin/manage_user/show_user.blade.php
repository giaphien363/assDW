@extends('layout_admin.base')
@section('title' , 'Show User')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Admin show User Tables</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                  <li class="breadcrumb-item active">DataTables</li>
               </ol>
            </div>
         </div>
      </div><!-- /.container-fluid -->
   </section>

   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="row">

                     <div class="card-header col-sm-6">
                        <h3 class="card-title">DataTable with minimal features & hover style</h3>
                     </div>


                     <div class="card-header col-sm-6">
                        <a class=" float-sm-right" href="{{ route('admin.create') }}">Create new user</a>
                     </div>


                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <table id="example2" class="table table-bordered table-hover">
                        <thead>
                           <tr>
                              <th>ID</th>
                              <th>User name</th>
                              <th>Email</th>
                              <th>Phone number</th>
                              <th>Address</th>
                              <th>Status</th>
                              <th></th>
                              <th></th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($data as $item)

                           <tr>
                              <td>{{ $item['id'] }}</td>
                              <td>{{ $item['username'] }}</td>
                              <td>{{ $item['email'] }}</td>
                              <td>{{ $item['phone'] }}</td>
                              <td>{{ $item['address'] }}</td>
                              <td>{{ $item['status'] }}</td>

                              <td>
                                 <a href="{{ route('admin.edituser', ['id'=>$item['id']]) }}">
                                    edit
                                 </a>
                              </td>

                              <td>
                                 @if ($item['status'] == 1)
                                 <a href="{{ route('admin.deluser', ['id'=>$item['id']]) }}">
                                    delete
                                 </a>
                                 @else
                                 delete
                                 @endif
                              </td>
                           </tr>
                           @endforeach

                        </tbody>

                     </table>
                  </div>
                  <!-- /.card-body -->
               </div>


            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Page specific script -->
<script>
   $(function () {
     $("#example1").DataTable({
       "responsive": true, "lengthChange": false, "autoWidth": false,
       "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
     }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
     $('#example2').DataTable({
       "paging": true,
       "lengthChange": false,
       "searching": false,
       "ordering": true,
       "info": true,
       "autoWidth": false,
       "responsive": true,
     });
   });
</script>
@endsection