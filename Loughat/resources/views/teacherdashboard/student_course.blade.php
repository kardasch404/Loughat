@extends('layouts.teacher_dashboard')

@section('title', 'Student Course')

@section('content')

<div class="col-md-7 col-lg-8 col-xl-9">
    <div class="card card-table">
        <div class="card-body">

            <!-- Invoice Table -->
            <div class="table-responsive">
                <table class="table table-hover table-center mb-0">
                    <thead>
                        <tr>
                            <th>Invoice No</th>
                            <th>Student</th>
                            <th>Amount</th>
                            <th>Paid On</th>
                            <th>Cours Name</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <a href="invoice-view.html">#INV-0010</a>
                            </td>
                            <td>
                                <h2 class="table-avatar">
                                    <a href="patient-profile.html" class="avatar avatar-sm mr-2">
                                        <img class="avatar-img rounded-circle" src="assets/img/patients/patient.jpg" alt="User Image">
                                    </a>
                                    <a href="patient-profile.html">Richard Wilson <span>#PT0016</span></a>
                                </h2>
                            </td>
                            <td>$450</td>
                            <td>14 Nov 2019</td>
                            <td class="">
                                <div class="table-action">
                                    <a href="invoice-view.html" class="btn btn-sm bg-info-light ">
                                        View cours am here
                                    </a>
                                </div>
                            </td>
                        </tr>


                    </tbody>
                </table>
            </div>
            <!-- /Invoice Table -->

        </div>
    </div>
</div>
@endsection

