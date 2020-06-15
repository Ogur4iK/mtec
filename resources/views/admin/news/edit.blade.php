@extends('admin.default')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Редактирование новости</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form role="form" action="{{route('news.update', $news->id)}}" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    @include('admin.errors')
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                        <label for="title">Заголовок</label>
                                        <input type="text" value="{{$news->title}}" name="title" class="form-control" id="title" placeholder="Введите заголовок">
                                    </div>
                                    <div class="form-group">
                                        <label for="content">Контент</label>
                                        <textarea name="content" id="content" class="textarea">{{$news->content}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Описание (отображается на странице "Новости")</label>
                                        <textarea class="form-control" rows="5" name="description"
                                                  placeholder="Введите краткое описание новости, отображаемое на странице новостей"
                                        >{{$news->description}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="img">Лицевое изображение</label>
                                        <img src="{{$news->getImage()}}" class="d-block mb-2 img-responsive" width="300">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="img" class="custom-file-input" id="img">
                                                <label class="custom-file-label" for="img">Выберите файл</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Сохранить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
