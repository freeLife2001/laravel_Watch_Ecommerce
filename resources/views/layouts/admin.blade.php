@if(Auth::user())

        <!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <link href="{{asset('assets/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/core.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/components.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/colors.css')}}" rel="stylesheet" type="text/css">
@yield('css')
<!-- /global stylesheets -->


</head>
<body>

<!-- Main navbar -->
<div class="navbar navbar-inverse bg-indigo">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ asset('/') }}">Web Đồng Hồ</a>

        <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a>
            </li>
        </ul>

        <div class="navbar-right">
            <p class="navbar-text">Chào: {{ Auth::user()->name }}!</p>
            <p class="navbar-text"><span class="label bg-success-400">Đang hoạt động</span></p>
        </div>
    </div>
</div>
<!-- /main navbar -->


<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <div class="sidebar sidebar-main sidebar-default">
            <div class="sidebar-content">

                <!-- User menu -->
                <div class="sidebar-user-material">
                    <div class="category-content">
                        <div class="sidebar-user-material-content">
                            <a href="#"><img src="{{asset('assets/images/demo/users/face11.jpg')}}"
                                             class="img-circle img-responsive" alt=""></a>
                            <h6>{{ Auth::user()->name }}</h6>
                            <span class="text-size-small"></span>
                        </div>

                        <div class="sidebar-user-material-menu">
                            <a href="#user-nav" data-toggle="collapse"><span>Tài khoản</span> <i class="caret"></i></a>
                        </div>
                    </div>

                    <div class="navigation-wrapper collapse" id="user-nav">
                        <ul class="navigation">
                            <li class="divider"></li>
                            <li><a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                            class="icon-switch2"></i> <span>Đăng xuất</span></a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </div>
                </div>
                <!-- /user menu -->


                <!-- Main navigation -->
                <div class="sidebar-category sidebar-category-visible">
                    <div class="category-content no-padding" id="nav">
                        @include('layouts.side-bar')
                    </div>
                </div>
                <!-- /main navigation -->

            </div>
        </div>
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Page header -->
            <div class="page-header page-header-default">
                <div class="page-header-content">
                    <div class="page-title">
                        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> -
                            Dashboard</h4>
                    </div>
                </div>

                <div class="breadcrumb-line">
                    <ul class="breadcrumb">
                        <li><a href="{{route('admin.index')}}"><i class="icon-home2 position-left"></i> Trang chủ</a>
                        </li>
                        <li class="active">@yield('bercum')</li>
                    </ul>

                </div>
            </div>
            <!-- /page header -->


            <!-- Content area -->
            <div class="content">
            @yield('content')
            <!-- Footer -->
                <div class="footer text-muted">
                    &copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov"
                                                                             target="_blank">Eugene Kopyov</a>
                </div>
                <!-- /footer -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->

</body>
<!-- Core JS files -->
<script type="text/javascript" src="{{asset('assets/js/plugins/loaders/pace.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/core/libraries/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/core/libraries/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/plugins/loaders/blockui.min.js')}}"></script>
<!-- /core JS files -->
<!-- Theme JS files -->
<script type="text/javascript" src="{{asset('assets/js/plugins/visualization/d3/d3.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/plugins/visualization/d3/d3_tooltip.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/plugins/forms/styling/switchery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/plugins/forms/selects/bootstrap_multiselect.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/plugins/ui/moment/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/plugins/pickers/daterangepicker.js')}}"></script>

<script type="text/javascript" src="{{asset('assets/js/core/app.js')}}"></script>

<script type="text/javascript" src="{{asset('assets/js/plugins/ui/ripple.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/pickers/datepicker.js')}}"></script>
<script>
    $('.datepicker').datepicker({
        format:'d-m-yyyy',
        language:'vn'
    });
</script>
@yield('js')
<script type="text/javascript">
    var url = '{{url()->current()}}'
    var loc = '#nav ul li a[href="' + url + '"]';
    $('#nav ul li a[href="' + url + '"]').parent().parent().parent().addClass('active');
    $('#nav ul li a[href="' + url + '"]').parent().parent().parent().addClass('active');
    $('#nav ul li a[href="' + url + '"]').parent('li').addClass('active');
</script>
</html>
@else
    <h4>Bạn không có quyền truy cập trang này ! <a href="{{route('nome')}}">Quay lại trang chủ</a></h4>
@endif
