@extends('home')

@section('content')
    <link rel="stylesheet" href="css/style.css">
    <h1>Data Publik</h1>
    @foreach ($menus as $menu)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ Str::upper($menu->title) }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">created by: {{ $menu->created_by_name }}</h6>
            </div>
        </div>
    @endforeach
@endsection