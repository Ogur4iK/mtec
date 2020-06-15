@extends('admin.default')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Добавление описания специальности «{{$parent_name}}»</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form role="form" action="{{route('speciality-description.store')}}" method="POST">
                                <div class="card-body">
                                    @include('admin.errors')
                                    @csrf
                                    <div class="form-group">
                                        <label for="education">Образование (пример: 9 классов)</label>
                                        <input type="text" value="{{old('education')}}" name="education" class="form-control" id="education" placeholder="Введите образование">
                                    </div>
                                    <div class="form-group">
                                        <label for="form">Форма обучения</label>
                                        <input type="text" value="{{old('form')}}" name="form" class="form-control" id="form" placeholder="Введите форму обучения">
                                    </div>
                                    <div class="form-group">
                                        <label for="specialization">Специализация</label>
                                        <input type="text" value="{{old('specialization')}}" name="specialization"
                                               class="form-control" id="specialization" placeholder="Введите специализацию">
                                    </div>
                                    <div class="form-group">
                                        <label for="period">Срок обучения</label>
                                        <input type="text" value="{{old('period')}}" name="period" class="form-control" id="period" placeholder="Введите срок обучения">
                                    </div>
                                    <div class="form-group">
                                        <label for="short_period">Срок обучения (пример: 1 г. 10 м. - дневная, 2 г. 7 м. - заочная)</label>
                                        <input type="text" value="{{old('short_period')}}" name="short_period"
                                               class="form-control" id="short_period" placeholder="Введите срок обучения в сокращенном виде">
                                    </div>
                                    <div class="form-group">
                                        <label for="tests">Вступительные испытания</label>
                                        <input type="text" value="{{old('tests')}}" name="tests" class="form-control" id="tests" placeholder="Введите вступительные испытания">
                                    </div>
                                    <div class="form-group">
                                        <label for="plan">План приема</label>
                                        <input type="text" value="{{old('plan')}}" name="plan" class="form-control" id="plan" placeholder="Введите план приема">
                                    </div>
                                    <input type="hidden" value="{{$parent_id}}" name="speciality_id">
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
