searchVisible = 0;
transparent = true;
$(document).ready(function(){
	$.material.init();
	$('[rel="tooltip"]').tooltip();
	var $validator = $('.wizard-card form').validate({
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
			password: {
				required: true,
				minlength: 6,
			},
			password_confirmation: {
				equalTo : '#password',
				required: true,
				minlength: 6,
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
			password: {
				required: "Password is required",
				minlength: "Password must be of minimum 6 characters"
			},
			password_confirmation: {
				required: "Confirm Password is required",
				minlength: "Confirm Password not matched with Password",
				equalTo: "Confirm Password not matched with Password"
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
			}
		}
		//,
		// errorPlacement: function(error, element) {
		// 	$(element).parent('div').addClass('has-error');
		// }
	});
	$('.wizard-card').bootstrapWizard({
		'tabClass': 'nav nav-pills',
		'nextSelector': '.btn-next',
		'previousSelector': '.btn-previous',
		onNext: function(tab, navigation, index) {
			var $valid = $('.wizard-card form').valid();
			if(!$valid) {
				$validator.focusInvalid();
				return false;
			}
		},
		onInit : function(tab, navigation, index){
			//check number of tabs and fill the entire row
			var $total = navigation.find('li').length;
			$width = 100/$total;
			var $wizard = navigation.closest('.wizard-card');
			$display_width = $(document).width();
			if($display_width < 600 && $total > 3){
				$width = 50;
			}
			navigation.find('li').css('width',$width + '%');
			$first_li = navigation.find('li:first-child a').html();
			$moving_div = $('<div class="moving-tab">' + $first_li + '</div>');
			$('.wizard-card .wizard-navigation').append($moving_div);
			refreshAnimation($wizard, index);
			$('.moving-tab').css('transition','transform 0s');
		},
		onTabClick : function(tab, navigation, index){
			var $valid = $('.wizard-card form').valid();
			if(!$valid){
				return false;
			} else{
				return true;
			}
		},
		onTabShow: function(tab, navigation, index) {
			var $total = navigation.find('li').length;
			var $current = index+1;
			var $wizard = navigation.closest('.wizard-card');
			// If it's the last tab then hide the last button and show the finish instead
			if($current >= $total) {
				$($wizard).find('.btn-next').hide();
				$($wizard).find('.btn-finish').show();
			} else {
				$($wizard).find('.btn-next').show();
				$($wizard).find('.btn-finish').hide();
			}
			button_text = navigation.find('li:nth-child(' + $current + ') a').html();
			setTimeout(function(){
				$('.moving-tab').text(button_text);
			}, 150);
			var checkbox = $('.footer-checkbox');
			if( !index == 0 ){
				$(checkbox).css({
					'opacity':'0',
					'visibility':'hidden',
					'position':'absolute'
				});
			} else {
				$(checkbox).css({
					'opacity':'1',
					'visibility':'visible'
				});
			}
			refreshAnimation($wizard, index);
		}
	});
// Prepare the preview for profile picture
	$("#wizard-picture").change(function(){
		readURL(this);
	});
	$('[data-toggle="wizard-radio"]').click(function(){
		wizard = $(this).closest('.wizard-card');
		wizard.find('[data-toggle="wizard-radio"]').removeClass('active');
		$(this).addClass('active');
		$(wizard).find('[type="radio"]').removeAttr('checked');
		$(this).find('[type="radio"]').attr('checked','true');
	});
	$('[data-toggle="wizard-checkbox"]').click(function(){
		if( $(this).hasClass('active')){
			$(this).removeClass('active');
			$(this).find('[type="checkbox"]').removeAttr('checked');
		} else {
			$(this).addClass('active');
			$(this).find('[type="checkbox"]').attr('checked','true');
		}
	});
	$('.set-full-height').css('height', 'auto');

	$('#btn-finish').click(function(e){
		e.preventDefault();
		if($('.wizard-card form').valid()) {
			$('#btn-finish').attr('disabled',true);
			$('#btn-finish-text').html(' Please wait');
			$('#btn-finish-icon').addClass('fa fa-spinner fa-spin');
			$.ajax({
				url: 'register',
				type: 'POST',
				data: $('#formRegister').serialize(),
				success: function(result) {
					console.log('success',result);
					$('#btn-finish').attr('disabled',false);
					$('#btn-finish-text').html('Finish');
					$('#btn-finish-icon').removeClass('fa fa-spinner fa-spin');
					$('#register-error-message').addClass('hide');
					$('#register-error-message span').html(' ');
					location.reload();
				},
				error: function (error) {
					$('#btn-finish').attr('disabled',false);
					$('#btn-finish-text').html('Finish');
					$('#btn-finish-icon').removeClass('fa fa-spinner fa-spin');
					$('#register-error-message').removeClass('hide');
					$('#register-error-message span').html(' '+error.responseText);
				}
			});
		}
	});
	$('#btn-login').click(function(e){
		e.preventDefault();
		if($('.wizard-card form').valid()) {
			$('#btn-login').attr('disabled',true);
			$('#btn-login-text').html(' Please wait');
			$('#btn-login-icon').addClass('fa fa-spinner fa-spin');
			$.ajax({
				url: 'login',
				type: 'POST',
				data: $('#formLogin').serialize(),
				success: function(result) {
					$('#btn-login').attr('disabled',false);
					$('#btn-login-text').html('Login');
					$('#btn-login-icon').removeClass('fa fa-spinner fa-spin');
					$('#login-error-message').addClass('hide');
					$('#login-error-message span').html(' ');
					location.reload();
				},
				error: function (error) {
					$('#btn-login').attr('disabled',false);
					$('#btn-login-text').html('Finish');
					$('#btn-login-icon').removeClass('fa fa-spinner fa-spin');
					$('#login-error-message').removeClass('hide');
					console.log('login error',error);
					$('#login-error-message span').html(' Invalid email or password');
				}
			});
		}
	});
});
//Function to show image before upload
function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
			$('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
		}
		reader.readAsDataURL(input.files[0]);
	}
}

$(window).resize(function(){
	$('.wizard-card').each(function(){
		$wizard = $(this);
		index = $wizard.bootstrapWizard('currentIndex');
		refreshAnimation($wizard, index);
		$('.moving-tab').css({
			'transition': 'transform 0s'
		});
	});
});
function refreshAnimation($wizard, index){
	total_steps = $wizard.find('li').length;
	move_distance = $wizard.width() / total_steps;
	step_width = move_distance;
	move_distance *= index;
	$current = index + 1;
	if($current == 1){
		move_distance -= 8;
	} else if($current == total_steps){
		move_distance += 8;
	}
	$wizard.find('.moving-tab').css('width', step_width);
	$('.moving-tab').css({
		'transform':'translate3d(' + move_distance + 'px, 0, 0)',
		'transition': 'all 0.5s cubic-bezier(0.29, 1.42, 0.79, 1)'
	});
}
materialDesign = {
	checkScrollForTransparentNavbar: debounce(function() {
		if($(document).scrollTop() > 260 ) {
			if(transparent) {
				transparent = false;
				$('.navbar-color-on-scroll').removeClass('navbar-transparent');
			}
		} else {
			if( !transparent ) {
				transparent = true;
				$('.navbar-color-on-scroll').addClass('navbar-transparent');
			}
		}
	}, 17)
}
function debounce(func, wait, immediate) {
	var timeout;
	return function() {
		var context = this, args = arguments;
		clearTimeout(timeout);
		timeout = setTimeout(function() {
			timeout = null;
			if (!immediate) func.apply(context, args);
		}, wait);
		if (immediate && !timeout)
			func.apply(context, args);
	};
};