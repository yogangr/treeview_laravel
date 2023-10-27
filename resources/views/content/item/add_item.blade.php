@extends('home')

@section('content')
    <link rel="stylesheet" href="/css/style.css">
    <div class="contain">
        <div class="h2 fw-bold">{{ Str::upper($menu->title) }}</div>
        <div class="row">
            <div class="col-md-3" style="height: 70vh; border: 1px solid #ccc;">
                <!-- Kolom Kiri -->
                <h5 class="mb-4 mt-2 text-center ">Add New Menu</h5>
                <form action="{{ route('add-item', ['id' => $menu->id]) }}" method="POST">
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
                        <div class="col-md-12 mt-4">
                            <button class="btn btn-success">Save</button>
                        </div>
                    </div>
                </form>
                <!-- Konten di sini -->
            </div>
            <div class="col-md-9" style="height: 70vh; overflow-y: scroll; border: 1px solid #ccc;">
                <!-- Kolom Kanan -->
                <ul class="tree mt-3">
                    @foreach ($items as $item)
                        <li>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->title }}</h5>
                                    @if ($item->content1 || $item->content2)
                                        <hr>
                                        <div class="row">
                                            <div class="col-6 card-content">{{ $item->content1 }}</div>
                                            <div class="col-6 card-content">{{ $item->content2 }}</div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </li>
                        @if (count($item->childs))
                            @include('content.item.manageAddChild', [
                                'childs' => $item->childs,
                            ])
                        @endif
                    @endforeach
                </ul>
                <!-- Konten di sini -->

            </div>
        </div>
        <button class="btn btn-success mt-4"><a href="{{ route('data', ['id' => $menu->id]) }}">Selesai</a></button>
    </div>

    @if (Session::has('createMenu'))
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

    <script>
        function getRandomColor() {
            const letters = '0123456789ABCDEF';
            let color = '#';
            for (let i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        const elements = document.querySelectorAll('.tree, .child');

        elements.forEach(function(element) {
            element.style.color = getRandomColor();
        });
    </script>
@endsection
