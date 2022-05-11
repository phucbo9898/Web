@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            Thông tin liên hệ
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>TT</th>
                                <th>Họ tên</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                                <th>Nội dung</th>
                                <th>Ngày gửi</th>
                                <th class="text-center">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $key => $item)
                                {{--Phân biệt từng dòng--}}
                                <tr class="item-{{ $item->id }}">
                                    {{--Thêm class cho hành động--}}
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->content }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td class="text-center">
                                        <form action="{{ route('admin.contact.destroy', ['id'=> $item->id])}}" style="display: inline-block;" method="POST">
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


