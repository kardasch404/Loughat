@extends('layouts.teacher_dashboard')

@section('title', 'profil-Setting')

@section('content')

    <div class="col-md-7 col-lg-8 col-xl-9">
        <!-- Basic Information -->
        <form action="{{ route('teacher-profile.update', $teacher->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Basic Information</h4>
                    <div class="row form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="change-avatar">
                                    <div class="profile-img">
                                        <img src="{{$teacher->photo}}" alt="User Image">
                                    </div>
                                    <div class="upload-img">
                                        <div class="change-photo-btn">
                                            <span><i class="fa fa-upload"></i> Upload Photo</span>
                                            <input type="file" class="upload" name="photo" id="photo" value="">
                                        </div>
                                        <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email" id="email" value="{{$teacher->email}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>First Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="firstname" id="firstname" value="{{$teacher->firstname}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Last Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="lastname" id="lastname" value="{{$teacher->lastname}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" name="phone" id="phone" class="form-control" value="{{$teacher->phone}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="submit-section submit-btn-bottom text-center">
                    <button type="submit" name="submit" class="btn btn-primary submit-btn">Save Changes</button>
                </div>
        </form>
        <!-- /Basic Information -->

        <form action="">
            <!-- About Me -->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">About Me</h4>
                    <div class="form-group mb-0">
                        <label>Biography</label>
                        <textarea class="form-control" rows="5"></textarea>
                    </div>
                </div>
            </div>
            <!-- /About Me -->
            <!-- Education -->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Education</h4>
                    <div class="education-info">
                        <div class="row form-row education-cont">
                            <div class="col-12 col-md-10 col-lg-11">
                                <div class="row form-row">
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label>Degree</label>
                                            <input type="text" name="degree" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label>From</label>
                                            <input type="text" name="from" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label>To</label>
                                            <input type="text" name="to" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <input type="text" name="description" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="add-more">
                        <a href="javascript:void(0);" class="add-education"><i class="fa fa-plus-circle"></i> Add More</a>
                    </div>
                </div>
            </div>
            <!-- /Education -->
            <!-- Experience -->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Experience</h4>
                    <div class="experience-info">
                        <div class="row form-row experience-cont">
                            <div class="col-12 col-md-10 col-lg-11">
                                <div class="row form-row">
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label>Degree</label>
                                            <input type="text" name="degree" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label>From</label>
                                            <input type="text" name="from" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label>To</label>
                                            <input type="text" name="to" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <input type="text" name="description" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="add-more">
                        <a href="javascript:void(0);" class="add-experience"><i class="fa fa-plus-circle"></i> Add
                            More</a>
                    </div>
                </div>
            </div>
            <!-- /Experience -->
            <div class="submit-section submit-btn-bottom text-center">
                <button type="submit" name="submit" class="btn btn-primary submit-btn">Save Changes</button>
            </div>
        </form>
    </div>
@endsection
