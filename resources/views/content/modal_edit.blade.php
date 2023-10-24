<div class="modal fade" id="edit-menu-modal{{ $menu->id }}" tabindex="-1" aria-labelledby="edit-menu-modal-label"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit-menu-modal-label">Edit Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('menu.update', ['id' => $menu->id]) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" class="form-control" id="title" name="title"
                            value="{{ $menu->title }}">
                    </div>
                    <div class="form-group">
                        <label for="is_public">Status</label>
                        <select class="form-control" id="is_public" name="is_public">
                            <option value="1">Publik</option>
                            <option value="0">Private</option>
                        </select>
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
