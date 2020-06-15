@extends('admin.default')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Редактирование специальности</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form role="form" action="{{route('specialties.update', $speciality->id)}}" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    @include('admin.errors')
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                        <label for="code">Код</label>
                                        <input type="text" value="{{$speciality->code}}" name="code" class="form-control" id="code" placeholder="Введите код специальности">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Наименование</label>
                                        <input type="text" value="{{$speciality->name}}" name="name" class="form-control" id="name" placeholder="Введите наименование специальности">
                                    </div>
                                    <div class="form-group">
                                        <label for="qualification">Квалификация</label>
                                        <input type="text" value="{{$speciality->qualification}}" name="qualification"
                                               class="form-control" id="qualification" placeholder="Введите квалификацию">
                                    </div>
                                    <div class="form-group">
                                        <label for="img">Изображение на главной</label>
                                        <img src="{{$speciality->getImage()}}" class="d-block mb-2 img-responsive" width="300">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="img" class="custom-file-input" id="img">
                                                <label class="custom-file-label" for="img">Выберите файл</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="img_bg">Изображение в шапке</label>
                                        <img src="{{$speciality->getBgImage()}}" class="d-block mb-2 img-responsive" width="300">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="img_bg" class="custom-file-input" id="img_bg">
                                                <label class="custom-file-label" for="img_bg">Выберите файл</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="is_reception" {{$speciality->getReceptionStatus()}} class="form-check-input" id="is_reception">
                                        <label class="form-check-label" for="is_reception">Набор ведется</label>
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
