$(document).ready(function () {
    $('.tbl-category').DataTable({
        "ajax": {
            url: "/admin-category/show",
            type: 'GET'
        },
    });

    jQuery.validator.addMethod("alphanumeric", function(value, element) {
        return this.optional(element) || /^\w+$/i.test(value);
    }, "Special characters are not allowed.");

    $("#frm-add-category").validate({
        ignore: [],
        debug: false,
        rules: {
            category_name: {
                required: true,
                remote: {
                    url: "/check-category-name",
                    type: "get"
                },
                minlength: 4,
                maxlength: 20,
                alphanumeric: true
            }
        },
        messages: {
            category_name: {
                required: "Required field cannot be left blank.",
                remote: "This category already exists. Try different category."
            }
        },
        submitHandler: function (frm_add_category, e) {
            event.preventDefault();

            var data = new FormData($("#frm-add-category")[0]);

            $('#frm-add-category input').prop('disabled', true);
            $('#frm-add-category .btn').prop('disabled', true);
            $('.loading-overlay').css('display', 'block');

            $.ajax({
                url: '/admin-category/store',
                type: 'POST',
                data: data,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function (data) {
                    $('#frm-add-category input').prop('disabled', false);
                    $('#frm-add-category .btn').prop('disabled', false);
                    $('.loading-overlay').css('display', 'none');

                    $('#add-category').modal('hide');
                    $('.tbl-category').DataTable().ajax.reload(null, false);
                    $('#frm-add-category').trigger('reset');

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
        }
    });

    $("#frm-edit-category").validate({
        ignore: [],
        debug: false,
        rules: {
            category_name: {
                required: true,
                remote: {
                    url: "/check-category-name",
                    type: "get"
                },
                minlength: 4,
                maxlength: 20,
                alphanumeric: true
            }
        },
        messages: {
            category_name: {
                required: "Required field cannot be left blank.",
                remote: "This category already exists. Try different category."
            }
        },
        submitHandler: function (frm_edit_category, e) {
            event.preventDefault();

            var data = new FormData($("#frm-edit-category")[0]);

            $('#frm-edit-category input').prop('disabled', true);
            $('#frm-edit-category .btn').prop('disabled', true);
            $('.loading-overlay').css('display', 'block');

            $.ajax({
                url: '/admin-category/update',
                type: 'POST',
                data: data,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function (data) {
                    $('#frm-edit-category input').prop('disabled', false);
                    $('#frm-edit-category .btn').prop('disabled', false);
                    $('.loading-overlay').css('display', 'none');

                    $('#edit-category').modal('hide');
                    $('.tbl-category').DataTable().ajax.reload(null, false);

                    $.toast({
                        heading: 'Success',
                        text: data.success,
                        position: 'top-right',
                        icon: 'success',
                        hideAfter: 3500
                    });
                }, error: function (xhr, error, ajaxOptions, thrownError) {
                    alert(xhr.responseText);
                }
            });
        }
    });

    $("#frm-delete-category").unbind('submit').on('submit', function (event) {
        event.preventDefault();

        var data = new FormData($("#frm-delete-category")[0]);

        $('#frm-delete-category .btn').prop('disabled', true);
        $('.loading-overlay').css('display', 'block');

        $.ajax({
            url: '/admin-category/delete',
            type: 'POST',
            data: data,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function (data) {
                $('#frm-delete-category .btn').prop('disabled', false);
                $('.loading-overlay').css('display', 'none');

                $('#delete-category').modal('hide');
                $('.tbl-category').DataTable().ajax.reload(null, false);

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

    $('#add-category').on('show.bs.modal', function (e) {
        $('#frm-add-category').trigger('reset');
    });

    $('#edit-category').on('show.bs.modal', function (e) {
        var id = $(e.relatedTarget).data('id');
        var name = $(e.relatedTarget).data('name');
        $('#frm-edit-category').find('#hdn-category-id').val(id);
        $('#frm-edit-category').find('#edit-category-name').val(name);
    });

    $('#delete-category').on('show.bs.modal', function (e) {
        var id = $(e.relatedTarget).data('id');
        var name = $(e.relatedTarget).data('name');
        $('#frm-delete-category').find('#hdn-category-id').val(id);
        $('#frm-delete-category').find('#category-name').html(name);
    });
});