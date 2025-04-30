@extends('layouts.admin_dashboard')

@section('title', 'Teacher List')

@section('content')

    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">List of Doctors</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:(0);">Users</a></li>
                        <li class="breadcrumb-item active">Doctor</li>
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
                                        <th>Teacher Name</th>
                                        <th>Speciality</th>
                                        <th>Member Since</th>
                                        <th>Email</th>
                                        <th>Courses</th>
                                        <th>Account Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teachers as $teacher)
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="" class="avatar avatar-sm mr-2"><img
                                                            class="avatar-img rounded-circle" src="{{ $teacher->photo }}"
                                                            alt="User Image"></a>
                                                    <a href="">{{ $teacher->firstname }}
                                                        {{ $teacher->lastname }}</a>
                                                </h2>
                                            </td>
                                            <td>Dental</td>

                                            <td>
                                                {{ $teacher->created_at->format('d M Y') }} <br>
                                                <small>{{ $teacher->created_at->format('h:i A') }}</small>
                                            </td>

                                            <td>{{ $teacher->email }}</td>
                                            <td>190</td>

                                            {{-- <td>
                                                    <div class="status-toggle">
                                                        <input type="checkbox" id="status_1" class="check" checked>
                                                        <label for="status_1" class="checktoggle">checkbox</label>
                                                    </div>
                                                </td> --}}
                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" id="status_{{ $teacher->id }}"
                                                        class="check teacher-status-toggle"
                                                        data-teacher-id="{{ $teacher->id }}"
                                                        {{ $teacher->status === 'valid' ? 'checked' : '' }}>
                                                    <label for="status_{{ $teacher->id }}" class="checktoggle">
                                                        {{ $teacher->status === 'valid' ? 'Approved' : 'Pending' }}
                                                    </label>
                                                </div>
                                            </td>



                                            <td class="text">
                                                <div class="actions">
                                                    <a class="btn btn-sm bg-success-light" data-toggle="modal"
                                                        href="#edit_specialities_details" onclick="loadUserData(this)"
                                                        data-id="<?= htmlspecialchars($teacher->id) ?>"
                                                        data-firstname="<?= htmlspecialchars($teacher->firstname) ?>"
                                                        data-lastname="<?= htmlspecialchars($teacher->lastname) ?>"
                                                        data-photo="<?= htmlspecialchars($teacher->photo) ?>"
                                                        data-email="<?= htmlspecialchars($teacher->email) ?>"
                                                        data-phone="<?= htmlspecialchars($teacher->phone) ?>">
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
                        <h5 class="modal-title">Edit Teacher</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('admin.teachers.update', $teacher->id) }}"
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            console.log('jQuery version:', $.fn.jquery);

            $('.teacher-status-toggle').change(function(e) {
                e.preventDefault();

                var checkbox = $(this);
                var teacherId = checkbox.data('teacher-id');
                var isChecked = checkbox.prop('checked');
                var status = isChecked ? 'valid' : 'pending';
                $.ajax({
                    url: "{{ route('update.teacher.status', '') }}/" + teacherId,
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        status: status
                    },
                    beforeSend: function() {
                        console.log('Making AJAX request to:',
                            "{{ route('update.teacher.status', '') }}/" + teacherId);
                    },
                    success: function(response) {
                        console.log('Success response:', response);

                        if (response.success) {
                            checkbox.next('label').text(isChecked ? 'Approved' : 'Pending');
                            alert('Status updated successfully');
                        } else {
                            checkbox.prop('checked', !isChecked);
                            alert('Failed to update status: ' + (response.message ||
                                'Unknown error'));
                        }
                    },
                });
            });
        });
    </script>



    <style>
        .status-toggle {
            position: relative;
            display: inline-block;
        }

        .status-toggle .check {
            display: none;
        }

        .status-toggle .checktoggle {
            position: relative;
            display: inline-block;
            width: 80px;
            height: 30px;
            background-color: #dc3545;
            border-radius: 15px;
            cursor: pointer;
            transition: background-color 0.3s;
            color: white;
            text-align: center;
            line-height: 30px;
            font-size: 12px;
        }

        .status-toggle .check:checked+.checktoggle {
            background-color: #28a745;
        }

        .status-toggle .checktoggle:before {
            content: '';
            position: absolute;
            width: 26px;
            height: 26px;
            border-radius: 50%;
            background-color: white;
            top: 2px;
            left: 2px;
            transition: transform 0.3s;
        }

        .status-toggle .check:checked+.checktoggle:before {
            transform: translateX(50px);
        }
    </style>





@endsection
