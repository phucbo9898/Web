<!DOCTYPE html>
<html lang="en">
<head>
    <title>Fresh vegetables</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/img/favicon.png')}}"> -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('frontend/css/open-iconic-bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css')}}">

    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{ asset('frontend/css/aos.css')}}">

    <link rel="stylesheet" href="{{ asset('frontend/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.timepicker.css')}}">


    <link rel="stylesheet" href="{{ asset('frontend/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/toastr/build/toastr.min.css')}}">
</head>

<body class="goto-here">
@include('frontend.layouts.header')

<!-- END nav -->
{{--@include('frontend.layouts.sidebar')--}}
{{--<section class="ftco-section">--}}
{{--    <div class="container">--}}

{{--    </div>--}}
{{--</section>--}}
@yield('content')

@yield('contact')

@yield('checkout')


<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
    <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
            {{--<div class="col-md-6">
                <h2 style="font-size: 22px;" class="mb-0">Đăng ký để nhận được các thông tin mới nhất</h2>
                <span> Cập nhật e-mail để biết được các thông tin mới nhất về cửa hàng và các thông tin khuến mãi hấp dẫn</span>
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <form action="#" class="subscribe-form">
                    <div class="form-group d-flex">
                        <input type="text" class="form-control" placeholder="Nhập vào địa chỉ e-mail">
                        <input type="submit" value="Đăng ký" class="submit px-3">
                    </div>
                </form>
            </div>--}}
        </div>
    </div>
</section>

@include('frontend.layouts.footer')


<!-- loader -->
{{--<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>--}}


<script src="{{ asset('frontend/js/jquery.min.js')}}"></script>
<script src="{{ asset('frontend/js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
<script src="{{ asset('frontend/js/popper.min.js')}}"></script>
<script src="{{ asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('frontend/js/jquery.easing.1.3.js')}}"></script>
<script src="{{ asset('frontend/js/jquery.waypoints.min.js')}}"></script>
<script src="{{ asset('frontend/js/jquery.stellar.min.js')}}"></script>
<script src="{{ asset('frontend/js/owl.carousel.min.js')}}"></script>
<script src="{{ asset('frontend/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{ asset('frontend/js/aos.js')}}"></script>
<script src="{{ asset('frontend/js/jquery.animateNumber.min.js')}}"></script>
<script src="{{ asset('frontend/js/bootstrap-datepicker.js')}}"></script>
<script src="{{ asset('frontend/js/scrollax.min.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="{{ asset('frontend/js/google-map.js')}}"></script>
<script src="{{ asset('frontend/toastr/build/toastr.min.js')}}"></script>
<script src="{{ asset('frontend/js/main.js')}}"></script>


@yield('script')
@yield('product')
@yield('my_javascript')
</body>
</html>
