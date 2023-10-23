<ul class="child">
    @foreach ($childs as $child)
        <li>
            <div class="card m-4">
                <div class="card-body">
                    <h5 class="card-title">{{ $child->title }}</h5>
                    <hr>
                    <div class="row">
                        <div class="col-6 card-content">{{ $child->content1 }}</div>
                        <div class="col-6 card-content">{{ $child->content2 }}</div>
                    </div>
                </div>
            </div>
            @if (count($child->childs))
                @include('content.item.manageAddChild', ['childs' => $child->childs])
            @endif
        </li>
    @endforeach
</ul>
