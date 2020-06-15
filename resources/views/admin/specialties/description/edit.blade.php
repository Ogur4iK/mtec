@extends('admin.default')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Редактирование описания специальности «{{$parent_name}}»</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form role="form" action="{{route('speciality-description.update', $speciality_desc->id)}}" method="POST">
                                <div class="card-body">
                                    @include('admin.errors')
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                        <label for="education">Образование (пример: 9 классов)</label>
                                        <input type="text" value="{{$speciality_desc->education}}" name="education" class="form-control" id="education" placeholder="Введите образование">
                                    </div>
                                    <div class="form-group">
                                        <label for="form">Форма обучения</label>
                                        <input type="text" value="{{$speciality_desc->form}}" name="form" class="form-control" id="form" placeholder="Введите форму обучения">
                                    </div>
                                    <div class="form-group">
                                        <label for="specialization">Специализация</label>
                                        <input type="text" value="{{$speciality_desc->specialization}}" name="specialization"
                                               class="form-control" id="specialization" placeholder="Введите специализацию">
                                    </div>
                                    <div class="form-group">
                                        <label for="period">Срок обучения</label>
                                        <input type="text" value="{{$speciality_desc->period}}" name="period" class="form-control" id="period" placeholder="Введите срок обучения">
                                    </div>
                                    <div class="form-group">
                                        <label for="short_period">Срок обучения (пример: 1 г. 10 м. - дневная, 2 г. 7 м. - заочная)</label>
                                        <input type="text" value="{{$speciality_desc->short_period}}" name="short_period"
                                               class="form-control" id="short_period" placeholder="Введите срок обучения в сокращенном виде">
                                    </div>
                                    <div class="form-group">
                                        <label for="tests">Вступительные испытания</label>
                                        <input type="text" value="{{$speciality_desc->tests}}" name="tests" class="form-control" id="tests" placeholder="Введите вступительные испытания">
                                    </div>
                                    <div class="form-group">
                                        <label for="plan">План приема</label>
                                        <input type="text" value="{{$speciality_desc->plan}}" name="plan" class="form-control" id="plan" placeholder="Введите план приема">
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
