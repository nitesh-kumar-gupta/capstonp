$(document).ready(function () {
	var page = 1;
	var current_page = 1;
	var total_page = 0;
	var is_ajax_fire = 0;
	var offset = -new Date().getTimezoneOffset();
	if(location.pathname === '/quotes')
		getAllQuotes();
	else if(location.pathname === '/home') {
		showRandomQuotes();
		setInterval(showRandomQuotes, 10000);
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
				result.forEach(function(quote){
					var profileImage = quote.user.profile_image?quote.user.profile_image:"images/default-avatar.png";
					var middlename = quote.user.middlename?' '+quote.user.middlename+' ':' ';
					quotes+='<div class="tim-typo">'+
						'<span class="tim-note">'+
						'<a href="profile/'+quote.user.id+'">'+
						'<img class="quote-img" src="'+profileImage+'"/>'+
						'</a>'+
						'</span>'+
						'<blockquote>'+
						'<p>'+
						quote.quote+
						'</p>'+
						'<small>'+
						'<a href="profile/'+quote.user.id+'">'+
						quote.user.firstname+middlename+quote.user.lastname+
						'</a>'+
						'<span class="posted-date">'+moment.utc(quote.created_at).utcOffset(offset).startOf('second').fromNow()+'</span>'+
						'</small>'+
						'</blockquote>'+
						'</div>';
				});
				if(quotes === '') {
					quotes = 'Sorry! Nobody has posted any quote today.';
					$('#card-content-quote').html(quotes);
				}else
					$('#card-content-quote').hide().html(quotes).fadeIn('slow');
			},
			error: function (error) {
				console.log('error',error);
			}
		});
	}

	function getAllQuotes() {
		$.ajax({
			dataType: 'json',
			url: 'item-ajax',
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
						getPageData();
					}
				}
			});
			manageRow(data.data);
			is_ajax_fire = 1;
		});
	}

	function getPageData() {
		$.ajax({
			dataType: 'json',
			url: 'item-ajax',
			data: {page:page}
		}).done(function(data){
			console.log('getPageData',data);
			manageRow(data.data);
		});
	}

	function manageRow(data) {
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
		$('#card-content-quote').hide().html(quotes).fadeIn('slow');
	}
});