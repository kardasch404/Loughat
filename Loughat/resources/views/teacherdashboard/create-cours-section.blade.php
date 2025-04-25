@extends('layouts.teacher_dashboard')

@section('title', 'Create-Cours-Sections')

@section('content')

    <div class="col-md-7 col-lg-8 col-xl-9">
        <form action="{{ route('sections.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- @method("POST") --}}
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Craete Section Cours</h4>
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
                            <div class="form-group position-relative">
                                <label for="cours_id" class="form-label fw-bold mb-2">Choose Course Name</label>
                                <select name="cours_id" id="cours_id" class="form-select form-control custom-select">
                                    <option value="">Select Course</option>
                                    @foreach ($courses as $cours)
                                        <option value="{{ $cours->id }}">{{ $cours->title }}</option>
                                    @endforeach
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
@endsection
