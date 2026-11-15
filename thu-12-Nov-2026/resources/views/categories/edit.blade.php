@extends('layouts.admin')

@section('title', 'Edit Category')

@section('content')

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Edit Category</h2>
            <p class="text-muted mb-0">
                Update information for {{ $category->name }}.
            </p>
        </div>

        <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">

            <!-- Validation Errors -->
            @if ($errors->any())
                <div class="alert alert-danger rounded-3">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <!-- Category Name -->
                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Category Name</label>
                    <input type="text" name="name" id="name" class="form-control"
                        value="{{ old('name', $category->name) }}">
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="description" class="form-label fw-semibold">Description</label>
                    <textarea name="description" id="description" class="form-control"
                        rows="4">{{ old('description', $category->description) }}</textarea>
                </div>

                <!-- Current Image -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Current Image</label>

                    @if($category->image)
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" width="130"
                                height="100" class="rounded-3 object-fit-cover">
                        </div>
                    @else
                        <p class="text-muted">No image uploaded.</p>
                    @endif

                    <label for="image" class="form-label fw-semibold">Choose a New Image</label>
                    <input type="file" name="image" id="image" class="form-control" accept="image/*">

                    <small class="text-muted">
                        Leave empty to keep the current image.
                    </small>
                </div>

                <!-- Status -->
                <div class="mb-3">
                    <label for="status" class="form-label fw-semibold">Status</label>

                    <select name="status" id="status" class="form-select">
                        <option value="1" {{ old('status', $category->status) == '1' ? 'selected' : '' }}>
                            Active
                        </option>

                        <option value="0" {{ old('status', $category->status) == '0' ? 'selected' : '' }}>
                            Inactive
                        </option>
                    </select>
                </div>

                <!-- Buttons -->
                <div class="d-flex gap-2 mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-lg"></i> Update Category
                    </button>

                    <a href="{{ route('categories.index') }}" class="btn btn-light border">
                        Cancel
                    </a>
                </div>

            </form>
        </div>
    </div>

@endsection