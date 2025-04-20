@extends('layouts.teacher_dashboard')

@section('title', 'Change PAssword')

@section('content')

<div class="col-md-7 col-lg-8 col-xl-9">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 col-lg-6">

                    <!-- Change Password Form -->
                    {{-- <form method="POST" action="{{ route('teacher-change-password.changePassword', $user->id) }}"
                        enctype="multipart/form-data"> --}}
                        <form action="">
                        <div class="form-group">
                            <label>Old Password</label>
                            <input type="password" id="old_password" name="old_password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" id="new_password" name="new_password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" id="confirm_password" name="confirm_password" class="form-control">
                        </div>
                        <div class="submit-section">
                            <button type="submit" name="submit" class="btn btn-primary submit-btn">Save Changes</button>
                        </div>
                    </form>
                    <!-- /Change Password Form -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
