@extends('layouts.app')

@section('title', 'Student Profile')

@section('content')

    <!-- Breadcrumb Starts Here -->
    <div class="py-0">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb align-items-center bg-transparent mb-0">
                    <li class="breadcrumb-item"><a href="index.html" class="fs-6 text-secondary">Home</a></li>
                    <li class="breadcrumb-item fs-6 text-secondary" aria-current="page">My Profile</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Students Info area Starts Here -->
    <section class="section students-info">
        <div class="container">
            <div class="students-info-intro">
                <!-- profile Details   -->
                @include('students-profile.sections.students-info-intro__profile')
                @include('students-profile.sections.students-info-intro__nav')

            </div>
            <div class="students-info-main">
                <div class="tab-content" id="nav-tabContent">
                    @include('students-profile.sections.nav-profile')
                    @include('students-profile.sections.nav-coursesall')
                    @include('students-profile.sections.nav-activecourses')
                    @include('students-profile.sections.nav-completedcourses')
                    @include('students-profile.sections.nav-purchase')
                    @include('students-profile.sections.nav-setting')

                </div>
            </div>
        </div>
    </section>

@endsection
