<!-- Modal kedua (modal edit item) -->
<div class="modal fade" id="edit-item-modal{{ $menu->id }}" tabindex="-1" aria-labelledby="edit-item-modal-label"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit-menu-modal-label">Edit Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('item.update', ['id' => ':id']) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" class="form-control" id="title" name="title"
                            value="{{ $item->title }}">
                    </div>
                    <!-- Tambahkan input lain sesuai kebutuhan -->
                    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
