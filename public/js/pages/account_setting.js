var frm_admin_settings;

$(document).ready(function() {
	frm_admin_settings = $('#frm-admin-settings').validate({
		errorClass: "my-error-class",

		rules: {
			// new_username: {
			// 	required: true,
			// 	minlength: 4,
			// 	maxlength: 20,
			// },
			new_password: {
				minlength: 6,
				maxlength: 20
			},
			retype_password: {
				equalTo: "#new-password"
			}
		},
		messages: {
			// new_username: {
			// 	required: "Required field cannot be left blank."
			// }
		},
		submitHandler: function (frm_admin_settings, e) {
			e.preventDefault();

			var data = new FormData($("#frm-admin-settings")[0]);

			$('#frm-admin-settings input').prop('disabled', true);
			$('#frm-admin-settings .btn').prop('disabled', true);
			$('.loading-overlay').css('display', 'block');

			$.ajax({
				url: '/admin-change-credentials',
				type: 'POST',
				data: data,
				dataType: 'json',
				processData: false,
				contentType: false,
				success: function (data) {
					if(data.success == false) {
						$('#frm-admin-settings input').prop('disabled', false);
						$('#frm-admin-settings .btn').prop('disabled', false);
						$('.loading-overlay').css('display', 'none');
						$('#frm-admin-settings')[0].reset();
						$('#admin-settings').modal('hide');
						$('.modal-backdrop').hide();

						$.toast({
							heading: 'Error!',
							text: data.message,
							position: 'top-right',
							icon: 'error',
							hideAfter: 3500,
							stack: 6
						});
					} else {
						$('#frm-admin-settings input').prop('disabled', false);
						$('#frm-admin-settings .btn').prop('disabled', false);
						$('.loading-overlay').css('display', 'none');
						$('#frm-admin-settings')[0].reset();
						$('#admin-settings').modal('hide');
						$('.modal-backdrop').hide();

						$.toast({
							heading: 'Success!',
							text: data.success,
							position: 'top-right',
							icon: 'success',
							hideAfter: 3500,
							stack: 6
						});
					}
				}, error: function (xhr, error, ajaxOptions, thrownError) {
					alert(xhr.responseText);
				}
			});
		}
	});
});

