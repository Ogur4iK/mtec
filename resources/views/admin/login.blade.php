
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Авторизация</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/admin/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">

    <div class="card">
        <div class="card-body login-card-body">
            @include('admin.errors')
            @if(session('status'))
                <div class="alert alert-danger mb-4">
                    {{session('status')}}
                </div>
            @endif
            <p class="login-box-msg">Вход в панель управления</p>

            <form action="{{route('login')}}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" value="{{old('login')}}" name="login" class="form-control" placeholder="Логин">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Пароль">
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="ml-auto col-4">
                        <button type="submit" class="btn btn-primary btn-block">Войти</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('js/admin/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('js/admin/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('js/admin/adminlte.min.js')}}"></script>

</body>
</html>
