@extends('layouts.app')
@section('content')
<div class="container">
    <div class ="row">
        <div class ="col-md-12">
            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

<form method="GET" action="{{ route('brands.index') }}" class="card shadow-sm p-4 mb-3 border-0">
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
            <a href="{{ route('brands.index') }}" class="btn btn-outline-secondary d-flex align-items-center px-4">
                <i class="bi bi-arrow-counterclockwise me-2"></i> Reset
            </a>
        </div>
    </div>
</form>


<h4>Brand
    @can('create brand')
                    <a href="{{ route('brands.create') }}" class="btn btn-primary float-end mb-4"> Add Brand</a>
                    @endcan
</h4>
            
            <div class ="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th >ID</th>
                            <th >Code</th>
                            <th >Name</th>
                            <th >Status</th>
                            <th >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($brands as $brand)
    <tr>
        <td>{{ $brand->id }}</td>
        <td>{{ $brand->code }}</td>
        <td>{{ $brand->name }}</td>
        <td>{{ ucfirst($brand->status) }}
                            <td> 
                                @can('update brand')
                                <a href="{{ url('brands/'.$brand->id.'/edit') }}" class="btn btn-primary"> Edit</a>
                                @endcan
&nbsp;&nbsp;
                                 @can('delete brand')
                                <a href="{{ url('brands/'.$brand->id.'/delete') }}" class="btn btn-danger"> Delete</a>
                                @endcan
                            </td>
                        </tr>
                        

                         @empty
                        <tr>
                            <td colspan="5" class="text-center">No brands found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <div class="d-flex flex-column align-items-start mt-4">
    <div class="mb-2">
        Showing {{ $brands->firstItem() }} to {{ $brands->lastItem() }} of {{ $brands->total() }} results
    </div>
    <div>
        {{ $brands->links('vendor.pagination.simple-bootstrap-5') }}
    </div>
</div>
                
                     @can('export brand')
                    <a href="{{ route('generate-brand-pdf') }}" class="btn btn-primary">Export PDF</a>
                    <a href="{{ route('export.brand.excel') }}" class="btn btn-success">Export Excel</a>
                    <a href="{{ route('export.brand.csv') }}" class="btn btn-primary">Export CSV</a>
@endcan

                    
</div>
@endsection
