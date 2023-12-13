@extends('home')

@section('navbar')
    <h1 class="judul">Home</h1>
@endsection

@section('content')
    <link rel="stylesheet" href="css/style.css">
    <h1></h1>
    <table id="example" class="table table-striped table-bordered" style="width:80%; ">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Kreator</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($menus as $menu)
                <tr>
                    <td>{{ Str::upper($menu->title) }}</td>
                    <td>{{ $menu->created_by_name }}</td>
                    <td>
                        <button class="btn btn-info">
                            <a href="{{ route('data', ['id' => $menu->id]) }}"><i class="fa-solid fa-eye"></i></a>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- <div class="card mb-3">
            <div class="card-body card-menu">
                <h5 class="card-title">{{ Str::upper($menu->title) }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">created by: {{ $menu->created_by_name }}</h6>
                <button class="btn btn-info">
                    <a href="{{ route('data', ['id' => $menu->id]) }}">Lihat Data</a>
                </button>
            </div>
        </div> --}}
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

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection
