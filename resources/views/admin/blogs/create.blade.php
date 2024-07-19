
@extends('layout')

@section('content')
    <h1 style="text-align: center ; padding-top: 100px">Add Product</h1>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">title:</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
            @error('title')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="description">description:</label>
            <textarea id="description" name="description">{{ old('description') }}</textarea>
            @error('description')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="image">Image URL:</label>
            <input type="file" id="image" name="image" value="{{ old('image') }}">
            @error('image')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Add blog</button>


        <a href="{{ route('blogs.index') }}">Back to blogs List</a>

    </form>





    <style>
        form {
            max-width: 600px;
            margin: auto;
        }
        div {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        button {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
    </style>

@endsection

