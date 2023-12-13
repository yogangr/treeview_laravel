@extends('home')

@section('content')
    <link rel="stylesheet" href="css/style.css">
    <div class="contain">
        <div class="h2 fw-bold">{{ Str::upper($menu->title) }}</div>
        <div class="row">
            <div class="col-md-3 add-tree-left" style="height: 70vh; border: 1px solid #ccc;">
                <!-- Kolom Kiri -->
                <h5 class="mb-4 mt-2 text-center ">Tambahkan Item Baru</h5>
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
                                <label>Deskripsi</label>
                                <textarea name="description" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Parent</label>
                                <select class="form-control" name="parent_id">
                                    <option selected disabled>Select Parent Menu</option>
                                    @foreach ($allItems->sortBy('title') as $value)
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
            <div class="col-md-9 add-tree" style="height: 70vh; overflow-y: scroll; border: 1px solid #ccc;">
                <!-- Kolom Kanan -->
                <ul class="tree">
                    @foreach ($items as $item)
                        <li class="add-item">
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
                                    <a href="#" class="btn btn-primary edit-btn" data-bs-toggle="modal"
                                        data-bs-target="#edit-item-modal{{ $item->id }}"><i class="fas fa-edit"></i></a>
                                    @include('content.item.modal_edit_item')
                                    <a href="#" class="btn btn-primary delete-btn" data-bs-toggle="modal"
                                        data-bs-target="#delete-item-modal{{ $item->id }}"><i class="fa-solid fa-trash"
                                            style="color: #ff0000;"></i></i></a>
                                    @include('content.item.delete_item_modal')
                                </div>
                            </div>
                            @if (count($item->childs))
                                @include('content.item.child.manageAddChild', [
                                    'childs' => $item->childs,
                                ])
                            @endif
                        </li>
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

    <script>
        const nestedUlTreeLis = document.querySelectorAll("ul.tree li");
        const defaultMode = nestedUlTreeLis.forEach((li) => {
            // Create and style the before pseudo-element
            const beforeElement = document.createElement("div");
            beforeElement.style.position = "absolute";
            beforeElement.style.left = "-50px";
            beforeElement.style.top = "0px";
            beforeElement.style.borderLeft = "2px solid";
            beforeElement.style.borderBottom = "2px solid";
            beforeElement.style.content = "";
            beforeElement.style.width = "4em";
            beforeElement.style.height = "1.5em";
            li.prepend(beforeElement);

            // Create and style the after pseudo-element
            const afterElement = document.createElement("div");
            afterElement.style.position = "absolute";
            afterElement.style.left = "-50px";
            afterElement.style.bottom = "-22px";
            afterElement.style.borderLeft = "2px solid";
            afterElement.style.content = "";
            afterElement.style.width = "4em";
            afterElement.style.height = "100%";
            li.appendChild(afterElement);

            // Hide the after pseudo-element for the last child
            if (li.parentElement && li.parentElement.lastElementChild === li) {
                afterElement.style.display = "none";
            }

            // Hide the pseudo-elements for direct children of ul.tree
            if (li.parentElement === document.querySelector("ul.tree")) {
                beforeElement.style.display = "none";
                afterElement.style.display = "none";
            }
        });
    </script>
@endsection
