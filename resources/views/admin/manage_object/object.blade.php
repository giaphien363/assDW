@extends('layout_admin.base')

@section('title' , 'Show Object')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Object Tables</h1>
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
                        <a class=" float-sm-right" data-toggle="modal" data-target="#createRole" style="cursor: pointer">Create new object</a>
                     </div>


                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <table id="example2" class="table table-bordered table-hover">
                        <thead>
                           <tr>
                              <th>ID</th>
                              <th>Parent Id</th>
                              <th>Code</th>
                              <th>Url</th>
                              <th>Name</th>
                              <th>Description</th>
                              <th>Level</th>
                              <th>Show menu</th>
                              <th>Status</th>
                              <th></th>
                              <th></th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($dsobject as $row)

                           <tr>
                              <td>{{ $row['id'] }}</td>

                              @if ($row['PARENT_ID'] != null)
                              <td>{{ $row['PARENT_ID'] }}</td>
                              @else
                              <td>NUll</td>
                              @endif

                              <td>{{ $row['OBJECT_CODE'] }}</td>
                              <td>{{ $row['OBJECT_URL'] }}</td>
                              <td>{{ $row['OBJECT_NAME'] }}</td>
                              <td>{{ $row['DESCRIPTION'] }}</td>
                              <td>{{ $row['OBJECT_LEVEL']==1 ? 'Master': 'Fresher'}}</td>
                              <td>{{ $row['SHOW_MENU'] ==1 ? 'Active':'Deactive' }}</td>
                              <td>{{ $row['status'] ==1 ? 'Active':'Deactive' }}</td>
                              <td>
                                 <a href="{{ route('admin.editobject', ['id'=>$row['id'] ]) }}">
                                    edit
                                 </a>
                              </td>

                              <td>
                                 @if ($row['status'] == 1)
                                 <a href="{{ route('admin.delobject', ['id'=>$row['id'] ]) }}">
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


<!-- Large modal -->
<div class="modal fade bd-example-modal-lg" id="createRole" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content col-sm-10" style="margin: 0 auto">


         <div class="modal-body">


            <form action="{{ route('admin.createobject.post') }}" method="post">
               @csrf

               <div class="card-body">


                  <div class="input-group mb-3">
                     <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Parent Id</label>
                     </div>
                     <select name="parent_id" class="custom-select" id="inputGroupSelect01">
                        <option value="" selected>Choose ... </option>
                        @foreach ($dsobject as $item)
                        <option value="{{ $item['id'] }}">{{ $item['OBJECT_NAME'] }}</option>
                        @endforeach
                     </select>
                  </div>


                  <div class="form-group">
                     @error('object_code')
                     <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
                     @enderror
                     <label>Object Code</label>
                     <input required value="{{ old('object_code') }}" name="object_code" type="text" class="form-control" placeholder="Enter object code">
                  </div>

                  <div class="form-group">
                     @error('object_url')
                     <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
                     @enderror
                     <label>Object Url</label>
                     <input required value="{{ old('object_url') }}" name="object_url" type="text" class="form-control" placeholder="Enter object name">
                  </div>


                  <div class="form-group">
                     @error('object_name')
                     <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
                     @enderror
                     <label>Object Name</label>
                     <input required value="{{ old('object_name') }}" name="object_name" type="text" class="form-control" placeholder="Enter object name">
                  </div>

                  <div class="form-group">
                     @error('description')
                     <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
                     @enderror
                     <label>Description</label>
                     <input value="{{ old('description') }}" required name="description" type="text" class="form-control" placeholder="Description">
                  </div>


                  <div class="form-group">
                     <label>Object level</label>

                     <select name="object_level" class="form-control select2" style="width: 100%;">
                        <option selected="selected" value="0">Fresher</option>
                        <option value="1">Master</option>
                     </select>
                  </div>


                  <div class="card-footer text-center">
                     <button type="submit" class="btn btn-primary">Create Object</button>
                  </div>
            </form>



         </div>

      </div>
   </div>
</div>
<!-- end Large modal -->
<!-- Page specific script -->
<script>

</script>
@endsection