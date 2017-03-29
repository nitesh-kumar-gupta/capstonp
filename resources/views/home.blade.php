@extends('layouts.master')
@section('title', 'Home')
@section('content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">
				<div class="card card-nav-tabs">
					<div class="card-header" data-background-color="green">
						<div class="nav-tabs-navigation">
							<div class="nav-tabs-wrapper">
								<span class="nav-tabs-title">Post:</span>
								<ul class="nav nav-tabs" data-tabs="tabs">
									<li class="active">
										<a href="#post-quote" data-toggle="tab">
											<i class="material-icons">star</i>
											Quotes
											<div class="ripple-container"></div>
										</a>
									</li>
									<li class="">
										<a href="#study" data-toggle="tab">
											<i class="material-icons">book</i>
											Study
											<div class="ripple-container"></div>
										</a>
									</li>
									<li class="">
										<a href="#placement" data-toggle="tab">
											<i class="material-icons">cloud</i>
											Placement
											<div class="ripple-container"></div>
										</a>
									</li>
									<li class="">
										<a href="#technology" data-toggle="tab">
											<i class="material-icons">cloud</i>
											Technology
											<div class="ripple-container"></div>
										</a>
									</li>
									<li class="">
										<a href="#tour" data-toggle="tab">
											<i class="material-icons">cloud</i>
											Tours
											<div class="ripple-container"></div>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>

					<div class="card-content">
						<div class="tab-content">
							<div class="tab-pane active" id="post-quote">
								<form id="formQuotePost">
									{{ csrf_field() }}
									<div class="row">
										<div class="col-md-12">
											<div class="form-group label-floating" id="quotediv">
												<label class="control-label">Quotes</label>
												<textarea name="quote" id="quote" class="form-control" rows="2" maxlength="1000"></textarea>
											</div>
										</div>
									</div>
									<button type="button" id="btn-quote" class='btn btn-primary pull-right'>
										<i id="btn-quote-icon" class=""></i>
										<span id="btn-quote-text">Post Quote</span>
									</button>
									<div class="clearfix"></div>
								</form>
							</div>
							<div class="tab-pane" id="study">
								<form id="formStudyPost">
									{{ csrf_field() }}
									<div class="row">
										<div class="col-md-12">
											<div class="form-group label-floating">
												<label class="control-label">Studies</label>
												<textarea name="study" id="study-ta" class="form-control" rows="2" maxlength="1000"></textarea>
											</div>
										</div>
									</div>
									<button type="button" id="btn-study" class='btn btn-primary pull-right'>
										<i id="btn-study-icon" class=""></i>
										<span id="btn-study-text">Post Studies</span>
									</button>
									<div class="clearfix"></div>
								</form>
							</div>
							<div class="tab-pane" id="placement">
								<form id="formPlacementPost">
									{{ csrf_field() }}
									<div class="row">
										<div class="col-md-12">
											<div class="form-group label-floating">
												<label class="control-label">Placement</label>
												<textarea name="placements" id="placements" class="form-control" rows="2" maxlength="1000"></textarea>
											</div>
										</div>
									</div>
									<button type="button" id="btn-placements" class='btn btn-primary pull-right'>
										<i id="btn-placements-icon" class=""></i>
										<span id="btn-placements-text">Post Placements</span>
									</button>
									<div class="clearfix"></div>
								</form>
							</div>
							<div class="tab-pane" id="technology">
								<form id="formTechnologyPost">
									{{ csrf_field() }}
									<div class="row">
										<div class="col-md-12">
											<div class="form-group label-floating">
												<label class="control-label">Technology</label>
												<textarea name="technologies" id="technologies" class="form-control" rows="2" maxlength="1000"></textarea>
											</div>
										</div>
									</div>
									<button type="button" id="btn-technologies" class='btn btn-primary pull-right'>
										<i id="btn-technologies-icon" class=""></i>
										<span id="btn-technologies-text">Post Technology</span>
									</button>
									<div class="clearfix"></div>
								</form>
							</div>
							<div class="tab-pane" id="tour">
								<form id="formToursPost">
									{{ csrf_field() }}
									<div class="row">
										<div class="col-md-12">
											<div class="form-group label-floating">
												<label class="control-label">Tours</label>
												<textarea name="tours" id="tours" class="form-control" rows="2" maxlength="1000"></textarea>
											</div>
										</div>
									</div>
									<button type="button" id="btn-tours" class='btn btn-primary pull-right'>
										<i id="btn-tours-icon" class=""></i>
										<span id="btn-tours-text">Post Tours</span>
									</button>
									<div class="clearfix"></div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<div class="card-header" data-background-color="orange">
						<blockquote>Quotes</blockquote>
					</div>
					<div class="card-content" id="card-content-quote">

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script type="text/javascript">
	$(document).ready(function () {
		function showQuotes(){
			var quotes = '';
			quotes = '';
			$.ajax({
				url: 'quotes',
				type: 'GET',
				success: function(result) {
					result.forEach(function(quote){
						var profileImage = quote.user.profile_image?quote.user.profile_image:"{{asset('images/default-avatar.png')}}";
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
							'</small>'+
							'</blockquote>'+
							'</div>';
					});
					$('#card-content-quote').hide().html(quotes).fadeIn('slow');
				},
				error: function (error) {
					console.log('error',error);
				}
			});
		}
		showQuotes();
		setInterval(showQuotes, 10000);
	});
</script>
@endsection