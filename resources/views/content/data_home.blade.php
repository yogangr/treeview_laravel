@extends('home')

@section('content')
    @foreach ($menus as $menu)
        <div class="card" style="width: 95vw;">
            <div class="card-body">
                <h5 class="card-title">{{ $menu->title }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">created by: {{ $menu->created_by_name }}</h6>
                @foreach ($menu->item as $item)
                    <h6 class="card-subtitle mb-2 text-muted">{{ $item->title }}</h6>
                @endforeach

            </div>
        </div>
    @endforeach
@endsection
