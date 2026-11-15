@extends('layouts.admin')

@section('title', 'Add Seller')

@section('content')

    <div class="mb-4">
        <h2 class="fw-bold mb-1">Add Seller</h2>
        <p class="text-muted mb-0">Register a new seller for your store</p>
    </div>

    <div class="card border-0 shadow-sm rounded-4 mx-auto" style="max-width: 700px;">
        <div class="card-header bg-white border-0 p-4">
            <h5 class="fw-bold mb-0">Seller Information</h5>
        </div>

        <div class="card-body p-4">

            <form action="{{ route('sellers.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold">Shop Name</label>

                    <input type="text" name="shop_name" class="form-control @error('shop_name') is-invalid @enderror"
                        value="{{ old('shop_name') }}">

                    @error('shop_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">User</label>

                    <select name="user_id" class="form-select @error('user_id') is-invalid @enderror">

                        <option value="">Select a user</option>

                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }} — {{ $user->email }}
                            </option>
                        @endforeach
                    </select>

                    @error('user_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-plus-lg"></i> Save Seller
                    </button>

                    <a href="{{ route('sellers.index') }}" class="btn btn-light border">
                        Cancel
                    </a>
                </div>

            </form>
        </div>
    </div>

@endsection