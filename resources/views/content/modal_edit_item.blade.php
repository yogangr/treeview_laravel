<div class="modal fade" id="edit-item-modal{{ $item->id }}" tabindex="-1" aria-labelledby="edit-item-modal-label"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit-menu-modal-label">Edit Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body edit">
                <form action="{{ route('item.update', ['id' => $item->id]) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="title" class="label">Judul</label>
                        <input type="text" class="form-control" id="title" name="title"
                            value="{{ $item->title }}">
                    </div>
                    <div class="form-group">
                        <label for="title" class="label">Konten 1</label>
                        <input type="text" class="form-control" id="content1" name="content1"
                            value="{{ $item->content1 }}">
                    </div>
                    <div class="form-group">
                        <label for="title" class="label">Konten 2</label>
                        <input type="text" class="form-control" id="content2" name="content2"
                            value="{{ $item->content2 }}">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
            </div>
        </div>
    </div>
</div>
