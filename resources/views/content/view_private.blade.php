@extends('home')

@section('content')
    <link rel="stylesheet" href="/css/style.css">
    <h1>Data Private Saya</h1>
    @foreach ($menus as $menu)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ Str::upper($menu->title) }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">created by: {{ $menu->created_by_name }}</h6>
                <button class="btn btn-info">
                    <a href="{{ route('myDataPublic', ['id' => $menu->id]) }}">Lihat Data</a>
                </button>
                {{-- Button Edit --}}
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#edit-menu-modal{{ $menu->id }}">Edit</button>
                @include('content.modal_edit')
                {{-- Button Delete --}}
                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#delete-menu-modal{{ $menu->id }}">
                    Hapus Data
                </button>
                @include('content.modal_delete')
            </div>
        </div>
    @endforeach
    @if (Session::has('delete'))
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
                title: 'Data Berhasil Dihapus!'
            })
        </script>
    @endif
    @if (Session::has('update'))
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
                title: 'Data Berhasil Diperbarui!'
            })
        </script>
    @endif
@endsection
