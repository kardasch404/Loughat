@extends('layouts.teacher_dashboard')

@section('title', 'Show LEsson')

@section('content')
    <div class="col-md-7 col-lg-8 col-xl-9">
        <div class="card card-table">
            <div class="card-body">

                <!-- Invoice Table -->
                <div class="table-responsive">
                    <table class="table table-hover table-center mb-0">
                        <thead>
                            <tr>
                                <th>Section</th>
                                <th>order</th>
                                <th>title</th>
                                <th>type</th>
                                <th>file_path</th>
                                <th>duration</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lessons as $lesson)
                            <tr>
                                <td>
                                    <a href="">{{$lesson->section->title}}</a>
                                </td>
                                <td class="w-25 text-wrap" style="word-break: break-word;">
                                    {{$lesson->order}}
                                </td>

                                <td>{{$lesson->title}}</td>
                                <td>{{$lesson->type}}</td>
                                <td>{{$lesson->file_path}}</td>
                                <td>{{$lesson->duration}}</td>
                                <td class="">
                                    <div class="table-action">                                       
                                        <a href="" class="btn btn-sm bg-info-light">
                                            edit
                                        </a>                                        
                                        <form action="" method="POST" style="display: inline;">
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
