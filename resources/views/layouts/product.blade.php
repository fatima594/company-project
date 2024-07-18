@extends('master')

@section('content')

    <html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <title>Document</title>
    </head>
    <body>
    <!-- more products -->

    <div class="more-products mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Related</span> Products</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($products as $product)
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="single-product.html"><img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="max-width: 100px; max-height: 100px;"></a>
                        </div>
                        <br>
                        <h3>{{ $product->name }}</h3>
                        <p class="product-price"><span>$</span>{{ $product->price }} </p>

                        <p class="product-price"><span></span>{{ $product->description }} </p>

                        <a href="cart.html" class="cart-btn alert-warning"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                    </div>
                </div>
                @endforeach

            </div>
        </div>

    </div>
    </body>
    </html>



@endsection
