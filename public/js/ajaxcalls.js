$(document).ready(function () {
	var page = 1;
	var current_page = 1;
	var total_page = 0;
	var is_ajax_fire = 0;
	var offset = -new Date().getTimezoneOffset();
	if(location.pathname === '/quotes')
		getAjaxQuotes();
	else if(location.pathname === '/studies')
		getAjaxStudies()
	else if(location.pathname === '/home') {
		showRandomQuotes();
		setInterval(showRandomQuotes, 10000);
		showLatestStudies();
		setInterval(showLatestStudies, 10000);
	}

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	function showRandomQuotes(){
		var quotes = '';
		$.ajax({
			dataType: 'json',
			url: 'randomquotes',
			type: 'GET',
			success: function(result) {
				createQuoteView(result);
			},
			error: function (error) {
				console.log('error',error);
			}
		});
	}
	function getAjaxQuotes() {
		$.ajax({
			dataType: 'json',
			url: 'quote-ajax',
			data: {page:page}
		}).done(function(data){
			total_page = data.last_page;
			current_page = data.current_page;
			$('#pagination').twbsPagination({
				totalPages: total_page,
				visiblePages: current_page,
				onPageClick: function (event, pageL) {
					page = pageL;
					if(is_ajax_fire != 0){
						getQuotePageData();
					}
				}
			});
			createQuoteView(data.data);
			is_ajax_fire = 1;
		});
	}
	function getQuotePageData() {
		$.ajax({
			dataType: 'json',
			url: 'quote-ajax',
			data: {page:page}
		}).done(function(data){
			createQuoteView(data.data);
		});
	}
	function createQuoteView(data) {
		var quotes = '';
		data.forEach(function(quote) {
			var profileImage = quote.user.profile_image ? quote.user.profile_image : "images/default-avatar.png";
			var middlename = quote.user.middlename ? ' ' + quote.user.middlename + ' ' : ' ';
			quotes += '<div class="tim-typo">' +
				'<span class="tim-note">' +
				'<a href="profile/' + quote.user.id + '">' +
				'<img class="quote-img" src="' + profileImage + '"/>' +
				'</a>' +
				'</span>' +
				'<blockquote>' +
				'<p>' +
				quote.quote +
				'</p>' +
				'<small>' +
				'<a href="profile/' + quote.user.id + '">' +
				quote.user.firstname + middlename + quote.user.lastname +
				'</a>' +
				'<span class="posted-date">'+moment.utc(quote.created_at).utcOffset(offset).startOf('second').fromNow()+'</span>'+
				'</small>' +
				'</blockquote>' +
				'</div>';
		});
		if(quotes === '') {
			quotes = 'Sorry! Nobody has posted any quote today.';
			$('#card-content-quote').html(quotes);
		}else
			$('#card-content-quote').hide().html(quotes).fadeIn('slow');
	}

	function showLatestStudies(){
		var studies = '';
		$.ajax({
			dataType: 'json',
			url: 'lateststudy',
			type: 'GET',
			success: function(result) {
				createStudyView(result);
			},
			error: function (error) {
				console.log('error',error);
			}
		});
	}
	function getAjaxStudies() {
		$.ajax({
			dataType: 'json',
			url: 'study-ajax',
			data: {page:page}
		}).done(function(data){
			total_page = data.last_page;
			current_page = data.current_page;
			$('#pagination').twbsPagination({
				totalPages: total_page,
				visiblePages: current_page,
				onPageClick: function (event, pageL) {
					page = pageL;
					if(is_ajax_fire != 0){
						getStudyPageData();
					}
				}
			});
			createStudyView(data.data);
			is_ajax_fire = 1;
		});
	}
	function getStudyPageData() {
		$.ajax({
			dataType: 'json',
			url: 'study-ajax',
			data: {page:page}
		}).done(function(data){
			createStudyView(data.data);
		});
	}
	function createStudyView(data) {
		var studies = '';
		data.forEach(function(study) {
			var profileImage = study.user.profile_image ? study.user.profile_image : "images/default-avatar.png";
			var middlename = study.user.middlename ? ' ' + study.user.middlename + ' ' : ' ';
			var links = '';
			if(study.links) {
				var studyLinks = study.links.split(',');
				console.log(studyLinks);
				studyLinks.forEach(function(sl){
					links += '<span class="link"><a target="_blank" href="' + sl + '">' + sl + '</a></span>';
				});
			}
			studies += '<div class="tim-typo">' +
				'<span class="tim-note">' +
				'<a href="profile/' + study.user.id + '">' +
				'<img class="study-img" src="' + profileImage + '"/>' +
				'</a>' +
				'</span>' +
				'<blockquote>' +
				'<p>' +
				study.study + links +
				'</p>' +
				'<small>' +
				'<a class="profile-link" href="profile/' + study.user.id + '">' +
				study.user.firstname + middlename + study.user.lastname +
				'</a>' +
				'<span class="posted-date">'+moment.utc(study.created_at).utcOffset(offset).startOf('second').fromNow()+'</span>'+
				'</small>' +
				'</blockquote>' +
				'</div>';
		});
		$('#card-content-study').hide().html(studies).fadeIn('slow');
	}
});