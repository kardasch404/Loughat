@extends('layouts.admin_dashboard')

@section('title', 'Students List')

@section('content')

    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">List of Students</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:(0);">Users</a></li>
                        <li class="breadcrumb-item active">Patient</li>
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
                                        <th>Studnet ID</th>
                                        <th>Studnet Name</th>
                                        <th>Member Since</th>
                                        <th>Email</th>
                                        <th>Account Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                        <tr>
                                            <td>{{ $student->id }}</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="" class="avatar avatar-sm mr-2"><img
                                                            class="avatar-img rounded-circle" src="{{ asset('storage/' . $student->photo) }}"
                                                            alt="User Image"></a>
                                                    <a href="">{{ $student->firstname }}
                                                        {{ $student->lastname }}</a>
                                                </h2>
                                            </td>

                                            <td>14 Jan 2019 <br><small>02.59 AM</small></td>

                                            <td>{{ $student->email }}</td>

                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" id="status_1" class="check" checked>
                                                    <label for="status_1" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                            <td class="text">
                                                <div class="actions">
                                                    <a class="btn btn-sm bg-success-light" data-toggle="modal"
                                                        href="#edit_specialities_details" onclick="loadUserData(this)"
                                                        data-id="<?= htmlspecialchars($student->id) ?>"
                                                        data-firstname="<?= htmlspecialchars($student->firstname) ?>"
                                                        data-lastname="<?= htmlspecialchars($student->lastname) ?>"
                                                        data-photo="<?= htmlspecialchars($student->photo) ?>"
                                                        data-email="<?= htmlspecialchars($student->email) ?>"
                                                        data-phone="<?= htmlspecialchars($student->phone) ?>">
                                                        <i class="fe fe-pencil"></i> Edit
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Edit Details Modal -->
        <div class="modal fade" id="edit_specialities_details" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Student</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('admin.students.update', $student->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="user_id" id="user_id">
                            <div class="row form-row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Firstname</label>
                                        <input type="text" class="form-control" id="firstname" name="firstname">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Lastname</label>
                                        <input type="text" class="form-control" id="lastname" name="lastname">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Photo</label>
                                        <input type="file" class="form-control" id="photo" name="photo">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="number" class="form-control" id="phone" name="phone">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" id="email" name="email">
                                    </div>
                                </div>

                            </div>
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Edit Details Modal -->
    </div>
@endsection
