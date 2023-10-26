<!-- Modal pertama -->
<div class="modal fade" id="list-item-modal{{ $menu->id }}" tabindex="-1" aria-labelledby="list-item-modal-label"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="list-item-modal-label">Edit Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="id">Pilih Item</label>
                        <select class="form-control" id="selected-item" name="id"
                            onchange="handleSelectedItemChange()">
                            @foreach ($menu->item as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <!-- Button untuk memicu modal kedua -->
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" data-bs-toggle="modal"
                    data-bs-target="#edit-item-modal{{ $menu->id }}">
                    Lanjutkan
                </button>
            </div>
        </div>
    </div>
</div>

@include('content.modal_edit_item')
