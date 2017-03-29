@extends('layouts.master')
@section('title',$user->firstname)
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" data-background-color="green">
                        <h4 class="title">Profile</h4>
                    </div>
                    <div class="card-content">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Registration Id</label>
                                        <label class="form-control">{{ $user->reg_id }}</label>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Email</label>
                                        <label class="form-control">{{ $user->email }}</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Name</label>
                                        <label class="form-control">{{ $user->firstname }} {{ $user->middlename }} {{ $user->lastname }}</label>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Branch</label>
                                        <label class="form-control">{{ $user->branch }}</label>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Batch</label>
                                        <label class="form-control">{{ $user->batch }}</label>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Course</label>
                                        <label class="form-control">{{ $user->course }}</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Semester</label>
                                        <label class="form-control">{{ $user->semester }}</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Address</label>
                                        <label class="form-control">{{ $user->address }}</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Country</label>
                                        <label class="form-control">{{ $user->country }}</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label">City</label>
                                        <label class="form-control">{{ $user->city }}</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Postal Code</label>
                                        <label class="form-control">{{ $user->zip }}</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">About Me</label>
                                        <label class="form-control">{{ $user->about_me }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-profile">
                    <div class="card-avatar">
                        <a href="javascript:void(0);" id="a-img-profile">
                            <img class="img" src="{{ $user->profile_image?$user->profile_image : asset('images/default-avatar.png') }}" />
                        </a>
                    </div>
                    <div class="content">
                        <h6 class="category text-gray">{{ $user->course }} {{ $user->batch }}</h6>
                        <h4 class="card-title">{{ $user->firstname }} {{ $user->middlename }} {{ $user->lastname }}</h4>
                        <p class="card-content">
                            {{ $user->about_me }}
                        </p>
                        <!--						<a href="#pablo" class="btn btn-primary btn-round">Follow</a>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection