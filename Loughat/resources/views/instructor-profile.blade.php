@extends('layouts.app')

@section('title', 'Instructor Profile')

@section('content')
  @include('instructor-profile.sections.breadcrumb')
  @include('instructor-profile.sections.instructor-courses')
@endsection



