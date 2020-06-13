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
    $('.textarea').summernote()
});

$(document).ready(function () {
    bsCustomFileInput.init();
});
