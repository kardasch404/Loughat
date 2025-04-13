@extends('layouts.teacher_dashboard')

@section('title', 'Courses')

@section('content')

    <div class="col-md-7 col-lg-8 col-xl-9">
        <div class="card card-table">
            <div class="card-body">

                <!-- Invoice Table -->
                <div class="table-responsive">
                    <table class="table table-hover table-center mb-0">
                        <thead>
                            <tr>
                                <th>Course ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>level</th>
                                <th>categorie</th>
                                <th>Action</th>
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
                                            <img class="avatar-img "
                                                src="https://cblingua.com/wp-content/uploads/2020/11/Deutsch.jpg"
                                                alt="User Image">
                                        </a>
                                        <a href="patient-profile.html">Deutsch sprache</a>
                                    </h2>
                                </td>
                                <td class="w-25 text-wrap" style="word-break: break-word;">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi ab laudantium nemo beatae
                                    sed.
                                </td>

                                <td>$450</td>
                                <td>basic</td>
                                <td>Deutsch</td>
                                <td class="">
                                    <div class="table-action">
                                        <a href="" class="btn btn-sm bg-info-light ">
                                            update
                                        </a>
                                        <a href="" class="btn btn-sm btn-danger">
                                            delete
                                        </a>
                                    </div>
                                </td>
                            </tr>


                        </tbody>
                    </table>
                </div>
                <!-- /Invoice Table -->

                <!-- Modal -->
                <div class="modal fade" id="createCourseModal" tabindex="-1" role="dialog"
                    aria-labelledby="createCourseModalLabel" aria-hidden="false">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="createCourseModalLabel">Create New Course</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="createCourseForm">
                                    <div class="form-group">
                                        <label for="courseId">Course ID</label>
                                        <input type="text" class="form-control" id="courseId" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="title" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" rows="3" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="number" class="form-control" id="price" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="level">Level</label>
                                        <select class="form-control" id="level" required>
                                            <option value="">Select Level</option>
                                            <option value="beginner">Beginner</option>
                                            <option value="intermediate">Intermediate</option>
                                            <option value="advanced">Advanced</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <input type="text" class="form-control" id="category" required>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" form="createCourseForm">Create
                                    Course</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
