<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <title>Log in or Sign up</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .contain-icon {
            width: 150px;
            height: 200px;
            background-color: transparent;
            margin: 0 20px 20px 0;
            border-radius: 8px;
            box-shadow: 0 0 0 1px #dddfe2;
            text-decoration: none;
        }

        .contain-icon:hover {
            box-shadow: 0 1px 8px 5px #dddfe2;
            text-decoration: none;
        }

        .image-icon {
            width: 100%;
            height: 80%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .image-icon>img {
            object-fit: cover;
            width: 100%;
            border-radius: 8px 8px 0 0;
            height: 100%;
        }

        .text-icon {
            color: black;
            width: 100%;
            height: 20%;
            border-radius: 0 0 8px 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: white;
            font-size: 18px;
        }

        .remove_icon {
            position: absolute;
        }

        .remove_icon:hover {
            background-color: #e2e2e2;
            padding: 2px;
            border-radius: 100%;
        }
    </style>
</head>

<body style="background-color: #f0f2f5">
    <!-- container -->
    <div class="container">
        <div class="content" style="margin: 100px auto 0;width: 90% ">
            <div class="row">
                <div class="col-md-4">
                    <div class="fix-img" style="height: 85px;display: flex;margin-left: -55px">
                        <img src="https://static.xx.fbcdn.net/rsrc.php/y8/r/dF5SId3UHWd.svg" alt="">
                    </div>
                    <h3 style="margin-top: -10px;font-weight: normal;font-size:30px;line-height: 32px">Recent logins</h3>

                    <!-- recent login -->

                    <div style="display: flex;flex-wrap: wrap;margin-top: 30px;">
                        <div style="display: flex;flex-wrap: wrap" id="iterator_icon">
                            <!-- iterator icon -->

                            <!-- end iterator icon -->
                        </div>
                        <!-- add icon -->
                        <div class="add-icon contain-icon">
                            <a class="text-decoration-none" style="cursor:default;" href="javascript:void(0);">
                                <div class="image-icon">
                                    <i class="fas fa-plus-circle" style="cursor: pointer;font-size: 50px" data-bs-toggle="modal" data-bs-target="#exampleModal"></i>
                                </div>
                                <div class="text-icon" style="color: #0b51c5;cursor: pointer">
                                    Add Account
                                </div>
                            </a>
                        </div>

                    </div>
                    <!-- recent login -->

                </div>

                <div class="col-md-8 mt-4" style="margin: 0 auto; background-color: #fff;border-radius:8px;box-shadow: 0 2px 4px rgba(0, 0, 0, .1), 0 8px 16px rgba(0, 0, 0, .1);padding: 20px 28px">

                    @if (Session::get('fail'))
                    <div class="col-md-12 d-flex justify-content-center m-b-20">
                        <div class="col-md-12">
                            <p style="font-size:16px;font-weight:600;color: red" class="text-center text-danger">{{ Session::get('fail') }}</p>
                        </div>
                    </div>
                    @endif

                    <!-- form edit -->
                    <form action="{{ route('admin.handle.edit', ['id'=>$data['id']]) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="col-sm-12">

                            <div class="row">

                                <div class="col-sm-6">

                                    <div class="form-group">
                                        @error('fullname')
                                        <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
                                        @enderror

                                        <label>Full Name*</label>
                                        <input value="{{ $data['fullname'] }}" required class="form-control" type="text" name="fullname" value="{{ old('fullname') }}">
                                    </div>

                                    <div class="form-group">
                                        @error('email')
                                        <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
                                        @enderror

                                        <label>Email*</label>
                                        <input value="{{ $data['email'] }}" required class="form-control" type="email" name="email" value="{{ old('email') }}">
                                    </div>

                                    <div class="form-group">

                                        <label>Username*</label>
                                        <input value="{{ $data['username'] }}" class="form-control" type="text" disabled value="{{ old('username') }}">
                                    </div>

                                    <div class="form-group">

                                        <label>Phone number*</label>
                                        <input value="{{ $data['phone'] }}" class="form-control" type="tel" disabled value="{{ old('phone') }}">
                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">
                                        @error('address')
                                        <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
                                        @enderror

                                        <label>Your address*</label>
                                        <input required class="form-control" type="text" name="address" value="{{ $data['address']  }}">
                                    </div>

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

                                    <div class="form-group">
                                        @error('password')
                                        <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
                                        @enderror
                                        <label>Password*</label>
                                        <input required class="form-control" type="password" name="password" placeholder="********">
                                    </div>


                                </div>


                            </div>

                            <div class="text-center">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a href="{{ route('admin.showuser') }}" class="btn btn-primary">Back</a>
                                        </div>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>

                                </div>

                            </div>

                    </form>
                    <!-- end form edit -->


                </div>
            </div>
        </div>
    </div>
    <!-- end container -->

    <!-- script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>


</body>

</html>