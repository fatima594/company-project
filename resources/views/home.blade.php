@extends('master')
@section('content')
    <!-- about section start -->
    @include('layouts.about')
    <!-- about section end -->
{{--    <!-- product section start -->--}}
    
    <!-- contact section end -->
    <!-- client section start -->
    <div class="client_section layout_padding">
        <div class="container">
            <h1 class="client_taital">What our clients say</h1>
            <div class="client_section2 layout_padding">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="client_image"><img src="images/img-3.png"></div>
                    </div>
                    <div class="col-sm-8">
                        <div class="miller_text">Miller<span class="quote_icon"><img src="images/quote-icon.png"></span></div>
                        <p class="ipsum_text">ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id e</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- client section end -->

@endsection
