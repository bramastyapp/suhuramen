<div>
    <div class="card">
        <div class="card-body m-4 mt-0">
            <div class="row">
                <form wire:submit.prevent='update' class="row g-3" enctype="multipart/form-data">
                    <div class="col-3">
                        @if ($gambar)
                            <img src="{{ $gambar->temporaryUrl() }}" alt=""
                                style="border-radius: 100%; width: 150px; height: 150px; object-fit: cover">
                        @elseif($gambarOld)
                            <img src="{{ asset('storage') ."/". $gambarOld }}"
                                alt=""style="border-radius: 100%; width: 150px; height: 150px; object-fit: cover">
                        @else
                        {{$gambarOld}}
                            <img src="{{ asset('vendor/purpleadmin') }}/assets/images/faces/face1.jpg" alt="foto profil"
                                style="border-radius: 100%; width: 150px; height: 150px; object-fit: cover">
                        @endif
                    </div>
                    <div class="col-9">
                        <div class="btn btn-gradient-dark btn-icon-text btn-sm mt-4">
                            <label for="fileInput" style="cursor: pointer;">
                                <i class="mdi mdi-upload btn-icon-prepend"></i> Upload
                            </label>
                            <input wire:model='gambar' type="file" id="fileInput" style="display: none;">
                        </div>
                        <p class="text-secondary fst-italic mt-2" style="font-size: 0.8rem">Ukuran tidak boleh lebih
                            dari 1 mb<br>format .jpg .jpeg
                        </p>
                    </div>
                    <div class="row g-3 pt-3">
                        <div class="col-md-6 form-group mb-0">
                            <label class="form-label">Nama<span class="text-danger">&nbsp;*</span></label>
                            <input wire:model='nama' type="text"
                                class="form-control form-control-sm @error('nama') is-invalid @enderror">
                            @error('nama')
                                <span class="invalid-feedback">
                                    <p class="fst-italic mb-0" style="font-size: 0.8rem">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group mb-0">
                            <label class="form-label">Email<span class="text-danger">&nbsp;*</span></label>
                            <input wire:model="email" type="email"
                                class="form-control form-control-sm @error('email') is-invalid @enderror" disabled>
                            @error('email')
                                <span class="invalid-feedback">
                                    <p class="fst-italic mb-0" style="font-size: 0.8rem">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 form-group">
                            <label class="form-label">Alamat</label>
                            <input wire:model='alamat' type="text"
                                class="form-control form-control-sm @error('alamat') is-invalid @enderror"
                                placeholder="1234 Main St">
                            @error('alamat')
                                <span class="invalid-feedback">
                                    <p class="fst-italic mb-0" style="font-size: 0.8rem">{{ $message }}</p>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-gradient-primary float-end">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
