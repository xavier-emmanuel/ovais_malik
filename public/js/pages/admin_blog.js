$(document).ready(function () {
    function readUrlPreview(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $("#frm-create-blog").find('#image-preview').attr('src', e.target.result);
            };
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
            };
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
                required: true,
                minlength: 8,
                maxlength: 35,
                remote: {
                    url:"/check-blog-title",
                    type:"get"
               }
            },
            blog_description: {
                required: true,
                minlength: 10,
                maxlength: 80
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
                required: "Required field cannot be left blank.",
                remote: "This title already exists. Try different title.",
                minlength: "Please enter at least 8 characters.",
                maxlength: "Please enter no more than 35 characters."
            },
            blog_description: {
                required: "Required field cannot be left blank.",
                minlength: "Please enter at least 10 characters.",
                maxlength: "Please enter no more than 80 characters."
            },
            blog_featured_image: "Required field cannot be left blank.",
            blog_category: "Please select category.",
            blog_content: {
                required: "Required field cannot be left blank.",
                minlength: "Please enter at least 10 characters."
            }
        },
        submitHandler: function (frm_store_blog, e) {
            event.preventDefault();

            var data = new FormData($("#frm-create-blog")[0]);

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
            blog_title: {
                required: true,
                minlength: 8,
                maxlength: 35
            },
            blog_description: {
                required: true,
                minlength: 10,
                maxlength: 80
            },
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
                required: "Required field cannot be left blank.",
                remote: "This title already exists. Try different title.",
                minlength: "Please enter at least 8 characters.",
                maxlength: "Please enter no more than 35 characters."
            },
            blog_description: {
                required: "Required field cannot be left blank.",
                minlength: "Please enter at least 10 characters.",
                maxlength: "Please enter no more than 80 characters."
            },
            blog_category: "Please select category.",
            blog_content: {
                required: "Required field cannot be left blank.",
                minlength: "Please enter at least 10 characters."
            }
        },
        submitHandler: function (frm_update_blog, e) {
            event.preventDefault();

            var data = new FormData($("#frm-edit-blog")[0]);

            $('.btn-publish').html('<i class="fas fa-spinner fa-spin"></i>&nbsp; Updating');

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
                    }, 2000);
                },
                error: function (xhr, error, ajaxOptions, thrownError) {
                    if(xhr.status == 500){
                        $('.btn-publish').html('<i class="fas fa-newspaper"></i>&nbsp; Update');
                        $('#edit-blog-title').addClass('error');
                        $('#div').append('<label id="edit-blog-title-error" class="error" for="edit-blog-title">The title already exists.</label>');
                    }
                }
            });
        }
    });
});