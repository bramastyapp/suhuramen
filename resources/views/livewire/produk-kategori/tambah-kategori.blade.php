<div>
    <div wire:click="$emit('formKategoriClose')" class="custom-modal">
    </div>
        <div class="custom-modal-body" style="max-width: 40%;">
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent='store' class="row g-3 pt-3">
                        <div class="col-12">
                            <label class="form-label">Kode Kategori</label>
                            <input wire:model='kode' type="text"
                                class="form-control form-control-sm @error('kode') is-invalid @enderror"
                                placeholder="Kode kategori">
                            @error('kode')
                                <span class="invalid-feedback">
                                    <p class="fst-italic mb-0" style="font-size: 0.8rem">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Nama Kategori</label>
                            <input wire:model='nama' type="text"
                                class="form-control form-control-sm @error('nama') is-invalid @enderror"
                                placeholder="Nama kategori">
                            @error('nama')
                                <span class="invalid-feedback">
                                    <p class="fst-italic mb-0" style="font-size: 0.8rem">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        <div class="modal-footer pb-0">
                            <button wire:click="$emit('formKategoriClose')" type="button"
                                class="btn btn-gradient-dark">Tutup</button>
                            <button type="submit" class="btn btn-gradient-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

</div>
