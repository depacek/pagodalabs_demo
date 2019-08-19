<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                @auth<a href="""><i class="fa fa-user"></i></a>@endauth
            </div>
            <div class="pull-left info">
                <p>@auth{{ Auth::user()->name }}@endauth</p>
                <a href=""><i class="fa fa-circle text-success"></i> Online</a>
                <a class="" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                    ( {{ __('Logout') }})
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li class="treeview {!! request()->is('backend/product/*')?'active menu-open':"" !!}">
                <a href="#">
                    <i class="fa fa-opencart"></i> <span>Product</span>
                    <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                </a>
                <ul class="treeview-menu" style="display: {!! request()->is('backend/product/*')?'block':'none' !!}">
                    <li class="{!! request()->is('backend/product/create*')?'active menu-open':"" !!}">
                        <a href="{{ route('backend.product.create') }}"><i class="fa fa-plus"></i>Create
                        </a>
                    </li>
                    <li class="{!! request()->is('backend/product*')?'active menu-open':"" !!}">
                        <a href="{{ route('backend.product.index') }}"><i class="fa fa-list"></i>List
                        </a>
                    </li>
                </ul>
            </li>
        </ul>

    </section>
    <!-- /.sidebar -->
</aside>
