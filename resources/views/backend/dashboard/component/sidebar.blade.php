<nav class="navbar-default navbar-static-side" role="navigation" style="height:100%;">
    <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> 
                        <span>
                            <img height="50px" width="50px" alt="image" class="img-circle" src="{{ asset('assets/images/' . Auth::user()->image) }}" />
                        </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ Auth::user()->name }}</strong>
                             </span> <span class="text-muted text-xs block">{{ Auth::user()->email }}<b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="profile.html">Profile</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                            <li><a href="mailbox.html">Mailbox</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ route('auth.logout') }}">Logout</a></li>
                        </ul>
                    </div>
                </li>
                <li class="active">
                    <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Quản Lý</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                        <li><a href="{{ route('user.index') }}">Quản Lý Thành Viên</a></li>
                        <li><a href="{{ route('product.index') }}">Quản Lý Sản Phẩm</a></li>
                        <li><a href="{{ route('category.crud') }}">Quản Lý Danh Mục</a></li>
                    </ul>
                </li>
                
            </ul>

    </div>
</nav>