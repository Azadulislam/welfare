<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/base/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}"/>
</head>

<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper auth px-0"
             style="background-image: url('{{ asset('images/loginbg.jpg') }}');background-size: cover; background-position: center">
            <hr class="bg-white mb-4"/>
            <div class="container mb-5 pb-3">
                <div class="row align-items-center">
                    <div class="col-3 logo">
                        <img src="{{ asset('./images/logo.png') }}" alt="Masjid Jamek Sultan Abdul Aziz">
                    </div>
                    <div class="text col-9">
                        <h2>Masjid Jamek Sultan Abdul Aziz</h2>
                        <p>Jalan Templer, Seksyen 3, 46000 Petaling Jaya, Selangor, Malaysia</p>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-3 logo">

                    </div>
                    <div class="text col-9">
                        <h1 class="siteName">Welfare System</h1>
                    </div>
                </div>
            </div>
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <h1>Login</h1>
                        <form class="pt-3" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="email" class="form-control @error('username') is-invalid @enderror"
                                       name="username" id="username" value="{{ old('username') }}" placeholder="ID">
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                       name="password" placeholder="Password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                        type="submit">SIGN IN
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <footer class="bg-theme">
                <div class="container">
                    <p class="py-3 mb-0"><i class="mdi mdi-copyright"></i> Copyright Masjid Jamek Sultan Abdul Aziz
                        Petaling Jaya 2022</p>
                </div>
            </footer>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{ asset('assets/vendors/base/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="{{ asset('assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('assets/js/template.js') }}"></script>
<!-- endinject -->
</body>

</html>
