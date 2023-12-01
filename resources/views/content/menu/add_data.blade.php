@extends('home')

@section('navbar')
    <h1 class="judul">Tambah Data</h1>
@endsection

@section('content')
    <link rel="stylesheet" href="css/style.css">
    <form action="{{ route('menu') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <label for="title" class="col-sm-2 col-form-label">Judul</label>
            <div class="col-sm-10">
                <input type="text" name="title" class="form-control" id="title">
            </div>
        </div>
        <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-2 pt-0">Status</legend>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="is_public" value="1">
                    <div class="form-check-label" for="is_public">
                        Publik
                    </div>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="is_public" value="0">
                    <div class="form-check-label" for="is_public">
                        Private
                    </div>
                </div>
            </div>
        </fieldset>
        <button type="submit" class="btn btn-primary">Lanjutkan</button>
    </form>
    @if (Session::has('createMenuError'))
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
                icon: 'error',
                title: 'Ada input yang belum anda isi!'
            })
        </script>
    @endif
@endsection
