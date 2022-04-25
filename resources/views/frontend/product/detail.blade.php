@extends('frontend.layouts.main')

@section('content')
{{--    <div class="hero-wrap hero-bread" style="background-image: url('/frontend/images/bg_1.jpg');">--}}
{{--        <div class="container">--}}
{{--            <div class="row no-gutters slider-text align-items-center justify-content-center">--}}
{{--                <div class="col-md-9 ftco-animate text-center">--}}
{{--                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Trang chủ</a></span> <span class="mr-2"><a href="index.html">Sản phẩm</a></span> <span>Chi tiết sản phẩm</span></p>--}}
{{--                    <h1 class="mb-0 bread">Product Single</h1>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 ftco-animate">
                    <a href="{{ asset($product->image) }}" class="image-popup"><img style="border: 1px solid lightgrey" src="{{ asset($product->image) }}" class="img-fluid" alt="Colorlib Template"></a>
                </div>
                <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                    <h2>{{ $product -> name }}</h2>
                    <h4 class="price" style="color: #35a647">{{ number_format($product -> sale,0,",",".") }} đ / {{$product->unit}}</h4>
                    <div class="row mt-4">
                        {{--<div class="col-md-6">
                            <h5>Khối lượng</h5>
                            <div class="form-group d-flex">
                                <div class="select-wrap">
                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                    <select name="unit" id="" class="form-control">
                                        <option value="200g" {{($product->unit == '200g') ? 'selected' : ''}}>200g</option>
                                        <option value="500g" {{($product->unit == '500g') ? 'selected' : ''}}>500g</option>
                                        <option value="800g" {{($product->unit == '800g') ? 'selected' : ''}}>800g</option>
                                        <option value="kg" {{($product->unit == 'kg') ? 'selected' : ''}}>kg</option>
                                    </select>
                                </div>
                            </div>
                        </div>--}}
                        <div class="w-100"></div>
                        <div class="input-group col-md-6 d-flex mb-3">
                            <span class="input-group-btn mr-2">
                                <button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
                                    <i class="ion-ios-remove"></i>
                                </button>
                            </span>
                            <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
                            <span class="input-group-btn ml-2">
                                <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                                 <i class="ion-ios-add"></i>
                                </button>
                            </span>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12" style="display: flex">
                            <h5>Tình trạng:</h5>
                            @if($product->stock > 0)
                                <h5 style="color: #0000FF; margin-top: 1px">&emsp;CÒN HÀNG</h5>
                            @else
                                <h5 style="color: red; margin-top: 1px">&emsp;HẾT HÀNG</h5>
                            @endif
                        </div>
                    </div>
                    <p><a  title="Thêm sản phẩm vào giỏ hàng" href="{{ route('shop.cart.add-to-cart', ['id' => $product->id]) }}" class="btn btn-black py-3 px-5">Thêm vào giỏ hàng</a></p>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab" aria-selected="false" style="font-size: 25px;font-weight: 600">Thông tin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab" aria-selected="true" style="font-size: 25px;font-weight: 600">Công dụng</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
{{--                                <h6 style="color: black">Thông tin</h6>--}}
                                <p style="color: black">{!! $product->summary !!}.</p>
                            </div>
                        </div>
                        <div class="tab-pane active" id="tabs-2" role="tabpanel">
                            <div class="product__details__tab__desc">
{{--                                <h6 style="color: black">Công dụng</h6>--}}
                                <p style="color: black">{!! $product->description !!}.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Sản phẩm khác</span>
                    <h2 class="mb-4">Sản phẩm tương tự</h2>
                    <p>Chúng tôi cung cấp các loại thực phẩm &amp; hoa quả luôn tươi mới.</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach($sameProducts as $product)
                    <div class="col-md-6 col-lg-3 ftco-animate">
                        <div class="product">
                            <a href="{{ route('shop.productDetail',['slug' => $product->slug]) }}" class="img-prod"><img class="img-fluid" src="{{ asset($product->image)}}" alt="Colorlib Template">
                                <div class="overlay"></div>
                            </a>
                            <div class="text py-3 pb-4 px-3 text-center">
                                <h3><a href="{{ route('shop.productDetail',['slug' => $product->slug]) }}">{{ $product->name }}</a></h3>
                                <div class="d-flex">
                                    <div class="pricing">
                                        <p class="price"><span class="mr-2 price-dc">{{ number_format($product -> price,0,",",".") }} đ</span><span>{{ number_format($product -> sale,0,",",".") }} đ</span></p>
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
    </section>



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


@section('product')
    <script>
        $(document).ready(function(){

            var quantitiy=0;
            $('.quantity-right-plus').click(function(e){

                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                $('#quantity').val(quantity + 1);


                // Increment

            });

            $('.quantity-left-minus').click(function(e){
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                // Increment
                if(quantity>0){
                    $('#quantity').val(quantity - 1);
                }
            });

        });
    </script>
    @endsection
    </body>
    </html>
@endsection
