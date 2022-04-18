@extends('frontend.layouts.main')

@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url('frontend/images/bg_1.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Trang chủ</a></span>/<span>Chính sách bảo mật</span></p>
                    <h1 class="mb-0 bread">PRIVACY POLICY</h1>
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
                            <h2 class="mb-4">Chính sách bảo mật</h2>
                        </div>
                    </div>
                    <div class="pb-md-5"  style="background-color: white;">
                        <p style="justify-content: flex-start">{!! $item->privacy_policy !!}</p>
                        {{--<p><a href="#" class="btn btn-primary justify-content-center">Mua hàng ngay</a></p>--}}
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

    <section class="ftco-section testimony-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <span class="subheading">Đánh giá</span>
                    <h2 class="mb-4">Khách hàng nói gì</h2>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit, odit eius voluptatibus reiciendis nemo libero? Sint architecto aliquam omnis ut, deserunt, maiores repellat sapiente laboriosam laborum dignissimos voluptatem. Ratione, illo?</p>
                </div>
            </div>
            <!-- <div class="row ftco-animate"> -->
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel">

                    <div class="item">
                        <div class="testimony-wrap p-4 pb-5">
                            <div class="user-img mb-5" style="background-image: url(frontend/images/wolf.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                            </div>
                            <div class="text text-center">
                                <p class="mb-5 pl-4 line">Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi laborum iste at magni officiis a ab delectus nemo quae doloribus velit, sint repudiandae porro accusamus praesentium debitis tempora, aliquam architecto.</p>
                                <p class="name">THL</p>
                                <span class="position">Sinh viên</span>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="testimony-wrap p-4 pb-5">
                            <div class="user-img mb-5" style="background-image: url(frontend/images/wolf.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                            </div>
                            <div class="text text-center">
                                <p class="mb-5 pl-4 line">Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi laborum iste at magni officiis a ab delectus nemo quae doloribus velit, sint repudiandae porro accusamus praesentium debitis tempora, aliquam architecto.</p>
                                <p class="name">THL</p>
                                <span class="position">Sinh viên</span>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="testimony-wrap p-4 pb-5">
                            <div class="user-img mb-5" style="background-image: url(frontend/images/wolf.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                            </div>
                            <div class="text text-center">
                                <p class="mb-5 pl-4 line">Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi laborum iste at magni officiis a ab delectus nemo quae doloribus velit, sint repudiandae porro accusamus praesentium debitis tempora, aliquam architecto.</p>
                                <p class="name">THL</p>
                                <span class="position">Sinh viên</span>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="testimony-wrap p-4 pb-5">
                            <div class="user-img mb-5" style="background-image: url(frontend/images/wolf.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                            </div>
                            <div class="text text-center">
                                <p class="mb-5 pl-4 line">Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi laborum iste at magni officiis a ab delectus nemo quae doloribus velit, sint repudiandae porro accusamus praesentium debitis tempora, aliquam architecto.</p>
                                <p class="name">THL</p>
                                <span class="position">Sinh viên</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
