@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            Chi tiết bài viết <a href="{{route('admin.article.index')}}" class="btn bg-purple pull-right"><i class="fa fa-list"></i> Danh Sách</a>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-9">
                <!-- general form elements -->

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin bài viết</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <h1 style="text-align: center; color: #5ba503 ">{{ $data->title }}</h1>
                        <p style="font-size: larger"><i>Cập nhật vào lúc {{ $data->updated_at }}</i></p>
                        <p>{!! $data->summary !!}</p>
                        <div style="align-content: center">
                            <p>{!! $data->description !!}</p>
                        </div>
                    </div>
                    <!-- form start -->
                </div>
                <!-- /.box -->
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
@endsection




