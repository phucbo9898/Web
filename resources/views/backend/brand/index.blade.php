@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            Danh sách thương hiệu <a href="{{route('admin.brand.create')}}" class="btn bg-purple"><i class="fa fa-plus"></i> Thêm thương hiệu</a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Brands</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Thông tin danh sách thương hiệu</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>TT</th>
                                <th>Tên thương hiệu</th>
                                <th>Hình ảnh</th>
                                <th>Website</th>
                                <th>Vị trí</th>
                                <th>Trạng thái</th>
                                <th class="text-center">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key => $item)
                                    <tr class="item-{{ $item->id }}">
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item -> name }}</td>
                                        <td>
                                            @if($item->image)
                                                {{--                                               Kiểm tra hình ảnh tồn tại --}}
                                                <img src="{{ asset($item->image) }}" width="100" height="75" alt="">
                                            @endif
                                        </td>
                                        <td>{{ $item->website }}</td>
                                        <td>{{ $item->position }}</td>
                                        <td>{{ $item->is_active == 1 ? 'Hiển thị' : 'Ẩn' }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.brand.edit', ['id' => $item->id ]) }}" class="btn btn-flat bg-purple">
                                                <i class="fa fa-pencil-square"></i>
                                            </a>
                                            <button onclick="deleteItem('brand',{{$item->id}})" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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

@section('script')
    <script>
        $(function () {
            $('#example1').DataTable();
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
@endsection
