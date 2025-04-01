<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Teacher Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <!-- Favicons -->
    <link href="{{ asset('assets/teacher/img/favicon.png') }}" rel="icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href=" {{ asset('assets/teacher/css/bootstrap.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/teacher/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/teacher/plugins/fontawesome/css/all.min.css') }}">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('assets/teacher/plugins/select2/css/select2.min.css') }}">

    <!-- Bootstrap Tagsinput CSS -->
    <link rel="stylesheet" href=" {{ asset('assets/teacher/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}">

    <!-- Dropzone CSS -->
    <link rel="stylesheet" href="{{ asset('assets/teacher/plugins/dropzone/dropzone.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href=" {{ asset('assets/teacher/css/style.css') }}">


</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- hero -->
        @include('teacherdashboard.components.hero')

        <!-- Page Content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <!-- navbar -->
                    @include('teacherdashboard.components.navbar')
                    <!-- Main Content -->
                    @yield('content')

                </div>

            </div>
        </div>
    </div>
    <!-- /Page Content -->

    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src=" {{ asset('assets/teacher/js/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JS -->
    <script src=" {{ asset('assets/teacher/js/popper.min.js') }}"></script>
    <script src=" {{ asset('assets/teacher/js/bootstrap.min.js') }}"></script>

    <!-- Sticky Sidebar JS -->
    <script src=" {{ asset('assets/teacher/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"></script>
    <script src=" {{ asset('assets/teacher/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"></script>

    <!-- Circle Progress JS -->
    <script src="{{ asset('assets/teacher/js/circle-progress.min.js') }}"></script>

    <!-- Select2 JS -->
    <script src="{{ asset('assets/teacher/plugins/select2/js/select2.min.js') }}"></script>

    <!-- Dropzone JS -->
    <script src="{{ asset('assets/teacher/plugins/dropzone/dropzone.min.js') }}"></script>

    <!-- Bootstrap Tagsinput JS -->
    <script src=" {{ asset('assets/teacher/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js') }}"></script>

    <!-- Profile Settings JS -->
    <script src="{{ asset('assets/teacher/js/profile-settings.js') }}"></script>

    <!-- Custom JS -->
    <script src=" {{ asset('assets/teacher/js/script.js') }}"></script>
</body>

</html>
