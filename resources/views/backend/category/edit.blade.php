@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            Cập nhật danh mục <a href="{{route('admin.category.index')}}" class="btn bg-purple pull-right"><i class="fa fa-list"></i> Danh Sách</a>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin danh mục</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('admin.category.update', ['id' => $data->id ]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="box-body">

                            <div class="form-group">
                                <label for="categoryOption">Danh mục cha</label>
                                <select class="form-control" name="parent_id" >
                                    <option value="0"> -- Chọn -- </option>
                                    @foreach($category as $item)
                                        <option {{ $data ->parent_id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                        {{--            <optgroup label="Điện thoại">
                                        <option value="samsung">Sam Sung</option>
                                        <option value="apple">Apple</option>
                                    </optgroup>
                                    <optgroup label="Tablet">
                                        <option value="samsung">SamSung</option>
                                        <option value="apple">Apple</option>
                                    </optgroup>--}}
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputSupplier">Tên danh mục</label>
                                <input value="{{ $data->name }}" type="text" class="form-control" id="title" name="name" placeholder="Nhập tên danh mục">
                                @if ($errors->has('name'))
                                    <label class="text-red" style="font-weight: 600; font-size: 15px; margin-top: 5px">&ensp;<i class="fa fa-info"></i> {{ $errors->first('name') }}</label>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Ảnh</label>
                                        <input type="file" id="new_image" name="new_image">
                                    </div>
                                    {{-- Hiển thị ảnh cũ--}}
                                    <br>
                                    <img src="{{ asset($data->image) }}" width="250" alt="">
                                    @if ($errors->has('new_image'))
                                        <label class="text-red" style="font-weight: 600; font-size: 15px; margin-top: 5px">&ensp;<i class="fa fa-info"></i> {{ $errors->first('new_image') }}</label>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <br>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="1" name="is_active" {{ ($data->is_active == 1) ? 'checked' : '' }}> Trạng thái hiển thị
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Vị trí</label>
                                <input type="number" class="form-control" id="position" name="position" value="{{ $data->position }}">
                            </div>

                            <div class="form-group">
                                <label for="option">Loai</label>
                                <select class="form-control" name="type" >
                                    <option value="1" {{ ($data->type == '1') ? 'selected' : '' }}>Sản phẩm</option>
                                    <option value="0" {{ ($data->type == '0') ? 'selected' : '' }}>Tin tức</option>
                                </select>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </div>
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

<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
</script>
