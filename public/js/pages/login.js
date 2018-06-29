var login_form;

$(document).ready(function() {
	login();
})

function login() {
	$('#login-button').on('click', function() {
		$('#frm-login')[0].reset();
		login_form.resetForm();
		$('input').removeClass('my-error-class');

		$('input').on('focus', function() {
			$('#error').hide();
		})
	})

	login_form = $('#frm-login').validate({
		errorClass: "my-error-class",
   	validClass: "my-valid-class",

   	rules:
   		{
				login_username: "required",
				login_password: "required"
			},
		messages:
			{
				login_username: "Please input your username.",
				login_password: "Please input your password."
			},
		submitHandler: function(frm_login, e){
			e.preventDefault();
			$('#btn-login').attr('disabled', 'disabled').html('<i class="fas fa-spinner fa-pulse"></i>&nbsp; LOGIN');
			$('#frm-login').unbind('submit').submit();
		}
	})
}