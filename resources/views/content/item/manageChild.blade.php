<ul>
    @foreach ($childs as $child)
        <li>
            <div class="card m-4" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $child->title }}</h5>
                    <div class="divider"></div>
                    <div class="row">
                        <div class="col-6">{{ $child->content1 }}</div>
                        <div class="col-6">{{ $child->content2 }}</div>
                    </div>
                </div>
            </div>
            @if (count($child->childs))
                @include('content.item.manageChild', ['childs' => $child->childs])
            @endif
        </li>
    @endforeach
</ul>
