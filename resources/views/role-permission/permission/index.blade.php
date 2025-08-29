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
                    <a href="{{ route('permissions.create') }}" class="btn btn-primary float-end"> Add Permission</a>
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
                                <a href="{{ url('permissions/'.$permission->id.'/edit') }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="{{ url('permissions/'.$permission->id.'/delete') }}"><i class="fa-solid fa-trash"></i></a>
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
