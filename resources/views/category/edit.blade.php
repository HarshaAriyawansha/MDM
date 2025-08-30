@extends('layouts.app')

@section('content')
<div class="container">
    <div class ="row">
        <div class ="col-md-12">
            <div class ="card-header mb-4">
                <h4>Edit Category
                    <a href="{{ url('categories')}}" class="btn btn-danger float-end"> Back</a>
                </h4>
            </div>

            <div class="card-body">
                <form action="{{ url('categories/'.$category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="">Category Code</label>
                        <input type="text" name="code" value="{{ $category->code }}" class ="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Category Name</label>
                        <input type="text" name="name" value="{{ $category->name }}" class ="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Category Status</label>
                        <select name="status" class="form-control">
                                <option value="Active" {{ $category->status == 'Active' ? 'selected' : '' }}>Active</option>
                                <option value="Inactive" {{ $category->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>

                    </div>
                    <div class = "mb-3">
                        <button type="submit" class="btn btn-primary"> Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
