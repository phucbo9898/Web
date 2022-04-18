@extends('frontend.layouts.main')

@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url('frontend/images/bg_1.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Trang chủ</a></span>
                        <span>/ Giỏ hàng</span></p>
                </div>
            </div>
        </div>
    </div>
    <div id="my-cart">
        @include('frontend.components.cart');
    </div>
@endsection


