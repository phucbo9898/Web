<div class="py-1 bg-primary" style="background-color: blue;!important;">
    <div class="container">
        <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
            <div class="col-lg-12 d-block">
                <div class="row d-flex">
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                        <span class="text">{{ $setting->phone }} | <span class="icon-paper-plane"> {{ $setting->email }}</span></span>
                    </div>
                    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                        
                        <a href="{{ route('admin.dashboard.index')}}">
                            
                            <p style="color: #ffffff;margin: -9px 0px -15px 315px;">
                                Trang quản trị
                            </p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('shop.index') }}"><img class="img-fluid" src="{{ asset($setting->image) }}" width="80px" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto" style="margin-left: 0px !important;">
                <li class="nav-item active"><a href="{{ route('shop.index') }}" class="nav-link" style="font-weight: 600;font-size: 14px">Trang chủ</a></li>

                @foreach($categories as $cate)
                    @if($cate->parent_id == 0)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ route('shop.category', ['slug' => $cate->slug]) }}" id="dropdown04" data-toggle="dropdown">{{ $cate->name }}</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown04">
                                @foreach($categories as $child)
                                    @if($child->parent_id == $cate->id)
                                        <a class="dropdown-item" href="{{ route('shop.category', ['slug' => $child->slug]) }}">{{ $child->name }}</a>
                                    @endif
                                @endforeach
                            </div>
                        </li>
                    @endif
                @endforeach

                <li class="nav-item active"><a href="{{ route('shop.contact') }}" class="nav-link" style="font-weight: 600;font-size: 14px">Liên hệ</a></li>
                <li class="nav-item cta cta-colored">
                    <a href="{{ route('shop.cart') }}" style="font-weight: 600;font-size: 14px" class="nav-link">
                        <span class="icon-shopping_cart"></span>
                        [{{ !empty(session('totalItem')) ? session('totalItem') : 0 }}]
                    </a>
                </li>

            </ul>
            <form action="{{ route('shop.search') }}" method="GET" class="search-form-cat">
                <input value="{{ isset($keyword) ? $keyword : '' }}" style="width: 150px;" type="text" class="form-control search-form" name="tu-khoa" placeholder="Tìm kiếm" />

            </form>
        </div>
    </div>
</nav>

