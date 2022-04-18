<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
{{--                <img src="/backend/dist/img/volibear-thunder-lord-1.jpg" class="img-circle" alt="User Image">--}}
                <img src="{{ asset(Auth::user()->avatar) }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                @if(Auth::check())
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="hidden-xs">
                                {{ Auth::user()->name }}
                            </span>
                        </a>
                    </li>
                @endif
                {{--                <p>Natsuvxz</p>--}}
                {{--                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>--}}
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="{{route('admin.dashboard.index')}}">
                    <i class="fa fa-dashboard"></i><span>Bảng điều khiển</span>
                </a>
            </li>

            <li class="">
                <a href="{{ route('admin.category.index') }}">
                    <i class="fa fa-folder-open-o"></i><span>Quản Lý Danh Mục</span>
                </a>
            </li>

            <li class="">
                <a href="{{ route('admin.banner.index') }}">
                    <i class="fa fa-photo"></i><span>Quản Lý Banner</span>
                </a>
            </li>

            <li class="">
                <a href="{{ route('admin.product.index') }}">
                    <i class="fa fa-database"></i><span>Quản Lý Sản phẩm</span>
                </a>
            </li>

            <li class="">
                <a href="{{ route('admin.vendor.index') }}">
                    <i class="fa fa-align-justify"></i><span>Quản Lý Nhà cung cấp</span>
                </a>
            </li>

            <li class="">
                <a href="{{ route('admin.brand.index') }}">
                    <i class="fa fa-id-card"></i><span>Quản Lý Thương hiệu</span>
                </a>
            </li>

            <li class="">
                <a href="{{ route('admin.order.index') }}">
                    <i class="fa fa-cart-plus"></i><span>Quản lý đơn hàng</span>
                </a>
            </li>

            <li class="">
                <a href="{{ route('admin.article.index') }}">
                    <i class="fa  fa-newspaper-o"></i><span>Quản lý tin tức</span>
                </a>
            </li>

            <li class="">
                <a href="{{ route('admin.contact.index') }}">
                    <i class="fa fa-phone"></i> <span>Quản lý Liên Hệ</span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('admin.user.index') }}">
                    <i class="fa fa-user"></i><span>Quản lý người dùng</span>
                </a>
            </li>

            <li class="">
                <a href="{{ route('admin.setting.index') }}">
                    <i class="fa fa-gear"></i><span>Cài đặt</span>
                </a>
            </li>


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

