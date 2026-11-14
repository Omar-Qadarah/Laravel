<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories | Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

</head>


<body class="bg-light">
    <div class="container-fluid py-5 px-4">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="fw-bold text-dark mb-1">Categories</h1>
                <p class="text-secondary mb-0">
                    Manage your store categories
                </p>
            </div>

            <a href="{{route('categories.create')}}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Add Category
            </a>
        </div>


        <div class="card border-0 shadow-sm rounded-3">

            <div class="card-header bg-white border-0 py-3">
                <h5 class="mb-0 fw-semibold">All Categories</h5>
            </div>

            <div class="card-body p-0">

                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">

                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">Image</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($categories as $category)
                                <tr>
                                    <td class="ps-4">
                                        @if($category->image)
                                            <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}"
                                                width="55" height="55" class="rounded object-fit-cover">
                                        @else
                                            <div class="bg-secondary-subtle rounded d-flex align-items-center justify-content-center"
                                                style="width: 55px; height: 55px;">
                                                <span class="text-secondary small">No image</span>
                                            </div>
                                        @endif
                                    </td>

                                    <td class="fw-semibold text-dark">
                                        {{ $category->name }}
                                    </td>

                                    <td class="text-secondary">
                                        {{ $category->description }}
                                    </td>


                                    <td>
                                        @if($category->status)
                                            <span class="badge text-bg-success">
                                                Active
                                            </span>
                                        @else
                                            <span class="badge text-bg-secondary">
                                                Inactive
                                            </span>
                                        @endif
                                    </td>

                                    <!-- Actions -->
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{route('categories.edit', $category->id)}}"
                                                class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>

                                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this category?')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                                    <i class="bi bi-trash3-fill"></i>
                                                </button>
                                        </div>
                                        </form>
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-5">
                                        <h6 class="text-secondary">
                                            No categories found
                                        </h6>
                                        <p class="text-muted mb-0">
                                            Start by adding your first category.
                                        </p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>

            </div>
        </div>

    </div>

</body>

</html>