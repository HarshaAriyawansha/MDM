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
                <h4>User
                    <a href="{{ route('users.create') }}" class="btn btn-primary float-end"> Add User</a>
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
                                <a href="{{ url('users/'.$user->id.'/edit') }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="{{ url('users/'.$user->id.'/delete') }}"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection
