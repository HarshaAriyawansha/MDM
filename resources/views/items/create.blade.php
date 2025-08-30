@extends('layouts.app')

@section('content')
<div class="container">
    <div class ="row">
        <div class ="col-md-12">
             @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            <div class ="card-header mb-4">
                <h4>Create Brand
                    <a href="{{ url('items')}}" class="btn btn-danger float-end"> Back</a>
                </h4>
            </div>

            <div class="card-body">
                <form action="{{ url('items')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="">Brand Id</label>
                        <input type="text" name="brand_id" id="brand_id" class ="form-control">
                        @error('brand_id')
            <span class="text-danger small">{{ $message }}</span>
        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Category Id</label>
                        <input type="text" name="category_id" id="category_id" class ="form-control">
                        @error('category_id')
            <span class="text-danger small">{{ $message }}</span>
        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Item Code </label>
                        <input type="text" name="code" id="code" class ="form-control">
                        @error('code')
            <span class="text-danger small">{{ $message }}</span>
        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Item Name</label>
                        <input type="text" name="name" id="name" class ="form-control">
                        @error('name')
            <span class="text-danger small">{{ $message }}</span>
        @enderror
                    </div>
                    <div class="mb-3">
                        <label for=""> Attachment </label>
                        <input type="file" name="attachment" id="attachment" class ="form-control">
                        @error('attachment')
            <span class="text-danger small">{{ $message }}</span>
        @enderror
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
