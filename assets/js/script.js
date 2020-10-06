$(function() {
    $('.datatable').on('click', 'tbody tr td .delete', function(e) {
        e.preventDefault();
        var t = $(this);
        var id = t.data('id');
        var form = t.parents('td').find('.form-delete-' + id);
        swal({
                title: "Apakah anda yakin?",
                text: "Setelah dihapus, Anda tidak akan dapat memulihkannya!",
                icon: "warning",
                buttons: true,
                showCancelButton: true,
                dangerMode: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    t.html('<i class="fas fa-spin fa-spinner"></i>').attr('disabled', true);
                    form.submit();
                }
            });
    });

})