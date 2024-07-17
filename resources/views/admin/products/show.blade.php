<!-- show.blade.php -->

@extends('layout')

@section('content')
    <div class="container">
        <h1 style="text-align: center ; margin-bottom: 100px">Product Details</h1>

        @if ($products)
            <table class="table">
                <tbody>
                <tr>
                    <th>Name:</th>
                    <td>{{ $products->name }}</td>
                </tr>
                <tr>
                    <th>Price:</th>
                    <td>${{ $products->price }}</td>
                </tr>
                <tr>
                    <th>Description:</th>
                    <td>{{ $products->description }}</td>
                </tr>
                <tr>
                    <th>Image:</th>
                    <td>
                        @if ($products->image)
                            <img src="{{ asset('storage/' . $products->image) }}" alt="{{ $products->name }}" class="product-image">
                        @else
                            <p>No image available</p>
                        @endif
                    </td>
                </tr>
                </tbody>
            </table>


        @else
            <p>Product not found.</p>
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
