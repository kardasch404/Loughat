@extends('layouts.app')

@section('title', 'Courses')

@section('content')
@include('course-search.sections.hero')
@include('course-search.sections.courses')
@include('course-search.sections.filter')
@endsection



