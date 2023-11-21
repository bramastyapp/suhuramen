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
        position: fixed;
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
        margin: 30px auto;
    }
</style>

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        // hapus produk
        window.addEventListener('konfirmasi-hapus-show', event => {
            Swal.fire({
                title: "Peringatan!",
                text: "Apa anda yakin ingin menghapus?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal",
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('produkTerhapus');
                }
            });

        })
        window.addEventListener('produk-terhapus', event => {
            Swal.fire({
                title: "Berhasil!",
                text: "Data anda sudah terhapus.",
                icon: "success"
            });
        })

        // hapus produk kategori
        window.addEventListener('konfirmasi-hapus-kategori', event => {
            Swal.fire({
                title: "Yakin ingin menghapus?",
                text: "Pastikan bahwa kategori yang dihapus tidak ada produk yang masih tampil di menu.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal",
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('kategoriTerhapus');
                }
            });
        })

        window.addEventListener('kategori-terhapus', event => {
            Swal.fire({
                title: "Berhasil!",
                text: "Data anda sudah terhapus.",
                icon: "success"
            });
        })

        window.addEventListener('ada-produk', event => {
            Swal.fire({
                title: "Perhatian!",
                text: "Kategori tidak dapat terhapus karena masih ada produk di dalam kategori, pastikan lagi tidak ada produk yang memakai kategori yang akan dihapus.",
                icon: "info"
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
