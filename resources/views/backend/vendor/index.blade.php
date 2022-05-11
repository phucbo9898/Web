@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            Danh sách nhà cung cấp <a href="{{route('admin.vendor.create')}}" class="btn bg-purple" style="margin-left: 10px;"><i class="fa fa-plus"></i> Thêm nhà cung cấp</a>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Thông tin danh sách nhà cung cấp</h3>
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>TT</th>
                                <th width="15%">Tên nhà cung cấp</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Hình ảnh</th>
                                <th>Website</th>
                                <th width="10%">Địa điểm</th>
                                <th>Vị trí</th>
                                <th>Trạng thái</th>
                                <th class="text-center" width="8%">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $key => $item)
                                <tr class="item-{{ $item->id }}">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item -> name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>
                                        @if($item->image)
                                            {{--Kiểm tra hình ảnh tồn tại --}}
                                            <img src="{{ asset($item->image) }}" width="100" height="75" alt="">
                                        @endif
                                    </td>
                                    <td>{{ $item->website }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->position }}</td>
                                    <td>{{ $item->is_active == 1 ? 'Hiển thị' : 'Ẩn' }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.vendor.edit', ['id' => $item->id ]) }}" class="btn btn-flat bg-purple">
                                            <i class="fa fa-pencil-square"></i>
                                        </a>
                                        
                                        {{----------------Xóa-------------}}
                                        <form action="{{ route('admin.vendor.destroy', ['id'=> $item->id])}}" style="display: inline-block;" method="POST">
                                            @csrf   {{-----------------Chống bảo mật---------------}}
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-delete"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection


