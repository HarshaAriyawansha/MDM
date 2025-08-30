@extends('layouts.app')

@section('content')
<div class="container">
    <div class ="row">
        <div class ="col-md-12">
            

            <form method="GET" action="{{ route('items.index') }}" class="card shadow-sm p-4 mb-3 border-0">
    <h5 class="mb-2 fw-bold text-primary">
        <i class="bi bi-funnel"></i> Filter Items
    </h5>

    <div class="row g-3 align-items-end">
        <!-- Search -->
        <div class="col-md-3">
            <label for="search" class="form-label fw-semibold">Search</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-search"></i></span>
                <input type="text" name="search" id="search" class="form-control"
                       value="{{ request('search') }}" placeholder="Search by code or name">
            </div>
        </div>

        <!-- Status -->
        <div class="col-md-2">
            <label for="status" class="form-label fw-semibold">Status</label>
            <select name="status" id="status" class="form-select">
                <option value="">-- Status --</option>
                <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <!-- Brand -->
        <div class="col-md-2">
            <label for="brand_id" class="form-label fw-semibold">Brand</label>
            <select name="brand_id" id="brand_id" class="form-select">
                <option value="">-- Brand --</option>
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}" {{ request('brand_id') == $brand->id ? 'selected' : '' }}>
                        {{ $brand->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Category -->
        <div class="col-md-2">
            <label for="category_id" class="form-label fw-semibold">Category</label>
            <select name="category_id" id="category_id" class="form-select">
                <option value="">-- Category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Buttons -->
        <div class="col-md-3 d-flex gap-2">
            <button type="submit" class="btn btn-primary d-flex align-items-center px-4">
                <i class="bi bi-funnel-fill me-2"></i> Apply
            </button>
            <a href="{{ route('items.index') }}" class="btn btn-outline-secondary d-flex align-items-center px-4">
                <i class="bi bi-arrow-counterclockwise me-2"></i> Reset
            </a>
        </div>
    </div>
</form>

<div class ="card-header mb-4">
                
            
<h4>Items
                    <a href="{{ route('items.create') }}" class="btn btn-primary float-end"> Add Item</a>
                    
                </h4></div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Brand</th>
                <th>Category</th>
                <th>Status</th>
                <th>Attachment</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($items as $item)
                <tr>
                    <td>{{ $item->code }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->brand->name }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        @if($item->attachment)
                            <a href="{{ asset('uploads/items/'.$item->attachment) }}" target="_blank">View</a>
                        @endif
                    </td>
                    <td>
                        @can('update item')
                        <a href="{{ route('items.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        @endcan
                         @can('delete item')
                        <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Do You Want Delete this item?')" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                        @endcan
                    </td>
                </tr>
                @empty
                        <tr>
                            <td colspan="6" class="text-center">No brands found</td>
                        </tr>
                        @endforelse
        </tbody>
    </table>

    
</div>
</div>
    </div>
    <div class="d-flex flex-column align-items-start mt-4">
    <div class="mb-2">
        Showing {{ $items->firstItem() }} to {{ $items->lastItem() }} of {{ $items->total() }} results
    </div>
    <div>
        {{ $items->links('vendor.pagination.simple-bootstrap-5') }}
    </div>
</div>
    @can('export category')

                    <a href="{{ route('generate-item-pdf') }}" class="btn btn-primary">Export PDF</a>
                    <a href="{{ route('export.item.excel') }}" class="btn btn-success">Export Excel</a>
                    <a href="{{ route('export.item.csv') }}" class="btn btn-primary">Export CSV</a>
                    @endcan
</div>
@endsection
