@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            Bảng danh mục <a href="{{route('admin.category.create')}}" class="btn bg-purple"><i class="fa fa-plus"></i> Thêm danh mục</a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Categories</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Thông tin bảng danh mục</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>TT</th>
                                <th>Tên danh mục</th>
                                <th>Hình ảnh</th>
                                <th>Danh mục cha</th>
                                <th>Loại</th>
                                <th>Vị trí</th>
                                <th>Trạng thái</th>
                                <th class="text-center">Hành động</th>
{{--                                <th>Hiển thị</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $key => $item)
                                <tr class="item-{{ $item->id }}">
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        @if($item->image)
                                            <img src="{{ asset($item->image) }}" width="100" height="75" alt="">
                                        @endif
                                    </td>
                                    <td>{{ $item->parent->name or ''}}</td>
                                    <td>{{ $item->type }}</td>
                                    <td>{{ $item->position }}</td>
                                    <td>{{ $item->is_active == 1 ? 'Hiển thị' : 'Ẩn' }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.category.show', ['id'=> $item->id]) }}" class="btn btn-light bg-gray">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.category.edit', ['id' => $item->id ]) }}" class="btn btn-flat bg-purple">
                                            <i class="fa fa-pencil-square"></i>
                                        </a>
                                        {{-------------------------------------------------------------------------------------------------}}
                                        {{----------------Xóa-------------}}
                                        <form action="{{ route('admin.category.destroy', ['id'=> $item->id])}}" style="display: inline-block;" method="POST">
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


