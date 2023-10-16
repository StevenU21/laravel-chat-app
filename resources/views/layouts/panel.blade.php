<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CHAT || @yield('title')</title>
    <!-- Favicon -->
    <link href="./assets/img/brand/favicon.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="./assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
    <link href="./assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="./assets/css/argon-dashboard.css?v=1.1.2" rel="stylesheet" />
    @livewireStyles
</head>

<body class="">
    <!-- Side Bar Starts-->
    @include('components.side_bar')
    <!-- Side Bar Ends-->

    <div class="main-content">
        <!-- Navbar -->
        @include('components.nav_bar')
        <!-- End Navbar -->
        <!-- Header -->
        @include('components.performance_status')

        <div class="container-fluid mt--7">
            @yield('content')
            <!-- Footer -->
            <footer class="footer">
                <div class="row align-items-center justify-content-xl-between">
                    <div class="col-xl-6">
                        <div class="copyright text-center text-xl-left text-muted">
                            &copy; 2023 <a href="#" class="font-weight-bold ml-1" target="_blank">StevenU21</a>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <ul class="nav nav-footer justify-content-center justify-content-xl-end">
                            <li class="nav-item">
                                <a href="#" class="nav-link" target="_blank">Linkedin</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" target="_blank">Twitter/X</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" target="_blank">Github</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" target="_blank">StackOverFlow</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!--   Core   -->
    <script src="./assets/js/plugins/jquery/dist/jquery.min.js"></script>
    <script src="./assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!--   Optional JS   -->
    <script src="./assets/js/plugins/chart.js/dist/Chart.min.js"></script>
    <script src="./assets/js/plugins/chart.js/dist/Chart.extension.js"></script>
    <!--   Argon JS   -->
    <script src="./assets/js/argon-dashboard.min.js?v=1.1.2"></script>
    <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
    <script>
        window.TrackJS &&
            TrackJS.install({
                token: "ee6fab19c5a04ac1a32a645abde4613a",
                application: "argon-dashboard-free"
            });
    </script>
    @livewireScripts
</body>

</html>
