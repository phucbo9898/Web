@extends('frontend.layouts.main')

@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url('frontend/images/bg_1.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Trang chủ</a></span> <span>Về chúng tôt</span></p>
                    <h1 class="mb-0 bread">About us</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-no-pb ftco-no-pt">
        <div class="container">
            <div class="row">
                @foreach($settings as $item)
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <div class="heading-section-bold mb-4 mt-md-5">
                        <div class="ml-md-0 text-center">
                            <h2 class="mb-4">Chào mừng đến với website của Fresh vegetables</h2>
                        </div>
                    </div>
                    <div class="pb-md-5" style="background-color: white;">
                        <p class="">{!! $item->introduce !!}</p>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <br>

    <section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
        <div class="container">

        </div>
    </section>

    <section class="ftco-section img" style="background-image: url(frontend/images/bg_3.jpg);">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate">
                    <h2 class="mb-4">Luôn luôn đem tới cho các bạn sản phẩm có chất lượng tốt nhất</h2>
                </div>
            </div>
        </div>
    </section>

@endsection
