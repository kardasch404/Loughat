@extends('layouts.teacher_dashboard')

@section('title', 'Create-Cours-Lesson')

@section('content')

    <div class="col-md-7 col-lg-8 col-xl-9">
        <form action="{{ route('lessons.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Craete Cours Lesson</h4>
                    <div class="row form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="title">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Order<span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="order">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>File Path<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="file_path">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Duration<span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="duration">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group position-relative">
                                <label for="type" class="form-label fw-bold mb-2">Choose Type</label>
                                <select name="type" id="type" class="form-select form-control custom-select">
                                    <option value="">Select Type</option>
                                    <option value="video">video</option>
                                    <option value="file">file</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group position-relative">
                                <label for="cours_id" class="form-label fw-bold mb-2">Choose Cours</label>
                                <select name="cours_id" id="cours_select" class="form-select form-control custom-select">
                                    <option value="">Select Course</option>
                                    @foreach ($courses as $cours)
                                        <option value="{{ $cours->id }}">{{ $cours->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group position-relative">
                                <label for="section_id" class="form-label fw-bold mb-2">Choose Section</label>
                                <select name="section_id" id="section_select"
                                    class="form-select form-control custom-select">
                                    <option value="">Select Section</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="submit-section submit-btn-bottom">
                <button type="submit" name="submit" class="btn btn-primary submit-btn">Create</button>
            </div>
        </form>

    </div>
    <script>
        document.getElementById('cours_select').addEventListener('change', function() {
            let coursId = this.value;
            fetch(`/teacher/sections/by-course/${coursId}`)
                .then(response => response.json())
                .then(data => {
                    let sectionSelect = document.getElementById('section_select');
                    sectionSelect.innerHTML = '<option value="">Select Section</option>';
                    data.sections.forEach(section => {
                        sectionSelect.innerHTML +=
                            `<option value="${section.id}">${section.title}</option>`;
                    });
                });
        });
    </script>
@endsection
