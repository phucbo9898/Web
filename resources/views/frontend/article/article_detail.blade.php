@extends('frontend.layouts.main')

@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url('/frontend/images/bg_1.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Trang chủ /</a></span><span>Tin tức</span></p>
                    <h1 class="mb-0 bread">Article</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 ftco-animate">
                    <div class="meta mb-3">
                        <p style="font-size: 14px">Cập nhật ngày {{ date('d/m/Y', strtotime($article->updated_at)) }} bởi <strong>{{@$article->user->name}}</strong></p>

                        {{--<div><a href="#" class="meta-chat"><span class="icon-chat"></span>10</a></div>--}}
                    </div>
                    <h2 class="mb-3">{{ $article->title }}</h2>
                    <p>{!!  $article->description !!}</p>
                </div> <!-- .col-md-8 -->
                <div class="col-lg-4 sidebar ftco-animate">
                    <div class="sidebar-box">
                        <form action="#" class="search-form">
                            <div class="form-group">
                                <span class="icon ion-ios-search"></span>
                                <input type="text" class="form-control" placeholder="Tìm kiếm ...">
                            </div>
                        </form>
                    </div>
                    <div class="sidebar-box ftco-animate">
                        <h3 class="heading">Bài viết về</h3>
                        <ul class="categories">
                            <li><a href="#">Rau củ <span>(20)</span></a></li>
                            <li><a href="#">Hoa quả <span>(22)</span></a></li>
                            <li><a href="#">Nước trái cây <span>(20)</span></a></li>
                            <li><a href="#">Các loại hạt <span>(20)</span></a></li>
                        </ul>
                    </div>


                </div>
            </div>
    </section> <!-- .section -->


@endsection
