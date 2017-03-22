@extends('layouts.master')
@section('title', 'Home')
@section('content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header" data-background-color="green">
						<h4 class="title">Edit Profile</h4>
						<p class="category">Complete your profile</p>
					</div>
					<div class="card-content">
						<form name="user_profile" class="user_profile" id="user_profile">
							<div class="row">
								<div class="col-md-5">
									<div class="form-group label-floating">
										<label class="control-label">Registration Id</label>
										<input type="text" class="form-control" disabled value="{{ Auth::user()->reg_id }}">
									</div>
								</div>
								<div class="col-md-7">
									<div class="form-group label-floating">
										<label class="control-label">Email address</label>
										<input type="email" class="form-control" value="{{ Auth::user()->email }}">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-4">
									<div class="form-group label-floating">
										<label class="control-label">Fist Name</label>
										<input type="text" class="form-control" value="{{ Auth::user()->firstname }}" >
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group label-floating">
										<label class="control-label">Middle Name</label>
										<input type="text" class="form-control" value="{{ Auth::user()->middlename }}" >
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group label-floating">
										<label class="control-label">Last Name</label>
										<input type="text" class="form-control" value="{{ Auth::user()->lastname }}">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-7">
									<div class="form-group label-floating">
										<label class="control-label">Branch</label>
										<select name="course" id="branch" class="form-control branch">
											@foreach($branches as $branch)
											<option value="{{$branch->branch_name}}" {{ Auth::user()->branch == $branch->branch_name ? 'selected' : '' }}>{{ $branch->branch_name }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group label-floating">
										<label class="control-label">Batch</label>
										<select name="batch" id="batch" class="form-control">
											<option disabled="" selected=""></option>
                                            @for($i=2005;$i<=date("Y");$i++)
                                                <option value="{{$i}}" {{ Auth::user()->batch == $i ? 'selected' : '' }}>{{$i}}</option>
                                            @endfor
										</select>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group label-floating">
										<label class="control-label">Course</label>
										<select name="course" id="course" class="form-control course">
											<option></option>
											@foreach($courses as $course)
											<option value="{{$course->course_abb}}" {{ Auth::user()->course == $course->course_abb ? 'selected' : '' }}>{{ $course->course_name }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group label-floating">
										<label class="control-label">Semester</label>
										<select name="semester" id="semester" class="form-control">
											<option></option>
											<option value="1" {{ Auth::user()->semester == 1 ? 'selected' : '' }}> I </option>
											<option value="2" {{ Auth::user()->semester == 2 ? 'selected' : '' }} > II </option>
											<option value="3" {{ Auth::user()->semester == 3 ? 'selected' : '' }}> III </option>
											<option value="4" {{ Auth::user()->semester == 4 ? 'selected' : '' }}> IV </option>
											<option value="5" {{ Auth::user()->semester == 6 ? 'selected' : '' }}> V </option>
											<option value="5" {{ Auth::user()->semester == 5 ? 'selected' : '' }}> VI </option>
											<option value="5" {{ Auth::user()->semester == 7 ? 'selected' : '' }}> VII </option>
											<option value="5" {{ Auth::user()->semester == 8 ? 'selected' : '' }}> VIII </option>
										</select>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group label-floating">
										<label class="control-label">Adress</label>
										<input type="text" class="form-control" >
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-4">
									<div class="form-group label-floating">
										<label class="control-label">City</label>
										<input type="text" class="form-control" >
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group label-floating">
										<label class="control-label">Country</label>
										<input type="text" class="form-control" >
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group label-floating">
										<label class="control-label">Postal Code</label>
										<input type="text" class="form-control" >
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>About Me</label>
										<div class="form-group label-floating">
											<label class="control-label"> Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</label>
											<textarea class="form-control" rows="5"></textarea>
										</div>
									</div>
								</div>
							</div>

							<button type="submit" class="btn btn-primary pull-right" disabled>Update Profile</button>
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card card-profile">
					<div class="card-avatar">
						<a href="#pablo">
							<img class="img" src="{{ asset('images/default-avatar.png') }}" />
						</a>
					</div>

					<div class="content">
						<h6 class="category text-gray">{{ Auth::user()->course }} {{ Auth::user()->batch }}</h6>
						<h4 class="card-title">{{ Auth::user()->firstname }} {{ Auth::user()->middlename }} {{ Auth::user()->lastname }}</h4>
						<p class="card-content">
							Description about person.
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, delectus harum ipsum nam odio pariatur quisquam reiciendis rerum similique voluptate! Aliquam, blanditiis distinctio dolores fugit incidunt ipsam pariatur possimus reprehenderit!
						</p>
<!--						<a href="#pablo" class="btn btn-primary btn-round">Follow</a>-->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection