@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            Chỉnh sửa người dùng <a href="{{route('admin.user.index')}}" class="btn bg-purple"><i class="fa fa-list"></i> Danh Sách</a>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin người dùng</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('admin.user.update', ['id' => $data->id ])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="box-body">
                            <div class="form-group">
                                <label>Chọn Quyền</label>
                                <select class="form-control" name="role_id">
                                    <option value="" >-- chọn --</option>
                                    <option value="1" {{ ($data->role_id == 1) ? 'selected' : '' }} >Admin</option>
                                    <option value="2" {{ ($data->role_id == 2) ? 'selected' : '' }}>Manager</option>
                                    <option value="3" {{ ($data->role_id == 3) ? 'selected' : '' }}>Member</option>
                                </select>
                                @if ($errors->has('role_id'))
                                    <label class="text-red" style="font-weight: 600; font-size: 15px; margin-top: 5px">&ensp;<i class="fa fa-info"></i>
                                        {{ $errors->first('role_id') }}
                                    </label>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Họ Tên</label>
                                <input value="{{ $data->name }}" type="text" class="form-control" id="name" name="name" placeholder="Nhập họ & tên">
                                @if ($errors->has('name'))
                                    <label class="text-red" style="font-weight: 600; font-size: 15px; margin-top: 5px">&ensp;<i class="fa fa-info"></i>
                                        {{ $errors->first('name') }}</label>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input value="{{ $data->email }}" type="text" class="form-control" id="email" name="email" placeholder="Nhập Email">
                                @if ($errors->has('email'))
                                    <label class="text-red" style="font-weight: 600; font-size: 15px; margin-top: 5px">&ensp;<i class="fa fa-info"></i> {{ $errors->first('email') }}</label>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1" style="color: red">** Mật khẩu Mới</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Nhập password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">New Avatar</label>
                                <input type="file" id="avatar" name="avatar">
                                <img src="{{ asset($data->avatar) }}" alt="" width="100" style="margin-top: 10px;">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input {{ ($data->is_active == 1) ? 'checked' : '' }} type="checkbox" value="1" name="is_active"> Kích hoạt tài khoản
                                </label>
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
