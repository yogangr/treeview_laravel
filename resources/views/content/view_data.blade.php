@extends('home')

@section('content')
    <link rel="stylesheet" href="/css/style.css">
    <h1>{{ $menu->title }}</h1>

    <h5 class="text-center mb-4 bg-info text-white">Menu List</h5>
    @foreach ($items as $item)
        <div class="card m-3" style="width: 18rem;">
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
        {{-- <span class="line"></span> --}}
    @endforeach
@endsection
