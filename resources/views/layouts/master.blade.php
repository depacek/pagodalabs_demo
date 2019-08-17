<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@if(isset($data['page_title'])){{$data['page_title']}} | @endif </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
{{--    <link rel="icon" href="{{asset('images/profiles/'.\App\Profile::first()->logo)}}" type="image/x-icon">--}}

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('backend/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('backend/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('backend/bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('backend/dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('backend/dist/css/skins/_all-skins.min.css')}}">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

    <!-- cdn of css and js for select2 work  -->
    <link rel="stylesheet" href="{{asset('backend/bower_components/select2/dist/css/select2.min.css')}}">




@yield('css')

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="" class="logo">
            <!-- logo for regular state and mobile devices -->
{{--            <span class="logo-lg"><b>{{\App\Profile::first()->name}}</b></span>--}}
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="@auth{{asset('images/users/'.Auth::user()->image)}}@endauth" class="user-image" alt="User Image">
                            <span class="hidden-xs">@auth {{ Auth::user()->name }} @endauth</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
{{--                                <img src="@auth{{asset('images/users/'.Auth::user()->image)}}@endauth" class="img-circle" alt="User Image">--}}

                                <p>
                                    @auth <strong>{{ Auth::user()->name }} </strong>- @endauth

                                    <small><strong>Member since : </strong>@auth {{ Auth::user()->created_at }}    @endauth</small>
                                </p>

                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
{{--                                <a href="{{ route('changePassword') }}" class="btn btn-default">Change Password</a>--}}
                            </li>
                            <li class="user-footer">
                                <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i>
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                {{--<a href="#" class="">Sign out</a>--}}
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href=""><i class="fa fa-circle"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    {{--                    <img src="{{asset('backend/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">--}}
                    <img src="@auth{{asset('images/users/'.Auth::user()->image)}}@endauth" class="img-circle" alt="User Image">
                    {{--@auth<a href="{{asset('images/users/'.Auth::user()->image)}}">dsf</a>@endauth--}}
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

    <!-- =============================================== -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @yield('content')

    </div>
    <!-- /.content-wrapper -->
</div>
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; {{\Carbon\Carbon::now()->year}} <a href="http://dipeshkhatiwada.com.np">Dipesh Khatiwada </a>.</strong> All rights
    reserved.
</footer>


<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{asset('backend/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('backend/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('backend/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('backend/dist/js/demo.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('backend/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

<!-- Select2 -->
<script src="{{asset('backend/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<!-- CK Editor -->
<script src="{{asset('backend/bower_components/ckeditor/ckeditor.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- InputMask -->
<script>
    $(document).ready(function () {
        $('.sidebar-menu').tree()
    })
</script>



@yield('js')
</body>
</html>
