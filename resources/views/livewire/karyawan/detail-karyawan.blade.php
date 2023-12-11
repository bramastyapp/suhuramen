<div>
    <div wire:click="$emit('detailKaryawanClose')" class="custom-modal">
    </div>
    <div class="custom-modal-body" style="min-width: 60%;">
        <div class="card">
            <div class="card-body">
                @if ($user_id)
                <div>
                    <form wire:submit.prevent='update' class="row g-3" enctype="multipart/form-data">
                        <div class="text-center">
                            @if ($gambarOld)
                                <img src="{{ asset('storage') . '/' . $gambarOld }}"
                                    alt=""style="border-radius: 100%; width: 150px; height: 150px; object-fit: cover">
                            @else
                                <img src="{{ asset('vendor/purpleadmin') }}/assets/images/faces/face1.jpg"
                                    alt="foto profil"
                                    style="border-radius: 100%; width: 130px; height: 130px; object-fit: cover">
                            @endif
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6 form-group mb-0">
                                <label class="form-label">Nama</label>
                                <input wire:model='nama' type="text"
                                    class="form-control form-control-sm @error('nama') is-invalid @enderror" disabled>
                                @error('nama')
                                    <span class="invalid-feedback">
                                        <p class="fst-italic mb-0" style="font-size: 0.8rem">{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group mb-0">
                                <label class="form-label">Email</label>
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
                                    class="form-control form-control-sm @error('alamat') is-invalid @enderror" disabled>
                                @error('alamat')
                                    <span class="invalid-feedback">
                                        <p class="fst-italic mb-0" style="font-size: 0.8rem">{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12 form-group">
                                @if ($zipFileOld)
                                    @can('owner_karyawan')
                                        <label>Upload File Karyawan <span class="text-danger fst-italic">* .zip max:
                                                3mb</span></label>
                                        <input wire:model='zipFile'
                                            class="form-control @error('zipFile') is-invalid @enderror" type="file">
                                        @error('zipFile')
                                            <p class="text-danger fst-italic mb-0" style="font-size: 0.8rem">{{ $message }}
                                            </p>
                                        @enderror
                                    @endcan
                                    <p class="fst-italic mt-2 mb-0" style="font-size: 0.8rem">File : <a
                                            href="{{ asset('storage/file-karyawan/' . $zipFileOld) }}">{{ $zipFileOld }}</a>
                                    </p>
                                @else
                                    @can('edit_karyawan')
                                        <label>Upload File Karyawan <span class="text-danger fst-italic">* .zip max:
                                                3mb</span></label>
                                        <input wire:model='zipFile'
                                            class="form-control @error('zipFile') is-invalid @enderror" type="file">
                                        @error('zipFile')
                                            <p class="text-danger fst-italic mb-0" style="font-size: 0.8rem">{{ $message }}
                                            </p>
                                        @enderror
                                    @endcan
                                @endif
                            </div>
                            <div class="col-12">
                                @if ($zipFileOld)
                                    @can('owner_karyawan')
                                        <button type="submit" class="btn btn-gradient-success">Simpan</button>
                                    @endcan
                                @else
                                    @can('edit_karyawan')
                                        <button type="submit" class="btn btn-gradient-success">Simpan</button>
                                    @endcan
                                @endif
                                <div wire:click="$emit('detailKaryawanClose')" class="btn btn-gradient-dark">Tutup</div>
                            </div>
                        </div>
                    </form>
                </div>
                @else
                <p class="text-center">loading...</p>
                @endif

            </div>
        </div>
    </div>
</div>
