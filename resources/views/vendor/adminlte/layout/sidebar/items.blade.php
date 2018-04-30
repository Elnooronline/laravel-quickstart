<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree">
    <li class="header">@lang('dashboard.sidebar.main')</li>
    <li class="{{ css_route_active('dashboard.home') }}">
        <a href="{{ route('dashboard.home') }}">
            <i class="fa fa-home"></i>
            <span>@lang('dashboard.home')</span>
        </a>
    </li>
    {{--Admins--}}
    <li class="treeview {{ css_resource_active('dashboard.admins') }}">
        <a href="#">
            <i class="fa fa-users"></i> <span>{{  trans('admins.plural') }}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ css_resource_active('dashboard.admins') }}">
                <a href="{{ route('dashboard.admins.index') }}">
                    <i class="fa fa-arrow-right"></i>
                    {{  trans('general.list') }}
                </a>
            </li>
            <li class="{{ css_route_active('dashboard.admins.create') }}">
                <a href="{{ route('dashboard.admins.create') }}">
                    <i class="fa fa-arrow-right"></i>
                    {{  trans('general.add') }}
                </a>
            </li>
        </ul>
    </li>

    {{--Settings--}}
    <li class="{{ css_route_active('dashboard.settings.index') }}">
        <a href="{{ route('dashboard.settings.index') }}">
            <i class="fa fa-cogs"></i>
            <span>@lang('settings.plural')</span>
        </a>
    </li>

</ul>
