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
               <h1>User and Role User Tables</h1>
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

            <!-- User content -->
            <div class="col-12">
               <div class="card">
                  <div class="row">

                     <div class="card-header col-sm-6">
                        <h3 class="card-title">User Table</h3>
                     </div>


                     <div class="card-header col-sm-6">
                        {{-- <a class=" float-sm-right" href="{{ route('admin.create') }}">Create new user</a> --}}
                        <a class=" float-sm-right" data-toggle="modal" data-target=".bd-example-modal-lg" style="cursor: pointer">Create new user</a>

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
                              <td>{{ $item['status'] == 1 ? 'Active' : 'Deactive' }}</td>

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
               <div class="d-flex " style="justify-content: center">
                  {{ $data->links() }}
               </div>

            </div>
            <!-- End User content -->

            <!--  Role User content -->
            <div class="col-12">
               <div class="card">
                  <div class="row">

                     <div class="card-header col-sm-6">
                        <h3 class="card-title">Role User table</h3>
                     </div>


                     <div class="card-header col-sm-6">
                        {{-- <a class=" float-sm-right" href="{{ route('admin.createrole.user') }}">Create new role user</a> --}}
                        <a class=" float-sm-right" data-toggle="modal" data-target=".bd-example-modal-lg1" style="cursor: pointer">New Role User</a>
                     </div>


                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <table id="example2" class="table table-bordered table-hover">
                        <thead>
                           <tr>
                              <th>ID</th>
                              <th>User name</th>
                              <th>Role name</th>
                              <th>created by</th>
                              <th>Status</th>
                              <th></th>
                              <th></th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($roleuser as $item)

                           <tr>
                              <td>{{ $item['id'] }}</td>
                              <td>{{ $item['username'] }}</td>
                              <td>{{ $item['rolename'] }}</td>
                              <td>{{ $item['created_by'] }}</td>
                              <td>{{ $item['status'] == 1 ? 'Active' : 'Deactive' }}</td>

                              <td>
                                 <a href="{{ route('admin.editrole.user', ['id'=>$item['id']]) }}">
                                    edit
                                 </a>
                              </td>

                              <td>
                                 @if ($item['status'] == 1)
                                 <a href="{{ route('admin.delrole.user', ['id'=>$item['id']]) }}">
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
            <!-- End Role User content -->
            <!-- /.col -->
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- user modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content col-sm-10" style="margin: 0 auto">

         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Create new User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">

            <!-- form create -->
            <form action="{{ route('admin.create.post') }}" method="post">
               @csrf

               <div class="col-sm-12">

                  <div class="row">

                     <div class="col-sm-6">

                        <div class="form-group">
                           @error('fullname')
                           <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
                           @enderror

                           <label>Full Name*</label>
                           <input required class="form-control" type="text" name="fullname" placeholder="Full Name..." value="{{ old('fullname') }}">
                        </div>

                        <div class="form-group">
                           @error('email')
                           <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
                           @enderror

                           <label>Email*</label>
                           <input required class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Email addess...">
                        </div>

                        <div class="form-group">
                           @error('username')
                           <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
                           @enderror

                           <label>Username*</label>
                           <input required class="form-control" type="text" name="username" value="{{ old('username') }}" placeholder="Username...">
                        </div>

                        <div class="form-group">
                           @error('phone')
                           <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
                           @enderror

                           <label>Phone number*</label>
                           <input required class="form-control" type="tel" name="phone" value="{{ old('phone') }}" placeholder="Phone number...">
                        </div>

                     </div>

                     <div class="col-sm-6">

                        <div class="form-group">
                           @error('address')
                           <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
                           @enderror

                           <label>Your address*</label>
                           <input required class="form-control" type="text" name="address" value="{{ old('address') }}" placeholder="Your address...">
                        </div>

                        <div class="form-group">
                           @error('password')
                           <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
                           @enderror

                           <label>Password*</label>
                           <input required class="form-control" type="password" name="password" placeholder="********">
                        </div>

                        <div class="form-group">
                           @error('repeat-pass')
                           <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
                           @enderror

                           <label>Repeat Password*</label>
                           <input required class="form-control" type="password" name="repeat-pass" placeholder="********">
                        </div>
                        <div class="form-group">
                           @error('file_img')
                           <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
                           @enderror

                           <label>Upload Image </label>
                           <div class="custom-file">
                              <input type="file" class="custom-file-input" id="inputGroupFile01" name="file_img" accept="image/png, image/jpeg, image/jpg">
                              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                           </div>

                        </div>

                     </div>


                  </div>

                  <div class="card-footer text-center">
                     <button type="submit" class="btn btn-primary">Create</button>

                  </div>

            </form>
            <!-- end form create -->
         </div>

      </div>
   </div>
</div>
<!-- end user modal -->


</div>



<!-- role user modal -->
<div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">

         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Create New Role User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>

         <div class="modal-body">
            <!-- form create -->
            <form action="{{ route('admin.createrole.user.post') }}" method="post">
               @csrf

               <div class="card-body">
                  <div class="form-group">
                     @error('username')
                     <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
                     @enderror
                     <label>User Name</label>
                     <input required value="{{ old('username') }}" name="username" type="text" class="form-control" placeholder="Enter User Name">
                  </div>

                  <div class="form-group">
                     @error('rolecode')
                     <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
                     @enderror
                     <label>Role Code</label>
                     <input required value="{{ old('rolecode') }}" name="rolecode" type="text" class="form-control" placeholder="Enter Role Code">
                  </div>
                  <!-- /.card-body -->

                  <div class="text-center">
                     <button type="submit" class="btn btn-primary">Create</button>
                  </div>
            </form>
            <!-- end form create -->
         </div>

      </div>

   </div>
</div>
<!-- end role user modal -->


@endsection