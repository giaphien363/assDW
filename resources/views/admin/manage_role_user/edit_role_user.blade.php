<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Edit Role User</title>
   <!-- Theme style -->
   <link rel="stylesheet" href="{{ asset('admin_page/dist/css/adminlte.min.css') }}">
</head>

<body>
   <div class="container">
      <div class="row">
         <div class="col-sm-8" style="margin: 0 auto">
            <div class="card card-primary mt-5">
               <div class="card-header bg-secondary" style="text-align: center">
                  <h3 class="card-title" style="float: none">Update Role User</h3>
               </div>
               <!-- /.card-header -->
               @if (Session::get('fail'))
               <div class="col-md-12 d-flex justify-content-center m-b-20">
                  <div class="col-md-12">
                     <p style="font-size:16px;font-weight:600" class="text-center text-danger">{{ Session::get('fail') }}</p>
                  </div>
               </div>
               @endif
               <!-- form start -->
               <form action="{{ route('admin.handle.editrole.user', ['id'=>$data['id']]) }}" method="post">
                  @csrf

                  <div class="card-body">

                     <div class="form-group">
                        @error('username')
                        <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
                        @enderror
                        <label>User Name</label>
                        <input required value="{{  $data['username'] }}" name="username" type="text" class="form-control">
                     </div>

                     <div class="form-group">
                        @error('rolecode')
                        <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
                        @enderror
                        <label>Role Code</label>
                        <input required value="{{ $data['rolecode'] }}" name="rolecode" type="text" class="form-control">
                     </div>

                     <div class="wrap-input100 ">
                        <div class="form-group">
                           <label>Status</label>

                           <select name="status" class="form-control select2" style="width: 100%;">
                              <option selected="selected" value="{{$data['status']}}">
                                 {{ $data['status']==1 ? 'Active': 'Deactive'}}
                              </option>
                              @if ($data['status']==1)
                              <option value="0">Deactive</option>
                              @else
                              <option value="1">Active</option>
                              @endif
                           </select>
                        </div>
                     </div>
                     <!-- /.card-body -->

                     <div class="card-footer">
                        <div class="row">
                           <div class="col-sm-6">
                              <a href="{{ route('admin.showrole.user') }}" class="btn btn-info">Back</a>
                           </div>
                           <div class="col-sm-6 d-flex" style="justify-content: flex-end">
                              <button type="submit" class="btn btn-success">Update</button>
                           </div>
                        </div>
                     </div>
               </form>


            </div>
         </div>
      </div>
   </div>

</body>

</html>