<div class="modal fade" id="delete-menu-modal{{ $menu->id }}" tabindex="-1" aria-labelledby="delete-menu-modal-label"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete-menu-modal-label">Hapus Menu {{ Str::upper($menu->title) }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Anda yakin ingin menghapus menu ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <form action="{{ route('menu.delete', ['id' => $menu->id]) }}" method="post">
                    @csrf
                    @method('delete')

                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
