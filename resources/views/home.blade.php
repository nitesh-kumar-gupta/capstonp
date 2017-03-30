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
										<a href="#post-study" data-toggle="tab">
											<i class="material-icons">book</i>
											Study
											<div class="ripple-container"></div>
										</a>
									</li>
									<li class="">
										<a href="#post-placement" data-toggle="tab">
											<i class="material-icons">work</i>
											Placement
											<div class="ripple-container"></div>
										</a>
									</li>
									<li class="">
										<a href="#post-technology" data-toggle="tab">
											<i class="material-icons">cloud</i>
											Technology
											<div class="ripple-container"></div>
										</a>
									</li>
									<li class="">
										<a href="#post-tour" data-toggle="tab">
											<i class="material-icons">explore</i>
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
							<div class="tab-pane" id="post-study">
								<form id="formStudyPost">
									{{ csrf_field() }}
									<div class="row">
										<div class="col-md-12">
											<div class="form-group label-floating" id="studydiv">
												<label class="control-label">Studies</label>
												<textarea name="study" id="study" class="form-control" rows="3" maxlength="1000"></textarea>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group label-floating" id="studylinkdiv">
												<label class="control-label">Reference links(optional)</label>
												<textarea name="studylink" id="studylink" class="form-control" rows="2" maxlength="400"></textarea>
												<label>For more then 1 link add coma(&comma;) between links</label>
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
							<div class="tab-pane" id="post-placement">
								<form id="formPlacementPost">
									{{ csrf_field() }}
									<div class="row">
										<div class="col-md-12">
											<div class="form-group label-floating">
												<label class="control-label">Placement</label>
												<textarea name="placement" id="placement" class="form-control" rows="2" maxlength="1000"></textarea>
											</div>
										</div>
									</div>
									<button type="button" id="btn-placement" class='btn btn-primary pull-right'>
										<i id="btn-placement-icon" class=""></i>
										<span id="btn-placement-text">Post Placement</span>
									</button>
									<div class="clearfix"></div>
								</form>
							</div>
							<div class="tab-pane" id="post-technology">
								<form id="formTechnologyPost">
									{{ csrf_field() }}
									<div class="row">
										<div class="col-md-12">
											<div class="form-group label-floating">
												<label class="control-label">Technology</label>
												<textarea name="technologie" id="technologie" class="form-control" rows="2" maxlength="1000"></textarea>
											</div>
										</div>
									</div>
									<button type="button" id="btn-technologie" class='btn btn-primary pull-right'>
										<i id="btn-technologie-icon" class=""></i>
										<span id="btn-technologie-text">Post Technology</span>
									</button>
									<div class="clearfix"></div>
								</form>
							</div>
							<div class="tab-pane" id="post-tour">
								<form id="formToursPost">
									{{ csrf_field() }}
									<div class="row">
										<div class="col-md-12">
											<div class="form-group label-floating">
												<label class="control-label">Tours</label>
												<textarea name="tour" id="tour" class="form-control" rows="2" maxlength="1000"></textarea>
											</div>
										</div>
									</div>
									<button type="button" id="btn-tour" class='btn btn-primary pull-right'>
										<i id="btn-tour-icon" class=""></i>
										<span id="btn-tour-text">Post Tour</span>
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
						<blockquote><a href="{{ route('quotes') }}">Quotes</a></blockquote>
					</div>
					<div class="card-content" id="card-content-quote">

					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header" data-background-color="blue">
						<blockquote><a href="{{ route('studies') }}">Studies</a></blockquote>
					</div>
					<div class="card-content" id="card-content-study">

					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">

					</div>
					<div class="card-content">

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
	<script type="text/javascript" src="{{ asset('js/ajaxcalls.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/moment.js') }}"></script>
@endsection