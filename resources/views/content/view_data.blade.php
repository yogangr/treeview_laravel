@extends('home')

@section('content')
    <link rel="stylesheet" href="/css/style.css">
    <h1>Judul : {{ Str::upper($menu->title) }}</h1>
    <div class="content">
        <ul class="tree">
            <li>
                @foreach ($items as $item)
                    <details>
                        <summary class="card m-3">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->title }}</h5>
                                <hr>
                                <div class="row">
                                    <div class="col-6 card-content">{{ $item->content1 }}</div>
                                    <div class="col-6 card-content">{{ $item->content2 }}</div>
                                </div>
                            </div>
                        </summary>
                        @if (count($item->childs))
                            @include('content.item.manageChild', [
                                'childs' => $item->childs,
                            ])
                        @endif
                    </details>
                @endforeach
            </li>
        </ul>
    </div>
@endsection
