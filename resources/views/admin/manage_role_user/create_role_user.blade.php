<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Create new Role User</title>
   <!-- Theme style -->
   <link rel="stylesheet" href="{{ asset('admin_page/dist/css/adminlte.min.css') }}">
</head>

<body>
   <div class="container">
      <div class="row">
         <div class="col-sm-8" style="margin: 0 auto">
            <div class="card card-primary mt-5">
               <div class="card-header" style="text-align: center">
                  <h3 class="card-title" style="float: none">Create new Role User</h3>
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
               <form action="{{ route('admin.createrole.user.post') }}" method="post">
                  @csrf

                  <div class="card-body">
                     <div class="form-group">
                        @error('userid')
                        <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
                        @enderror
                        <label>User ID</label>
                        <input required value="{{ old('userid') }}" name="userid" type="number" class="form-control" placeholder="Enter User ID">
                     </div>

                     <div class="form-group">
                        @error('roleid')
                        <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
                        @enderror
                        <label>Role ID</label>
                        <input required value="{{ old('roleid') }}" name="roleid" type="number" class="form-control" placeholder="Enter Role ID">
                     </div>
                     <!-- /.card-body -->

                     <div class="card-footer">
                        <div class="row">
                           <div class="col-sm-6">
                              <a href="{{ route('admin.showrole.user') }}">back &rarr;</a>
                           </div>
                           <div class="col-sm-6 d-flex" style="justify-content: flex-end">
                              <button type="submit" class="btn btn-primary">Create</button>
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