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
    <link href="https://fonts.googleapis.com/css2?family=Caveat&family=Quicksand:wght@300;400;500;700&display=swap"
        rel="stylesheet" />
    @livewireStyles
</head>
<style>
    .custom-modal {
        z-index: 1500;
        background-color: rgba(49, 49, 49, 0.6);
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow-x: hidden;
        overflow-y: auto;
        outline: 0;
    }

    .custom-modal-body {
        position: fixed;
        z-index: 1600;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .swal2-container {
        z-index: 2500 !important;
        /* Atur nilai z-index sesuai kebutuhan Anda */
    }
</style>

<body>
    <div class="container-scroller">

        <!-- partial:partials/_navbar.html -->
        @include('admin.includes.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            @livewire('includes.sidebar')
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
    <script src="{{ mix('js/app.js') }}" defer></script>
    @livewireScripts
    @stack('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        // konfirmasi hapus
        window.addEventListener('konfirmasi', event => {
            Swal.fire({
                title: "Peringatan!",
                text: event.detail.text ? event.detail.text : "Apa anda yakin ingin menghapus?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#07cdae",
                cancelButtonColor: "#3e4b5b",
                confirmButtonText: event.detail.buttonText ? event.detail.buttonText : "Ya, hapus!",
                cancelButtonText: "Batal",
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit(event.detail.action);
                }
            });

        })
        window.addEventListener('terkonfirmasi', event => {
            Swal.fire({
                title: event.detail.title ? event.detail.title : "Berhasil!",
                text: event.detail.text ? event.detail.text : "Data telah dihapus.",
                icon: event.detail.icon ? event.detail.icon : "success",
                confirmButtonColor: "#07cdae",
            });
        })

        window.addEventListener('alert-event', event => {
            Swal.fire({
                title: event.detail.title,
                text: event.detail.text,
                icon: event.detail.icon,
                confirmButtonColor: "#07cdae",
            });
        })
        window.addEventListener('alert-toast', event => {
            Swal.fire({
                // title: event.detail.title,
                showConfirmButton: false,
                text: event.detail.text ? event.detail.text : "Berhasil",
                icon: event.detail.icon ? event.detail.icon : "success",
                position: 'top-end',
                toast: true,
                timer: 3000,
                timerProgressBar: true,
            });
        })
    </script>
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.rupiah').mask("#.##0", {
                reverse: true
            });
        })
    </script>
</body>

</html>
