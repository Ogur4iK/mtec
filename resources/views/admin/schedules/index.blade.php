@extends('admin.default')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Расписание</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    @include('admin.errors')
                    @include('admin.messages')
                </div>
                <div class="col-12 col-sm-6">
                    <div class="card">
                        <form role="form" action="{{route('schedule.storeStudents')}}" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                @csrf
                                <div class="form-group">
                                    <label for="students">Расписание для учащихся</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="students" class="custom-file-input" id="students">
                                            <label class="custom-file-label" for="students">Выберите файл</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Обновить расписание</button>
                            </div>
                        </form>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6">
                    <div class="card">
                        <form role="form" action="{{route('schedule.storeTeachers')}}" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                @csrf
                                <div class="form-group">
                                    <label for="teachers">Расписание для преподавателей</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="teachers" class="custom-file-input" id="teachers">
                                            <label class="custom-file-label" for="teachers">Выберите файл</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Обновить расписание</button>
                            </div>
                        </form>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
