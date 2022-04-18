@extends('frontend.layouts.main')

@section('content')

    <div class="hero-wrap hero-bread" style="background-image: url('/frontend/images/bg_1.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Trang chủ</a></span> <span>Các loại mặt hàng</span></p>
                    <h1 class="mb-0 bread">PRODUCTS</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-10 mb-5 text-center">
                    <ul class="product-category">
                        @foreach($menu_brand as $brand)
                            <li style="margin: 0px 20px 0px 20px;border: 1px solid #eeeeee;"><a href="{{route('shop.brand', ['slug'=> $brand->slug]) }}"><img src="{{ asset($brand->image) }}" alt="" width="80px"></a></li>
                        @endforeach

                        {{--<li style="margin: 0px 20px 0px 20px;border: 1px solid #eee;"><a href=""><img src="frontend/images/bactom_logo.png" alt="" width="100px"></a></li>
                        <li style="margin: 0px 20px 0px 20px;border: 1px solid #eee;"><a href=""><img src="frontend/images/logo_dalatgap.png" alt="" width="80px"></a></li>
                        <li style="margin: 0px 20px 0px 20px;border: 1px solid #eee;"><a href=""><img src="frontend/images/organica_logo.png" alt="" width="100px"></a></li>
                        <li style="margin: 0px 20px 0px 20px;border: 1px solid #eee;"><a href=""><img src="frontend/images/rau-cuoi-viet-nhat-logo.jpg" alt="" width="100px"></a></li>
                        <li style="margin: 0px 20px 0px 20px;border: 1px solid #eee;"><a href=""><img src="frontend/images/ravi.png" alt="" width="75px"></a></li>--}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Sắp xếp</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="row">
                <div id="left-content" class="col-sm-3">
                    <div id="title" class="col-sm-12" style="padding: 0px">
                        <h3><a data-toggle="collapse" data-target="#demo" style="color: black">Danh Mục<ion-icon name="chevron-down-outline" size="small"></ion-icon></a></h3>
                    </div>
                    <div class="col-sm-12">
                        <ul id="category" class="" style="padding:0px">
                            @foreach($menu as $item)
                                @if($item->parent_id == 0 && $item->type == 1)
                                    <li class="treeview">
                                        <a href="{{ route('shop.category', ['slug' => $item->slug]) }}"></i> {{ $item->name }}</a>
                                        @foreach($menu as $child)
                                            @if($child->parent_id == $item->id)
                                                <ul id="demo" class="collapse">
                                                    <li><a href="{{ route('shop.category', ['slug' => $child->slug]) }}" style="color: black">{{$child->name}}</a></li>
                                                </ul>
                                            @endif
                                        @endforeach
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div id="title" class="col-sm-12">
                        <h3>Tìm Kiếm</h3>
                    </div>
{{--                    <form action="{{ route('shop.search') }}" method="GET" class="search-form-cat">--}}
{{--                        <div class="active-purple-3 active-purple-4 mb-4">--}}
{{--                            <input value="" class="form-control" type="text" name="tu-khoa" placeholder="Search" aria-label="Search" type="submit">--}}
{{--                        </div>--}}
{{--                    </form>--}}

                    <form action="{{ route('shop.search') }}" method="GET" class="search-form">
                        <div class="form-group">
                            <input value="{{ isset($keyword) ? $keyword : '' }}" name="tu-khoa" type="text" class="form-control" placeholder="Tìm kiếm ..." aria-label="Search">
                            <i class="icon ion-ios-search" type="submit"></i>
                        </div>
                    </form>



                    <div style="float: left;" id="title" class="col-sm-12">
                        <h3>Khuyến mãi</h3>
                    </div>
                </div>

                <div class="col-md-9" style="display: flex; flex-wrap: wrap">
                    <div class="col-md-12">
                        <h3>
                            <span class="cat-name">Từ khóa tìm kiếm "{{ $keyword }}" ({{ $totalResult }})</span>
                        </h3>
                    </div>
                    @foreach($products as $product)
                        <div class="col-md-6 col-lg-3 ftco-animate">
                            <div class="product">
                                <a href="{{ route('shop.productDetail',['slug' => $product->slug]) }}" class="img-prod"><img class="img-fluid" src="{{ asset($product->image)}}" alt="Colorlib Template">
                                    <div class="overlay"></div>
                                </a>
                                <div class="text py-3 pb-4 px-3 text-center">
                                    <h3><a href="{{ route('shop.productDetail',['slug' => $product->slug]) }}">{{ $product->name }}</a></h3>
                                    <div class="d-flex">
                                        <div class="pricing">
                                            <p class="price"><span class="mr-2 price-dc">{{ number_format($product->price) }} đ</span><span>{{ number_format($product->sale) }} đ</span></p>
                                        </div>
                                    </div>
                                    <div class="bottom-area d-flex px-3">
                                        <div class="m-auto d-flex">
                                            <a href="{{ route('shop.productDetail',['slug' => $product->slug]) }}" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                                <ion-icon name="information-outline" size="small"></ion-icon>
                                            </a>
                                            <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                                <span><i class="ion-ios-cart"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
            {{ $products->links() }}
        </div>
    </section>


@endsection
