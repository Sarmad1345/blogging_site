@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="row justify-content-center py-4">
        <div class="col-md-5">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white text-center py-3">
                    <h3 class="h5 mb-0 fw-bold">Login to Your Account</h3>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('login.authenticate') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" name="email" value="{{ old('email') }}"
                                placeholder="Enter your email" required autofocus>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" placeholder="Enter your password" required>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2">
                            <i class="bi bi-box-arrow-in-right me-1"></i> Login
                        </button>
                    </form>

                    <p class="mt-4 mb-0 text-center text-muted small">
                        Don't have an account?
                        <a href="{{ route('register') }}" class="text-decoration-none fw-semibold">Register</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection