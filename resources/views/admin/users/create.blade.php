@extends('admin.default')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Добавление пользователя</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form role="form" action="{{route('users.store')}}" method="POST">
                                <div class="card-body">
                                    @include('admin.errors')
                                    @csrf
                                    <div class="form-group">
                                        <label for="login">Логин</label>
                                        <input type="text" value="{{old('login')}}" name="login" class="form-control" id="login" placeholder="Введите логин">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">ФИО</label>
                                        <input type="text" value="{{old('name')}}" name="name" class="form-control" id="name" placeholder="Введите ФИО">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Пароль</label>
                                        <input type="password" value="{{old('password')}}" name="password" class="form-control" id="password" placeholder="Введите пароль">
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="role" class="form-check-input" id="role">
                                        <label class="form-check-label" for="role">Администратор</label>
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
