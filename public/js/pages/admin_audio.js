$(document).ready(function() {

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

			reader.onload = function(e) {
				$("#frm-add-audio").find('#audio-preview').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#frm-add-audio").find("#add-audio").change(function() {
		readUrlPreview(this);
		$("#add-audio-prewiew").fadeOut();
		$("#add-audio-prewiew").delay(200).fadeIn();
	});

    function readUrlEdit(input) {

		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
				$("#frm-edit-audio").find('#audio-preview').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#frm-edit-audio").find("#edit-audio").change(function() {
		readUrlEdit(this);
		$("#edit-audio-prewiew").fadeOut();
		$("#edit-audio-prewiew").delay(200).fadeIn();
	});

	$("#frm-add-audio").validate({
        ignore: [],
        debug: false,
        rules: {
            add_audio_title: {
                required:true,
                remote:{
                    url:"/check-audio-title",
                    type:"get"
               }
            },
            add_audio: "required"
        },
        messages: {
            add_audio_title: {
                required: "The title field is required.",
                remote: "This title already exists."
            },
            add_audio: "The audio field is required."
        },
        submitHandler: function(frm_add_audio, e) {
            event.preventDefault();

            var data = new FormData($("#frm-add-audio")[0]);
            $('.btn-add-audio').attr('disabled', 'disabled').html('<i class="fas fa-spinner fa-pulse"></i>&nbsp; Saving');

            $.ajax({
                url: '/admin-audio/store',
                type: 'POST',
                data: data,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(data) {
                    $('#add-audio-modal').modal('hide');
                    $('#tbl-audio').DataTable().ajax.reload(null, false);
                    $('#frm-add-audio').trigger('reset');
                    $('.btn-add-audio').removeAttr('disabled').html('<i class="fas fa-save"></i>&nbsp; Save');

                    $.toast({
                        heading: 'Success',
                        text: data.success,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 3500
                    });
                },
                error: function(xhr, error, ajaxOptions, thrownError) {
                    alert(xhr.responseText);
                }
            });
        }
    });

    $("#frm-edit-audio").validate({
   		ignore: [],
   		debug: false,
		rules: {
			edit_audio_title: "required"
		},
		messages:{
			edit_audio_title: {
				required: "The title field is required."
          	}
		},
		submitHandler: function(frm_edit_blog, e){
	        event.preventDefault();

	        var data = new FormData($("#frm-edit-audio")[0]);

	        $('.btn-edit-audio').attr('disabled', 'disabled').html('<i class="fas fa-spinner fa-pulse"></i>&nbsp; Updating');

	        $.ajax({
	            url:'/admin-audio/update',
	            type:'POST',
	            data:data,
	            dataType:'json',
	            processData: false,
	            contentType: false,
	            success: function(data){
	               	$('#edit-audio').modal('hide');
                    $('#tbl-audio').DataTable().ajax.reload(null, false);
                    $('.btn-edit-audio').removeAttr('disabled').html('<i class="fas fa-save"></i>&nbsp; Update');

                    $.toast({
                        heading: 'Success',
                        text: data.success,
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 3500
                    });
	            }, error:function (xhr, error, ajaxOptions, thrownError){
					alert(xhr.responseText);
	            }
	        });
    	}
    })

    $("#frm-delete-audio").unbind('submit').on('submit', function(event) {
        event.preventDefault();

        var data = new FormData($("#frm-delete-audio")[0]);

        $('.btn-delete-audio').attr('disabled', 'disabled').html('<i class="fas fa-spinner fa-pulse"></i>&nbsp; Deleting');

        $.ajax({
            url: '/admin-audio/delete',
            type: 'POST',
            data: data,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(data) {
                	$('#delete-audio').modal('hide');
                    $('#tbl-audio').DataTable().ajax.reload(null, false);
                    $('.btn-delete-audio').removeAttr('disabled').html('<i class="fas fa-save"></i>&nbsp; Delete');

                $.toast({
                    heading: 'Success',
                    text: 'Deleted successfully.',
                    position: 'top-right',
                    loaderBg: '#ff6849',
                    icon: 'success',
                    hideAfter: 3500
                });
            },
            error: function(xhr, error, ajaxOptions, thrownError) {
                alert(xhr.responseText);
            }
        });
    });

    $('#edit-audio').on('show.bs.modal', function(e) {
        var id = $(e.relatedTarget).data('id');
        var title = $(e.relatedTarget).data('title');
        var audio = $(e.relatedTarget).data('audio');
        $('#frm-edit-audio').find('#hdn-audio-id').val(id);
        $('#frm-edit-audio').find('#hdn-audio').val(audio);
        $('#frm-edit-audio').find('#edit-audio-title').val(title);
		$("#frm-edit-audio").find('#audio-preview').attr('src', audio);
        $('#edit-audio-prewiew').show();
    });

    $('#delete-audio').on('show.bs.modal', function(e) {
        var id = $(e.relatedTarget).data('id');
        var title = $(e.relatedTarget).data('title');
        $('#frm-delete-audio').find('#hdn-audio-id').val(id);
        $('#frm-delete-audio').find('#audio-title').html(title);
    });

});