<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta content="" name="description">
    <meta content="" name="author">
    <meta name="keywords" content="" />
    <title>BCSIR | Login</title>
    <link rel="icon" href="{{asset('logo-2.png')}}" type="image/x-icon" />
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet" id="style" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/animated.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
</head>

<body class="login-img">
    <div class="page responsive-log relative error-page3">
        <div class="row no-gutters">
            <div class="col-xl-6  d-xl-block d-none log-image1">
                <div style="box-shadow: inset 0 0 0 2000px rgb(0 0 0 / 30%);" class="cover-image h-100vh" data-bs-image-src="{{asset('bcsir-image.jpg')}}">
                    <div class="container">
                        <div class="customlogin-imgcontent">
                            <h2 class="mb-3 fs-35 text-white">Welcome To BCSIR</h2>
                            <p class="text-white-50">
                                Bangladesh Council of Scientific and Industrial Research (BCSIR) is a scientific and
                                industrial research organization, a regulatory body, and a national laboratory of
                                Bangladesh. Its main objective is to pursue scientific research for the betterment of
                                the people of Bangladesh. To date, BCSIR is the apex and largest multi-disciplinary
                                public research organization in Bangladesh.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 bg-white log-image1">
                <div class="container">
                    <div class="customlogin-content pt-5 pt-xl-9">
                        <div class="pt-4 pb-2 ps-2">
                            <a class="header-brand d-flex align-items-center" href="">
                                <img style="width: 15%;" src="{{asset('logo-2.png')}}"
                                    class="header-brand-img custom-logo" alt="BCSIR">
                                <img src="{{asset('logo-2.png')}}"
                                    class="header-brand-img custom-logo-dark" alt="BCSIR">
                                <h1 class="my-auto ms-2">Chattogram BCSIR Laboratories</h1>
                            </a>
                        </div>
                        <div class="p-4 pt-6">
                            <h1 class="mb-2">Login</h1>
                            <p class="text-muted">Sign In to your account</p>
                        </div>
                        <form action="{{ route('login.authenticate') }} " method="POST" class="card-body pt-3" id="login"
                            name="login">
                            @csrf
                            <div class="form-group">
                                <label class="form-label">E-mail</label>
                                <div class="input-group mb-4">
                                    <div class="input-group">
                                        <a class="input-group-text">
                                            <i class="fe fe-mail" aria-hidden="true"></i>
                                        </a>
                                        <input type="email" class="form-control" name="email" placeholder="Email"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Password</label>
                                <div class="input-group mb-4">
                                    <div class="input-group" id="Password-toggle">
                                        <a href="" class="input-group-text">
                                            <i class="fe fe-eye-off" aria-hidden="true"></i>
                                        </a>
                                        <input class="form-control" type="password" name="password"
                                            placeholder="Password" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="example-checkbox1"
                                        value="option1">
                                    <span class="custom-control-label">Remeber me</span>
                                </label>
                            </div>
                            <div class="submit">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </div>
                            <div class="text-center mt-3">
                                {{-- <p class="mb-2"><a  href="javascript:void(0);">Forgot Password</a></p>
									<p class="text-dark mb-0">Don't have account?<a class="text-primary ms-1"  href="javascript:void(0);">Register</a></p> --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    @if (session()->has('success'))
        <script>
            $(document).ready(function() {
                toastr.success(`{!! session()->get('success') !!}`, 'Success', {
                    "progressBar": true
                }, );
            });
        </script>
    @elseif (session()->has('errors'))
        @if (is_object(session()->get('errors')))
            <script>
                $(document).ready(function() {
                    for (const [k, i] of Object.entries({!! session()->get('errors') !!})) {
                        toastr.error(`${i}`, k, {
                            "progressBar": true
                        }, );
                    }
                });
            </script>
        @else
            <script>
                $(document).ready(function() {
                    toastr.error(`{!! session()->get('errors') !!}`, 'Error', {
                        "progressBar": true
                    }, );
                });
            </script>
        @endif

    @endif

</body>

</html>
