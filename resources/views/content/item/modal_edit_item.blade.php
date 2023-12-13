<div class="modal fade" id="edit-item-modal{{ $item->id }}" tabindex="-1" aria-labelledby="edit-item-modal-label"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit-item-modal-label">Edit Item</h5>
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
                        <label for="content1" class="label">Konten 1</label>
                        <input type="text" class="form-control" id="content1" name="content1"
                            value="{{ $item->content1 }}">
                    </div>
                    <div class="form-group">
                        <label for="content2" class="label">Konten 2</label>
                        <input type="text" class="form-control" id="content2" name="content2"
                            value="{{ $item->content2 }}">
                    </div>
                    <div class="form-group">
                        <label for="description" class="label">Deskripsi</label>
                        <textarea name="description" class="form-control" id="description">{{ $item->description }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
