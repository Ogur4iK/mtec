<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Панель управления</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('css/admin/fontawesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('css/admin/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin/responsive.bootstrap4.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('css/admin/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin/select2-bootstrap4.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/admin/adminlte.min.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('css/admin/summernote-bs4.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{url('/')}}" class="nav-link">Перейти на сайт</a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-center">
                <div class="info p-1">
                    <a class="d-block">{{Auth::user()->name}}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="{{route('menu.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-ellipsis-h"></i>
                            <p>Меню</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('news.index')}}" class="nav-link">
                            <i class="nav-icon far fa-newspaper"></i>
                            <p>Новости</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('specialties.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-brain"></i>
                            <p>Специальности</p>
                        </a>
                    </li>
{{--                    <li class="nav-item has-treeview">--}}
{{--                        <a href="#" class="nav-link">--}}
{{--                            <i class="nav-icon fas fa-file-alt"></i>--}}
{{--                            <p>--}}
{{--                                Страницы--}}
{{--                                <i class="right fas fa-angle-left"></i>--}}
{{--                            </p>--}}
{{--                        </a>--}}
{{--                        <ul class="nav nav-treeview">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="#" class="nav-link">--}}
{{--                                    <i class="far fa-circle nav-icon"></i>--}}
{{--                                    <p>Главная</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="#" class="nav-link">--}}
{{--                                    <i class="far fa-circle nav-icon"></i>--}}
{{--                                    <p>О колледже</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="#" class="nav-link">--}}
{{--                                    <i class="far fa-circle nav-icon"></i>--}}
{{--                                    <p>Абитуриенту</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="#" class="nav-link">--}}
{{--                                    <i class="far fa-circle nav-icon"></i>--}}
{{--                                    <p>Учащимся</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="#" class="nav-link">--}}
{{--                                    <i class="far fa-circle nav-icon"></i>--}}
{{--                                    <p>Контакты</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
                    <li class="nav-item">
                        <a href="{{route('resources.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-border-none"></i>
                            <p>Внешние ресурсы</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('history.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-history"></i>
                            <p>История колледжа</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('schedule.index')}}" class="nav-link">
                            <i class="nav-icon far fa-calendar-alt"></i>
                            <p>Расписание</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('gallery.index')}}" class="nav-link">
                            <i class="nav-icon far fa-images"></i>
                            <p>Галерея</p>
                        </a>
                    </li>
                    @if(Auth::user()->isAdmin())
                        <li class="nav-item">
                            <a href="{{route('users.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-user-tie"></i>
                                <p>Пользователи</p>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{route('logout')}}" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>Выход</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    @yield('content')

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('js/admin/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('js/admin/bootstrap.bundle.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('js/admin/select2.full.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('js/admin/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/admin/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('js/admin/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('js/admin/responsive.bootstrap4.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('js/admin/adminlte.min.js')}}"></script>
<!-- bs-custom-file-input -->
<script src="{{asset('js/admin/bs-custom-file-input.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('js/admin/summernote-bs4.min.js')}}"></script>
<script src="{{asset('js/admin/script.js')}}"></script>
</body>
</html>
