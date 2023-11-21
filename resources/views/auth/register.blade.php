@extends('admin.layouts.authapp')
@section('title', 'Register')
@section('main')
<div class="mx-auto" style="width: 380px">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Name</label>
                    <input name="name" type="text" class="form-control form-control-sm" value="{{ old('name') }}">
                    @error('name')                        
                    <span class="text-danger" style="font-size: 0.9rem">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">E-mail</label>
                    <input name="email" type="email" class="form-control form-control-sm" value="{{ old('email') }}">
                    @error('email')                        
                    <span class="text-danger" style="font-size: 0.9rem">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control form-control-sm" value="{{ old('password') }}">
                    @error('password')                        
                    <span class="text-danger" style="font-size: 0.9rem">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Confirm Password</label>
                    <input name="password_confirmation" type="password" class="form-control form-control-sm">
                </div>
                <div class="row p-4 pt-2 pb-0">
                    <button type="submit" class="col btn btn-gradient-primary">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection