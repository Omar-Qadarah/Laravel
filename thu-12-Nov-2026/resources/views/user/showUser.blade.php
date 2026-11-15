@extends('layouts.admin')

@section('title', 'User Details')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">User Details</h2>
            <p class="text-muted mb-0">View registered user information</p>
        </div>

        <a href="{{ route('listUsers') }}" class="btn btn-light border">
            <i class="bi bi-arrow-left"></i> Back to Users
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-4 mx-auto" style="max-width: 800px;">

        <div class="card-header bg-white border-0 p-4">
            <h5 class="fw-bold mb-0">User Information</h5>
        </div>

        <div class="card-body p-4">

            <div class="row g-4">

                <div class="col-md-6">
                    <p class="text-muted mb-1">User ID</p>
                    <h6 class="fw-semibold">{{ $user->id }}</h6>
                </div>

                <div class="col-md-6">
                    <p class="text-muted mb-1">Full Name</p>
                    <h6 class="fw-semibold">{{ $user->name }}</h6>
                </div>

                <div class="col-md-12">
                    <p class="text-muted mb-1">Email Address</p>
                    <h6 class="fw-semibold">{{ $user->email }}</h6>
                </div>

            </div>

            <hr class="my-4">

            <a href="{{ route('editUser', $user->id) }}" class="btn btn-primary">
                <i class="bi bi-pencil-square"></i> Edit User
            </a>

        </div>
    </div>

@endsection