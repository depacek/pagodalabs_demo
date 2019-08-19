<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>P</b>L</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Pagoda</b>Labs</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span> &nbsp; <b> Pagoda</b>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="hidden-xs">@auth <strong>{{ Auth::user()->name }} </strong> @endauth</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                @auth <strong>{{ Auth::user()->name }}</strong>@endauth
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();   document.getElementById('logout-form').submit();"
                                   class="btn btn-default btn-flat">Sign out</a>
                            </div>
                            <br/>
{{--                            <a href="{{ route('changePassword') }}" class="btn btn-default btn-flat">Change Password</a>--}}
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="" data-toggle=""></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
