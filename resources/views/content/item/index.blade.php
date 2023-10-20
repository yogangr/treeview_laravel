@extends('home')

@section('content')
    <link rel="stylesheet" href="css/style.css">
    <div class="container">
        <div class="h2 fw-bold">{{ Str::upper($menu->title) }}</div>
        <p>{{ $menu->created_by_name }}</p>
        <div class="row">
            <div class="col-md-4" style="height: 500px; border: 1px solid #ccc;">
                <!-- Kolom Kiri -->
                <h5 class="mb-4 text-center bg-success text-white ">Add New Menu</h5>
                <form action="{{ route('create-item') }}" method="POST">
                    @csrf
                    @if (count($errors) > 0)
                        <div class="alert alert-danger  alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            @foreach ($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Konten 1</label>
                                <input type="text" name="content1" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Konten 2</label>
                                <input type="text" name="content2" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Parent</label>
                                <select class="form-control" name="parent_id">
                                    <option selected disabled>Select Parent Menu</option>
                                    @foreach ($allItems as $value)
                                        <option value="{{ $value->id }}">{{ $value->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-success">Save</button>
                        </div>
                    </div>
                </form>
                <!-- Konten di sini -->
            </div>
            <div class="col-md-8" style="height: 500px; overflow-y: scroll; border: 1px solid #ccc;">
                <!-- Kolom Kanan -->
                <h5 class="text-center mb-4 bg-info text-white">Menu List</h5>
                @foreach ($items as $item)
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <div class="divider"></div>
                            <div class="row">
                                <div class="col-6">{{ $item->content1 }}</div>
                                <div class="col-6">{{ $item->content2 }}</div>
                            </div>
                        </div>
                    </div>
                    @if (count($item->childs))
                        @include('content.item.manageChild', [
                            'childs' => $item->childs,
                        ])
                    @endif
                @endforeach
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
