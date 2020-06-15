@extends('admin.default')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Добавление пункта истории</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form role="form" action="{{route('history.store')}}" method="POST">
                                <div class="card-body">
                                    @include('admin.errors')
                                    @csrf
                                    <div class="form-group">
                                        <label for="year">Год</label>
                                        <input type="number" value="{{old('year')}}" name="year" class="form-control" id="year" placeholder="Год">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Описание события</label>
                                        <textarea class="form-control" rows="5" name="description"
                                                  placeholder="Введите описание события"
                                        >{{old('description')}}</textarea>
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
