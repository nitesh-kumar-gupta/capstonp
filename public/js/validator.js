searchVisible = 0;
transparent = true;
$(document).ready(function(){
	$.material.init();
	$('[rel="tooltip"]').tooltip();
	var $validator = $('#user_profile').validate({
		rules: {
			reg_id: {
				required: true,
				minlength: 5,
				number: true
			},
			firstname: {
				required: true,
				minlength: 3
			},
			lastname: {
				required: true,
				minlength: 3
			},
			email: {
				required: true,
				minlength: 3,
				email: true
			},
			batch: {
				required: true
			},
			branch: {
				required: true
			},
			course: {
				required: true
			},
			semester: {
				required: true
			},
			address: {
				maxlength: 400
			},
			about_me: {
				maxlength: 700
			}
		},
		messages:{
			reg_id:{
				required: "Registration Number is required",
				minlength: "Registration Number be of minimum 5 digits",
				number: "Must be number"
			},
			firstname:{
				required: "First name is required",
				minlength: "First name must have minimum 3 alphabets"
			},
			lastname:{
				required: "Last name is required",
				minlength: "Last name must have minimum 3 alphabets"
			},
			email:{
				required: "Email is required",
				minlength: "Invalid Email",
				email: "Invalid Email"
			},
			batch: {
				required: "Please select your joining year",
			},
			branch: {
				required: "Please select your Branch",
			},
			course: {
				required: "Please select your course",
			},
			semester: {
				required: "Please select your current semester",
			},
			address: {
				maxlength: "You exceed the limit of address characters 400"
			},
			about_me: {
				maxlength: "You exceed the limit of about me characters 700"
			}
		}
		//,
		// errorPlacement: function(error, element) {
		// 	$(element).parent('div').addClass('has-error');
		// }
	});
	$('#btn-update-profile').click(function (e) {
		e.preventDefault();
		var disabled = $('#reg_id').removeAttr('disabled');
		var data = $('#user_profile').serialize();
		disabled.attr('disabled','disabled');
		if($('#user_profile').valid()){
			$('#btn-update-profile').attr('disabled',true);
			$('#btn-update-profile-text').html(' Please wait');
			$('#btn-update-profile-icon').addClass('fa fa-spinner fa-spin');
			$.ajax({
				url: 'update-profile',
				type: 'POST',
				data: data,
				success: function(result) {
					$('#btn-update-profile').attr('disabled',false);
					$('#btn-update-profile-text').html('Update profile');
					$('#btn-update-profile-icon').removeClass('fa fa-spinner fa-spin');
					$('#user_profile-error-message').removeClass('error alert-danger');
					$('#user_profile-error-message').addClass('success alert-success');
					$('#user_profile-error-message').removeClass('hide');
					$('#user_profile-error-message').html('Profile updated');
					$('.success').fadeIn(400).delay(2000).fadeOut(400);
					setTimeout(function(){
						$('#user_profile-error-message').removeClass('error alert-danger');
						$('#user_profile-error-message').addClass('success alert-success');x
					},2000);
					location.reload();
				},
				error: function (error) {
					$('#btn-update-profile').attr('disabled',false);
					$('#btn-update-profile-text').html('Update profile');
					$('#btn-update-profile-icon').removeClass('fa fa-spinner fa-spin');
					$('#user_profile-error-message').removeClass('hide');
					$('#user_profile-error-message span').html(' ');
					console.log(error);
					error = JSON.parse(error.responseText);
					errMsg = '';
					for(err in error)
						errMsg += '<i class="fa fa-exclamation"></i> '+error[err]+'</br>';
					$('#user_profile-error-message').html(errMsg);
					console.log(errMsg);
				}
			});
		}
	});
	$('#img-profile').click(function (e) {
		e.preventDefault();
		var client = filestack.init('A6TyxFZ2QSHOoQEcmsQA3z', { policy: 'policy', signature: 'signature' });
		client.pick({
			accept: 'image/*',
				storeTo: {
				location: 's3'
			},
			transformOptions: {
				transformations: {
					crop: true
				}
			}
		}).then(function(result) {
			var data = {
				"reg_id":$('#reg_id').val(),
				"_token":"TeM9cCKO2bURdjj6hvoFgTLi7PZvXRIZZbQ71P6O",
				"profile_image":result.filesUploaded[0].url
			};
			$.ajax({
				url: 'update-profile-image',
				type: 'POST',
				data: data,
				success: function(result) {
					console.log(data.profile_image);
					$('#img-profile').attr('src',data.profile_image);
				},
				error: function (error) {
					console.log(errMsg);
				}
			});
		});
	})

	var $validator = $('#formQuotePost').validate({
		rules: {
			quote: {
				required: true,
				minlength: 20
			}
		},
		messages:{
			quote:{
				required: "Cannot post empty",
				minlength: "Quote must be of minimum 20 alphabets"
			}
		}
		//,
		// errorPlacement: function(error, element) {
		// 	$(element).parent('div').addClass('has-error');
		// }
	});
	$('#btn-quote').click(function (e) {
		e.preventDefault();
		if($('#formQuotePost').valid()){
			var data = $('#formQuotePost').serialize();
			$('#btn-quote').attr('disabled',true);
			$('#btn-quote-text').html(' Please wait');
			$('#btn-quote-icon').addClass('fa fa-spinner fa-spin');
			$.ajax({
				url: 'addnewquote',
				type: 'POST',
				data: data,
				success: function(result) {
					$('#btn-quote').attr('disabled',false);
					$('#btn-quote-text').html('Post Quote');
					$('#btn-quote-icon').removeClass('fa fa-spinner fa-spin');
					$('#quote').val('');
					$('#quotediv').addClass('is-empty');
				},
				error: function (error) {
					$('#btn-quote').attr('disabled',false);
					$('#btn-quote-text').html('Post Quote');
					$('#btn-quote-icon').removeClass('fa fa-spinner fa-spin');
					error = JSON.parse(error.responseText);
					errMsg = '';
					for(err in error)
						errMsg += '<i class="fa fa-exclamation"></i> '+error[err]+'</br>';
					$('#post_quote-error-message').html(errMsg);
				}
			});
		}
	});
});