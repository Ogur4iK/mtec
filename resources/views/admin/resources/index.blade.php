@extends('admin.default')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Внешние ресурсы</h1>
                    </div>
                    <div class="col-sm-6 d-flex justify-content-end">
                        <div class="form-group">
                            <a href="{{route('resources.create')}}" class="btn btn-success">Добавить</a>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('admin.messages')
                            <table id="table" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Заголовок</th>
                                    <th>Изображение</th>
                                    <th>Операции</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($resources as $resource)
                                    <tr>
                                        <td>{{$resource->title}}</td>
                                        <td><img src="{{$resource->getImage()}}" class="d-block p-2 m-auto img-responsive" height="100"></td>
                                        <td class="d-flex justify-content-center align-items-center">
                                            <a href="{{route('resources.edit', $resource->id)}}" class="p-2 fas fa-pencil-alt"></a>
                                            <form action="{{route('resources.destroy', $resource->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Вы действительно хотите удалить запись?')" type="submit" class="delete p-2">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
