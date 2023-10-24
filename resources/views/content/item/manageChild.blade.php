<ul class="child">
    @foreach ($childs as $child)
        <li>
            <details>
                <summary class="card m-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $child->title }}</h5>
                        @if ($child->content1 || $child->content2)
                            <hr>
                            <div class="row">
                                <div class="col-6 card-content">{{ $child->content1 }}</div>
                                <div class="col-6 card-content">{{ $child->content2 }}</div>
                            </div>
                        @endif
                    </div>
                </summary>
                @if (count($child->childs))
                    @include('content.item.manageChild', ['childs' => $child->childs])
                @endif
            </details>
        </li>
    @endforeach
</ul>
