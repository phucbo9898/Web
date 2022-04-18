@if(count($cart) > 0)
    <section class="ftco-section ftco-cart">
        <div class="container">
            <h2 style="text-align: center; color: #82ae46">THÔNG TIN GIỎ HÀNG</h2>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="cart-list">
                        <table class="table list-cart">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>&nbsp;</th>
                                    <th>Ảnh</th>
                                    <th>Thông tin</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng cộng</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($cart as $item)
                                <tr class="text-center">
                                    <td class="product-remove">
                                        <a data-id="{{ $item->id }}" href="{{ route('shop.cart.remove-to-cart', $item->rowId) }}"
                                           class="cart_quantity_delete remove-to-cart" title="Xóa sản phẩm">
                                            <span class="ion-ios-close"></span>
                                        </a>
                                    </td>

                                    <td class="image-prod">
                                        <div class="img"
                                             style="background-image:url('{{ str_replace(' ', '%20', asset($item->options->image)) }}');"></div>
                                    </td>

                                    <td class="product-name">
                                        <h3>{{ $item->name }}</h3>
                                    </td>

                                    <td class="price">{{ number_format($item->price ,0,",",".") }} đ</td>

                                    <td class="quantity">
{{--                                        <div class="input-group mb-3">--}}
{{--                                            <input name="qty" class="quantity form-control input-number d-block item-qty" value="{{ $item->qty }}" >--}}
{{--                                        </div>--}}
{{--                                        <a data-id="{{ $item->rowId }}" href="javascript:void(0)" class="update-qty">Cập nhật</a>--}}
                                        <form action="{{ route('shop.cart.update-to-cart', $item->rowId) }}" method="post">
                                            @csrf
                                            <input name="updateToCart" type="number" class="quantity form-control input-number d-block item-qty" value="{{ $item->qty }}" min="1">
                                            <button type="submit" class="btn">Cập nhật</button>
                                        </form>
                                    </td>

                                    <td class="total">{{ number_format($item->qty * $item->price ,0,",",".") }} đ</td>
                                </tr><!-- END TR-->
                            @endforeach
                                <!-- Dòng tổng -->
                                <tr class="text-center">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Thành tiền :</td>
                                    <td class="total font-weight-bold">{{ $totalPrice }} đ</td>
                                </tr><!-- END TR-->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top: 15px">
                <div class="col-md-12">
                    <p>
                        <a href="{{ route('shop.cart.destroy') }}" class="btn btn-danger py-2 px-2 m-l-2">
                            <i class="icon-remove"></i> Hủy Đơn Hàng
                        </a>
                        <a href="{{ route('shop.index')}}" class="btn btn-black py-2 px-2 " >Tiếp tục mua hàng</a>
                        <a href="{{ route('shop.cart.order') }}" class="btn btn-warning py-2 px-2 "style="float: right">
                            <i class="icon-long-arrow-right"></i>Tiến Hành Đặt hàng
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </section>

{{--    @section('my_javascript')--}}
{{--        <script type="text/javascript">--}}
{{--            $(function () {--}}
{{--                // // xóa sản phẩm khỏi giỏ hàng--}}
{{--                // $(document).on("click", '.remove-to-cart', function () {--}}
{{--                //     var result = confirm("Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng ?");--}}
{{--                //--}}
{{--                //     if (result == true) {--}}
{{--                //         var rowId = $(this).attr('data-id'); // 9a34a635a736b8ed53f234e3b7ad738e--}}
{{--                //         $.ajax({--}}
{{--                //             url: '/gio-hang/xoa-sp-gio-hang/' + id,--}}
{{--                //             type: 'get',--}}
{{--                //             data: {--}}
{{--                //                 id: id--}}
{{--                //             }, // dữ liệu truyền sang nếu có--}}
{{--                //             dataType: "HTML", // kiểu dữ liệu trả về--}}
{{--                //             success: function (response) {--}}
{{--                //                 $('#my-cart').html(response);--}}
{{--                //             }--}}
{{--                //         });--}}
{{--                //     }--}}
{{--                // });--}}

{{--                // cập nhật số lượng của từng sản phẩm trong giỏ hàng--}}
{{--                $(".gio-hang").change(function (e) {--}}
{{--                    e.preventDefault();--}}

{{--                    var ele = $(this);--}}

{{--                    $.ajax({--}}
{{--                        url: '{{ route('shop.cart.update-to-cart') }}',--}}
{{--                        method: "get",--}}
{{--                        data: {--}}
{{--                            _token: '{{ csrf_token() }}',--}}
{{--                            rowId: ele.parents("tr").attr("data-id"),--}}
{{--                            quantity: ele.parents("tr").find(".quantity").val()--}}
{{--                        },--}}
{{--                        success: function (response) {--}}
{{--                            window.location.reload();--}}
{{--                        }--}}
{{--                    });--}}
{{--                });--}}
{{--            })--}}
{{--        </script>--}}
{{--    @endsection--}}

@else
    <style>
        .buyother {
            display: block;
            overflow: hidden;
            background: #fff;
            line-height: 40px;
            text-align: center;
            margin: 15px auto;
            width: 300px;
            font-size: 14px;
            color: #82ae46;
            font-weight: 700;
            text-transform: uppercase;
            border: 2px solid #82ae46;
            border-radius: 5px;
        }
    </style><br>
    <h3 class="text-center"><i class="fa fa-opencart"></i>Bạn chưa có sản phẩm nào trong giỏ hàng</h3>
    <a href="{{ route('shop.index') }}" class="buyother"><i class="fa fa-chevron-left"></i> Về trang chủ</a>
@endif
