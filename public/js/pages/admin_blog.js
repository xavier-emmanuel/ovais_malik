$(document).ready(function () {

    function readUrlPreview(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $("#frm-create-blog").find('#image-preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#frm-create-blog").find("#add-blog-featured-image").change(function() {
        readUrlPreview(this);
    });

    function readUrlEdit(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $("#frm-edit-blog").find('#image-preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#frm-edit-blog").find("#edit-blog-featured-image").change(function() {
        readUrlEdit(this);
    });

    $("#frm-create-blog").validate({
        ignore: [],
        debug: false,
        rules: {
            blog_title: {
                required:true,
                remote:{
                    url:"/check-blog-title",
                    type:"get"
               }
            },
            blog_featured_image: "required",
            blog_category: "required",
            blog_content: {
                required: function() {
                    CKEDITOR.instances.blog_content.updateElement();
                },
                minlength: 10
            }
        },
        messages: {
            blog_title: {
                required: "The title field is required.",
                remote: "This title already exists."
            },
            blog_featured_image: "The featured image field is required.",
            blog_category: "The category field is required.",
            blog_content: {
                required: "Please enter Text",
                minlength: "Please enter 10 characters"
            }
        },
        submitHandler: function (frm_store_blog, e) {
            event.preventDefault();

            var data = new FormData($("#frm-create-blog")[0]);

            $('#frm-create-blog input').prop('disabled', true);
            $('#frm-create-blog .btn').prop('disabled', true);
            $('.btn-publish').html('<i class="fas fa-spinner fa-spin"></i>&nbsp; Publishing');

            $.ajax({
                url: '/admin-blog/create/store',
                type: 'POST',
                data: data,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function (data) {
                    localStorage.setItem("Create",data.OperationStatus);
                    setTimeout(function(){
                        window.location.href = '/admin-blog';
                    },2000);
                },
                error: function (xhr, error, ajaxOptions, thrownError) {
                    alert(xhr.responseText);
                }
            });
        }
    });

    $("#frm-edit-blog").validate({
        ignore: [],
        debug: false,
        rules: {
            blog_title: "required",
            blog_category: "required",
            blog_content: {
                required: function() {
                    CKEDITOR.instances.blog_content.updateElement();
                },
                minlength: 10
            }
        },
        messages: {
            blog_title: {
                required: "The title field is required."
            },
            blog_category: "The category field is required.",
            blog_content: {
                required: "Please enter Text",
                minlength: "Please enter 10 characters"
            }
        },
        submitHandler: function (frm_update_blog, e) {
            event.preventDefault();

            var data = new FormData($("#frm-edit-blog")[0]);

            $('#frm-edit-blog input').prop('disabled', true);
            $('#frm-edit-blog .btn').prop('disabled', true);
            $('.btn-publish').html('<i class="fas fa-spinner fa-spin"></i>&nbsp; Publishing');

            $.ajax({
                url: '/admin-blog/edit/update',
                type: 'POST',
                data: data,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function (data) {
                    localStorage.setItem("Update",data.OperationStatus);
                    setTimeout(function(){
                        window.location.href = '/admin-blog';
                    },2000);
                },
                error: function (xhr, error, ajaxOptions, thrownError) {
                    if(xhr.status == 500){
                        $('.btn-publish').html('<i class="fas fa-newspaper"></i>&nbsp; Publish');
                        $('#frm-edit-blog input').prop('disabled', false);
                        $('#frm-edit-blog .btn').prop('disabled', false);
                        $('#edit-blog-title').addClass('error');
                        $('#div').append('<label id="edit-blog-title-error" class="error" for="edit-blog-title">The title already exists.</label>');
                    }
                }
            });
        }
    });

});