@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            Cập nhật nhà cung cấp <a href="{{route('admin.vendor.index')}}" class="btn bg-purple pull-right"><i class="fa fa-list"></i> Danh Sách</a>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin Nhà cung cấp</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('admin.vendor.update', ['id' => $data->id ]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="box-body">

                            <div class="form-group">
                                <label for="exampleInputSupplier">Tên nhà cung cấp</label>
                                <input value="{{ $data->name }}" type="text" class="form-control" id="title" name="name" placeholder="Nhập tên nhà cung cấp">
                                @if ($errors->has('name'))
                                    <label class="text-red" style="font-weight: 600; font-size: 15px; margin-top: 5px">&ensp;<i class="fa fa-info"></i> {{ $errors->first('name') }}</label>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input value="{{ $data->email }}" type="email" class="form-control" id="title" name="email" placeholder="Nhập email nhà cung cấp">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPhone">Số điện thoại</label>
                                <input value="{{ $data->phone }}" type="text" class="form-control" id="title" name="phone" placeholder="Nhập sđt nhà cung cấp">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Ảnh</label>
                                <input type="file" id="new_image" name="new_image">
                                <br>
                                <img src="{{ asset($data->image) }}" width="250" alt="">
                                @if ($errors->has('new_image'))
                                    <label class="text-red" style="font-weight: 600; font-size: 15px; margin-top: 5px">&ensp;<i class="fa fa-info"></i> {{ $errors->first('new_image') }}</label>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="exampleInputWebsite">Website</label>
                                <input value="{{ $data->website }}" type="text" class="form-control" id="title" name="website">
                            </div>

                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <textarea id="editor1" name="address" class="form-control" rows="3" placeholder="Enter ...">{{ $data->address }}</textarea>
                            </div>

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Vị trí</label>
                                        <input type="number" class="form-control" id="position" name="position" value="{{ $data->position }}">
                                    </div>
                                </div>
                                <br>
                                <div class="col-md-6">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="1" name="is_active" {{ ($data->is_active == 1) ? 'checked' : '' }}> Trạng thái hiển thị
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
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

