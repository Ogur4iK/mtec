@extends('admin.default')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Добавление специальности</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form role="form" action="{{route('specialties.store')}}" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    @include('admin.errors')
                                    @csrf
                                    <div class="form-group">
                                        <label for="code">Код</label>
                                        <input type="text" value="{{old('code')}}" name="code" class="form-control" id="code" placeholder="Введите код специальности">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Наименование</label>
                                        <input type="text" value="{{old('name')}}" name="name" class="form-control" id="name" placeholder="Введите наименование специальности">
                                    </div>
                                    <div class="form-group">
                                        <label for="qualification">Квалификация</label>
                                        <input type="text" value="{{old('qualification')}}" name="qualification"
                                               class="form-control" id="qualification" placeholder="Введите квалификацию">
                                    </div>
                                    <div class="form-group">
                                        <label for="img">Изображение на главной</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="img" class="custom-file-input" id="img">
                                                <label class="custom-file-label" for="img">Выберите файл</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="img_bg">Изображение в шапке</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="img_bg" class="custom-file-input" id="img_bg">
                                                <label class="custom-file-label" for="img_bg">Выберите файл</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="is_reception" class="form-check-input" id="is_reception">
                                        <label class="form-check-label" for="is_reception">Набор ведется</label>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Добавить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
