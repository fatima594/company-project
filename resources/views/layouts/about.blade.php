@extends('master')

@section('content')

    <!-- about section start -->
    <div class="about_section layout_padding">
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <div class="image_2"><img src="{{('images/mkp5.jpg')}}"></div>
                </div>
                <div class="col-md-6">
                    <h1 class="live_text">Live Sport and TV-shows for best
                        friends
                    </h1>
                    <p class="lorem_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,</p>
                    <div class="online_bt_main">
                        <div class="online_bt"><a href="#">4K Ultra HD Quality</a></div>
                        <div class="online_bt1"><a href="#">200+ Online Channels</a></div>
                        <div class="read_bt1"><a href="{{ url('readabout') }}">Read More</a></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- about section end -->

@endsection
