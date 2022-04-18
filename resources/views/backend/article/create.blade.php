@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            Thêm tin tức <a href="{{route('admin.article.index')}}" class="btn bg-purple pull-right"><i class="fa fa-list"></i> Danh Sách</a>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->


                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin chi tiết tin tức</h3>
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
                    <form role="form" action="{{route('admin.article.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">

                            <div class="form-group">
                                <label for="exampleInputSupplier">Tiêu đề tin tức</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Tiêu đề tin tức">
                                @if ($errors->has('title'))
                                    <label class="text-red" style="font-weight: 600; font-size: 15px; margin-top: 5px">&ensp;<i class="fa fa-info"></i> {{ $errors->first('title') }}</label>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Ảnh</label>
                                <input type="file" id="image" name="image">
                                @if ($errors->has('image'))
                                    <label class="text-red" style="font-weight: 600; font-size: 15px; margin-top: 5px">&ensp;<i class="fa fa-info"></i> {{ $errors->first('image') }}</label>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Danh mục tin tức</label>
                                <select class="form-control" name="category_id">
                                    <option value="0"> -- chọn --</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Vị trí</label>
                                        <input type="number" class="form-control" id="position" name="position" value="{{ $max_position + 1 }}">
                                    </div>
                                </div>
                                <br>
                                <div class="col-md-6">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="1" name="is_active"> Trạng thái hiển thị
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputSupplier">Điều hướng liên kết url</label>
                                <input type="text" class="form-control" id="title" name="url" placeholder="Điều hướng tới ...">
                            </div>

                            <div class="form-group">
                                <label>Tóm tắt</label>
                                <textarea  id="summary" name="summary" class="form-control" rows="3"
                                           placeholder="Enter ..."></textarea>
                                @if ($errors->has('summary'))
                                    <label class="text-red" style="font-weight: 600; font-size: 15px; margin-top: 5px">&ensp;<i class="fa fa-info"></i> {{ $errors->first('summary') }}</label>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Mô tả chi tiết</label>
                                <textarea id="editor1" name="description" class="form-control" rows="4" placeholder="Enter ..."></textarea>
                                @if ($errors->has('description'))
                                    <label class="text-red" style="font-weight: 600; font-size: 15px; margin-top: 5px">&ensp;<i class="fa fa-info"></i> {{ $errors->first('description') }}</label>
                                @endif
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Tạo</button>
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
            var _ckeditor = CKEDITOR.replace('summary');
            _ckeditor.config.height = 200; // thiết lập chiều cao
            var _ckeditor = CKEDITOR.replace('description');
            _ckeditor.config.height = 600; // thiết lập chiều cao
        })

    </script>
@endsection
