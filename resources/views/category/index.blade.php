@extends('layouts.app')

@section('content')
<div class="container">
    

<form method="GET" action="{{ route('categories.index') }}" class="card shadow-sm p-4 mb-2 border-0">
    {{-- Change brands.index → categories.index in category page --}}

    <h5 class="mb-2 fw-bold text-primary">
        <i class="bi bi-funnel"></i> Filter Options
    </h5>

    <div class="row g-3 align-items-end">
        <!-- Search -->
        <div class="col-md-4">
            <label for="search" class="form-label fw-semibold">Search</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-search"></i></span>
                <input type="text" name="search" id="search" 
                       class="form-control" 
                       value="{{ request('search') }}" 
                       placeholder="Search by name or code">
            </div>
        </div>

        <!-- Status -->
        <div class="col-md-3">
            <label for="status" class="form-label fw-semibold">Status</label>
            <select name="status" id="status" class="form-select">
                <option value="">-- All Status --</option>
                <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <!-- Buttons -->
        <div class="col-md-5 d-flex gap-2">
            <button type="submit" class="btn btn-primary d-flex align-items-center px-4">
                <i class="bi bi-funnel-fill me-2"></i> Apply
            </button>
            <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary d-flex align-items-center px-4">
                <i class="bi bi-arrow-counterclockwise me-2"></i> Reset
            </a>
        </div>
    </div>
</form>
<h4>Category
    @can('create category')
        <a href="{{ route('categories.create') }}" class="btn btn-primary float-end mb-4">Add Category</a>
        
@endcan
    </h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th class="w-25">Code</th>
                <th class="w-25">Name</th>
                <th class="w-25">Status</th>
                <th class="w-25">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $cat)
                <tr>
                    <td>{{ $cat->code }}</td>
                    <td>{{ $cat->name }}</td>
                    <td>{{ $cat->status }}</td>
                    <td>
                        @can('update category')
                        <a href="{{ route('categories.edit', $cat->id) }}" class="btn btn-sm btn-primary">Edit</a>
@endcan
                        <!-- Delete with confirm -->
                         @can('delete category')
                        <form action="{{ route('categories.destroy', $cat->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure to delete this category?')">
                                Delete
                            </button>
                        </form>
                        @endcan
                    </td>
                </tr>@empty
                        <tr>
                            <td colspan="6" class="text-center">No brands found</td>
                        </tr>
                        @endforelse
        </tbody>
    </table>

    <div class="d-flex flex-column align-items-start mt-4">
    <div class="mb-2">
        Showing {{ $categories->firstItem() }} to {{ $categories->lastItem() }} of {{ $categories->total() }} results
    </div>
    <div>
        {{ $categories->links('vendor.pagination.simple-bootstrap-5') }}
    </div>
</div>
@can('export category')
    <a href="{{ route('generate-category-pdf') }}" class="btn btn-primary">Export PDF</a>
                    <a href="{{ route('export.category.excel') }}" class="btn btn-success">Export Excel</a>
                    <a href="{{ route('export.category.csv') }}" class="btn btn-primary">Export CSV</a>
                    @endcan
</div>
@endsection
