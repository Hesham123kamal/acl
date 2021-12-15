<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>

<aside class="app-sidebar">
    <!-- Start User Info -->
    <div class="app-sidebar__user">
        <img class="app-sidebar__user-avatar" src="{{ auth()->user()->image_path }}" alt="User Image">
        <div>
            <p class="app-sidebar__user-name">{{ auth()->user()->name }}</p>
            <p class="app-sidebar__user-designation">{{ auth()->user()->roles->first()->name }}</p>
        </div>
    </div>
    <!-- End User Info -->

    <!-- Start App Modules -->

    <ul class="app-menu">
        <!-- Home Page -->
        <li>
            <a class="app-menu__item {{ request()->is('*home*') ? 'active' : '' }}" href="{{ route('admin.home') }}"><i class="app-menu__icon fa fa-home"></i>
                <span class="app-menu__label">
                    @lang('site.home')
                </span>
            </a>
        </li>

        <!-- Roles Module -->
        @if (auth()->user()->hasPermission('read_roles'))
            <li>
                <a class="app-menu__item {{ request()->is('*roles*') ? 'active' : '' }}" href="{{ route('admin.roles.index') }}">
                    <i class="app-menu__icon fa fa-lock"></i>
                    <span class="app-menu__label">
                        @lang('roles.roles')
                    </span>
                </a>
            </li>
        @endif


    </ul>
    <!-- End App Modules -->
</aside>
