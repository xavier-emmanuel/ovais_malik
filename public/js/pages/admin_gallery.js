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
                  $($.parseHTML('<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 image-displayed">'
                  + '<input type="hidden" class="image-name" name="image_name" value="'+ event.target.result +'">'
                  + '<img src="'+ event.target.result +'" alt="" width="100%" height="130px">'
                  + '<textarea name="caption" cols="30" rows="3" class="form-control image-caption" placeHolder="Add caption here"></textarea>'
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

	function readUrlPreview(input) {
	  if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $("#frm-add-client-logo").find('#logo-show').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#frm-add-client-logo").find("#add-client-logo-image").change(function() {
    readUrlPreview(this);
    $('.logo-preview').show();
  });

	uploadImage();
	showImage();
});

function showImage() {
	$.ajax({
		url: '/admin-gallery/show',
		method: 'GET',
		dataType: "json",
		success: function (data) {
			for (var i = 0, len = data.length; i < len; i++) {
				$('#gallery-images').append('<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 gallery-images">'
              	+ '<figure>'
                + '<img src="uploads/gallery/images/thumbnails/'+ data[i].image +'" alt="" width="100%">'
                + '<div class="overlay">'
                + '<div class="gallery-title">'
                + '<p class="text-center">'+ data[i].caption +'</p>'
                + '</div>'
                + '<div class="gallery-action">'
                + '<button class="btn btn-primary"><i class="fas fa-edit"></i></button>&nbsp;'
                + '<button class="btn btn-primary"><i class="fas fa-trash"></i></button>'
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
		$('#btn-edit-audio').attr('disabled', 'disabled').html('<i class="fas fa-spinner fa-spin"></i>&nbsp; Uploading');
		var data = new FormData($("#frm-add-gallery")[0]);
		var image_caption = [];
		$('.image-caption').each(function() {
			image_caption.push($(this).val());
		})

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
				$('#btn-edit-audio').removeAttr('disabled').html('<i class="fas fa-upload"></i>&nbsp; Upload');

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