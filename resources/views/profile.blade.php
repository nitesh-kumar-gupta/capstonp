@extends('layouts.master')
@section('title', 'Profile')
@section('content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header" data-background-color="green">
						<h4 class="title">Edit Profile</h4>
					</div>
					<div class="card-content">
						<form name="user_profile" class="user_profile" id="user_profile">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-md-5">
									<div class="form-group label-floating">
										<label class="control-label">Registration Id</label>
										<input type="text" name="reg_id" id="reg_id" class="form-control" value="{{ Auth::user()->reg_id }}" required disabled>
									</div>
								</div>
								<div class="col-md-7">
									<div class="form-group label-floating{{ $errors->has('email') ? ' has-error' : '' }}">
										<label class="control-label">Email</label>
										<input name="email" type="email" id="email" class="form-control" value="{{ Auth::user()->email }}" required>
										@if ($errors->has('email'))
										<label id="email-error" class="error" for="email">{{ $errors->first('email') }}</label>
										@endif
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-4">
									<div class="form-group label-floating{{ $errors->has('firstname') ? ' has-error' : '' }}">
										<label class="control-label">Fist Name</label>
										<input name="firstname" id="firstname" type="text" class="form-control" value="{{ Auth::user()->firstname }}" required>
										@if ($errors->has('firstname'))
										<label id="firstname-error" class="error" for="firstname">{{ $errors->first('firstname') }}</label>
										@endif
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group label-floating{{ $errors->has('lastname') ? ' has-error' : '' }}">
										<label class="control-label">Middle Name</label>
										<input name="middlename" id="middlename" type="text" class="form-control" value="{{ Auth::user()->middlename }}">
										@if ($errors->has('middlename'))
										<label id="middlename-error" class="error" for="middlename">{{ $errors->first('middlename') }}</label>
										@endif
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group label-floating{{ $errors->has('lastname') ? ' has-error' : '' }}">
										<label class="control-label">Last Name</label>
										<input name="lastname" id="lastname" type="text" class="form-control" value="{{ Auth::user()->lastname }}" required>
										@if ($errors->has('lastname'))
										<label id="lastname-error" class="error" for="lastname">{{ $errors->first('lastname') }}</label>
										@endif
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-7">
									<div class="form-group label-floating{{ $errors->has('branch_name') ? ' has-error' : '' }}">
										<label class="control-label">Branch</label>
										<select name="branch" id="branch" class="form-control branch">
											@foreach($branches as $branch)
											<option value="{{$branch->branch_name}}" {{ Auth::user()->branch == $branch->branch_name ? 'selected' : '' }}>{{ $branch->branch_name }}</option>
											@endforeach
										</select>
										@if ($errors->has('branch_name'))
										<label id="branch_name-error" class="error" for="branch_name">{{ $errors->first('branch_name') }}</label>
										@endif
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group label-floating{{ $errors->has('batch') ? ' has-error' : '' }}">
										<label class="control-label">Batch</label>
										<select name="batch" id="batch" class="form-control">
                                            @for($i=2005;$i<=date("Y");$i++)
                                                <option value="{{$i}}" {{ Auth::user()->batch == $i ? 'selected' : '' }}>{{$i}}</option>
                                            @endfor
										</select>
										@if ($errors->has('batch'))
										<label id="batch-error" class="error" for="batch">{{ $errors->first('batch') }}</label>
										@endif
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group label-floating{{ $errors->has('course') ? ' has-error' : '' }}">
										<label class="control-label">Course</label>
										<select name="course" id="course" class="form-control course">
											@foreach($courses as $course)
											<option value="{{$course->course_abb}}" {{ Auth::user()->course == $course->course_abb ? 'selected' : '' }}>{{ $course->course_name }}</option>
											@endforeach
										</select>
										@if ($errors->has('course'))
										<label id="course-error" class="error" for="course">{{ $errors->first('course') }}</label>
										@endif
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group label-floating{{ $errors->has('semester') ? ' has-error' : '' }}">
										<label class="control-label">Semester</label>
										<select name="semester" id="semester" class="form-control">
											<option value="1" {{ Auth::user()->semester == 1 ? 'selected' : '' }}> I </option>
											<option value="2" {{ Auth::user()->semester == 2 ? 'selected' : '' }} > II </option>
											<option value="3" {{ Auth::user()->semester == 3 ? 'selected' : '' }}> III </option>
											<option value="4" {{ Auth::user()->semester == 4 ? 'selected' : '' }}> IV </option>
											<option value="5" {{ Auth::user()->semester == 6 ? 'selected' : '' }}> V </option>
											<option value="5" {{ Auth::user()->semester == 5 ? 'selected' : '' }}> VI </option>
											<option value="5" {{ Auth::user()->semester == 7 ? 'selected' : '' }}> VII </option>
											<option value="5" {{ Auth::user()->semester == 8 ? 'selected' : '' }}> VIII </option>
										</select>
										@if ($errors->has('semester'))
										<label id="semester-error" class="error" for="semester">{{ $errors->first('semester') }}</label>
										@endif
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group label-floating{{ $errors->has('address') ? ' has-error' : '' }}">
										<label class="control-label">Address</label>
										<input type="text" name="address" id="address" class="form-control" value="{{ Auth::user()->address }}" maxlength="400">
										@if ($errors->has('address'))
										<label id="address-error" class="error" for="address">{{ $errors->first('address') }}</label>
										@endif
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-4">
									<div class="form-group label-floating{{ $errors->has('country') ? ' has-error' : '' }}">
										<label class="control-label">Country</label>
										<input type="text" name="country" id="country" class="form-control" value="{{ Auth::user()->country }}" >
										@if ($errors->has('country'))
										<label id="country-error" class="error" for="country">{{ $errors->first('country') }}</label>
										@endif
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group label-floating{{ $errors->has('city') ? ' has-error' : '' }}">
										<label class="control-label">City</label>
										<input type="text" name="city" id="city" class="form-control" value="{{ Auth::user()->city }}" >
										@if ($errors->has('city'))
										<label id="city-error" class="error" for="city">{{ $errors->first('city') }}</label>
										@endif
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group label-floating{{ $errors->has('zip') ? ' has-error' : '' }}">
										<label class="control-label">Postal Code</label>
										<input type="text" name="zip" id="zip" class="form-control" value="{{ Auth::user()->zip }}">
										@if ($errors->has('zip'))
										<label id="zip-error" class="error" for="zip">{{ $errors->first('zip') }}</label>
										@endif
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group label-floating{{ $errors->has('about_me') ? ' has-error' : '' }}">
										<label class="control-label">About Me</label>
										<textarea name="about_me" id="about_me" class="form-control" rows="4" maxlength="700">{{ Auth::user()->about_me }}</textarea>
										@if ($errors->has('about_me'))
										<label id="about_me-error" class="error" for="about_me">{{ $errors->first('about_me') }}</label>
										@endif
									</div>
								</div>
							</div>
							<div id="user_profile-error-message" class="alert alert-danger hide"></div>
							<button type="button" id="btn-update-profile" class='btn btn-primary pull-right'>
								<i id="btn-update-profile-icon" class=""></i>
								<span id="btn-update-profile-text">Update Profile</span>
							</button>
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card card-profile">
					<div class="card-avatar">
						<a href="javascript:void(0);" id="a-img-profile">
							<img class="img" id="img-profile" src="{{ Auth::user()->profile_image?Auth::user()->profile_image : asset('images/default-avatar.png') }}" />
						</a>
					</div>
					<div class="content">
						<h6 class="category text-gray">{{ Auth::user()->course }} {{ Auth::user()->batch }}</h6>
						<h4 class="card-title">{{ Auth::user()->firstname }} {{ Auth::user()->middlename }} {{ Auth::user()->lastname }}</h4>
						<p class="card-content">
							{{ Auth::user()->about_me }}
						</p>
<!--						<a href="#pablo" class="btn btn-primary btn-round">Follow</a>-->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection