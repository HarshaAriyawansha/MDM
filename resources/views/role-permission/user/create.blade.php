@extends('layouts.app')

@section('content')
<div class="container">
    <div class ="row">
        <div class ="col-md-12">
            <div class ="card-header">
                <h4>Create User
                    <a href="{{ url('users')}}" class="btn btn-danger float-end"> Back</a>
                </h4>
            </div>

            <div class="card-body">
                <form action="{{ url('users')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="">Name</label>
                        <input type="text" name="name" id="name" class ="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Email</label>
                        <input type="email" name="email" id="email" class ="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Password</label>
                        <input type="password" name="password" id="password" class ="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Roles</label>
                        <select name="roles[]" class="form-control">
                            <option value="">Select Role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role }}">{{ $role }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary"> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
