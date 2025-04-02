<div class="content container-fluid">

    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Reviews</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Reviews</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="datatable table table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th>Student Name</th>
                                    <th>Teacher Name</th>
                                    <th>Ratings</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar avatar-sm mr-2"><img
                                                    class="avatar-img rounded-circle"
                                                    src="assets/img/patients/patient1.jpg" alt="User Image"></a>
                                            <a href="profile.html">Charlene Reed </a>
                                        </h2>
                                    </td>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar avatar-sm mr-2"><img
                                                    class="avatar-img rounded-circle"
                                                    src="assets/img/doctors/doctor-thumb-01.jpg" alt="User Image"></a>
                                            <a href="profile.html">Dr. Ruby Perrin</a>
                                        </h2>
                                    </td>

                                    <td>
                                        <i class="fe fe-star text-warning"></i>
                                        <i class="fe fe-star text-warning"></i>
                                        <i class="fe fe-star text-warning"></i>
                                        <i class="fe fe-star text-warning"></i>
                                        <i class="fe fe-star-o text-secondary"></i>
                                    </td>

                                    <td>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                    </td>
                                    <td>3 Nov 2019 <br><small>09.59 AM</small></td>
                                    <td class="text-right">
                                        <div class="actions">
                                            <a class="btn btn-sm bg-danger-light" data-toggle="modal"
                                                href="#delete_modal">
                                                <i class="fe fe-trash"></i> Delete
                                            </a>

                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar avatar-sm mr-2"><img
                                                    class="avatar-img rounded-circle"
                                                    src="assets/img/patients/patient2.jpg" alt="User Image"></a>
                                            <a href="profile.html">Travis Trimble </a>
                                        </h2>
                                    </td>


                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar avatar-sm mr-2"><img
                                                    class="avatar-img rounded-circle"
                                                    src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image"></a>
                                            <a href="profile.html">Dr. Darren Elder</a>
                                        </h2>
                                    </td>

                                    <td>
                                        <i class="fe fe-star text-warning"></i>
                                        <i class="fe fe-star text-warning"></i>
                                        <i class="fe fe-star text-warning"></i>
                                        <i class="fe fe-star text-warning"></i>
                                        <i class="fe fe-star-o text-secondary"></i>
                                    </td>

                                    <td>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                    </td>
                                    <td>2 Nov 2019<br> <small>08.50 AM</small></td>
                                    <td class="text-right">
                                        <div class="actions">
                                            <a class="btn btn-sm bg-danger-light" data-toggle="modal"
                                                href="#delete_modal">
                                                <i class="fe fe-trash"></i> Delete
                                            </a>

                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar avatar-sm mr-2"><img
                                                    class="avatar-img rounded-circle"
                                                    src="assets/img/patients/patient3.jpg" alt="User Image"></a>
                                            <a href="profile.html">Carl Kelly</a>
                                        </h2>
                                    </td>

                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="profile.html" class="avatar avatar-sm mr-2"><img
                                                    class="avatar-img rounded-circle"
                                                    src="assets/img/doctors/doctor-thumb-03.jpg" alt="User Image"></a>
                                            <a href="profile.html">Dr. Deborah Angel</a>
                                        </h2>
                                    </td>

                                    <td>
                                        <i class="fe fe-star text-warning"></i>
                                        <i class="fe fe-star text-warning"></i>
                                        <i class="fe fe-star text-warning"></i>
                                        <i class="fe fe-star text-warning"></i>
                                        <i class="fe fe-star-o text-secondary"></i>
                                    </td>

                                    <td>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                    </td>
                                    <td>1 Nov 2019<br> <small>02.59 PM</small></td>
                                    <td class="text-right">
                                        <div class="actions">
                                            <a class="btn btn-sm bg-danger-light" data-toggle="modal"
                                                href="#delete_modal">
                                                <i class="fe fe-trash"></i> Delete
                                            </a>

                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="delete_modal" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-content p-2">
                        <h4 class="modal-title">Delete</h4>
                        <p class="mb-4">Are you sure want to delete?</p>
                        <button type="button" class="btn btn-primary">Save </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Delete Modal -->

</div>
