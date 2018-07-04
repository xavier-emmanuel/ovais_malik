$(document).ready(function() {
	$('#delete-blog').on('show.bs.modal', function(e) {
		var id = $(e.relatedTarget).data('id');
		var title = $(e.relatedTarget).data('title');
		$('#frm-delete-blog').find('#hdn-blog-id').val(id);
		$('#frm-delete-blog').find('#blog-title').html(title);
	});

	 $("#frm-delete-blog").unbind('submit').on('submit', function (event) {
        event.preventDefault();

        var data = new FormData($("#frm-delete-blog")[0]);

        $('#frm-delete-blog .btn').prop('disabled', true);
        $('.loading-overlay').css('display', 'block');

        $.ajax({
            url: '/admin-blog/delete',
            type: 'POST',
            data: data,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function (data) {
                $('#frm-delete-blog .btn').prop('disabled', false);
                $('.loading-overlay').css('display', 'none');

                $('#delete-blog').modal('hide');
                $('.tbl-blog').DataTable().ajax.reload(null, false);

                $.toast({
                    heading: 'Success',
                    text: data.success,
                    position: 'top-right',
                    icon: 'success',
                    hideAfter: 3500
                });
            },
            error: function (xhr, error, ajaxOptions, thrownError) {
                alert(xhr.responseText);
            }
        });
    });
});