<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Create new Object</title>
   <!-- Theme style -->
   <link rel="stylesheet" href="{{ asset('admin_page/dist/css/adminlte.min.css') }}">
</head>

<body>
   <div class="container">
      <div class="row">
         <div class="col-sm-8" style="margin: 0 auto">
            <div class="card card-primary mt-5">
               <div class="card-header" style="text-align: center">
                  <h3 class="card-title" style="float: none">Create new object</h3>
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
               <form action="{{ route('admin.createobject.post') }}" method="post">
                  @csrf

                  <div class="card-body">
                     <div class="form-group">
                        @error('object_code')
                        <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
                        @enderror
                        <label>PARENT ID</label>
                        <select name="parent_id" class="form-select" aria-label="Default select example">
                           <option value="" selected>Open this select menu</option>
                           @foreach ($dsobject as $item)
                           <option value="{{ $item->id }}">{{ $item->OBJECT_NAME }}</option>
                           @endforeach
                         </select>
                     </div>

                     <div class="form-group">
                        @error('object_code')
                        <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
                        @enderror
                        <label>OBJECT CODE</label>
                        <input required value="{{ old('object_code') }}" name="object_code" type="text" class="form-control" placeholder="Enter object code">
                     </div>

                     <div class="form-group">
                        @error('object_url')
                        <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
                        @enderror
                        <label>OBJECT_URL</label>
                        <input required value="{{ old('object_url') }}" name="object_url" type="text" class="form-control" placeholder="Enter object name">
                     </div>


                     <div class="form-group">
                        @error('object_name')
                        <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
                        @enderror
                        <label>OBJECT NAME</label>
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
                        @error('object_level')
                        <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
                        @enderror
                        <label>OBJECT LEVEL</label>
                        <input required value="{{ old('object_level') }}" name="object_level" type="text" class="form-control" placeholder="Enter object name">
                     </div>

                     <div class="card-footer">
                        <div class="row">
                           <div class="col-sm-6">
                              <a href="{{ route('admin.showobject') }}">back &rarr;</a>
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