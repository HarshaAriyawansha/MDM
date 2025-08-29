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
                    <a href="{{ route('roles.create') }}" class="btn btn-primary float-end"> Add Role</a>
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
                        @foreach($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <a href="{{ url('roles/'.$role->id.'/give-permissions') }}"><i class="fa-solid fa-pen-to-square"></i> Add / Edit Role Permission </a>
                                <a href="{{ url('roles/'.$role->id.'/edit') }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="{{ url('roles/'.$role->id.'/delete') }}"><i class="fa-solid fa-trash"></i></a>
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
