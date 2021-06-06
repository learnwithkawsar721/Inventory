<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/moltran/layouts/blue-vertical/pages-blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Jul 2020 06:48:33 GMT -->

<head>
    <meta charset="utf-8" />
    <title>{{ config('app.name') }} | @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('dashboard') }}/assets/images/favicon.ico">

    <!-- App css -->
    <link href="{{ asset('dashboard') }}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"
        id="bootstrap-stylesheet" />
    <link href="{{ asset('dashboard') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard') }}/assets/css/app.min.css" rel="stylesheet" type="text/css"
        id="app-stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    <link href="{{ asset('dashboard') }}/assets/libs/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('dashboard') }}/assets/libs/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    {{-- sweetalert2 Css --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">

</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">


        <!-- Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-right mb-0">

                <li class="dropdown d-none d-lg-block">
                    <a class="nav-link dropdown-toggle mr-0 waves-effect waves-light" data-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{ asset('dashboard') }}/assets/images/flags/us.jpg" alt="user-image" class="mr-2"
                            height="12"> <span class="align-middle">English <i class="mdi mdi-chevron-down"></i> </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="{{ asset('dashboard') }}/assets/images/flags/germany.jpg" alt="user-image"
                                class="mr-2" height="12"> <span class="align-middle">German</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="{{ asset('dashboard') }}/assets/images/flags/italy.jpg" alt="user-image"
                                class="mr-2" height="12"> <span class="align-middle">Italian</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="{{ asset('dashboard') }}/assets/images/flags/spain.jpg" alt="user-image"
                                class="mr-2" height="12"> <span class="align-middle">Spanish</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="{{ asset('dashboard') }}/assets/images/flags/russia.jpg" alt="user-image"
                                class="mr-2" height="12"> <span class="align-middle">Russian</span>
                        </a>
                    </div>
                </li>

                <li class="dropdown notification-list d-none d-md-inline-block">
                    <a href="#" id="btn-fullscreen" class="nav-link waves-effect waves-light">
                        <i class="mdi mdi-crop-free noti-icon"></i>
                    </a>
                </li>

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle  waves-effect waves-light" data-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="mdi mdi-bell noti-icon"></i>
                        <span class="badge badge-danger rounded-circle noti-icon-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5 class="font-16 m-0">
                                <span class="float-right">
                                    <a href="#" class="text-dark">
                                        <small>Clear All</small>
                                    </a>
                                </span>Notification
                            </h5>
                        </div>

                        <div class="slimscroll noti-scroll">

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon">
                                    <i class="fa fa-user-plus text-info"></i>
                                </div>
                                <p class="notify-details">New user registered
                                    <small class="noti-time">You have 10 unread messages</small>
                                </p>
                            </a>

                        </div>

                        <!-- All-->
                        <a href="javascript:void(0);" class="dropdown-item text-center notify-item notify-all">
                            See all notifications
                        </a>

                    </div>
                </li>

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown"
                        href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{ asset('dashboard') }}/assets/images/users/avatar-1.jpg" alt="user-image"
                            class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome !</h6>
                        </div>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="mdi mdi-face-profile"></i>
                            <span>Profile</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="mdi mdi-settings"></i>
                            <span>Settings</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="mdi mdi-lock"></i>
                            <span>Lock Screen</span>
                        </a>

                        <div class="dropdown-divider"></div>

                        <!-- item-->
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="dropdown-item notify-item">
                            <i class="mdi mdi-power-settings"></i>
                            <span>Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </div>
                </li>

                <li class="dropdown notification-list">
                    <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                        <i class="mdi mdi-settings-outline noti-icon"></i>
                    </a>
                </li>


            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="index.html" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <img src="{{ asset('dashboard') }}/assets/images/logo-dark.png" alt="" height="16">
                        <!-- <span class="logo-lg-text-dark">Moltran</span> -->
                    </span>
                    <span class="logo-sm">
                        <!-- <span class="logo-lg-text-dark">M</span> -->
                        <img src="{{ asset('dashboard') }}/assets/images/logo-sm.png" alt="" height="25">
                    </span>
                </a>

                <a href="index.html" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="{{ asset('dashboard') }}/assets/images/logo-light.png" alt="" height="16">
                        <!-- <span class="logo-lg-text-dark">Moltran</span> -->
                    </span>
                    <span class="logo-sm">
                        <!-- <span class="logo-lg-text-dark">M</span> -->
                        <img src="{{ asset('dashboard') }}/assets/images/logo-sm.png" alt="" height="25">
                    </span>
                </a>
            </div>

            <!-- LOGO -->


            <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                <li>
                    <button class="button-menu-mobile waves-effect waves-light">
                        <i class="mdi mdi-menu"></i>
                    </button>
                </li>

                <li class="d-none d-sm-block">
                    <form class="app-search">
                        <div class="app-search-box">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search...">
                                <div class="input-group-append">
                                    <button class="btn" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">

            <div class="slimscroll-menu">

                <!--- Sidemenu -->
                <div id="sidebar-menu">

                    <div class="user-box">

                        <div class="float-left">
                            <img src="{{ asset('dashboard') }}/assets/images/users/avatar-1.jpg" alt=""
                                class="avatar-md rounded-circle">
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="{{ route('home') }}" class="dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>

                            </div>
                            <p class="font-13 text-muted m-0">Administrator</p>
                        </div>
                    </div>

                    <ul class="metismenu" id="side-menu">

                        <li>
                            <a href="{{ route('home') }}" class="waves-effect">
                                <i class="mdi mdi-home"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>
                         <li>
                            <a href="{{ route('home') }}" class="waves-effect">
                                <i class="mdi mdi-home"></i>
                                <span class="text-primary"><b> Pos</b> </span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="waves-effect">
                                <i class="fas fa-users"></i>
                                <span> Employee </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ route('employe.create') }}">Add Employee</a></li>
                                <li><a href="{{ route('employe.index') }}">All Employee</a></li>
                            </ul>
                        </li>
                         <li>
                            <a href="javascript: void(1);" class="waves-effect">
                                <i class="fas fa-users"></i>
                                <span> Customer </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ route('customer.create') }}">Add Customer</a></li>
                                <li><a href="{{ route('customer.index') }}">All Customer</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(1);" class="waves-effect">
                                <i class="fas fa-users"></i>
                                <span> Suppliers </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ route('suppliers.create') }}">Add Suppliers</a></li>
                                <li><a href="{{ route('suppliers.index') }}">All Suppliers</a></li>
                            </ul>
                        </li>
                         <li>
                            <a href="javascript: void(1);" class="waves-effect">
                                <i class="fas fa-users"></i>
                                <span> Category </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ route('category.create') }}">Add Category</a></li>
                                <li><a href="{{ route('category.index') }}">All Category</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(1);" class="waves-effect">
                                <i class="fas fa-users"></i>
                                <span> Product </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ route('product.create') }}">Add Product</a></li>
                                <li><a href="{{ route('product.index') }}">All Product</a></li>
                                <li><a href="{{ route('product.import') }}">Import Product</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(1);" class="waves-effect">
                                <i class="fas fa-users"></i>
                                <span> Salary (EMP) </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ route('salary.create') }}">Add Advanced Salary</a></li>
                                <li><a href="{{ route('salary.index') }}">All Advanced Salary</a></li>
                                <li><a href="{{ route('salary.pay') }}">Pay Salary</a></li>
                            </ul>
                        </li>
                         <li>
                            <a href="javascript: void(1);" class="waves-effect">
                                <i class="fas fa-users"></i>
                                <span> Expenses </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">

                                <li><a href="{{ route('expenses.index') }}">All Expenses </a></li>
                                <li><a href="{{ route('expenses.today') }}">Today Expenses</a></li>
                                <li><a href="{{ route('expenses.search') }}">Search Expenses</a></li>
                            </ul>
                        </li>
                         <li>
                            <a href="javascript: void(1);" class="waves-effect">
                                <i class="fas fa-users"></i>
                                <span> Sales Report </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">

                                <li><a href="">First </a></li>
                                <li><a href="">Second</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="waves-effect">
                                <i class="fas fa-users"></i>
                                <span>Attendece </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">

                                <li><a href="{{ route('attendeces.create') }}">Take Attendece </a></li>
                                <li><a href="{{ route('attendeces.index') }}">All Attendece</a></li>
                                <li><a href="">Searce Attendece</a></li>
                            </ul>
                        </li>

                    </ul>

                </div>
                <!-- End Sidebar -->

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    @yield('dashboard')

                </div>
                <!-- end container-fluid -->

            </div>
            <!-- end content -->



            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            {{ date('Y') }} &copy; Moltran theme by <a href="#">Coderthemes</a>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->



    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>



    <!-- Vendor js -->
    <script src="{{ asset('dashboard') }}/assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="{{ asset('dashboard') }}/assets/js/app.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Datatables init -->
    <script src="{{ asset('dashboard') }}/assets/js/pages/datatables.init.js"></script>
    <!-- third party js -->
    <script src="{{ asset('dashboard') }}/assets/libs/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('dashboard') }}/assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
    {{-- sweetalert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.all.min.js"></script>
    @yield('script')

</body>


<!-- Mirrored from coderthemes.com/moltran/layouts/blue-vertical/pages-blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Jul 2020 06:48:33 GMT -->

</html>
