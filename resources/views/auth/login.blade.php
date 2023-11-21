@extends('admin.layouts.authapp')
@section('title', 'Login')
@section('main')
    <div class="mx-auto" style="width: 380px">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">E-mail</label>
                        <input name="email" type="email" class="form-control" value="{{ old('email') }}">
                        @error('email')
                            <span class="text-danger" style="font-size: 0.9rem">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" value="{{ old('password') }}">
                        @error('password')
                            <span class="text-danger" style="font-size: 0.9rem">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="row p-4 pt-3 pb-2">
                        <button type="submit" class="col-12 btn btn-gradient-primary float-end">Login</button>
                        <a href="{{ route('password.request') }}" class="col-12 btn btn-link">
                            Forgot your password?
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
