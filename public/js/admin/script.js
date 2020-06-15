$(function () {
    $('#table').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });

    // Summernote
    $('.textarea').summernote({
        lang:"ru-RU",
        height:300
    });

    //Select
    $('.select2').select2();
});

$(document).ready(function () {
    bsCustomFileInput.init();
});
