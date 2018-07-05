$(document).ready(function () {
    $('#tbl-audio').DataTable({
        "ajax": {
            url: "/admin-audio/show",
            type: 'GET'
        },
    });

    $('#add-audio-prewiew').hide();
    $('#edit-audio-prewiew').hide();

    function readUrlPreview(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $("#frm-add-audio").find('#audio-preview').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    
        $("#frm-add-audio").find("#add-audio").change(function () {
            var add_audio_filename = $(this)[0].files.length ? $(this)[0].files[0].name : "";
            var add_audio_ext = add_audio_filename.split('.').pop();
            if (add_audio_ext == 'mp3' || add_audio_ext == 'wav' || add_audio_ext == 'ogg' || add_audio_ext == 'flac' || add_audio_ext == 'MP3') {
                readUrlPreview(this);
                $("#add-audio-prewiew").fadeOut();
                $("#add-audio-prewiew").delay(200).fadeIn();
            } else {
                $('#add-audio-prewiew').hide();
                $("#frm-add-audio").find('#audio-preview').attr('src', '');
            }
        });
    

    function readUrlEdit(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $("#frm-edit-audio").find('#audio-preview').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#frm-edit-audio").find("#edit-audio").change(function() {
        var edit_audio_filename = $(this)[0].files.length ? $(this)[0].files[0].name : "";
        var edit_audio_ext = edit_audio_filename.split('.').pop();
        if (edit_audio_ext == 'mp3' || edit_audio_ext == 'wav' || edit_audio_ext == 'ogg' || edit_audio_ext == 'flac' || edit_audio_ext == 'MP3') {
            readUrlEdit(this);
            $("#edit-audio-prewiew").fadeOut();
            $("#edit-audio-prewiew").delay(200).fadeIn();
        } else {
            $('#edit-audio-prewiew').hide();
            $("#frm-edit-audio").find('#audio-preview').attr('src', '');
        }
    });

    $("#frm-add-audio").validate({
        ignore: [],
        debug: false,
        rules: {
            add_audio_title: {
                required: true,
                remote: {
                    url: "/check-audio-title",
                    type: "get"
                }
            },
            add_audio: {
                required: true,
                extension: "mp3|wav|ogg|flac"
            },
        },
        messages: {
            add_audio_title: {
                required: "Required field cannot be left blank.",
                remote: "This title already exists. Try different title."
            },
            add_audio: {
                required: "Required field cannot be left blank.",
                extension: "You must select an audio file only."
            } 
        },
        submitHandler: function (frm_add_audio, e) {
            event.preventDefault();

            var data = new FormData($("#frm-add-audio")[0]);

            $('#frm-add-audio input').prop('disabled', true);
            $('#frm-add-audio .btn').prop('disabled', true);
            $('.loading-overlay').css('display', 'block');

            $.ajax({
                url: '/admin-audio/store',
                type: 'POST',
                data: data,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function (data) {
                    $('#frm-add-audio input').prop('disabled', false);
                    $('#frm-add-audio .btn').prop('disabled', false);
                    $('.loading-overlay').css('display', 'none');

                    $('#add-audio-modal').modal('hide');
                    $('#add-audio-prewiew').hide();
                    $('#tbl-audio').DataTable().ajax.reload(null, false);
                    $('#frm-add-audio').trigger('reset');

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

    $("#frm-edit-audio").validate({
        ignore: [],
        debug: false,
        rules: {
            edit_audio_title: "required",
            edit_audio: {
                required: false,
                extension: "mp3|wav|ogg|flac"
            },
        },
        messages: {
            edit_audio_title: {
                required: "Required field cannot be left blank."
            },
            edit_audio: {
                required: "Required field cannot be left blank.",
                extension: "You must select an audio file only."
            }
        },
        submitHandler: function (frm_edit_blog, e) {
            event.preventDefault();

            var data = new FormData($("#frm-edit-audio")[0]);

            $('#frm-edit-audio input').prop('disabled', true);
            $('#frm-edit-audio .btn').prop('disabled', true);
            $('.loading-overlay').css('display', 'block');

            $.ajax({
                url: '/admin-audio/update',
                type: 'POST',
                data: data,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function (data) {
                    $('#frm-edit-audio input').prop('disabled', false);
                    $('#frm-edit-audio .btn').prop('disabled', false);
                    $('.loading-overlay').css('display', 'none');

                    $('#edit-audio').modal('hide');
                    $('#tbl-audio').DataTable().ajax.reload(null, false);

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

    $("#frm-delete-audio").unbind('submit').on('submit', function (event) {
        event.preventDefault();

        var data = new FormData($("#frm-delete-audio")[0]);

        $('#frm-delete-audio .btn').prop('disabled', true);
        $('.loading-overlay').css('display', 'block');

        $.ajax({
            url: '/admin-audio/delete',
            type: 'POST',
            data: data,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function (data) {
                $('#frm-delete-audio .btn').prop('disabled', false);
                $('.loading-overlay').css('display', 'none');

                $('#delete-audio').modal('hide');
                $('#tbl-audio').DataTable().ajax.reload(null, false);

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

    $('#add-audio-modal').on('show.bs.modal', function (e) {
        $('#frm-add-audio').trigger('reset');
        $('#add-audio-prewiew').hide();
        $("#frm-add-audio").find('#audio-preview').attr('src', '');
    });

    $('#edit-audio').on('show.bs.modal', function (e) {
        $('#frm-edit-audio').trigger('reset');
        var id = $(e.relatedTarget).data('id');
        var title = $(e.relatedTarget).data('title');
        var audio = $(e.relatedTarget).data('audio');
        $('#frm-edit-audio').find('#hdn-audio-id').val(id);
        $('#frm-edit-audio').find('#hdn-audio').val(audio);
        $('#frm-edit-audio').find('#edit-audio-title').val(title);
        $("#frm-edit-audio").find('#audio-preview').attr('src', audio);
        $('#edit-audio-prewiew').show();
    });

    $('#delete-audio').on('show.bs.modal', function (e) {
        var id = $(e.relatedTarget).data('id');
        var title = $(e.relatedTarget).data('title');
        $('#frm-delete-audio').find('#hdn-audio-id').val(id);
        $('#frm-delete-audio').find('#audio-title').html(title);
    });
});