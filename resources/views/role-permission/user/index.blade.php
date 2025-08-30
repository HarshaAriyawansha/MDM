@extends('layouts.app')

@section('content')
@include('role-permission.nav-links')
<div class="container">
    <div class ="row">
        <div class ="col-md-12">
            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <div class ="card-header mt-3 mb-4">
                <h4>User
                    @can('create user')
                    <a href="{{ route('users.create') }}" class="btn btn-primary float-end"> Add User</a>
                    @endcan
                </h4>
            </div>
            <div class ="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if (!empty($user->getRoleNames()))
                                @foreach ($user->getRoleNames() as $rolename)
                                <label class="badge bg-primary mx-1">{{ $rolename }}</label>
                                @endforeach
                                @endif
                            </td>
                            <td>
                                @can('update user')
                                <a href="{{ url('users/'.$user->id.'/edit') }}" class="btn btn-primary">Edit</a>
                                @endcan
                                &nbsp;&nbsp;
                                @can('delete user')
                                <a href="{{ url('users/'.$user->id.'/delete') }}" class="btn btn-danger">Delete</a>
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
        Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} results
    </div>
    <div>
        {{ $users->links('vendor.pagination.simple-bootstrap-5') }}
    </div>
</div>


</div>
@endsection
