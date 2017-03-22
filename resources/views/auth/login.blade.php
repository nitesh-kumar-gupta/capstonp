@extends('layouts.authlayout')
@section('title', 'Login')
@section('wizard')
<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
		<div class="wizard-container">
			<div class="card wizard-card" data-color="green" id="wizardProfile">
				<form role="form" id="formLogin">
					{{ csrf_field() }}
					<div class="wizard-header">
						<h3 class="wizard-title">
							Login to Your Profile
						</h3>
						<h5>Share your experiences with others.</h5>
					</div>
					<div class="row">
						<h4 class="info-text">Provide required credentials to login.</h4>
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
							<div class="input-group" id="user_password">
									<span class="input-group-addon">
										<i class="material-icons">lock</i>
									</span>
								<div class="form-group label-floating{{ $errors->has('password') ? ' has-error' : '' }}">
									<label class="control-label">Password <small>(required)</small></label>
									<input name="password" id="password" type="password" class="form-control" required>
									@if ($errors->has('password'))
									<label id="password-error" class="error" for="password">{{ $errors->first('password') }}</label>
									@endif
								</div>
							</div>
						</div>
					</div>
					<div class="wizard-footer">
						<div id="login-error-message" class="alert alert-danger hide"><i class="fa fa-exclamation"></i><span></span></div>
						<div class="pull-right">
							<button type="button" id="btn-login" class='btn btn-login btn-fill btn-success btn-wd' name='login'>
								<i id="btn-login-icon" class=""></i>
								<span id="btn-login-text">Login</span>
							</button><br/>
							<a href="{{ route('password.request') }}">Forgot Your Password?</a><br/>
							<a href="{{ route('register') }}">New User? create an account</a>
						</div>
						<div class="clearfix"></div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
