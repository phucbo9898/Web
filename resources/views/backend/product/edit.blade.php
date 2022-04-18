@extends('backend.layouts.main')

@section('content')
    <style>.w-50 {
            width: 50%
        }</style>
    <section class="content-header">
        <h1>
            Chỉnh sửa thông tin sản phẩm <a href="{{route('admin.product.index')}}" class="btn bg-purple pull-right"><i
                    class="fa fa-list"></i> Danh Sách SP</a>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin sản phẩm</h3>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            @if ($errors->any())
                                <div class="alert alert-warning alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-warning"></i> Cảnh báo !</h4>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('admin.product.update', ['id' => $product->id ])}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input value="{{ $product->name }}" type="text" class="form-control" id="name"
                                       name="name">
                                @if ($errors->has('name'))
                                    <label class="text-red" style="font-weight: 600; font-size: 15px; margin-top: 5px">&ensp;<i class="fa fa-info"></i> {{ $errors->first('name') }}</label>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Thay đổi ảnh sản phẩm</label>
                                <input type="file" id="new_image" name="new_image"><br>
                                @if ($product->image)
                                    <img src="{{asset($product->image)}}" width="200">
                                @endif
                                @if ($errors->has('new_image'))
                                    <label class="text-red" style="font-weight: 600; font-size: 15px; margin-top: 5px">&ensp;<i class="fa fa-info"></i> {{ $errors->first('new_image') }}</label>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Khối lượng trong kho</label>
                                <input type="number" class="form-control w-50" id="stock" name="stock"
                                       value="{{ $product->stock }}">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Giá gốc (vnđ)</label>
                                        <input type="number" class="form-control" id="price" name="price"
                                               value="{{ $product->price }}">
                                    </div>
                                    {{--<div class="selector-wrapper">
                                        <label>Đơn vị</label>
                                        <select class="single-option-selector" data-option="option1" id="product-selectors-option-0" name="unit">
                                            <option value="0">-- chọn --</option>
                                            <option value="200g" {{ ($product->unit == '200g') ? 'selected' : '' }}>200g</option>
                                            <option value="500g" {{ ($product->unit == '500g') ? 'selected' : '' }}>500g</option>
                                            <option value="800g" {{ ($product->unit == '800g') ? 'selected' : '' }}>800g</option>
                                            <option value="kg" {{ ($product->unit == 'kg') ? 'selected' : '' }}>kg</option>
                                        </select>
                                    </div>--}}
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Giá khuyến mại (vnđ)</label>
                                        <input type="number" class="form-control" id="sale" name="sale"
                                               value="{{ $product->sale }}">
                                    </div>
                                </div>
                                <!-- /.col-lg-6 -->
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Danh mục</label>
                                <select class="form-control w-50" name="parent_id">
                                    <option value="0">-- chọn Danh Mục --</option>
                                    @foreach($categories as $category)
                                        @if($category->type == 1)
                                            <option
                                                {{ ($product->parent_id == $category->id ? 'selected':'') }} value="{{ $category -> id }}">{{ $category -> name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            {{--<div class="form-group">
                                <label>Danh mục sản phẩm</label>
                                <select class="form-control w-50" name="category_id">
                                    <option value="0">-- chọn Danh Mục --</option>
                                    @foreach($categories as $category)
                                        @if($category->type == 1)
                                        <option
                                            {{ ($product->category_id == $category->id ? 'selected':'') }} value="{{ $category -> id }}">{{ $category -> name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>--}}

                            {{--<div class="form-group">
                                <label>Thương hiệu</label>
                                <select class="form-control w-50" name="brand_id">
                                    <option value="0">-- chọn Thương Hiệu--</option>
                                    @foreach($brands as $brand)
                                        <option
                                            {{ ($product->brand_id == $brand->id ? 'selected':'') }} value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nhà cung cấp</label>
                                <select class="form-control w-50" name="vendor_id">
                                    <option value="0">-- chọn NCC --</option>
                                    @foreach($vendors as $vendor)
                                        <option
                                            {{ ($product->vendor_id == $vendor->id ? 'selected':'') }} value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                    @endforeach
                                </select>
                            </div>--}}

                            <div class="form-group">
                                <label for="exampleInputEmail1">Vị trí</label>
                                <input type="number" class="form-control w-50" id="position" name="position"
                                       value="{{ $product->position }}">
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input {{ ($product->is_active) ? 'checked':'' }} type="checkbox" value="1"
                                               name="is_active"> <b>Trạng thái</b>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input {{ ($product->is_hot) ? 'checked':'' }} type="checkbox" value="1"
                                               name="is_hot"> <b>Sản phẩm Hot</b>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Liên kết (url) tùy chỉnh</label>
                                <input type="text" class="form-control" id="url" name="url" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Tóm tắt</label>
                                <textarea id="editor2" name="summary" class="form-control"
                                          rows="10">{{ $product->summary }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea id="editor1" name="description" class="form-control"
                                          rows="10">{{ $product->description }}</textarea>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Cập Nhật</button>
                            <input type="reset" class="btn btn-default pull-right" value="Reset">
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
@endsection

@section('my_js')
    <script type="text/javascript">

        $(function () {
            var _ckeditor = CKEDITOR.replace('summary');
            _ckeditor.config.height = 200; // thiết lập chiều cao
            var _ckeditor = CKEDITOR.replace('description');
            _ckeditor.config.height = 600; // thiết lập chiều cao
        })




        /*$(function () {
            var _ckeditor = CKEDITOR.replace('editor1', {
                filebrowserBrowseUrl: '{{ asset('/backend/plugins/ckfinder/ckfinder.html') }}',
                filebrowserImageBrowseUrl: '{{ asset('/backend/plugins/ckfinder/ckfinder.html?type=Images') }}',
                filebrowserFlashBrowseUrl: '{{ asset('/backend/plugins/ckfinder/ckfinder.html?type=Flash') }}',
                filebrowserUploadUrl: '{{ asset('/backend/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
                filebrowserImageUploadUrl: '{{ asset('/backend/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
                filebrowserFlashUploadUrl: '{{ asset('/backend/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
            });
            _ckeditor.config.height = 200;
        })

        $(function () {
            var _ckeditor = CKEDITOR.replace('editor2');
            _ckeditor.config.height = 200;
        })*/

    </script>
@endsection
