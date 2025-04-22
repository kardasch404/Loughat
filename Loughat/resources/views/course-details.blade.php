@extends('layouts.app')

@section('title', 'Course Details')

@section('content')
@include('course-details.sections.course-hero')
@include('course-details.sections.course-info')
@include('course-details.sections.related-course')
@endsection



