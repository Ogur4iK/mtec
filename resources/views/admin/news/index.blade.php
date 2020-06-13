@extends('admin.default')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Новости</h1>
                    </div>
                    <div class="col-sm-6 d-flex justify-content-end">
                        <div class="form-group">
                            <a href="{{route('news.create')}}" class="btn btn-success">Добавить</a>
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
                                    <th>Заголовок новости</th>
                                    <th>Изображение</th>
                                    <th>Операции</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($news as $news_item)
                                    <tr>
                                        <td>{{$news_item->title}}</td>
                                        <td><img src="{{$news_item->getImage()}}" class="d-block p-2 m-auto img-responsive" height="100"></td>
                                        <td class="d-flex justify-content-center align-items-center">
                                            <a href="{{route('news.edit', $news_item->id)}}" class="p-2 fas fa-pencil-alt"></a>
                                            <form action="{{route('news.destroy', $news_item->id)}}" method="POST">
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
