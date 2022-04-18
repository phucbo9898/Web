@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            Thông tin cấu hình website
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <form role="form" action="{{ route('admin.setting.update', ['id' => $setting->id ]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Công Ty</label>
                                <input value="{{ $setting->company }}" type="text" class="form-control" id="company"
                                       name="company" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Thay đổi Logo</label>
                                <input type="file" id="new_image" name="new_image"><br>
                                @if ($setting->image)
                                    <img src="{{ asset($setting->image) }}" width="200">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Địa chỉ 1</label>
                                <input value="{{ $setting->address }}" type="text" class="form-control" id="address"
                                       name="address" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Địa chỉ 2</label>
                                <input value="{{ $setting->address2 }}" type="text" class="form-control" id="address2"
                                       name="address2" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">SĐT</label>
                                <input value="{{ $setting->phone }}" type="text" class="form-control" id="phone"
                                       name="phone" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hotline</label>
                                <input value="{{ $setting->hotline }}" type="text" class="form-control" id="hotline"
                                       name="hotline" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">MST</label>
                                <input value="{{ $setting->tax }}" type="text" class="form-control" id="tax"
                                       name="tax" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Facebook</label>
                                <input value="{{ $setting->facebook }}" type="text" class="form-control" id="facebook"
                                       name="facebook" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input value="{{ $setting->email }}" type="text" class="form-control" id="email"
                                       name="email" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Website</label>
                                <input value="{{ $setting->website }}" type="text" class="form-control" id="email"
                                       name="website" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Giới thiệu về công ty</label>
                                <textarea id="editor1" name="introduce" class="form-control" rows="10" >{{ $setting->introduce }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Chính sách bảo mật</label>
                                <textarea id="editor2" name="privacy_policy" class="form-control" rows="10" >{{ $setting->privacy_policy }}</textarea>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->


            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
@endsection

@section('my_js')
    <script type="text/javascript">

        $(function () {
            var _ckeditor = CKEDITOR.replace('editor1');
            _ckeditor.config.height = 600; // thiết lập chiều cao
            var _ckeditor = CKEDITOR.replace('editor2');
            _ckeditor.config.height = 600; // thiết lập chiều cao
        })

    </script>
@endsection
