@extends('admin.default')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Специальности</h1>
                    </div>
                    <div class="col-sm-6 d-flex justify-content-end">
                        <div class="form-group">
                            <a href="{{route('specialties.create')}}" class="btn btn-success">Добавить специальность</a>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    @include('admin.messages')
                    @forelse($specialties as $speciality)
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title d-inline">{{$speciality->code}} {{$speciality->name}}</h3>
                            <div class="d-inline pl-4">
                                <a href="{{route('specialties.edit', $speciality->id)}}" class="pr-2 d-inline fas fa-pencil-alt"></a>
                                <form action="{{route('specialties.destroy', $speciality->id)}}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Вы действительно хотите удалить запись?')" type="submit" class="delete pl-2">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                    <tr>
                                        <th>Образование</th>
                                        <th>Форма обучения</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($speciality->getDescriptions() as $speciality_desc)
                                        <tr>
                                        <td>{{$speciality_desc->education}}</td>
                                        <td>{{$speciality_desc->form}}</td>
                                        <td class="d-flex justify-content-end align-items-center">
                                            <a href="{{route('speciality-description.edit', $speciality_desc->id)}}" class="p-2 fas fa-pencil-alt"></a>
                                            <form action="{{route('speciality-description.destroy', $speciality_desc->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Вы действительно хотите удалить запись?')" type="submit" class="delete p-2">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center text-black-50" colspan="3">Описание отсутствует</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <a href="{{route('speciality-description.create', $speciality->id)}}" class="btn btn-primary   float-right">Добавить описание специальности</a>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            @empty
                <p class="text-center text-black-50">Специальности отсутствуют</p>
            @endforelse
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
