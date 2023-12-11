<div>
    <div wire:click="$emit('formTambahKaryawanClose')" class="custom-modal">
    </div>
    <div class="custom-modal-body" style="min-width: 50%;">
        <div class="card">
            <div class="card-body">
                <form wire:submit.prevent='store' method="POST">
                    <div class="mb-3">
                        <label class="form-label">Nama <span class="text-danger">*</span></label>
                        <input wire:model='name' name="name" type="text" class="form-control form-control-sm"
                            value="{{ old('name') }}">
                        @error('name')
                            <span class="text-danger" style="font-size: 0.9rem">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">E-mail <span class="text-danger">*</span></label>
                        <input wire:model='email' name="email" type="email" class="form-control form-control-sm"
                            value="{{ old('email') }}">
                        @error('email')
                            <span class="text-danger" style="font-size: 0.9rem">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password <span class="text-danger">*</span></label>
                        <input value="12345678" name="password" type="password"
                            class="form-control form-control-sm" disabled>
                        <span class="text-danger fst-italic" style="font-size: 0.8rem">
                            *Default: 12345678
                        </span>
                    </div>
                    <div class="pt-2 pb-0 float-end">
                            <button type="submit" class="col btn btn-gradient-success">Tambah</button>
                            <div wire:click="$emit('formTambahKaryawanClose')" class="btn btn-gradient-dark">Tutup</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
