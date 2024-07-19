
@extends('layout')

@section('content')


    <div class="container">
        <h1 class="mt-5">blogs</h1>

        <a href="{{ route('blogs.create') }}" class="btn btn-primary mb-3">Add New blog</a>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>title</th>
                <th>description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($blogs as $blog)
                <tr>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->description }}</td>
                    <td>
                        @if ($blog->image)
                            <img src="{{ asset('storage/images/' . $blog->image) }}" alt="{{ $blog->title }}" style="max-width: 25px;">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-primary btn-sm">View</a>
                        <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>






    <style>


        .container {
            margin-top: 20px;
        }

        h1 {
            margin-bottom: 20px;
        }

        .btn-group {
            margin-bottom: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        table th {
            background-color: #f2f2f2;
        }

        table td {
            background-color: #ffffff;
        }

        table img {
            max-width: 100px;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        .btn-primary, .btn-warning, .btn-danger {
            padding: 5px 10px;
            font-size: 14px;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: #ffffff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #212529;
        }

        .btn-warning:hover {
            background-color: #e0a800;
            border-color: #d39e00;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            color: #ffffff;
        }






    </style>
@endsection



