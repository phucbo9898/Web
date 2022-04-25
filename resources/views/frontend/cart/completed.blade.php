@extends('frontend.layouts.main')

@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url('/frontend/images/bg_1.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="/">Trang chủ</a></span>
                        <span>/ Giỏ hàng</span></p>
                </div>
            </div>
        </div>
    </div>
    <div id="my-cart">
        <style>
            .buyother {
                display: block;
                overflow: hidden;
                background: #fff;
                line-height: 40px;
                text-align: center;
                margin: 15px auto;
                width: 300px;
                font-size: 14px;
                color: #0000FF;
                font-weight: 700;
                text-transform: uppercase;
                border: 2px solid #0000FF;
                border-radius: 5px;
            }
        </style><br>
        <h3 class="text-center"><i class="fa fa-opencart"></i>Cảm ơn bạn đã đặt hàng</h3>
        <a href="{{ route('shop.index') }}" class="buyother"><i class="fa fa-chevron-left"></i> Về trang chủ</a>
    </div>
@endsection


