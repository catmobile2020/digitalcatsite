<!-- Left side column. contains the logo and sidebar -->
<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left info">
                <p>{{auth()->user()->user_type}}</p>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li @if(Route::is('admin.home')) class="active" @endif>
                <a href="{{route('admin.home')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            @if(auth()->user()->role_id != 3)
            <li class="treeview" @if(Route::is('admin.pharmacies.index') or Route::is('admin.pharmacies.create')) class="active" @endif>
                <a href="#">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>Pharmacies</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin.pharmacies.create')}}"><i class="fa fa-angle-double-right"></i> Add Pharmacy</a></li>
                    <li><a href="{{route('admin.pharmacies.index')}}"><i class="fa fa-angle-double-right"></i> List Pharmacies</a></li>
                </ul>
            </li>
            @endif
            @if(auth()->user()->role_id == 1)
            <li class="treeview" @if(Route::is('admin.users.create') or Route::is('admin.users.index')) class="active" @endif>
                <a href="#">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>Users</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin.users.create')}}"><i class="fa fa-angle-double-right"></i> Add User</a></li>
                    <li><a href="{{route('admin.users.index')}}"><i class="fa fa-angle-double-right"></i> List Users</a></li>
                </ul>
            </li>
            @endif
            @if(auth()->user()->role_id == 1)
            <li class="treeview" @if(Route::is('admin.clients.index') or Route::is('admin.clients.create')) class="active" @endif>
                <a href="#">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>Clients</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin.clients.create')}}"><i class="fa fa-angle-double-right"></i> Add Client</a></li>
                    <li><a href="{{route('admin.clients.index')}}"><i class="fa fa-angle-double-right"></i> List Clients</a></li>
                </ul>
            </li>
            @endif
            <li class="treeview" @if(Route::is('admin.orders.index') or Route::is('admin.orders.create')) class="active" @endif>
                <a href="#">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>Orders</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin.orders.create')}}"><i class="fa fa-angle-double-right"></i> Add Order</a></li>
                    <li><a href="{{route('admin.orders.index')}}"><i class="fa fa-angle-double-right"></i> List Orders</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>