@extends('admin.default')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Меню</h1>
                    </div>
                    <div class="col-sm-6 d-flex justify-content-end">
                        <div class="form-group">
                            <a href="{{route('menu.create')}}" class="btn btn-success">Добавить пункт меню</a>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    @if($menuitems->isEmpty())
                        <p class="text-center text-black-50">Пункты меню отсутствуют</p>
                    @else
                        <div class="card">
                            <div class="card-body">
                                @include('admin.messages')
                                <ul class="navbar-nav nav-sidebar px-3 mr-auto" id="mainMenu">
                                    @php
                                        function buildMenu($items, $parent, $sublevel = false)
                                        {
                                            foreach ($items as $item) {
                                                if (isset($item->children)) {
                                                @endphp
                                                <li class="nav-item">
                                                    <div class="d-flex">
                                                        <a href="{{ $item->url }}"
                                                           class="nav-link flex-grow-1 text-dark collapsed"
                                                           id="hasSub-{{ $item->id }}"
                                                           data-toggle="collapse"
                                                           data-target="#subnav-{{ $item->id }}"
                                                           aria-controls="subnav-{{ $item->id }}"
                                                           aria-expanded="false"
                                                        >
                                                            @if($item->hasChildren())
                                                                <i class="left right-arrow fas fa-angle-right mr-3"></i>
                                                            @endif
                                                            {{ $item->name }}
                                                        </a>
                                                        <div class="d-inline-flex justify-content-center align-items-center">
                                                            <a href="{{route('menu.edit', $item->id)}}" class="p-2 fas fa-pencil-alt"></a>
                                                            <form action="{{route('menu.destroy', $item->id)}}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button onclick="return confirm('Вы действительно хотите удалить запись?')" type="submit" class="delete p-2">
                                                                    <i class="far fa-trash-alt"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <ul class="navbar-collapse collapse"
                                                        id="subnav-{{ $item->id }}"
                                                        data-parent="#{{ $parent }}"
                                                        aria-labelledby="hasSub-{{ $item->id }}"
                                                    >
                                                        @php buildMenu($item->children, 'subnav-'.$item->id, true) @endphp
                                                    </ul>
                                                </li>
                                                @php
                                                    } else {
                                                @endphp
                                                <li class="nav-item">
                                                    <div class="d-flex">
                                                        <a href="{{ $item->url }}" class="nav-link flex-grow-1 text-dark">{{ $item->name }}</a>
                                                        <div class="d-inline-flex justify-content-center align-items-center">
                                                            <a href="{{route('menu.edit', $item->id)}}" class="p-2 fas fa-pencil-alt"></a>
                                                            <form action="{{route('menu.destroy', $item->id)}}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button onclick="return confirm('Вы действительно хотите удалить запись?')" type="submit" class="delete p-2">
                                                                    <i class="far fa-trash-alt"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </li>
                                                @php
                                                }
                                            }
                                        }
                                        buildMenu($menuitems, 'mainMenu')
                                    @endphp
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    @endif
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <style>
        #mainMenu .nav-item + .nav-item,
        #mainMenu .navbar-collapse>.nav-item
        {
            border-top: 1px solid #4f5962;
        }
        #mainMenu .right-arrow{
            transform: rotate(90deg);
            transition: transform ease-in-out .3s
        }
        #mainMenu .collapsed .right-arrow{
            transform: rotate(0)
        }
        #mainMenu .navbar-collapse{
            padding-left: 25px;
        }
    </style>
@endsection
