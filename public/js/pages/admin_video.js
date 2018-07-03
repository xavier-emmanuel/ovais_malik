var tbl_video;
var add_video_form;
var edit_video_form;

$(document).ready(function () {
	$('.form-info').popover({
		trigger: 'hover'
	});

	tbl_video = $('#tbl-video').DataTable({
		'ajax': {
			url: '/admin-video/show',
			type: 'GET'
		},
	});

	addVideo();
	editVideo();
	deleteVideo();
});

function addVideo() {
	$('#btn-add-video').on('click', function () {
		$('#frm-add-video')[0].reset();
		add_video_form.resetForm();
		$('input').removeClass('my-error-class');
	});

	add_video_form = $('#frm-add-video').validate({
		errorClass: "my-error-class",
		validClass: "my-valid-class",

		rules: {
			add_video_link: {
				required: true,
				remote: {
					url: "/admin-video/create-check",
					type: "GET"
				}
			}
		},
		messages: {
			add_video_link: {
				required: "Required field cannot be left blank.",
				remote: "This video link already exists. Try different video link."
			}
		},
		submitHandler: function (frm_add_video, e) {
			e.preventDefault();

			var data = new FormData($("#frm-add-video")[0]);

			$('#frm-add-video input').prop('disabled', true);
			$('#frm-add-video .btn').prop('disabled', true);
			$('.loading-overlay').css('display', 'block');

			$.ajax({
				url: '/admin-video/create',
				type: 'POST',
				data: data,
				dataType: 'json',
				processData: false,
				contentType: false,
				success: function (data) {
					$('#frm-add-video input').prop('disabled', false);
					$('#frm-add-video .btn').prop('disabled', false);
					$('.loading-overlay').css('display', 'none');

					tbl_video.ajax.reload(null, false);
					$('#frm-add-video')[0].reset();
					$('#add-video').modal('hide');
					$('.modal-backdrop').hide();

					$.toast({
						heading: 'Success!',
						text: 'Video has been successfuly added.',
						position: 'top-right',
						icon: 'success',
						hideAfter: 3500,
						stack: 6
					});
				}, error: function (xhr, error, ajaxOptions, thrownError) {
					alert(xhr.responseText);
				}
			});
		}
	});
}

function editVideo() {
	$(document).on('click', '#btn-edit-video', function () {
		$('#frm-edit-video')[0].reset();
		edit_video_form.resetForm();
		$('input').removeClass('my-error-class');

		var id = $(this).data('id');
		var link = $(this).data('link');

		$('#edit-video-id').val(id);
		$('#edit-video-link').val(link);
	});

	edit_video_form = $('#frm-edit-video').validate({
		errorClass: "my-error-class",
		validClass: "my-valid-class",

		rules:{
			edit_video_link: {
				required: true,
				remote: {
					url: "/admin-video/update-check",
					type: "GET"
				}
			}
		},
		messages: {
			edit_video_link: {
				required: "Required field cannot be left blank.",
				remote: "This video link already exists. Try different video link."
			}
		},
		submitHandler: function (frm_edit_video, e) {
			e.preventDefault();

			var data = new FormData($("#frm-edit-video")[0]);

			$('#frm-edit-video input').prop('disabled', true);
			$('#frm-edit-video .btn').prop('disabled', true);
			$('.loading-overlay').css('display', 'block');

			$.ajax({
				url: '/admin-video/update',
				type: 'POST',
				data: data,
				dataType: 'json',
				processData: false,
				contentType: false,
				success: function (data) {
					$('#frm-edit-video input').prop('disabled', false);
					$('#frm-edit-video .btn').prop('disabled', false);
					$('.loading-overlay').css('display', 'none');
					tbl_video.ajax.reload(null, false);
					$('#frm-edit-video')[0].reset();
					$('#edit-video').modal('hide');
					$('.modal-backdrop').hide();

					$.toast({
						heading: 'Success!',
						text: 'Video has been successfuly updated.',
						position: 'top-right',
						icon: 'success',
						hideAfter: 3500,
						stack: 6
					});
				}, error: function (xhr, error, ajaxOptions, thrownError) {
					alert(xhr.responseText);
				}
			});
		}
	});
}

function deleteVideo() {
	$(document).on('click', '#btn-delete-video', function () {
		var id = $(this).data('id');
		var link = $(this).data('link');

		$('#delete-video-id').val(id);
		$('#video-link').text(link);
	})

	$('#frm-delete-video').on('submit').bind('submit', function (e) {
		e.preventDefault();

		var data = new FormData($("#frm-delete-video")[0]);

		$('#frm-delete-video .btn').prop('disabled', true);
		$('.loading-overlay').css('display', 'block');

		$.ajax({
			url: '/admin-video/delete',
			type: 'POST',
			data: data,
			dataType: 'json',
			processData: false,
			contentType: false,
			success: function (data) {
				$('#frm-delete-video .btn').prop('disabled', false);
				$('.loading-overlay').css('display', 'none');
				tbl_video.ajax.reload(null, false);
				$('#frm-delete-video')[0].reset();
				$('#delete-video').modal('hide');
				$('.modal-backdrop').hide();

				$.toast({
					heading: 'Success!',
					text: 'Video has been successfuly deleted.',
					position: 'top-right',
					icon: 'success',
					hideAfter: 3500,
					stack: 6
				});
			}, error: function (xhr, error, ajaxOptions, thrownError) {
				alert(xhr.responseText);
			}
		});
	});
}