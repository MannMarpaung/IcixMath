<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? '' : "collapsed" }} " href="{{ route('admin.dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.level.*') ? '' : 'collapsed' }}" href="{{ route('admin.level.index') }}">
                <i class="bi bi-bar-chart"></i>
                <span>Levels</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.allUsers') ? '' : 'collapsed' }}" href="{{ route('admin.allUsers') }}">
                <i class="bi bi-person"></i>
                <span>Users</span>
            </a>
        </li>

    </ul>

</aside>