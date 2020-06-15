@extends('admin.default')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Добавление изображений в галерею</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form role="form" action="{{route('gallery.store')}}" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    @include('admin.errors')
                                    @csrf
                                    <div class="form-group">
                                        <label for="images">Изображения</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="images[]" multiple class="custom-file-input" id="images">
                                                <label class="custom-file-label" for="images">Выберите изображения для добавления в галерею</label>
                                            </div>
                                        </div>
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
