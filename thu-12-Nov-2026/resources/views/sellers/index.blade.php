@extends('layouts.admin')

@section('title', 'Sellers')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Sellers</h2>
            <p class="text-muted mb-0">Manage your store sellers</p>
        </div>

        <a href="{{ route('sellers.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Add Seller
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success rounded-3">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger rounded-3">
            {{ session('error') }}
        </div>
    @endif

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-header bg-white border-0 p-4">
            <h5 class="fw-bold mb-0">All Sellers</h5>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">ID</th>
                            <th>Shop Name</th>
                            <th>Owner</th>
                            <th>Email</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($sellers as $seller)
                            <tr>
                                <td class="ps-4">{{ $seller->id }}</td>

                                <td class="fw-semibold">{{ $seller->shop_name }}</td>

                                <td>{{ $seller->user->name }}</td>

                                <td>{{ $seller->user->email }}</td>

                                <td>
                                    <div class="d-flex justify-content-center gap-2">

                                        <a href="{{ route('sellers.show', $seller->id) }}" class="btn btn-sm btn-outline-info"
                                            title="View">
                                            <i class="bi bi-eye"></i>
                                        </a>

                                        <a href="{{ route('sellers.edit', $seller->id) }}"
                                            class="btn btn-sm btn-outline-primary" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <form action="{{ route('sellers.destroy', $seller->id) }}" method="POST"
                                            onsubmit="return confirm('Delete this seller?')">

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
                                <td colspan="5" class="text-center py-5">
                                    <h6 class="text-muted">No sellers found</h6>
                                    <p class="text-muted mb-0">Start by adding your first seller.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </div>

@endsection