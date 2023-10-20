@extends('home')

@section('content')
    <link rel="stylesheet" href="css/style.css">
    <h1>Data Publik</h1>
    @foreach ($menus as $menu)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ Str::upper($menu->title) }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">created by: {{ $menu->created_by_name }}</h6>
                <button class="btn btn-info">
                    <a href="{{ route('data', ['id' => $menu->id]) }}">Lihat Data</a>
                </button>
            </div>
        </div>
    @endforeach
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
                title: 'Login sukses'
            })
        </script>
    @endif
@endsection
