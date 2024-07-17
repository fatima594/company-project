@extends('master')

@section('content')

    <!-- contact section start -->


    <form action="{{ route('contact.store') }}" method="POST">
        @csrf
    <div class="contact_section layout_padding">
        <div class="container">
            <h1 class="check_text">Check ability to connect our services in your area</h1>
            <div class="contact_section2">
                <div class="addres_main">
                    <div class="input_bg">
                        <h3 class="fact_text">It is a long established fact that a reader will be distracted</h3>
                        <input type="text" class="address_text" placeholder="Enter your name" name="name">
                        <input type="text" class="address_text" placeholder="Enter your address" name="email">
                        <textarea type="text" class="address_text" placeholder="Enter your message"  name="message"  required>{{ old('message') }}</textarea>
                        <button type="submit" class="get_bt">GET STARTED</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif




    <!-- contact section end -->
@endsection

