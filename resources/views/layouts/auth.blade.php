<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/moltran/layouts/blue-vertical/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Jul 2020 06:48:32 GMT -->
<head>
        <meta charset="utf-8" />
        <title>{{ env('APP_NAME') }} | @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Responsive bootstrap 4 admin template" name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('dashboard') }}/assets/images/favicon.ico">

        <!-- App css -->
        <link href="{{ asset('dashboard') }}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
        <link href="{{ asset('dashboard') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dashboard') }}/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />

    </head>

    <body class="authentication-page">

        <div class="account-pages my-5">
            <div class="container">

                @yield('auth')
            </div>
        </div>

        <!-- Vendor js -->
        <script src="{{ asset('dashboard') }}/assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="{{ asset('dashboard') }}/assets/js/app.min.js"></script>

    </body>


<!-- Mirrored from coderthemes.com/moltran/layouts/blue-vertical/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Jul 2020 06:48:32 GMT -->
</html>
