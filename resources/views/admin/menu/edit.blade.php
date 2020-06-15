@extends('admin.default')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Редактирование пункта меню</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form role="form" action="{{route('menu.update', $edit_item->id)}}" method="POST">
                                <div class="card-body">
                                    @include('admin.errors')
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Заголовок меню</label>
                                        <input type="text" value="{{$edit_item->name}}" name="name" class="form-control" id="name" placeholder="Введите заголовок меню">
                                    </div>
                                    <div class="form-group">
                                        <label for="url">Ссылка</label>
                                        <input type="text" value="{{$edit_item->url}}" name="url" class="form-control" id="url" placeholder="Введите ссылку">
                                    </div>
                                    <div class="form-group">
                                        <label for="parent_id">Родительский пункт меню</label>
                                        <select class="form-control select2" name="parent_id" id="parent_id">
                                            <option value="">Отсутствует</option>
                                            @foreach($menu_items as $menu_item)
                                                @if($menu_item->id == $edit_item->parent_id)
                                                    <option value="{{$menu_item->id}}" selected="selected">{{$menu_item->name}}</option>
                                                @else
                                                    <option value="{{$menu_item->id}}">{{$menu_item->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="sort_order">Порядок сортировки (большее значение выводится первее)</label>
                                        <input type="text" value="{{$edit_item->sort_order}}" name="sort_order"
                                               class="form-control" id="sort_order" placeholder="Введите порядок сортировки">
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
