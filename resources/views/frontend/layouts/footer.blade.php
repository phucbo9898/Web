<footer class="ftco-footer ftco-section">
    <div class="container">
        <div class="row">
            <div class="mouse">
                <a href="#" class="mouse-icon">
                    <div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
                </a>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">{{ $setting->company }}</h2>
                    <p>Chúng tôi cung cấp các loại thực phẩm &amp; hoa quả luôn tươi mới.</p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class=""><a href="#"><span class="icon-twitter"></span></a></li>
                        <li class=""><a href="#"><span class="icon-facebook"></span></a></li>
                        <li class=""><a href="#"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">Menu</h2>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('shop.about') }}" class="py-2 d-block">Về chúng tôi</a></li>
                        <li><a href="{{ route('shop.article') }}" class="py-2 d-block">Bài viết</a></li>
                        <li><a href="{{ route('shop.contact') }}" class="py-2 d-block">Liên lạc với chúng tôi</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Hỗ trợ</h2>
                    <div class="d-flex">
                        <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                            <li><a href="#" class="py-2 d-block">Các điều khoản</a></li>
                            <li><a href="#" class="py-2 d-block">Các vấn đề pháp lý</a></li>
                        </ul>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('shop.contact') }}" class="py-2 d-block">Hỏi đáp</a></li>
                            <li><a href="{{ route('shop.contact') }}" class="py-2 d-block">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Bạn có câu hỏi nào không ?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">{{ $setting->address }}</span></li>
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text">{{ $setting->phone }}</span></a></li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span class="text">{{ $setting->email }}</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </div>
</footer>
