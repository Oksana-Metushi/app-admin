<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('logout') }}">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </li>
    </ul>
</nav>
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <div class="sidebar">
        <div class="user-panel mt-4 pb-3 mb-4 d-flex">
            <div class="image">
                @if (Auth::user()->image)
                    <img src="{{ url('uploads/' . Auth::user()->image) }}" class="img-circle elevation-2"
                        alt="User Image">
                @endif
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                @if (Auth::user()->is_role == '1')
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}"
                            class="nav-link @if (Request::segment(2) == 'dashboard') active @endif">
                            <i class="nav-icon fa fa-home"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.employees.index') }}"
                            class="nav-link @if (Request::segment(2) == 'employees') active @endif">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                Employees
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.departments.index') }}"
                            class="nav-link @if (Request::segment(2) == 'departments') active @endif">
                            <i class="nav-icon fa fa-building"></i>
                            <p>
                                Departments
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.account.edit') }}"
                            class="nav-link @if (Request::segment(2) == 'my_account') active @endif">
                            <i class="nav-icon fa fa-cog"></i>
                            <p>
                                My Account
                            </p>
                        </a>
                    </li>
                @endif

                @if (Auth::user()->is_role == '0')
                    <li class="nav-item">
                        <a href="{{ url('employee/dashboard') }}"
                            class="nav-link @if (Request::segment(2) == 'dashboard') active @endif">
                            <i class="nav-icon fa fa-home"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('employee/my_account') }}"
                            class="nav-link @if (Request::segment(2) == 'my_account') active @endif">
                            <i class="nav-icon fa fa-cog"></i>
                            <p>
                                My Account
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('employee/profile') }}"
                            class="nav-link @if (Request::segment(2) == 'profile') active @endif">
                            <i class="nav-icon fa fa-user"></i>
                            <p>
                                Profile
                            </p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</aside>
