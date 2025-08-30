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
                <h4>Role
                    @can('create role')
                    <a href="{{ route('roles.create') }}" class="btn btn-primary float-end mb-4"> Add Role</a>
                    @endcan
                </h4>
            </div>
            <div class ="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="w-30">ID</th>
                            <th class="w-30">Name</th>
                            <th class="w-50">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                        <tr>
                            <td>{{ $role->id }}&nbsp;&nbsp;</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                @can('add permission')
                                <button type="button" class="btn btn-warning">
                                <a href="{{ url('roles/'.$role->id.'/give-permissions') }}"> Add / Edit Role Permission </a>
                                </button>
                                @endcan
                                &nbsp;&nbsp;
                                @can('update role')
                                <a href="{{ url('roles/'.$role->id.'/edit') }}" class="btn btn-primary">Edit</a>
                                @endcan
                                &nbsp;&nbsp;
                                @can('delete role')
                                <a href="{{ url('roles/'.$role->id.'/delete') }}" class="btn btn-danger">Delete</a>
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
        Showing {{ $roles->firstItem() }} to {{ $roles->lastItem() }} of {{ $roles->total() }} results
    </div>
    <div>
        {{ $roles->links('vendor.pagination.simple-bootstrap-5') }}
    </div>
</div>
</div>
@endsection
