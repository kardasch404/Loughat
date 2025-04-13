@extends('layouts.teacher_dashboard')

@section('title', 'Update-Cours')

@section('content')

    <div class="col-md-7 col-lg-8 col-xl-9">
        <form action="{{ route('courses.update', ['coursId' => $cours->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Cours</h4>
                    <div class="row form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="change-avatar">
                                    <div class="profile-img">
                                        <img src="" alt="Cours Image">
                                    </div>
                                    <div class="upload-img">
                                        <div class="change-photo-btn">
                                            <span><i class="fa fa-upload"></i> Upload Photo</span>
                                            <input type="file" class="upload" name="photo">
                                        </div>
                                        <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="title" value="{{ $cours->title }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Description <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="description" value="{{ $cours->description }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Price <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="price" value="{{ $cours->price }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>level</label>
                                <select class="form-control select" name="level">
                                    <option value="basic" {{ $cours->level == 'basic' ? 'selected' : '' }}>basic</option>
                                    <option value="intermediar" {{ $cours->level == 'intermediar' ? 'selected' : '' }}>intermediar</option>
                                    <option value="advanced" {{ $cours->level == 'advanced' ? 'selected' : '' }}>advanced</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="categorie_id" class="form-label">Category</label>
                            <select name="categorie_id" id="categorie_id" class="form-control">
                                @foreach($categories as $categorie)
                                    <option value="{{ $categorie->id }}" {{ $cours->categorie_id == $categorie->id ? 'selected' : '' }}>
                                        {{ $categorie->name }}
                                    </option>
                                @endforeach
                            </select>                           
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
