<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>DDCStudioz</title>

    <!-- Site favicon -->
    <link href="{{ asset("admin/vendors/images/final.png") }}" rel="icon">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/styles/core.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/styles/icon-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/styles/style.css') }}">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-119386393-1');
    </script>
</head>

<body class="login-page">
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="login.html">
                    <img src="{{ asset('admin/vendors/images/LOGOS.png') }}" alt="">
                </a>
            </div>
            {{-- <div class="login-menu">
				<ul>
					<li><a href="register.html">Register</a></li>
				</ul>
			</div> --}}
        </div>
    </div>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                {{--  <div class="col-md-6 col-lg-7">
                    <img src="{{ asset('admin/vendors/images/login-page-img.png') }}" alt="">
                </div>  --}}
                <div class="col-md-6 col-lg-12">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        @if (session()->has('success'))
                            <div class=" alert alert-success ">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        @if (session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                        {{--  <div class="login-title">
                            <h2 class="text-center text-primary">Login To DeskApp</h2>
                        </div>  --}}
                        <form action="{{ route('login.post') }}" method="POST">
                            @csrf
                            <div class="select-role">
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn active">
                                        <input type="radio" name="options" id="admin">
                                        <div class="icon"><img src="{{ asset('admin/vendors/images/briefcase.svg') }}"
                                                class="svg" alt=""></div>
                                        <span>I am</span>
                                        <span style="color:#d88c3c;">Manager</span>
                                    </label>
                                    {{-- <label class="btn">
										<input type="radio" name="options" id="user">
										<div class="icon"><img src="{{ asset('admin/vendors/images/person.svg') }}" class="svg" alt=""></div>
										<span>I'm</span>
										Employee
									</label> --}}
                                </div>
                            </div>
                            <div class="input-group custom">
                                <input type="text"
                                    class="form-control form-control-lg @error('email')
                                    is-invalid
                                @enderror"
                                    name="email" placeholder="email">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                @enderror
                            </div>
                            <div class="input-group custom">
                                <input type="password" name="password"
                                    class="form-control form-control-lg @error('password')
                                    is-invalid
                                @enderror"
                                    placeholder="**********">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </div>
                                @enderror
                            </div>
                            <div class="row pb-30">
                                <div class="col-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Remember</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="forgot-password"><a href="forgot-password.html">Forgot Password</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">
                                        <button type="submit"class="btn btn-primary btn-lg btn-block" style="background-color: #d88c3c;border:none;">Sign In</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- js -->
    <script src="{{ asset('vendors/scripts/core.js') }}"></script>
    <script src="{{ asset('vendors/scripts/script.min.js') }}"></script>
    <script src="{{ asset('vendors/scripts/process.js') }}"></script>
    <script src="{{ asset('vendors/scripts/layout-settings.js') }}"></script>
</body>

</html>
