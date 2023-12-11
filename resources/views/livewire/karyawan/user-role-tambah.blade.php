<div>
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent='store'>
                <div class="form-group">
                    <label for="name">Nama Role <span class="text-danger">*</span></label>
                    <input wire:model='userRole' class="form-control form-control-sm @error('userRole') is-invalid @enderror"
                        type="text">
                    @error('userRole')
                        <span class="invalid-feedback">
                            <p class="fst-italic mb-0" style="font-size: 0.8rem">{{ $message }}</p>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-gradient-success btn-sm">Simpan</button>
                <div wire:click="$emit('formUserRoleClose')" class="btn btn-gradient-dark btn-sm">Tutup</div>
            </form>
        </div>
    </div>
</div>
