<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Edit new Role Object</title>
   <!-- Theme style -->
   <link rel="stylesheet" href="{{ asset('admin_page/dist/css/adminlte.min.css') }}">
</head>

<body>
   <div class="container">
      <div class="row">
         <div class="col-sm-8" style="margin: 0 auto">
            <div class="card card-primary mt-5">
               <div class="card-header" style="text-align: center">
                  <h3 class="card-title" style="float: none">Update Role Object</h3>
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
               <form action="{{ route('admin.handle.editrole.object', ['id'=>$data['id']]) }}" method="post">
                  @csrf

                  <div class="card-body">
                     <div class="form-group">
                        @error('objid')
                        <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
                        @enderror
                        <label>Object ID</label>
                        <input required value="{{ $data['OBJECT_ID'] }}" name="objid" type="number" class="form-control" placeholder="Enter User ID">
                     </div>

                     <div class="form-group">
                        @error('roleid')
                        <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
                        @enderror
                        <label>Role ID</label>
                        <input required value="{{ $data['ROLE_ID'] }}" name="roleid" type="number" class="form-control" placeholder="Enter Role ID">
                     </div>

                     <div class="wrap-input100 ">
                        <div class="form-group">
                           <label>Status</label>
                           <select name="status" class="form-control select2" style="width: 100%;">
                              <option selected="selected">{{ $data['status'] }}</option>
                              @if ($data['status']==1)
                              <option>0</option>
                              @else
                              <option>1</option>
                              @endif
                           </select>
                        </div>
                     </div>
                     <!-- /.card-body -->

                     <div class="card-footer">
                        <div class="row">
                           <div class="col-sm-6">
                              <a href="{{ route('admin.showroleobject') }}">back &rarr;</a>
                           </div>
                           <div class="col-sm-6 d-flex" style="justify-content: flex-end">
                              <button type="submit" class="btn btn-primary">Update</button>
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