<div>
    @if ($formRoleVisible)
        @if ($userRoleTambah)
            @livewire('karyawan.user-role-tambah')
        @elseif ($userRoleEdit)
            @livewire('karyawan.user-role-edit')
        @else
            @livewire('karyawan.role-management')
        @endif
    @endif

    <div class="card mb-3">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col">
                    <span class="h4">
                        Role Management
                    </span>
                    @if ($formRoleVisible)
                        <a class="btn btn-secondary btn-sm float-end">
                            <i class="mdi mdi-shape-square-plus"></i>
                            Tambah Role
                        </a>
                    @else
                        <div wire:click='userRoleTambah' class="btn btn-gradient-success btn-sm float-end">
                            <i class="mdi mdi-shape-square-plus"></i>
                            Tambah Role
                        </div>
                    @endif
                </div>
            </div>
            <table class="table table-hover table-striped text-center mb-3">
                <thead class="table-dark">
                    <th>No</th>
                    <th>Nama Role</th>
                    <th>Opsi</th>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($roles as $role)
                        @if ($role->name != 'Owner')
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    @if ($formRoleVisible)
                                        <div class="btn btn-secondary btn-sm">
                                            <i class="mdi mdi-account-card-details"></i>
                                        </div>
                                        <div class="btn btn-secondary btn-sm">
                                            <i class="mdi mdi-lead-pencil"></i>
                                        </div>
                                        <div class="btn btn-secondary btn-sm">
                                            <i class="mdi mdi-delete-forever"></i>
                                        </div>
                                    @else
                                        <a wire:click.prevent='formRoleOpen({{ $role->id }})'
                                            class="btn btn-gradient-info btn-sm">
                                            <i class="mdi mdi-account-card-details"></i>
                                        </a>
                                        <a wire:click.prevent='formUserRoleOpen({{ $role->id }})'
                                            class="btn btn-gradient-dark btn-sm">
                                            <i class="mdi mdi-lead-pencil"></i>
                                        </a>
                                        <a wire:click.prevent='formUserRoleHapus({{ $role->id }})' class="btn btn-gradient-danger btn-sm">
                                            <i class="mdi mdi-delete-forever"></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
