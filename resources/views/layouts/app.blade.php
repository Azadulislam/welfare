<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- plugins:css -->
    <link rel="stylesheet" href="">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
{{--    <link rel="stylesheet" href="css/style.css">--}}
<!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}"/>
    <!-- Scripts -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/base/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/DataTables/datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dropify/dist/css/dropify.css') }}">
    @vite([
    'resources/sass/app.scss',
    'resources/js/app.js',
    'resources/css/app.css',
    ])
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
<div id="app">
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <div class="fixed-top bg-theme">
            <nav class="top_nav border-bottom border-top my-2 py-2">
                <div class="container-fluid">
                    <div class="d-flex gap-5 align-items-center">
                        <div class="">
                            <img src="{{ asset('./images/logo.png') }}" alt="" class="logo w-[60px]">
                        </div>
                        <div
                            class=" d-flex align-items-md-end align-items-satart flex-column flex-md-row gap-0 gap-md-4">
                            <h3 class="mb-0 lh-1">Masjid Jamek Sultan Abdul Aziz</h3>
                            <p class="mb-0 leading-[1.3]">Petaling Jaya, Selangor, Malaysia</p>
                        </div>
                    </div>
                </div>
            </nav>
            <nav class="navbar col-lg-12 col-12 pb-1 pt-0 d-flex flex-row">
                <div class="navbar-brand-wrapper d-flex justify-content-center">
                    <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
                        <div class="user">
                            <a class="navbar-brand brand-logo" href="index.html">Admin User</a>
                        </div>
                        <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                                data-toggle="minimize">
                            <img src="{{asset('/images/bars.svg')}}">
                        </button>
                    </div>
                </div>
                <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                    <ul class="navbar-nav navbar-nav-left">
                        <li class="nav-item nav-profile dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center p-0" href="#"
                               data-toggle="dropdown" id="profileDropdown">
                                <img src="{{asset('images/faces/face5.jpg')}}" alt="profile"/>
                                <span class="nav-profile-name">{{ AUth::user()->name }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                                 aria-labelledby="profileDropdown">
                                <a class="dropdown-item" href="{{ route('setting') }}">
                                    <i class="mdi mdi-settings text-primary"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="mdi mdi-logout text-primary"></i>
                                    Logout
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </a>
                            </div>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                            data-toggle="offcanvas">
                        <img src="{{asset('/images/bars.svg')}}">
                    </button>
                </div>
            </nav>
        </div>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
        @include('layouts/sidebar')
        <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-dark text-center text-sm-left d-block d-sm-inline-block"><i class="mdi mdi-copyright"></i> Copyright Masjid Jamek Sultan Abdul Aziz Petaling Jaya 2022</span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('assets/vendors/base/vendor.bundle.base.js')}} "></script>
    <script src="{{asset('assets/js/jquery-3.6.3.min.js')}} "></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="{{asset('assets/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('assets/vendors/datatables.net/jquery.dataTables.js')}}"></script>
    <script src="{{asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{asset('assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('assets/js/template.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{asset('assets/js/dashboard.js')}}"></script>
    <script src="{{asset('assets/js/data-table.js')}}"></script>
    <script src="{{asset('assets/js/jquery.dataTables.js')}}"></script>
    <script src="{{asset('assets/vendors/DataTables/datatables.js')}}"></script>
    <script src="{{asset('assets/vendors/DataTables/datatables.js')}}"></script>
    <!-- End custom js for this page-->
    <!-- End custom js for this page-->

    <script>
        $('#back').click((e)=>{
            e.preventDefault();
            history.back();
        })

        function checkJOb() {
            if ($("input[name='current_job']:checked").val() === 'Un Employed') {
                $('.unemployed').show();
                $('.sector').hide();
            } else {
                $('.unemployed').hide();
                $('.sector').show();
            }
        }
        function printDiv(divName) {
            $("body").css("padding-top", "80px");
            // $(".relation-list .col-md-3").removeClass('col-6').addClass('col-4')
            // $(".relation-header .col-md-3").removeClass('col-12').addClass('col-4')
            // $("div.relation .col-md-1.max-45").removeClass('d-none').addClass('d-block')
            // $("div.relation .col-md-10").removeClass('col-12').addClass('col-10')
            $("table.dataTable").removeClass('table-bordered')
            $('.action').addClass('d-none');
            var printContents = document.querySelector('#' + divName + ' .dt-row').innerHTML;
            console.log(printContents);
            var originalContents = document.body.innerHTML;
            var title = $("#"+divName).data('title');
            if(title == undefined){
                title = "Welfare";
            }
            document.body.innerHTML = printContents;
            var pageHeight = parseInt($("body").css("height"));
            var offsetHeight = 1230;
            let date = "<?= date('d/m/Y h:i A'); ?>";
            for (var i = 0; i < pageHeight; i++) {
                if (i == 1) {
                    $("body").append(
                        '<h3 style="text-align: center;position: absolute;top: ' +
                        i +
                        'px;left:0;right:0">' +
                        title +
                        "</h3>"
                    );
                }
                if(i==10){
                    $("body").append(
                        '<p style="margin-top: 10px;text-align: end;position: absolute;top: ' +
                        i +
                        'px;left:0;right:0">' +
                        date +
                        "</p>"
                    );
                }
            }
            window.print();
            document.body.innerHTML = originalContents;
            $("table.dataTable").addClass('table-bordered')
            $("body").css("padding-top", "0px");
            $('.action').removeClass('d-none');
        }
    </script>

@yield('script')
</body>

</html>

