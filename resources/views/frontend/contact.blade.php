@extends('frontend.layouts.main')

@section('contact')

    <div class="hero-wrap hero-bread" style="background-image: url('frontend/images/bg_1.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Trang chủ</a></span> <span>Liên hệ</span></p>
                    <h1 class="mb-0 bread">Contact us</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section contact-section bg-light">
        <div class="container">
            <div class="row d-flex mb-5 contact-info">
                <!-- <div class="w-100"></div> -->
                <div class="col-md-3 d-flex">
                    <div class="info bg-white p-4">
                        <p><span>Địa chỉ:</span> {{ $setting->address }}</p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="info bg-white p-4">
                        <p><span>SĐT:</span> <a href="">{{ $setting->phone }}</a></p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="info bg-white p-4">
                        <p><span>Email:</span> <a href="mailto:">{{ $setting->email }}</a></p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="info bg-white p-4">
                        <p><span>Website:</span> <a href="#">{{ $setting->website }}</a></p>
                    </div>
                </div>
            </div>

            <div class="row block-9">
                <div class="col-md-6 order-md-last d-flex">
                    <div class="contact-form">
                        <form id="contact-form" action="{{ route('shop.postContact') }}" class="bg-white p-5 contact-form" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Tên">
                                @if ($errors->has('name'))
                                    <label style="font-weight: 600; font-size: 15px; margin-top: 5px; color: red">&ensp;{{ $errors->first('name') }}</label>
                                @endif
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="phone" placeholder="Số điện thoại">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email">
                                @if ($errors->has('email'))
                                    <label style="font-weight: 600; font-size: 15px; margin-top: 5px; color: red">&ensp;{{ $errors->first('email') }}</label>
                                @endif
                            </div>
                            <div class="form-group">
                                <textarea id="" cols="30" rows="7" class="form-control" name="content" placeholder="Tin nhắn"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" id="btnSend" class="btn btn-primary py-3 px-5" >Gửi tin nhắn</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-6 d-flex">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.3929804818517!2d105.88758531476374!3d21.056960985983103!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135a99b6dd51879%3A0x8e5c70132bed14bb!2zNDIgTmfDtCBHaWEgVOG7sSwgxJDhu6ljIEdpYW5nLCBMb25nIEJpw6puLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1599190711168!5m2!1svi!2s" width="600" height="550" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </section>
    <br>
    <br>
@endsection

@section('script')
    <script>
        $('#btnSend').click(function (){

            toastr.options = {
                "closeButton": true,
                "debug": true,
                "newestOnTop": true,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "3000",
                "hideDuration": "1000",
                "timeOut": "10000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }

            toastr["success"]("Bạn đã gửi tin nhắn thành công.")
        });

{{--        // $('#btnSend').click(function (){--}}
{{--        //     $('.contact-form').html('<h3>Cảm ơn bạn, chúng tôi sẽ liên lạc lại cho bạn sớm nhất có thể</h3>')--}}
{{--        // });--}}
    </script>

@endsection
