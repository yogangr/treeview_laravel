<div class="modal fade modal-scrollable" id="info-modal{{ $item->id }}" tabindex="-1"
    aria-labelledby="delete-menu-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete-menu-modal-label">Info {{ Str::upper($item->title) }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body description" style="height: 400px; overflow-y:auto;">
                <div class="title-desc"><span class="fw-bold">Nama :</span> {{ $item->title }}</div>
                <div class="desc"><span class="fw-bold">Deskripsi :</span> {{ $item->description }}</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
