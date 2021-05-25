<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Edit new object</title>
   <!-- Theme style -->
   <link rel="stylesheet" href="{{ asset('admin_page/dist/css/adminlte.min.css') }}">
</head>

<body>
   <div class="container">
      <div class="row">
         <div class="col-sm-8" style="margin: 0 auto">
            <div class="card card-primary mt-5">
               <div class="card-header bg-secondary" style="text-align: center">
                  <h3 class="card-title" style="float: none">Update new object</h3>
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
               <form action="{{ route('admin.handle.editobject', ['id'=>$data['id']]) }}" method="post">
                  @csrf

                  <div class="card-body">

                     <div class="input-group mb-3">
                        <div class="input-group-prepend">
                           <label class="input-group-text" for="inputGroupSelect01">Parent Id</label>
                        </div>
                        <select name="parent_id" class="custom-select" id="inputGroupSelect01">
                           @if ($data['PARENT_ID']==null)
                           <option value="" selected>Choose ...</option>
                           @endif

                           @foreach ($dsobject as $item)

                           <option value="{{ $item->id }}" {{ $data['PARENT_ID']== $item->id ? 'selected' : '' }}>{{ $item->OBJECT_NAME }}</option>

                           @endforeach

                           @if ($data['PARENT_ID']!=null)
                           <option value="">Unchoose ...</option>
                           @endif

                        </select>
                     </div>

                     <div class="form-group">
                        @error('object_code')
                        <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
                        @enderror
                        <label>Object code</label>
                        <input required value="{{ $data['OBJECT_CODE'] }}" name="object_code" type="text" class="form-control" placeholder="Enter object code">
                     </div>

                     <div class="form-group">
                        @error('object_url')
                        <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
                        @enderror
                        <label>Object url</label>
                        <input required value="{{ $data['OBJECT_URL'] }}" name="object_url" type="text" class="form-control" placeholder="Enter object name">
                     </div>


                     <div class="form-group">
                        @error('object_name')
                        <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
                        @enderror
                        <label>Object name</label>
                        <input required value="{{ $data['OBJECT_NAME'] }}" name="object_name" type="text" class="form-control" placeholder="Enter object name">
                     </div>

                     <div class="form-group">
                        @error('description')
                        <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
                        @enderror
                        <label>Description</label>
                        <input value="{{ $data['DESCRIPTION'] }}" required name="description" type="text" class="form-control" placeholder="Description">
                     </div>


                     <div class="wrap-input100 ">
                        <div class="form-group">
                           <label>Object level</label>

                           <select name="object_level" class="form-control select2" style="width: 100%;">
                              <option selected="selected" value="{{$data['OBJECT_LEVEL']}}">
                                 {{ $data['OBJECT_LEVEL']==1 ? 'Master': 'Fresher'}}
                              </option>
                              @if ($data['OBJECT_LEVEL']==1)
                              <option value="0">Fresher</option>
                              @else
                              <option value="1">Master</option>
                              @endif
                           </select>
                        </div>
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


                     <div class="wrap-input100 ">
                        <div class="form-group">
                           <label>Show menu</label>
                           <select name="show_menu" class="form-control select3" style="width: 100%;">
                              <option selected="selected" value="{{ $data['SHOW_MENU'] }}">{{ $data['SHOW_MENU']==1 ? 'Active': 'Deactive' }}</option>
                              @if ($data['SHOW_MENU']==1)
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
                              <a class="btn btn-info" href="{{ route('admin.showobject') }}">back</a>
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