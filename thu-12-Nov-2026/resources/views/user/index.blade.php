@extends('layouts.admin')

@section('title', 'Users')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Users</h2>
            <p class="text-muted mb-0">Manage registered users</p>
        </div>

        <a href="{{ route('createUser') }}" class="btn btn-primary">
            <i class="bi bi-person-plus-fill me-1"></i> Create New User
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success rounded-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-header bg-white border-0 p-4">
            <h5 class="fw-bold mb-0">All Users</h5>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">Name</th>
                            <th>Email</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td class="ps-4 fw-semibold">{{ $user->name }}</td>

                                <td>{{ $user->email }}</td>

                                <td>
                                    <div class="d-flex justify-content-center gap-2">

                                        <a href="{{ route('showUser', $user->id) }}" class="btn btn-sm btn-outline-info"
                                            title="View">
                                            <i class="bi bi-eye"></i>
                                        </a>

                                        <a href="{{ route('editUser', $user->id) }}" class="btn btn-sm btn-outline-primary"
                                            title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <form action="{{ route('deleteUser', $user->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this user?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                                <i class="bi bi-trash3-fill"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center py-5">
                                    <h6 class="text-muted">No users found</h6>
                                    <p class="text-muted mb-0">Start by creating your first user.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </div>

@endsection