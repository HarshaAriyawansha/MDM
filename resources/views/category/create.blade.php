@extends('layouts.app')

@section('content')
<div class="container">
    <div class ="row">
        <div class ="col-md-12">
             @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            <div class ="card-header mb-4">
                <h4>Create Category
                    <a href="{{ url('categories')}}" class="btn btn-danger float-end"> Back</a>
                </h4>
            </div>

            <div class="card-body">
                <form action="{{ url('categories')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="">Category Code</label>
                        <input type="text" name="code" id="code" class ="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Category Name</label>
                        <input type="text" name="name" id="name" class ="form-control">
                    </div>

                    <div class = "mb-3">
                        <button type="submit" class="btn btn-primary"> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
