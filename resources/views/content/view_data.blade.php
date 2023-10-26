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
                                @if ($item->content1 || $item->content2)
                                    <hr>
                                    <div class="row">
                                        <div class="col-6 card-content">{{ $item->content1 }}</div>
                                        <div class="col-6 card-content">{{ $item->content2 }}</div>
                                    </div>
                                @endif
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
