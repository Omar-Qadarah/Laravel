@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')

    <div class="mb-4">
        <h2 class="fw-bold mb-1">Edit User</h2>
        <p class="text-muted mb-0">Update user account information</p>
    </div>

    <div class="card border-0 shadow-sm rounded-4 mx-auto" style="max-width: 700px;">

        <div class="card-header bg-white border-0 p-4">
            <h5 class="fw-bold mb-0">User Information</h5>
        </div>

        <div class="card-body p-4">

            @if($errors->any())
                <div class="alert alert-danger rounded-3">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('updateUser', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Name</label>

                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name', $user->name) }}">

                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email</label>

                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email', $user->email) }}">

                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">
                        New Password <span class="text-muted fw-normal">(Optional)</span>
                    </label>

                    <input type="password" id="password" name="password"
                        class="form-control @error('password') is-invalid @enderror">

                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="form-label fw-semibold">
                        Confirm New Password
                    </label>

                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-lg"></i> Update User
                    </button>

                    <a href="{{ route('listUsers') }}" class="btn btn-light border">
                        Cancel
                    </a>
                </div>

            </form>
        </div>
    </div>

@endsection