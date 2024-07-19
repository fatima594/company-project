@extends('layout')

@section('content')

    <div class="container">
        <h1>Edit blog</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- هنا نضع الطريقة الصحيحة -->

            <div class="form-group">
                <label for="title">title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $blog->title) }}" required>
            </div>


            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description">{{ old('description', $blog->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control" id="image" name="image">
                @if ($blog->image)
                    <p>Current Image:</p>
                    <img src="{{ asset('storage/images/' . $blog->image) }}" alt="blog Image" style="max-width: 170px;">
                @else
                    <p>No image available</p>
                @endif
            </div>

            <button style="margin-top: 20px" type="submit" class="btn btn-primary">Update blog</button>
        </form>
    </div>

@endsection
