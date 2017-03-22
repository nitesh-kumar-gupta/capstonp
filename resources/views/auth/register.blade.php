@extends('layouts.authlayout')
@section('title', 'Register')
@section('wizard')
<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
		<!--      Wizard container        -->
		<div class="wizard-container">
			<div class="card wizard-card" data-color="green" id="wizardProfile">
				<form role="form" id="formRegister">
					{{ csrf_field() }}
					<div class="wizard-header">
						<h3 class="wizard-title">
							Build Your Profile
						</h3>
						<h5>This information will let us know more about you.</h5>
					</div>
					<div class="wizard-navigation">
						<ul>
							<li><a href="#about" data-toggle="tab">About</a></li>
							<li><a href="#account" data-toggle="tab">Account</a></li>
							<li><a href="#college" data-toggle="tab">College</a></li>
						</ul>
					</div>
					<div class="tab-content">
						<div class="tab-pane" id="about">
							<div class="row">
								<h4 class="info-text"> Let's start with the basic information</h4>
								<div class="col-sm-4 col-sm-offset-1">
									<div class="picture-container">
										<div class="picture">
											<img src="{{ asset('images/default-avatar.png') }}" class="picture-src" id="wizardPicturePreview" title=""/>
											<input type="file" name="profilePicture" id="profilePicture">
										</div>
										<h6>Choose Picture</h6>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="input-group" id="user_reg_id">
										<span class="input-group-addon">
											<i class="material-icons">label</i>
										</span>
										<div class="form-group label-floating{{ $errors->has('name') ? ' has-error' : '' }}">
											<label class="control-label">Registration No <small>(required)</small></label>
											<input name="reg_id" type="text" id="reg_id" class="form-control" value="{{ old('reg_id') }}" required>
											@if ($errors->has('reg_id'))
												<label id="reg_id-error" class="error" for="reg_id">{{ $errors->first('reg_id') }}</label>
											@endif
										</div>
									</div>
									<div class="input-group" id="first_name">
										<span class="input-group-addon">
											<i class="material-icons">face</i>
										</span>
										<div class="form-group label-floating{{ $errors->has('firstname') ? ' has-error' : '' }}">
											<label class="control-label">First Name <small>(required)</small></label>
											<input name="firstname" id="firstname" type="text" class="form-control" value="{{ old('firstname') }}" required>
											@if ($errors->has('firstname'))
												<label id="firstname-error" class="error" for="firstname">{{ $errors->first('firstname') }}</label>
											@endif
										</div>
									</div>
									<div class="input-group" id="middle_name">
										<span class="input-group-addon">
											<i class="material-icons">face</i>
										</span>
										<div class="form-group label-floating{{ $errors->has('middlename') ? ' has-error' : '' }}">
											<label class="control-label">Middle Name <small>(optional)</small></label>
											<input name="middlename" id="middlename" type="text" class="form-control" value="{{ old('middlename') }}">
											@if ($errors->has('middlename'))
												<label id="middlename-error" class="error" for="middlename">{{ $errors->first('middlename') }}</label>
											@endif
										</div>
									</div>
									<div class="input-group" id="last_name">
										<span class="input-group-addon">
											<i class="material-icons">record_voice_over</i>
										</span>
										<div class="form-group label-floating{{ $errors->has('lastname') ? ' has-error' : '' }}">
											<label class="control-label">Last Name <small>(required)</small></label>
											<input name="lastname" id="lastname" type="text" class="form-control" value="{{ old('lastname') }}" required>
											@if ($errors->has('lastname'))
												<label id="lastname-error" class="error" for="lastname">{{ $errors->first('lastname') }}</label>
											@endif
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="account">
							<div class="row">
								<h4 class="info-text"> How can we be connected ? </h4>
								<div class="col-sm-10 col-sm-offset-1">
									<div class="input-group" id="user_email">
										<span class="input-group-addon">
											<i class="material-icons">email</i>
										</span>
										<div class="form-group label-floating{{ $errors->has('email') ? ' has-error' : '' }}">
											<label class="control-label">Email <small>(required)</small></label>
											<input name="email" type="email" id="email" class="form-control" value="{{ old('email') }}" required>
											@if ($errors->has('email'))
												<label id="email-error" class="error" for="email">{{ $errors->first('email') }}</label>
											@endif
										</div>
									</div>
								</div>
								<div class="col-sm-10 col-sm-offset-1">
									<div class="input-group" id="user_password">
										<span class="input-group-addon">
											<i class="material-icons">lock</i>
										</span>
										<div class="form-group label-floating{{ $errors->has('password') ? ' has-error' : '' }}">
											<label class="control-label">Password <small>(required)</small></label>
											<input name="password" id="password" type="password" class="form-control" value="{{ old('password') }}" required>
											@if ($errors->has('password'))
												<label id="password-error" class="error" for="password">{{ $errors->first('password') }}</label>
											@endif
										</div>
									</div>
								</div>
								<div class="col-sm-10 col-sm-offset-1">
									<div class="input-group" id="user_cpassword">
										<span class="input-group-addon">
											<i class="material-icons">lock</i>
										</span>
										<div class="form-group label-floating">
											<label class="control-label">Confirm Password <small>(required)</small></label>
											<input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="college">
							<div class="row">
								<div class="col-sm-12">
									<h4 class="info-text"> your current study position </h4>
								</div>
								<div class="col-sm-5 col-sm-offset-1">
									<div class="form-group label-floating" id="user_batch">
										<label class="control-label">Batch</label>
										<select name="batch" id="batch" class="form-control">
											<option disabled="" selected=""></option>
											<?php
												for($i=2005;$i<=date("Y");$i++)
													echo '<option value="'.$i.'">'.$i.'</option>';
											?>
										</select>
									</div>
								</div>
								<div class="col-sm-5">
									<div class="form-group label-floating" id="user_branch">
										<label class="control-label">Branch</label>
										<select name="branch" id="branch" class="form-control">
											<option disabled="" selected=""></option>
											@foreach($branches as $branch)
											<option value="{{$branch->branch_name}}">{{$branch->branch_name}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-sm-5 col-sm-offset-1">
									<div class="form-group label-floating" id="user_course">
										<label class="control-label">Course</label>
										<select name="course" id="course" class="form-control">
											<option disabled="" selected=""></option>
											@foreach($courses as $course)
											<option value="{{$course->course_abb}}">{{$course->course_name}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-sm-5">
									<div class="form-group label-floating" id="user_semester">
										<label class="control-label">Semester</label>
										<select name="semester" id="semester" class="form-control">
											<option disabled="" selected=""></option>
											<option value="1"> I </option>
											<option value="2"> II </option>
											<option value="3"> III </option>
											<option value="4"> IV </option>
											<option value="5"> V </option>
											<option value="6"> VI </option>
											<option value="7"> VII </option>
											<option value="8"> VIII </option>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="wizard-footer">
						<div id="register-error-message" class="alert alert-danger hide"><i class="fa fa-exclamation"></i><span></span></div>
						<div class="pull-right">
							<input type='button' id="btn-next" class='btn btn-next btn-fill btn-success btn-wd' name='next' value='Next' />
							<button type="button" id="btn-finish" class='btn btn-finish btn-fill btn-success btn-wd' name='finish'>
								<i id="btn-finish-icon" class=""></i>
								<span id="btn-finish-text">Finish</span>
							</button><br/>
							<a href="/">Already have an account</a>
						</div>

						<div class="pull-left">
							<input type='button' id="btn-finish" class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
						</div>
						<div class="clearfix"></div>
					</div>
				</form>
			</div>
		</div>
		<!-- wizard container -->
	</div>
</div>
@endsection
