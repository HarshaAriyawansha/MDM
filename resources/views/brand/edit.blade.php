@extends('layouts.app')

@section('content')
<div class="container">
    <div class ="row">
        <div class ="col-md-12">
            <div class ="card-header mb-4">
                <h4>Edit Brand
                    <a href="{{ url('brands')}}" class="btn btn-danger float-end"> Back</a>
                </h4>
            </div>

            <div class="card-body">
                <form action="{{ url('brands/'.$brand->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="">Brand Code</label>
                        <input type="text" name="code" value="{{ $brand->code }}" class ="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Brand Name</label>
                        <input type="text" name="name" value="{{ $brand->name }}" class ="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Brand Status</label>
                        <select name="status" class="form-control">
                                <option value="Active" {{ $brand->status == 'Active' ? 'selected' : '' }}>Active</option>
                                <option value="Inactive" {{ $brand->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
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
