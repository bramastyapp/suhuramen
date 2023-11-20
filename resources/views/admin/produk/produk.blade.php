@extends('admin.layouts.app')

@section('title', 'Produk | Dashboard')

@section('main')
    @include('sweetalert::alert')
    @livewire('produk.produk')

    <script type="text/javascript">
        function confirmation(e) {
            e.preventDefault();
            const urlRedirect = e.currentTarget.getAttribute('href');
            // console.log(urlRedirect);

            swal({
                    title: "Perhatian!",
                    text: "Apa anda yakin ingin menghapus?",
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((willCancel) => {
                    if (willCancel) {
                        window.location.href = urlRedirect;
                    }
                });
        }
    </script>
@endsection
