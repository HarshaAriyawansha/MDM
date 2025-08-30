@extends('layouts.app')
@section('content')

@include('role-permission.nav-links')
<div class="container">
    <div class ="row">
        <div class ="col-md-12">
            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <div class ="card-header mt-3">
                <h4>Permission
                    @can('create permission')
                    <a href="{{ route('permissions.create') }}" class="btn btn-primary float-end mb-4"> Add Permission</a>
                    @endcan
                </h4>
            </div>
            <div class ="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($permissions as $permission)
                        <tr>
                            <td>{{ $permission->id }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>
                                @can('update permission')
                                <a href="{{ url('permissions/'.$permission->id.'/edit') }}" class="btn btn-sm btn-primary">Edit</a>
                                @endcan
&nbsp;&nbsp;&nbsp;
                                @can('delete permission')
                                <a href="{{ url('permissions/'.$permission->id.'/delete') }}" class="btn btn-sm btn-danger">Delete</a>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>

        </div>
    </div>
    <div class="d-flex flex-column align-items-start mt-4">
    <div class="mb-2">
        Showing {{ $permissions->firstItem() }} to {{ $permissions->lastItem() }} of {{ $permissions->total() }} results
    </div>
    <div>
        {{ $permissions->links('vendor.pagination.simple-bootstrap-5') }}
    </div>
</div>
</div>
@endsection
