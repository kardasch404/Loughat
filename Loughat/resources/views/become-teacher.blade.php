@extends('layouts.app')

@section('title', 'become An Teacher')

@section('content')
  @include('become-teacher.sections.breadcrumb')
  @include('become-teacher.sections.become-teacher')
  @include('become-teacher.sections.teacher-rules')
  @include('become-teacher.sections.sucessfull-teacher')
  @include('become-teacher.sections.calltoaction')
@endsection



