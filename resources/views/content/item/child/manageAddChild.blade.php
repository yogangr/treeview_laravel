<ul class="child-add">
    @foreach ($childs as $child)
        <li class="add-item">
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
                    <a href="#" class="btn btn-primary edit-btn" data-bs-toggle="modal"
                        data-bs-target="#edit-child-item-modal{{ $child->id }}"><i class="fas fa-edit"></i></a>
                    @include('content.item.child.modal_edit_child')
                    <a href="#" class="btn btn-primary delete-btn" data-bs-toggle="modal"
                        data-bs-target="#delete-item-modal{{ $child->id }}"><i class="fa-solid fa-trash"
                            style="color: #ff0000;"></i></i></a>
                    @include('content.item.child.delete_child_item_modal')
                </div>
            </div>
            @if (count($child->childs))
                @include('content.item.child.manageAddChild', ['childs' => $child->childs])
            @endif
        </li>
    @endforeach
</ul>
