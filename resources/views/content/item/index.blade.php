@extends('home')

@section('content')
    <link rel="stylesheet" href="css/style.css">
    <div class="container">
        <div class="h2 fw-bold">{{ Str::upper($menu->title) }}</div>
        <p>{{ $menu->created_by_name }}</p>
        <div class="row">
            <div class="col-md-4" style="height: 500px; border: 1px solid #ccc;">
                <!-- Kolom Kiri -->
                <h2>Kolom Kiri</h2>
                <!-- Konten di sini -->
            </div>
            <div class="col-md-8" style="height: 500px; overflow-y: scroll; border: 1px solid #ccc;">
                <!-- Kolom Kanan -->
                <h2>Kolom Kanan</h2>
                <h2>Kolom Kanan</h2>
                <h2>Kolom Kanan</h2>
                <h2>Kolom Kanan</h2>
                <h2>Kolom Kanan</h2>
                <h2>Kolom Kanan</h2>
                <h2>Kolom Kanan</h2>
                <h2>Kolom Kanan</h2>
                <h2>Kolom Kanan</h2>
                <h2>Kolom Kanan</h2>
                <h2>Kolom Kanan</h2>
                <h2>Kolom Kanan</h2>
                <h2>Kolom Kanan</h2>
                <h2>Kolom Kanan</h2>
                <h2>Kolom Kanan</h2>
                <h2>Kolom Kanan</h2>
                <h2>Kolom Kanan</h2>
                <h2>Kolom Kanan</h2>
                <h2>Kolom Kanan</h2>
                <h2>Kolom Kanan</h2>
                <h2>Kolom Kanan</h2>
                <h2>Kolom Kanan</h2>
                <h2>Kolom Kanan</h2>
                <!-- Konten di sini -->
            </div>
        </div>
    </div>

    @if (Session::has('success'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: 'Data berhasil dibuat'
            })
        </script>
    @endif
@endsection
