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
                    <div class="row">
                        @if(!empty($article_by_cat))
                            @foreach($article_by_cat as $article)
                                <div class="col-md-12 d-flex ftco-animate">
                                    <div class="blog-entry align-self-stretch d-md-flex">
                                        <a href="{{ route('shop.articleDetail.detail',['slug' => $article->slug, 'id'=>$article->id]) }}" class="block-20" style="background-image: url({{ asset($article->image) }});">
                                        </a>
                                        <div class="text d-block pl-md-4">
                                            <div class="meta mb-3">
                                                <div><p style="font-size: 13px">cập nhật ngày {{ date('d/m/Y', strtotime($article->updated_at)) }}</p></div>
                                                {{--Relationship
                                                Tên biến -> tên hàm (Model) -> tên CSDL--}}
                                                <div><p style="font-size: 13px">bởi {{@$article->user->name}}</p></div>
                                                <div><a href="#" class="meta-chat"><span class="icon-chat"></span>10</a></div>
                                            </div>
                                            <h3 class="heading"><a href="{{ route('shop.articleDetail.detail',['slug' => $article->slug]) }}" title="">{{ $article->title }}</a></h3>
                                            <p>{!! $article->summary !!}</p>
                                            <p><a href="{{ route('shop.articleDetail.detail',['slug' => $article->slug]) }}" class="btn btn-primary py-2 px-3">Đọc thêm</a></p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    {{ $article_by_cat->links() }}
                </div> <!-- .col-md-8 -->
                <div class="col-lg-4 sidebar ftco-animate">
                    <div class="sidebar-box">
                        <form action="{{ route('shop.searchArticles') }}" method="GET" class="search-form">
                            <div class="form-group">
                                <input value="{{ isset($keyword) ? $keyword : '' }}" name="tu-khoa" type="text" class="form-control" placeholder="Tìm kiếm ..." aria-label="Search">
                                <i class="icon ion-ios-search" type="submit"></i>
                            </div>
                        </form>
                    </div>
                    <div class="sidebar-box ftco-animate">
                        <h3 class="heading">Bài viết về</h3>
                        <ul class="categories">
                            @foreach($menu as $item)
                                @if($item->parent_id == 0 && $item->type == 2)
                                    <li>
                                        <a href="{{route('shop.articleCategory', ['slug'=> $item->slug]) }}">{{ $item->name  }}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>

                    <div class="sidebar-box ftco-animate">
                        <h3 class="heading">Bài viết gần đây</h3>

                         {{--Tên biến $limit tương đương với tên ở view return trong controller ||'limit' => $articles_limit ||--}}
{{--                        @foreach($limit as $article)--}}
{{--                            <div class="block-21 mb-4 d-flex">--}}
{{--                            <a class="blog-img mr-4" style="background-image: url({{ asset($article->image) }});"></a>--}}
{{--                            <div class="text">--}}
{{--                                <h3 class="heading-1"><a href="{{ route('shop.articleDetail.detail',['slug' => $article->slug]) }}">{{ $article->title }}</a></h3>--}}
{{--                                <div class="meta">--}}
{{--                                    <div><a href="#"><span class="icon-calendar"></span> {{ date('d/m/Y', strtotime($article->created_at)) }}</a></div>--}}
{{--                                    <div><a href="#"><span class="icon-person"></span> {{@$article->user->name}}</a></div>--}}
{{--                                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        @endforeach--}}
                    </div>
                </div>
            </div>
    </section>
@endsection
