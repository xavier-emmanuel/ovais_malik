var frm_edit_image;
var frm_upload_logo;
var frm_edit_logo;

$(document).ready(function() {
	$('.form-info').popover({
		trigger: 'hover'
	});

	$('#btn-upload-photos').on('click', function() {
		$('div.image-displayed').remove();
	});

	$('.logo-preview').hide();

	$(function() {
		var imagesPreview = function(input, placeToInsertImagePreview) {
			if (input.files) {
				var filesAmount = input.files.length;

				for (i = 0; i < filesAmount; i++) {
					var reader = new FileReader();

					reader.onload = function(event) {
						$($.parseHTML('<div class="image-displayed">' +
							'<i class="far fa-times-circle remove-icon" title="Remove photo"></i>' +
							'<input type="hidden" id="image-file" name="image_file[]" value="' + event.target.result.split(',')[1] + '">' +
							'<img src="' + event.target.result + '" alt="" width="100%">' +
							'<textarea name="caption[]" cols="30" rows="3" class="form-control image-caption" placeHolder="Add caption here"></textarea>' +
							'</div>')).appendTo(placeToInsertImagePreview);
					};
					reader.readAsDataURL(input.files[i]);
				}
			}
		};

		$('#add-photos').on('change', function() {
			var add_photos_filename = $(this)[0].files.length ? $(this)[0].files[0].name : "";
			var add_photos = add_photos_filename.split('.').pop();
			if (add_photos == 'jpg' || add_photos == 'png' || add_photos == 'jpeg') {
				imagesPreview(this, 'div.preview-image');
			} else {
				$.toast({
					heading: 'Error!',
					text: 'An error has occured while uploading image. You must select valid image file only.',
					position: 'top-right',
					icon: 'error',
					hideAfter: 3500,
					stack: 6
				});
			}
		});
	});

	function readImageUrlEditPreview(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
				$("#frm-edit-gallery").find('#image-show').attr('src', e.target.result);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#frm-edit-gallery").find("#edit-photo").change(function() {
		var editphotos_filename = $(this)[0].files.length ? $(this)[0].files[0].name : "";
		var editphotos = editphotos_filename.split('.').pop();
		if (editphotos == 'jpg' || editphotos == 'png' || editphotos == 'jpeg') {
			readImageUrlEditPreview(this);
			$('.div-preview').show();
		} else {
			$('.div-preview').hide();
		}
	});

	function readLogoUrlPreview(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
				$("#frm-add-client-logo").find('#logo-show').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#frm-add-client-logo").find("#add-client-logo-image").change(function() {
		var add_image_filename = $(this)[0].files.length ? $(this)[0].files[0].name : "";
		var add_image = add_image_filename.split('.').pop();
		if (add_image == 'jpg' || add_image == 'png' || add_image == 'jpeg') {
			readLogoUrlPreview(this);
			$('.logo-preview').show();
		} else {
			$('.logo-preview').hide();
		}
	});

	function readEditLogoUrlPreview(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
				$("#frm-edit-client-logo").find('#logo-show-edit').attr('src', e.target.result);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#frm-edit-client-logo").find("#edit-client-logo-image").change(function() {
		var edit_image_filename = $(this)[0].files.length ? $(this)[0].files[0].name : "";
		var edit_image = edit_image_filename.split('.').pop();
		if (edit_image == 'jpg' || edit_image == 'png' || edit_image == 'jpeg') {
			readEditLogoUrlPreview(this);
			$('.logo-preview-edit').show();
		} else {
			$('.logo-preview-edit').hide();
		}
	});

	$(document).on('click', '.remove-icon', function() {
		$(this).closest('.image-displayed').fadeOut(function() {
			$(this).remove();
		});
	});

	showImage();
	uploadImage();
	editImage();
	deleteImage();
	showLogo();
	uploadLogo();
	editLogo();
	deleteLogo();
});

function showImage() {
	$.ajax({
		url: '/admin-gallery/show',
		method: 'GET',
		dataType: "json",
		success: function(data) {
			for (var i = 0, len = data.length; i < len; i++) {
				var image_caption = data[i].caption;
				var caption;
				if (image_caption == null) {
					caption = "";
				} else {
					caption = data[i].caption;
				}
				$('#gallery-images').append('<div class="gallery-images">' +
					'<figure class="d-flex justify-content-center align-items-center">' +
					'<img src="/uploads/gallery/images/original/' + data[i].image + '" alt="' + caption + '" width="100%">' +
					'<div class="overlay">' +
					'<div class="gallery-title">' +
					'<p class="text-center">' + caption + '</p>' +
					'</div>' +
					'<div class="gallery-action">' +
					'<button class="btn btn-primary edit-image-button" data-toggle="modal" data-target="#edit-gallery" data-id="' + data[i].id + '" data-image="' + data[i].image + '" data-caption="' + data[i].caption + '"><i class="fas fa-edit"></i></button>&nbsp;' +
					'<button class="btn btn-primary delete-image-button" data-toggle="modal" data-target="#delete-gallery" data-id="' + data[i].id + '" data-image="' + data[i].caption + '"><i class="fas fa-trash"></i></button>' +
					'</div>' +
					'</div>' +
					'</figure>' +
					'</div>');
			}
		}
	});
}

function uploadImage() {
	$('#frm-add-gallery').on('submit').bind('submit', function(e) {
		e.preventDefault();
		var selected_image = $('.image-displayed').length;
		if (selected_image == 0) {

		} else {
			var data = new FormData($("#frm-add-gallery")[0]);

			$('#frm-add-gallery input').prop('disabled', true);
			$('#frm-add-gallery textarea').prop('disabled', true);
			$('#frm-add-gallery .btn').prop('disabled', true);
			$('.loading-overlay').css('display', 'block');

			$.ajax({
				url: '/admin-gallery/create',
				type: 'POST',
				data: data,
				dataType: 'json',
				processData: false,
				contentType: false,
				success: function(data) {
					$('#frm-add-gallery input').prop('disabled', false);
					$('#frm-add-gallery textarea').prop('disabled', false);
					$('#frm-add-gallery .btn').prop('disabled', false);
					$('.loading-overlay').css('display', 'none');
					$('#frm-add-gallery')[0].reset();
					$('#add-gallery').modal('hide');
					$('.modal-backdrop').hide();
					$('.gallery-images').fadeOut(function() {
						$(this).remove();
					});
					showImage();

					$.toast({
						heading: 'Success!',
						text: data.success,
						position: 'top-right',
						icon: 'success',
						hideAfter: 3500,
						stack: 6
					});
				},
				error: function(xhr, error, ajaxOptions, thrownError) {
					$('#frm-add-gallery')[0].reset();
					$('#add-gallery').modal('hide');
					$('.modal-backdrop').hide();
					$('.gallery-images').fadeOut(function() {
						$(this).remove();
					});
					showImage();

					$.toast({
						heading: 'Error!',
						text: 'An error has occured while uploading image. Image size is too big or maybe invalid. Please try again',
						position: 'top-right',
						icon: 'error',
						hideAfter: 3500,
						stack: 6
					});
				}
			});
		}
	});
}

function editImage() {
	$(document).on('click', '.edit-image-button', function() {
		$('#frm-edit-gallery')[0].reset();
		$('input').removeClass('my-error-class');

		var id = $(this).data('id');
		var image = $(this).data('image');
		var caption = $(this).data('caption');

		$('#edit-image-id').val(id);
		$('#image-show').attr('src', '/uploads/gallery/images/original/' + image);
		$('#edit-caption').text(caption);
	})

	$("#frm-edit-gallery").validate({
        ignore: [],
        debug: false,
        rules: {
            edit_photo: {
                required: true,
                extension: "jpg|png|jpeg"
            }
        },
        messages: {
            edit_photo: {
                required: "Required field cannot be left blank.",
                extension: "Invalid file. Please select valid image file and try again."
            }
        },
        submitHandler: function (frm_store_blog, e) {
			e.preventDefault();

			var data = new FormData($("#frm-edit-gallery")[0]);

			$('#frm-edit-gallery input').prop('disabled', true);
			$('#frm-edit-gallery textarea').prop('disabled', true);
			$('#frm-edit-gallery .btn').prop('disabled', true);
			$('.loading-overlay').css('display', 'block');

			$.ajax({
				url: '/admin-gallery/update',
				type: 'POST',
				data: data,
				dataType: 'json',
				processData: false,
				contentType: false,
				success: function(data) {
					$('#frm-edit-gallery input').prop('disabled', false);
					$('#frm-edit-gallery textarea').prop('disabled', false);
					$('#frm-edit-gallery .btn').prop('disabled', false);
					$('.loading-overlay').css('display', 'none');
					$('#frm-edit-gallery')[0].reset();
					$('#edit-gallery').modal('hide');
					$('.modal-backdrop').hide();
					$('.gallery-images').fadeOut(function() {
						$(this).remove();
					});
					showImage();

					$.toast({
						heading: 'Success!',
						text: data.success,
						position: 'top-right',
						icon: 'success',
						hideAfter: 3500,
						stack: 6
					});
				},
				error: function(xhr, error, ajaxOptions, thrownError) {
					alert(xhr.responseText);
				}
			});
		}
	});
}

function deleteImage() {
	$(document).on('click', '.delete-image-button', function() {
		var id = $(this).data('id');
		$('#delete-image-id').val(id);
	});

	$('#frm-delete-gallery').on('submit').bind('submit', function(e) {
		e.preventDefault();

		var data = new FormData($("#frm-delete-gallery")[0]);

		$('#frm-delete-gallery .btn').prop('disabled', true);
		$('.loading-overlay').css('display', 'block');

		$.ajax({
			url: '/admin-gallery/delete',
			type: 'POST',
			data: data,
			dataType: 'json',
			processData: false,
			contentType: false,
			success: function(data) {
				$('#frm-delete-gallery .btn').prop('disabled', false);
				$('.loading-overlay').css('display', 'none');
				$('#frm-delete-gallery')[0].reset();
				$('#delete-gallery').modal('hide');
				$('.modal-backdrop').hide();

				$.toast({
					heading: 'Success!',
					text: data.success,
					position: 'top-right',
					icon: 'success',
					hideAfter: 3500,
					stack: 6
				});

				$('.gallery-images').fadeOut(function() {
					$(this).remove();
				});

				showImage();
			},
			error: function(xhr, error, ajaxOptions, thrownError) {
				alert(xhr.responseText);
			}
		});
	});
}

function showLogo() {
	$.ajax({
		url: '/admin-logo/show',
		method: 'GET',
		dataType: "json",
		success: function(data) {
			for (var i = 0, len = data.length; i < len; i++) {
				$('#gallery-logo').append('<div class="gallery-logo">' +
					'<figure class="d-flex justify-content-center align-items-center">' +
					'<img src="/uploads/gallery/logo/original/' + data[i].image + '" alt="' + data[i].name + '" width="100%">' +
					'<div class="overlay">' +
					'<div class="gallery-title">' +
					'<p class="text-center">' + data[i].name + '</p>' +
					'</div>' +
					'<div class="gallery-action">' +
					'<button class="btn btn-primary edit-logo-button" data-toggle="modal" data-target="#edit-client-logo" data-id="' + data[i].id + '" data-image="' + data[i].image + '" data-name="' + data[i].name + '"><i class="fas fa-edit"></i></button>&nbsp;' +
					'<button class="btn btn-primary delete-logo-button" data-toggle="modal" data-target="#delete-client-logo" data-id="' + data[i].id + '" data-image="' + data[i].image + '" data-name="' + data[i].name + '"><i class="fas fa-trash"></i></button>' +
					'</div>' +
					'</div>' +
					'</figure>' +
					'</div>');
			}
		}
	});
}

function uploadLogo() {
	$('#btn-upload-logo').on('click', function() {
		$('#frm-add-client-logo')[0].reset();
		frm_upload_logo.resetForm();
		$('.logo-preview').hide();
		$('input').removeClass('my-error-class');
	});

	frm_upload_logo = $('#frm-add-client-logo').validate({
		errorClass: "my-error-class",
		validClass: "my-valid-class",

		rules: {
			add_client_logo_name: "required",
			add_client_logo_image: {
				required: true,
				extension: "jpg|png|jpeg"
			}
		},
		messages: {
			add_client_logo_name: "Required field cannot be left blank.",
			add_client_logo_image: {
				required: "Required field cannot be left blank.",
				extension: "Invalid file. Please select valid image file and try again."
			}
		},
		submitHandler: function(frm_add_client_logo, e) {
			e.preventDefault();

			var data = new FormData($("#frm-add-client-logo")[0]);

			$('#frm-add-client-logo input').prop('disabled', true);
			$('#frm-add-client-logo .btn').prop('disabled', true);
			$('.loading-overlay').css('display', 'block');

			$.ajax({
				url: '/admin-logo/create',
				type: 'POST',
				data: data,
				dataType: 'json',
				processData: false,
				contentType: false,
				success: function(data) {
					$('#frm-add-client-logo input').prop('disabled', false);
					$('#frm-add-client-logo .btn').prop('disabled', false);
					$('.loading-overlay').css('display', 'none');
					$('#frm-add-client-logo')[0].reset();
					$('#add-client-logo').modal('hide');
					$('.modal-backdrop').hide();
					$('.logo-preview').hide();
					$('.gallery-logo').fadeOut(function() {
						$(this).remove();
					});
					showLogo();

					$.toast({
						heading: 'Success!',
						text: data.success,
						position: 'top-right',
						icon: 'success',
						hideAfter: 3500,
						stack: 6
					});
				},
				error: function(xhr, error, ajaxOptions, thrownError) {
					alert(xhr.responseText);
				}
			});
		}
	});
}

function editLogo() {
	$(document).on('click', '.edit-logo-button', function() {
		$('#frm-edit-client-logo')[0].reset();
		frm_edit_logo.resetForm();
		$('input').removeClass('my-error-class');

		var id = $(this).data('id');
		var name = $(this).data('name');
		var image = $(this).data('image');

		$('#edit-logo-id').val(id);
		$('#edit-client-logo-name').val(name);
		$('#logo-show-edit').attr('src', '/uploads/gallery/logo/original/' + image);
	})

	frm_edit_logo = $('#frm-edit-client-logo').validate({
		errorClass: "my-error-class",
		validClass: "my-valid-class",

		rules: {
			edit_client_logo_name: "required",
			edit_client_logo_image: {
				required: false,
				extension: "jpg|png|jpeg"
			}
		},
		messages: {
			edit_client_logo_name: "Required field cannot be left blank.",
			edit_client_logo_image: {
				required: "Required field cannot be left blank.",
				extension: "Invalid file. Please select valid image file and try again."
			}
		},
		submitHandler: function(frm_edit_client_logo, e) {
			e.preventDefault();

			var data = new FormData($("#frm-edit-client-logo")[0]);

			$('#frm-edit-client-logo input').prop('disabled', true);
			$('#frm-edit-client-logo .btn').prop('disabled', true);
			$('.loading-overlay').css('display', 'block');

			$.ajax({
				url: '/admin-logo/update',
				type: 'POST',
				data: data,
				dataType: 'json',
				processData: false,
				contentType: false,
				success: function(data) {
					$('#frm-edit-client-logo input').prop('disabled', false);
					$('#frm-edit-client-logo .btn').prop('disabled', false);
					$('.loading-overlay').css('display', 'none');
					$('#frm-edit-client-logo')[0].reset();
					$('#edit-client-logo').modal('hide');
					$('.modal-backdrop').hide();
					$('.gallery-logo').fadeOut(function() {
						$(this).remove();
					});
					showLogo();

					$.toast({
						heading: 'Success!',
						text: data.success,
						position: 'top-right',
						icon: 'success',
						hideAfter: 3500,
						stack: 6
					});
				},
				error: function(xhr, error, ajaxOptions, thrownError) {
					alert(xhr.responseText);
				}
			});
		}
	});
}

function deleteLogo() {
	$(document).on('click', '.delete-logo-button', function() {
		var id = $(this).data('id');
		var client = $(this).data('name');

		$('#delete-logo-id').val(id);
		$('#client-logo-name').text(client);
	});

	$('#frm-delete-client-logo').on('submit').bind('submit', function(e) {
		e.preventDefault();

		var data = new FormData($("#frm-delete-client-logo")[0]);

		$('#frm-delete-client-logo .btn').prop('disabled', true);
		$('.loading-overlay').css('display', 'block');

		$.ajax({
			url: '/admin-logo/delete',
			type: 'POST',
			data: data,
			dataType: 'json',
			processData: false,
			contentType: false,
			success: function(data) {
				$('#frm-delete-client-logo .btn').prop('disabled', false);
				$('.loading-overlay').css('display', 'none');
				$('#frm-delete-client-logo')[0].reset();
				$('#delete-client-logo').modal('hide');
				$('.modal-backdrop').hide();
				$('.gallery-logo').fadeOut(function() {
					$(this).remove();
				});
				showLogo();

				$.toast({
					heading: 'Success!',
					text: data.success,
					position: 'top-right',
					icon: 'success',
					hideAfter: 3500,
					stack: 6
				});
			},
			error: function(xhr, error, ajaxOptions, thrownError) {
				alert(xhr.responseText);
			}
		});
	});
}