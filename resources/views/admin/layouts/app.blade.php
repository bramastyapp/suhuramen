<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('vendor/purpleadmin') }}/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('vendor/purpleadmin') }}/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('vendor/purpleadmin') }}/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('vendor/purpleadmin') }}/assets/images/favicon.ico" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @livewireStyles
</head>

<body>
    <div class="container-scroller">

        <!-- partial:partials/_navbar.html -->
        @include('admin.includes.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            @include('admin.includes.sidebar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('main')
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                @include('admin.includes.footer')
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('vendor/purpleadmin') }}/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('vendor/purpleadmin') }}/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="{{ asset('vendor/purpleadmin') }}/assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('vendor/purpleadmin') }}/assets/js/off-canvas.js"></script>
    <script src="{{ asset('vendor/purpleadmin') }}/assets/js/hoverable-collapse.js"></script>
    <script src="{{ asset('vendor/purpleadmin') }}/assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('vendor/purpleadmin') }}/assets/js/dashboard.js"></script>
    <script src="{{ asset('vendor/purpleadmin') }}/assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
    @livewireScripts
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.rupiah').mask("#.##0", {
                reverse: true
            });
        })
    </script>
    <script>
        window.addEventListener('swal:modal', event => {
            swal({
                title: event.detail.title,
                text: event.detail.text,
                icon: event.detail.type,
            });
        });
    </script>
</body>

</html>
