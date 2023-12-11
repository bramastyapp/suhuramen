@extends('admin.layouts.authapp')
@section('title', 'Lupa Password')
@section('main')
    <div class="mx-auto" style="width: 380px">
        <div class="card">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form action="{{ route('password.email') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">E-mail</label>
                        <input name="email" type="email" class="form-control form-control-sm"
                            value="{{ old('email') }}">
                        @error('email')
                            <span class="text-danger" style="font-size: 0.9rem">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="row p-4 pt-2 pb-0">
                        <button type="submit" class="col btn btn-gradient-primary">Send Reset Link</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
