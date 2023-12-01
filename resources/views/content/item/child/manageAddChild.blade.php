<ul class="child">
    @foreach ($childs as $child)
        <li>
            <div class="card">
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
            </div>
            @if (count($child->childs))
                @include('content.item.child.manageAddChild', ['childs' => $child->childs])
            @endif
        </li>
    @endforeach
</ul>
