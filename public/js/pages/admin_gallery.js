$(document).ready(function() {
	$('#btn-upload-photos').on('click', function(){
		$('div.image-displayed').remove();
	})

	$(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {
      if (input.files) {
          var filesAmount = input.files.length;

          for (i = 0; i < filesAmount; i++) {
              var reader = new FileReader();

              reader.onload = function(event) {
                  $($.parseHTML('<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 image-displayed">'
                  + '<img src="'+ event.target.result +'" alt="" width="100%" height="130px">'
                  + '<textarea name="" id="" cols="30" rows="3" class="form-control" placeHolder="Add caption here"></textarea>'
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
});