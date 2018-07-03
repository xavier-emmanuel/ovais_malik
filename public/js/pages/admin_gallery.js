var frm_edit_image;
var frm_upload_logo;
var frm_edit_logo;

$(document).ready(function() {
	$('#btn-upload-photos').on('click', function(){
		$('div.image-displayed').remove();
	})

	$('.logo-preview').hide();

	$(function() {
    var imagesPreview = function(input, placeToInsertImagePreview) {
      if (input.files) {
          var filesAmount = input.files.length;

          for (i = 0; i < filesAmount; i++) {
              var reader = new FileReader();

              reader.onload = function(event) {
                  $($.parseHTML('<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 image-displayed">'
                  + '<input type="hidden" id="image-file" name="image_file[]" value="'+ event.target.result.split(',')[1] +'">'
                  + '<img src="'+ event.target.result +'" alt="" width="100%" height="130px">'
                  + '<textarea name="caption[]" cols="30" rows="3" class="form-control image-caption" placeHolder="Add caption here"></textarea>'
                	+ '</div>')).appendTo(placeToInsertImagePreview);
              }

              reader.readAsDataURL(input.files[i]);
          }
      }
    };
    $('#add-photos').on('change', function() {
        imagesPreview(this, 'div.preview-image');
    });
	});
	function readImageUrlEditPreview(input) {
	  if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $("#frm-edit-gallery").find('#image-show').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#frm-edit-gallery").find("#edit-photo").change(function() {
    readImageUrlEditPreview(this);
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
    readLogoUrlPreview(this);
    $('.logo-preview').show();
  });

  function readEditLogoUrlPreview(input) {
	  if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $("#frm-edit-client-logo").find('#logo-show-edit').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#frm-edit-client-logo").find("#edit-client-logo-image").change(function() {
    readEditLogoUrlPreview(this);
    $('.logo-preview-edit').show();
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
		success: function (data) {
			for (var i = 0, len = data.length; i < len; i++) {
				var image_caption = data[i].caption;
				var caption;
				if(image_caption == null) {
					caption = "";
				} else {
					caption = data[i].caption;
				}
				$('#gallery-images').append('<div class="gallery-images">'
																			+ '<figure class="d-flex justify-content-center align-items-center">'
																			+ '<img src="/uploads/gallery/images/original/'+ data[i].image +'" alt="'+ data[i].caption +'" width="100%">'
																			+ '<div class="overlay">'
																			+ '<div class="gallery-title">'
																			+ '<p class="text-center">'+ caption +'</p>'
																			+ '</div>'
																			+ '<div class="gallery-action">'
																			+ '<button class="btn btn-primary edit-image-button" data-toggle="modal" data-target="#edit-gallery" data-id="'+ data[i].id +'" data-image="'+ data[i].image +'" data-caption="'+ data[i].caption +'"><i class="fas fa-edit"></i></button>&nbsp;'
																			+ '<button class="btn btn-primary delete-image-button" data-toggle="modal" data-target="#delete-gallery" data-id="'+ data[i].id +'" data-image="'+ data[i].caption +'"><i class="fas fa-trash"></i></button>'
																			+ '</div>'
																			+ '</div>'
																			+ '</figure>'
																			+ '</div>');
			}
		}
	})
}

function uploadImage() {
	$('#frm-add-gallery').on('submit').bind('submit', function(e) {
		e.preventDefault();
		$('#btn-upload').attr('disabled', 'disabled').html('<i class="fas fa-spinner fa-spin"></i>&nbsp; Uploading');
		var data = new FormData($("#frm-add-gallery")[0]);

		$.ajax({
			url: '/admin-gallery/create',
			type: 'POST',
			data: data,
			dataType: 'json',
			processData: false,
			contentType: false,
			success: function (data) {
				$('#frm-add-gallery')[0].reset();
				$('#add-gallery').modal('hide');
				$('.modal-backdrop').hide();
				$('#btn-upload').removeAttr('disabled').html('<i class="fas fa-upload"></i>&nbsp; Upload');
				$('.gallery-images').remove();
				showImage();

				// toast popup js
				$.toast({
					heading: 'Success!',
					text: data.success,
					position: 'top-right',
					icon: 'success',
					hideAfter: 3500,
					stack: 6
				});
			}, error: function (xhr, error, ajaxOptions, thrownError) {
				// alert(xhr.responseText);
				$('#frm-add-gallery')[0].reset();
				$('#add-gallery').modal('hide');
				$('.modal-backdrop').hide();
				$('#btn-upload').removeAttr('disabled').html('<i class="fas fa-upload"></i>&nbsp; Upload');
				$('.gallery-images').remove();
				showImage();
				
				// toast popup js
				$.toast({
					heading: 'Error!',
					text: 'An error has occured while uploding image. Image size is too big or maybe invalid. Please try again',
					position: 'top-right',
					icon: 'error',
					hideAfter: 3500,
					stack: 6
				});
			}
		})
	})
}

function editImage() {
	$(document).on('click', '.edit-image-button', function() {
		$('#frm-edit-gallery')[0].reset();
		$('input').removeClass('my-error-class');

		var id = $(this).data('id');
		var image = $(this).data('image');
		var caption = $(this).data('caption');

		$('#edit-image-id').val(id);
		$('#image-show').attr('src', '/uploads/gallery/images/original/'+image);
		$('#edit-caption').text(caption);
	})

	$('#frm-edit-gallery').on('submit').bind('submit', function(e){
		e.preventDefault();
		$('#btn-edit-image').attr('disabled', 'disabled').html('<i class="fas fa-spinner fa-spin"></i>&nbsp; Updating');
		var data = new FormData($("#frm-edit-gallery")[0]);

		$.ajax({
			url: '/admin-gallery/update',
			type: 'POST',
			data: data,
			dataType: 'json',
			processData: false,
			contentType: false,
			success: function (data) {
				$('#frm-edit-gallery')[0].reset();
				$('#edit-gallery').modal('hide');
				$('.modal-backdrop').hide();
				$('#btn-edit-image').removeAttr('disabled').html('<i class="fas fa-save"></i>&nbsp; Update');
				$('.gallery-images').remove();
				showImage();

				// toast popup js
				$.toast({
					heading: 'Success!',
					text: data.success,
					position: 'top-right',
					icon: 'success',
					hideAfter: 3500,
					stack: 6
				});
			}, error: function (xhr, error, ajaxOptions, thrownError) {
				alert(xhr.responseText);
			}
		})
	})
}

function deleteImage() {
	$(document).on('click', '.delete-image-button', function() {
		var id = $(this).data('id');
		$('#delete-image-id').val(id);
	})

	$('#frm-delete-gallery').on('submit').bind('submit', function(e) {
		e.preventDefault();
		$('#btn-delete-image').attr('disabled', 'disabled').html('<i class="fas fa-spinner fa-spin"></i>&nbsp; Deleting');
		var data = new FormData($("#frm-delete-gallery")[0]);

		$.ajax({
			url: '/admin-gallery/delete',
			type: 'POST',
			data: data,
			dataType: 'json',
			processData: false,
			contentType: false,
			success: function (data) {
				$('#frm-delete-gallery')[0].reset();
				$('#delete-gallery').modal('hide');
				$('.modal-backdrop').hide();
				$('#btn-delete-image').removeAttr('disabled').html('<i class="fas fa-check"></i>&nbsp; Yes');

				// toast popup js
				$.toast({
					heading: 'Success!',
					text: data.success,
					position: 'top-right',
					icon: 'success',
					hideAfter: 3500,
					stack: 6
				});
				$('.gallery-images').remove();
				showImage();
			}, error: function (xhr, error, ajaxOptions, thrownError) {
				alert(xhr.responseText);
			}
		})
	})
}

function showLogo() {
	$.ajax({
		url: '/admin-logo/show',
		method: 'GET',
		dataType: "json",
		success: function (data) {
			for (var i = 0, len = data.length; i < len; i++) {
				$('#gallery-logo').append('<div class="gallery-logo">'
              	+ '<figure class="d-flex justify-content-center align-items-center">'
                + '<img src="/uploads/gallery/logo/original/'+ data[i].image +'" alt="'+ data[i].name +'" width="100%">'
                + '<div class="overlay">'
                + '<div class="gallery-title">'
                + '<p class="text-center">'+ data[i].name +'</p>'
                + '</div>'
                + '<div class="gallery-action">'
                + '<button class="btn btn-primary edit-logo-button" data-toggle="modal" data-target="#edit-client-logo" data-id="'+ data[i].id +'" data-image="'+ data[i].image +'" data-name="'+ data[i].name +'"><i class="fas fa-edit"></i></button>&nbsp;'
                + '<button class="btn btn-primary delete-logo-button" data-toggle="modal" data-target="#delete-client-logo" data-id="'+ data[i].id +'" data-image="'+ data[i].image +'" data-name="'+ data[i].name +'"><i class="fas fa-trash"></i></button>'
                + '</div>'
                + '</div>'
             		+ '</figure>'
            		+ '</div>');
			}
		}
	})
}

function uploadLogo() {
	$('#btn-upload-logo').on('click', function () {
		$('#frm-add-client-logo')[0].reset();
		frm_upload_logo.resetForm();
		$('.logo-preview').hide();
		$('input').removeClass('my-error-class');
	})

	frm_upload_logo = $('#frm-add-client-logo').validate({
		errorClass: "my-error-class",
		validClass: "my-valid-class",

		rules:
		{
			add_client_logo_name: "required",
			add_client_logo_image: "required"
		},
		messages:
		{
			add_client_logo_name: "Please input the client name.",
			add_client_logo_image: "Please input the client logo."
		},
		submitHandler: function (frm_add_client_logo, e) {
			e.preventDefault();
			$('#btn-add-logo').attr('disabled', 'disabled').html('<i class="fas fa-spinner fa-spin"></i>&nbsp; Saving');
			var data = new FormData($("#frm-add-client-logo")[0]);

			$.ajax({
				url: '/admin-logo/create',
				type: 'POST',
				data: data,
				dataType: 'json',
				processData: false,
				contentType: false,
				success: function (data) {
					$('#frm-add-client-logo')[0].reset();
					$('#add-client-logo').modal('hide');
					$('.modal-backdrop').hide();
					$('#btn-add-logo').removeAttr('disabled').html('<i class="fas fa-save"></i>&nbsp; Save');
					$('.logo-preview').hide();
					$('.gallery-logo').remove();
					showLogo();

					// toast popup js
					$.toast({
						heading: 'Success!',
						text: data.success,
						position: 'top-right',
						icon: 'success',
						hideAfter: 3500,
						stack: 6
					});
				}, error: function (xhr, error, ajaxOptions, thrownError) {
					alert(xhr.responseText);
				}
			})
		}
	})
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
		$('#logo-show-edit').attr('src', '/uploads/gallery/logo/original/'+image);
	})

	frm_edit_logo = $('#frm-edit-client-logo').validate({
		errorClass: "my-error-class",
		validClass: "my-valid-class",

		rules:
		{
			edit_client_logo_name: "required"
		},
		messages:
		{
			edit_client_logo_name: "Please input the client name."
		},
		submitHandler: function (frm_edit_client_logo, e) {
		e.preventDefault();
		$('#btn-edit-logo').attr('disabled', 'disabled').html('<i class="fas fa-spinner fa-spin"></i>&nbsp; Updating');
		var data = new FormData($("#frm-edit-client-logo")[0]);

		$.ajax({
			url: '/admin-logo/update',
			type: 'POST',
			data: data,
			dataType: 'json',
			processData: false,
			contentType: false,
			success: function (data) {
				$('#frm-edit-client-logo')[0].reset();
				$('#edit-client-logo').modal('hide');
				$('.modal-backdrop').hide();
				$('#btn-edit-logo').removeAttr('disabled').html('<i class="fas fa-save"></i>&nbsp; Update');
				$('.gallery-logo').remove();
				showLogo();

				// toast popup js
				$.toast({
					heading: 'Success!',
					text: data.success,
					position: 'top-right',
					icon: 'success',
					hideAfter: 3500,
					stack: 6
				});
			}, error: function (xhr, error, ajaxOptions, thrownError) {
				alert(xhr.responseText);
			}
		})
		}
	})
}

function deleteLogo() {
	$(document).on('click', '.delete-logo-button', function() {
		var id = $(this).data('id');
		var client = $(this).data('name');
		
		$('#delete-logo-id').val(id);
		$('#client-logo-name').text(client);
	})

	$('#frm-delete-client-logo').on('submit').bind('submit', function(e) {
		e.preventDefault();
		$('#btn-delete-logo').attr('disabled', 'disabled').html('<i class="fas fa-spinner fa-spin"></i>&nbsp; Deleting');
		var data = new FormData($("#frm-delete-client-logo")[0]);

		$.ajax({
			url: '/admin-logo/delete',
			type: 'POST',
			data: data,
			dataType: 'json',
			processData: false,
			contentType: false,
			success: function (data) {
				$('#frm-delete-client-logo')[0].reset();
				$('#delete-client-logo').modal('hide');
				$('.modal-backdrop').hide();
				$('#btn-delete-logo').removeAttr('disabled').html('<i class="fas fa-check"></i>&nbsp; Yes');
				$('.gallery-logo').remove();
				showLogo();

				// toast popup js
				$.toast({
					heading: 'Success!',
					text: data.success,
					position: 'top-right',
					icon: 'success',
					hideAfter: 3500,
					stack: 6
				});
			}, error: function (xhr, error, ajaxOptions, thrownError) {
				alert(xhr.responseText);
			}
		})
	})
}
