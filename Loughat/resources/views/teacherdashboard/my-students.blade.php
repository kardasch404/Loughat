

@extends('layouts.teacher_dashboard')

@section('title', 'My Studnet')

@section('content')
<div class="col-md-7 col-lg-8 col-xl-9">

    <div class="row row-grid">
        <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="card widget-profile pat-widget-profile">
                <div class="card-body">
                    <div class="pro-widget-content">
                        <div class="profile-info-widget">
                            <a href="patient-profile.html" class="booking-doc-img">
                                <img src="assets/img/patients/patient.jpg" alt="User Image">
                            </a>
                            <div class="profile-det-info">
                                <h3><a href="patient-profile.html">Richard Wilson</a></h3>

                                <div class="patient-details">
                                    <h5><b>Patient ID :</b> P0016</h5>
                                    <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> Alabama, USA</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="patient-info">
                        <ul>
                            <li>Phone <span>+1 952 001 8563</span></li>
                            <li>Age <span>38 Years, Male</span></li>
                            <li>Blood Group <span>AB+</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="card widget-profile pat-widget-profile">
                <div class="card-body">
                    <div class="pro-widget-content">
                        <div class="profile-info-widget">
                            <a href="patient-profile.html" class="booking-doc-img">
                                <img src="assets/img/patients/patient1.jpg" alt="User Image">
                            </a>
                            <div class="profile-det-info">
                                <h3><a href="patient-profile.html">Charlene Reed</a></h3>

                                <div class="patient-details">
                                    <h5><b>Patient ID :</b> P0001</h5>
                                    <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> North Carolina, USA</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="patient-info">
                        <ul>
                            <li>Phone <span>+1 828 632 9170</span></li>
                            <li>Age <span>29 Years, Female</span></li>
                            <li>Blood Group <span>O+</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection


