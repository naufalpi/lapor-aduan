<div>
    <input type="text" wire:model="search" placeholder="Cari..." class="form-control mb-3">

    <div class="row">
        @foreach($aduans as $aduan)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $aduan->judul }}</h5>
                        <p class="card-text">{{ Str::limit($aduan->isi, 100) }}</p>
                        <p class="card-text"><small class="text-muted">{{ $aduan->kategori }}</small></p>
                        <a href="#" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div>
        {{ $aduans->links() }} <!-- Pagination links -->
    </div>
</div>