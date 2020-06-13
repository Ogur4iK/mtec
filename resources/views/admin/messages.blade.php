@if (session('success_add'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <p class="m-0">{{session('success_add')}}</p>
    </div>
@endif

@if (session('success_remove'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <p class="m-0">{{session('success_remove')}}</p>
    </div>
@endif

@if (session('success_edit'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <p class="m-0">{{session('success_edit')}}</p>
    </div>
@endif
