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
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($courses as $course)
                            <tr>
                                <td>
                                    <a href="">{{$course->id}}</a>
                                </td>
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="" class="avatar avatar-sm mr-2">
                                            <img class="avatar-img "
                                                src="{{ $course->photo }}"
                                                alt="">
                                        </a>
                                        <a href="">{{$course->title}}</a>
                                    </h2>
                                </td>
                                <td class="w-25 text-wrap" style="word-break: break-word;">
                                    {{$course->description}}
                                </td>

                                <td>{{$course->price}}</td>
                                <td>{{$course->level}}</td>
                                <td>{{$course->categorie->name}}</td>
                                <td class="">
                                    <div class="table-action">
                                        <a href="{{ route('lessons.show', $course->id) }}" class="btn btn-sm bg-info-light">
                                            Show Lesson
                                        </a>                                        
                                        <a href="{{ route('courses.edit', ['coursId' => $course->id]) }}" class="btn btn-sm bg-info-light">
                                            edit
                                        </a>                                        
                                        <form action="{{ route('courses.delete', ['coursId' => $course->id]) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                delete
                                            </button>
                                        </form>
                                        
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /Invoice Table -->
            </div>
        </div>
    </div>
@endsection
