@extends('layouts.teacher_dashboard')

@section('title', 'Update-Lesson')

@section('content')

    <div class="col-md-7 col-lg-8 col-xl-9">
        <form action="{{ route('lesson.update', ['lessonId' => $lesson->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Lesson</h4>
                    <div class="row form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="title" value="{{ $lesson->title }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Order<span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="order" value="{{ $lesson->order }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>File Path<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="file_path" value="{{ $lesson->file_path }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Duration<span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="duration" value="{{ $lesson->duration }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group position-relative">
                                <label for="type" class="form-label fw-bold mb-2">Choose Type</label>
                                <select name="type" id="type" class="form-select form-control custom-select">
                                    <option value="">Select Type</option>
                                    <option value="video" {{ $lesson->type == 'video' ? 'selected' : '' }}>video</option>
                                    <option value="file" {{ $lesson->type == 'file' ? 'selected' : '' }}>file</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group position-relative">
                                <label for="section_id" class="form-label fw-bold mb-2">Choose Section</label>
                                <select name="section_id" id="section_id" class="form-select form-control custom-select" value="{{ $lesson->section->name }}">
                                    <option value="">Select Section</option>
                                    @foreach ($sections as $section)
                                    <option value="{{ $section->id }}" {{ $lesson->section_id == $section->id ? 'selected' : '' }}>
                                        {{ $section->title }}
                                    </option>
                                @endforeach
                                
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="submit-section submit-btn-bottom">
                <button type="submit" name="submit" class="btn btn-primary submit-btn">Save</button>
            </div>
        </form>
    </div>
@endsection
