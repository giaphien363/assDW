@extends('layout_admin.base')

@section('title' , 'Show Role')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Role and Role Object Tables</h1>
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
            <!-- role-->
            <div class="col-12">
               <div class="card">
                  <div class="row">

                     <div class="card-header col-sm-6">
                        <h3 class="card-title">Role table</h3>
                     </div>


                     <div class="card-header col-sm-6">
                        {{-- <a class=" float-sm-right" href="{{ route('admin.createrole') }}">Create new role</a> --}}
                        <a class=" float-sm-right" data-toggle="modal" data-target="#createRole" style="cursor: pointer">Create new role</a>
                     </div>


                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <table id="example2" class="table table-bordered table-hover">
                        <thead>
                           <tr>
                              <th>ID</th>
                              <th>Role code</th>
                              <th>Role name</th>
                              <th>Description</th>
                              <th>Status</th>
                              <th></th>
                              <th></th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($data as $it)

                           <tr>
                              <td>{{ $it['id'] }}</td>
                              <td>{{ $it['ROLE_CODE'] }}</td>
                              <td>{{ $it['ROLE_NAME'] }}</td>
                              <td>{{ $it['DESCRIPTION'] }}</td>


                              <td>{{$it['status'] == 1?'Active':'Deactive'}}</td>

                              <td>
                                 <a href="{{ route('admin.editrole', ['id'=>$it['id']]) }}">
                                    edit</a>
                              </td>

                              <td>
                                 @if ($it['status'] == 1)
                                 <a href="{{ route('admin.delrole', ['id'=>$it['id']]) }}">
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
            <!-- end role-->

            <!-- role obj-->
            <div class="col-12">
               <div class="card">
                  <div class="row">

                     <div class="card-header col-sm-6">
                        <h3 class="card-title">Role Object Table</h3>
                     </div>


                     <div class="card-header col-sm-6">
                        {{-- <a class=" float-sm-right" href="{{ route('admin.createrole.object') }}">Create new role object</a> --}}
                        <a class=" float-sm-right" data-toggle="modal" data-target=".bd-example-modal-lg1" style="cursor: pointer">Create new role object</a>
                     </div>


                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <table id="example2" class="table table-bordered table-hover">
                        <thead>
                           <tr>
                              <th>ID</th>
                              <th>Role Name</th>
                              <th>Object Name</th>
                              <th>created by</th>
                              <th>Status</th>
                              <th></th>
                              <th></th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($roleobj as $item)

                           <tr>
                              <td>{{ $item['id'] }}</td>
                              <td>{{ $item['rolename'] }}</td>
                              <td>{{ $item['objname'] }}</td>
                              <td>{{ $item['created_by'] }}</td>
                              <td>{{$item['status'] == 1?'Active':'Deactive'}}</td>

                              <td>
                                 <a href="{{ route('admin.editrole.object', ['id'=>$item['id']]) }}">
                                    edit
                                 </a>
                              </td>

                              <td>
                                 @if ($item['status'] == 1)
                                 <a href="{{ route('admin.delrole.object', ['id'=>$item['id']]) }}">
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
            <!-- end role obj-->
            <!-- /.col -->
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- Large modal -->

<div class="modal fade bd-example-modal-lg" id="createRole" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content col-sm-10" style="margin: 0 auto">

         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Create new Role</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form action="{{ route('admin.createrole.post') }}" method="post">
               @csrf

               <div class="card-body">
                  <div class="form-group">
                     @error('role_code')
                     <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
                     @enderror
                     <label>Role code</label>
                     <input required value="{{ old('role_code') }}" name="role_code" type="text" class="form-control" placeholder="Enter role code">
                  </div>

                  <div class="form-group">
                     @error('role_name')
                     <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
                     @enderror
                     <label>Role name</label>
                     <input required value="{{ old('role_name') }}" name="role_name" type="text" class="form-control" placeholder="Enter role name">
                  </div>

                  <div class="form-group">
                     @error('description')
                     <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
                     @enderror
                     <label>Description</label>
                     <input value="{{ old('description') }}" required name="description" type="text" class="form-control" placeholder="Description">
                  </div>

                  <div class="card-footer">
                     <div class="col-sm-12 d-flex" style="justify-content: flex-end">
                        <button type="submit" class="btn btn-primary">Create</button>
                     </div>
                  </div>
            </form>
         </div>

      </div>
   </div>
</div>
<!-- end Large modal -->
</div>

<!-- role obj modal -->
<div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">

         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Create New Role Object</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>

         <div class="modal-body">
            <!-- form create -->
            <form action="{{ route('admin.createrole.object.post') }}" method="post">
               @csrf

               <div class="card-body">
                  
                  <div class="form-group">
                     @error('rolecode')
                     <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
                     @enderror
                     <label>Role Code</label>
                     <input required value="{{ old('rolecode') }}" name="rolecode" type="text" class="form-control" placeholder="Enter Role Code">
                  </div>

                  <div class="form-group mt-3">
                     @error('objid')
                     <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
                     @enderror

                     <label class="mb-3">Object Name</label>

                     <!-- lay all obj -->
                     @foreach ($allobj as $lay1)

                     <!-- check obj khong co parent id -->
                     @if ($lay1['PARENT_ID']==null)

                     <div class="mb-2">
                        <input type="checkbox" value="{{$lay1['id']}}" name="objid[]">
                        <label class="mr-4">{{ $lay1['OBJECT_NAME'] }}</label>

                        <!-- lay ra tat ca record co parent id == lay1_id -->
                        @foreach ($allobj as $lay2)
                        @if ($lay2['PARENT_ID']==$lay1['id'])

                        <input type="checkbox" value="{{$lay2['id']}}" name="objid[]">
                        <label class="mr-4">{{ $lay2['OBJECT_NAME'] }}</label>

                        @endif
                        @endforeach


                     </div>

                     @endif

                     @endforeach
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
<!-- end role obj modal -->

<!-- <script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
   function getByAjax(data) {
        $.ajax({
                type: 'GET',
                url: data
            })
            .done(function(res) {
               console.log(res);
                addModal(res);

                // collapse
                
               setTimeout(
                  function(){
                     // $('#unimodal').modal('show')
                     }
                  , 500);
            })
            .fail((jqXHR, ajaxOptions, thrownError) => {
                console.log('oop...error')
            })
    }
</script>

@endsection