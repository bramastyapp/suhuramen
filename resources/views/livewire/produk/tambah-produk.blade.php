<div>
    <style>
        .custom-modal {
            position: fixed;
            z-index: 1500;
            background-color: rgba(49, 49, 49, 0.6);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow-x: hidden;
            overflow-y: auto;
            outline: 0;
        }

        .custom-modal-body {
            margin: 30px auto;
        }
    </style>
    <div class="custom-modal">
        <div class="custom-modal-body" style="max-width: 60%">
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent='store' class="row g-3 pt-3" enctype="multipart/form-data">
                        <div class="col-md-6">
                            <label class="form-label">Nama Produk</label>
                            <input wire:model='nama' type="text"
                                class="form-control form-control-sm @error('nama') is-invalid @enderror"
                                placeholder="Nama produk">
                            @error('nama')
                                <span class="invalid-feedback">
                                    <p class="fst-italic mb-0" style="font-size: 0.8rem">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Kode Produk</label>
                            <input wire:model='kode' type="text"
                                class="form-control form-control-sm @error('kode') is-invalid @enderror"
                                placeholder="Kode produk" disabled>
                            @error('kode')
                                <span class="invalid-feedback">
                                    <p class="fst-italic mb-0" style="font-size: 0.8rem">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6 align-self-end">
                            <label class="form-label">Harga</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gradient-primary text-white">Rp</span>
                                </div>
                                <input type="text" wire:model='harga'
                                    class="form-control form-control-sm @error('harga') is-invalid @enderror"
                                    placeholder="Harga" value="">
                                @error('harga')
                                    <span class="invalid-feedback">
                                        <p class="fst-italic mb-0" style="font-size: 0.8rem">{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 align-self-end">
                            <label class="form-label">Kategori</label>
                            <div class="row g-3">
                                <div class="col-md-10">
                                    <select wire:model='kategori'
                                        class="form-control form-control-sm @error('kategori') is-invalid @enderror">
                                        <option wire:click='updateKode' selected value="">Pilih...</option>
                                        @foreach ($allKategori as $k)
                                            <option wire:click='updateKode' value="{{ $k->id }}">
                                                {{ $k->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                    @error('kategori')
                                        <span class="invalid-feedback">
                                            <p class="fst-italic mb-0" style="font-size: 0.8rem">{{ $message }}</p>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <button type="button" href="" class="btn btn-gradient-primary btn-icon">
                                        <i class="mdi mdi-library-plus"></i>
                                    </button>

                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Deskripsi</label>
                            <input type="text" wire:model='deskripsi' class="form-control"
                            placeholder="Deskripsi produk">
                        </div>
                        <div class="col-md-6">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input wire:model='gambar' class="form-control @error('gambar') is-invalid @enderror" type="file" id="gambar" name="gambar">
                            @error('gambar')
                            <span class="invalid-feedback">
                                <p class="fst-italic mb-0" style="font-size: 0.8rem">{{ $message }}</p>
                            </span>
                        @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Preview</label>
                            @if ($gambar)
                            <div class="text-center">
                                <img src="{{ $gambar->temporaryUrl() }}" alt="" height="150">
                            </div>
                            @endif
                        </div>
                        <div class="modal-footer pb-0">
                            <button wire:click="$emit('formClose')" type="button"
                                class="btn btn-gradient-dark">Tutup</button>
                            <button type="submit" class="btn btn-gradient-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>