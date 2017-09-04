<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel no-avatar">
            <div class="info">
                <span><i class="fa fa-user"></i> {{ auth()->user()->name }}</span>
            </div>
        </div>

        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{ set_active(['admin', 'admin/']) }}">
                <a href="/admin">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview {{ set_active(['admin/users*']) }}">
                <a href="javascript:;">
                    <i class="fa fa-users"></i>
                    <span>{!! trans('admin/users.title') !!}</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ set_active(['admin/users']) }}">
                        <a href="{!! action('Admin\UsersController@index') !!}">
                            <i class="fa fa-list"></i> {!! trans('admin/users.label.list') !!}
                        </a>
                    </li>
                    <li class="{{ set_active(['admin/users/create']) }}">
                        <a href="{!! action('Admin\UsersController@create') !!}">
                            <i class="fa fa-plus"></i> {!! trans('admin/users.label.add') !!}
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview {{ set_active(['admin/roles*']) }}">
                <a href="javascript:;">
                    <i class="fa fa-wrench"></i>
                    <span>{!! trans('admin/roles.title') !!}</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ set_active(['admin/roles']) }}">
                        <a href="{!! action('Admin\RolesController@index') !!}">
                            <i class="fa fa-list"></i> {!! trans('admin/roles.label.list') !!}
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </section>
</aside>
