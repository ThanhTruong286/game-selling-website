<link rel="stylesheet" href="{{ asset('assets/css/format.css') }}">
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Quản Lý Thành Viên</h2>
        <ol class="breadcrumb" style="margin-bottom: 10px">
        <li>
            <a href="{{ route('home') }}">Trang Chủ</a>
        </li>
            <li>
                <a href="{{ route('dashboard.index') }}">Dashboard</a>
            </li>
            <!-- tro den thu muc user trong file config/apps -->
            <li class="active"><strong>Quản Lý Thành Viên</strong></li>
        </ol>
    </div>
</div>

<!-- Form -->
<div class="row-mt-12" style="margin-top:20px;">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
                <!-- toolbox here -->
                @include('backend.user.component.toolbox')
            <div class="ibox-content">
                        
                <!-- infor table here -->
                 @include('backend.user.component.table')

            </div>
        </div>
    </div>
</div>