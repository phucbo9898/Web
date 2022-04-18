@extends('frontend.layouts.main')

@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url('frontend/images/bg_1.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Trang chủ </a></span> <span>Phương thức thanh toán</span></p>
                    <h1 class="mb-0 bread">Checkout</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 ftco-animate">
                    <form action="#" class="billing-form">
                        <h3 class="mb-4 billing-heading">Chi tiết thanh toán</h3>
                        <div class="row align-items-end">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="postcodezip">Họ và tên</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                            </div>

                            <div class="w-100"></div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="country">Tỉnh/ Thành phố</label>
                                    <div class="select-wrap">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                        <select name="" id="" class="form-control">
                                            <option value="">Hà Nội</option>
                                            <option value="">Hồ Chí Minh</option>
                                            <option value="">Hải Phòng</option>
                                            <option value="">Đà Nẵng</option>
                                            <option value="">Hải Dương</option>
                                            <option value="">Kiên Giang</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="streetaddress">Địa chỉ nhà</label>
                                    <input type="text" class="form-control" placeholder="Số nhà và tên đường">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Quận, huyện, xã">
                                </div>
                            </div>

                            <div class="w-100"></div>
                            <!-- <div class="col-md-12">
                                <div class="form-group">
                                <label for="towncity">Town / City</label>
                              <input type="text" class="form-control" placeholder="">
                            </div>
                            </div> -->
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Số điện thoại</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="emailaddress">Địa chỉ Email</label>
                                    <input type="text" class="form-control" placeholder="youremail@email.com">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-12">
                                <div class="form-group mt-4">
                                    <div class="radio">
                                        <label class="mr-3"><input type="radio" name="optradio"> Đăng ký tài khoản </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form><!-- END -->
                </div>
                <div class="col-xl-5">
                    <div class="row mt-5 pt-3">
                        <div class="col-md-12 d-flex mb-5">
                            <div class="cart-detail cart-total p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Tổng giỏ hàng</h3>
                                <p class="d-flex">
                                <p class="d-flex">
                                    <span>Phụ tính</span>
                                    <span>300.000 đ</span>
                                </p>
                                <p class="d-flex">
                                    <span>Giảm giá</span>
                                    <span>0 đ</span>
                                </p>
                                <hr>
                                <p class="d-flex total-price">
                                    <span>Tổng cộng</span>
                                    <span>300.000 đ</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="cart-detail p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Phương thức thanh toán</h3>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="radio">
                                            <label><input type="radio" name="optradio" class="mr-2"> Thanh toán trực tiếp</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="radio">
                                            <label><input type="radio" name="optradio" class="mr-2"> Thanh toán bằng phương thức chuyển khoản</label>
                                        </div>
                                    </div>
                                </div>
                                
                                <p><a href="#"class="btn btn-primary py-3 px-4">Đặt hàng</a></p>
                            </div>
                        </div>
                    </div>
                </div> <!-- .col-md-8 -->
            </div>
        </div>
    </section> <!-- .section -->
@endsection
