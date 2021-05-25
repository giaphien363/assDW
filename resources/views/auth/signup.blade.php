<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <title>Log in or Sign up</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
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
        <div class="content" style="margin: 50px auto 0;width: 90% ">
            <div class="row">

                <!-- left side -->
                <div class="col-md-5">
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
                <!-- end left side -->

                <!-- right side -->
                <div class="col-md-7 mt-4" style="margin: 0 auto; background-color: #fff;border-radius:8px;box-shadow: 0 2px 4px rgba(0, 0, 0, .1), 0 8px 16px rgba(0, 0, 0, .1);padding: 20px 28px">

                    @if (Session::get('fail'))
                    <div class="col-md-12 d-flex justify-content-center m-b-20">
                        <div class="col-md-12">
                            <p style="font-size:16px;font-weight:600;color: red" class="text-center text-danger">{{ Session::get('fail') }}</p>
                        </div>
                    </div>
                    @endif

                    {{-- <form method="post" action="{{ route('checkLogIn') }}">
                    @csrf
                    <div class="mb-3">
                        @error('username')
                        <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
                        @enderror
                        <input style="font-size: 17px;padding: 14px 16px" name="username" type="text" class="form-control" placeholder="User name">
                    </div>
                    <div class="mb-3">
                        @error('password')
                        <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
                        @enderror
                        <input style="font-size: 17px;padding: 14px 16px" name="password" type="password" class="form-control" placeholder="Enter password">
                    </div>
                    <button type="submit" class="btn text-white" style="background-color:#1877f2;font-size: 22px;font-weight: 500;text-align: center;width: 100%">Log in
                    </button>
                    <div style="border-bottom:1px solid #dadde1;margin:30px auto"></div>

                    <div class="mb-3 mt-3">
                        <a class="btn text-white" style="background-color:#42b72a;font-size: 22px;font-weight: 500;text-align: center;width: 100%" href="{{ route('signup') }}">Create new account</a>
                    </div>
                    </form> --}}


                    <form method="post" action="{{ route('checkSignUp') }}">
                        @csrf

                        <div class="mb-3">
                            @error('fullname')
                            <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
                            @enderror
                            <input required value="{{ old('fullname') }}" style="font-size: 17px;" name="fullname" type="text" class="form-control" placeholder="Enter Fullname*">
                        </div>

                        <div class="mb-3">
                            @error('username')
                            <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
                            @enderror
                            <input required value="{{ old('username') }}" style="font-size: 17px;" name="username" type="text" class="form-control" placeholder="Enter Username*">
                        </div>

                        <div class="mb-3">
                            @error('email')
                            <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
                            @enderror
                            <input required value="{{ old('email') }}" style="font-size: 17px;" name="email" type="email" class="form-control" placeholder="Enter email address*">
                        </div>

                        <div class="mb-3">
                            @error('phone')
                            <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
                            @enderror
                            <input required value="{{ old('phone') }}" style="font-size: 17px;" name="phone" type="tel" class="form-control" placeholder="Enter telephone*">
                        </div>


                        <div class="mb-3">
                            @error('password')
                            <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
                            @enderror
                            <input required value="{{ old('password') }}" style="font-size: 17px;" name="password" type="password" class="form-control" placeholder="Enter password*">
                        </div>

                        <div class="mb-3">
                            @error('repeat-pass')
                            <p class="text-danger w-100 mt-2 mb-2">{{ $message }}</p>
                            @enderror
                            <input required value="{{ old('repeat-pass') }}" style="font-size: 17px;" name="repeat-pass" type="text" class="form-control" placeholder="Repeat password*">
                        </div>


                        <button type="submit" class="btn text-white" style="background-color:#1877f2;font-size: 18px;font-weight: 500;text-align: center;width: 100%">Sign up
                        </button>
                        <div style="border-bottom:1px solid #dadde1;margin:30px auto"></div>

                        <div class="mb-3 mt-3">
                            <a class="btn text-white" style="background-color:#42b72a;font-size: 18px;font-weight: 500;text-align: center;width: 100%" href="{{ route('login') }}">Log in</a>
                        </div>
                    </form>



                </div>
                <!-- end right side -->

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