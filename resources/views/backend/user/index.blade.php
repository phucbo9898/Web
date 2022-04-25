@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            Quản Lý User <a href="{{ route('admin.user.create') }}" class="btn bg-purple btn-flat"><i class="fa fa-plus"></i> Thêm</a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">QL Danh Sách - Nhà Cung Cấp</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Danh Sách Người Dùng</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Avatar</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Ngày Cấp</th>
                                <th>Trạng Thái</th>
                                <th>Hành Động</th>
                            </tr>

                            @foreach($data as $key => $item)
                                <tr class="item-{{ $item->id }}">
                                    <td>{{ $key }}</td>
                                    <td><img src="{{ asset($item->avatar) }}" width="50" /></td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->is_active == 1 ? 'Kích hoạt' : 'Chưa kích hoạt' }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.user.edit', ['id' => $item->id ]) }}" class="btn btn-flat bg-purple"><i class="fa fa-pencil"></i></a>
                                        <form style="display: inline-block;" action="{{ route('admin.user.destroy', ['id' => $item->id ]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button data-id="{{ $item->id }}" class="btn btn-danger btn-delete"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>

                            @endforeach

                            </tbody>
                        </table>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        {{ $data->links() }}
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
    </section>
@endsection





