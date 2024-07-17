@extends('layout')

@section('content')

    <div class="container">
        <h1>Edit Product</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.update', $products->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- هنا نضع الطريقة الصحيحة -->

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $products->name) }}" required>
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $products->price) }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description">{{ old('description', $products->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control" id="image" name="image">
                @if ($products->image)
                    <p>Current Image:</p>
                    <img src="{{ asset('storage/' . $products->image) }}" alt="Product Image" style="max-width: 170px;">
                @else
                    <p>No image available</p>
                @endif
            </div>

            <button style="margin-top: 20px" type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>

@endsection
