@extends('layouts.app')

@section('content')
<div class="container">
    <div class ="row">
        <div class ="col-md-12">
            <div class ="card-header mb-4">
                <h4>Edit Item
                    <a href="{{ url('items')}}" class="btn btn-danger float-end"> Back</a>
                </h4>
            </div>

            <div class="card-body">
                <form action="{{ url('items/'.$item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="brand_id">Brand</label>
                        <select name="brand_id" class="form-control">
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}" {{ $brand->id == $item->brand_id ? 'selected' : '' }}>
                                {{ $brand->name }}
                            </option>
                        @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="category_id">Category</label>
                        <select name="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $item->category_id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="">Item Code </label>
                        <input type="text" name="code" id="code" value="{{ $item->code }}" class ="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Item Name</label>
                        <input type="text" name="name" id="name" value="{{ $item->name }}" class ="form-control">
                    </div>
                    <div class="mb-3">
                            <label for="attachment">Attachment</label>
                            <input type="file" name="attachment" class="form-control">

                            @if($item->attachment)
                        <p class="mt-2">Current File: 
                        <a href="{{ asset('uploads/items/'.$item->attachment) }}" target="_blank">{{ $item->attachment }}</a>
                        </p>
                        @endif
                    </div>

                   
                    <div class="mb-3">
                        <label for="">Item Status</label>
                        <select name="status" class="form-control">
                                <option value="Active" {{ $item->status == 'Active' ? 'selected' : '' }}>Active</option>
                                <option value="Inactive" {{ $item->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
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
