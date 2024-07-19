

@extends('layout')

@section('content')
    <div class="container">
        <h1 style="text-align: center ; margin-bottom: 100px">Product Details</h1>

        @if ($blogs)
            <table class="table">
                <tbody>
                <tr>
                    <th>title:</th>
                    <td>{{ $blogs->title }}</td>
                </tr>

                <tr>
                    <th>description:</th>
                    <td>{{ $blogs->description }}</td>
                </tr>
                <tr>
                    <th>Image:</th>
                    <td>
                        @if ($blogs->image)
                            <img src="{{ asset('storage/images/' . $blogs->image) }}" alt="{{ $blogs->title }}" class="blog-image">
                        @else
                            <p>No image available</p>
                        @endif
                    </td>
                </tr>
                </tbody>
            </table>


        @else
            <p>blog not found.</p>
        @endif
    </div>





    <style>

        /* في ملف CSS مثل styles.css */

        .table {
            width: 100%;
            max-width: 600px;
            margin: auto;
            border-collapse: collapse;
        }

        .table th, .table td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        .product-image {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
        }


    </style>
@endsection
