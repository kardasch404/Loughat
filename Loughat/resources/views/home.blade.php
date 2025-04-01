@extends('layouts.app')

@section('title', 'Home')

@section('content')
  @include('home.sections.banner')
  @include('home.sections.intro_featured')
  @include('home.sections.featured_categories')
  @include('home.sections.popular_courses')
  @include('home.sections.students_says')
  @include('home.sections.brands')
  @include('home.sections.best_teachers')
  @include('home.sections.join_area')
  @include('home.sections.latest_events')
  @include('home.sections.get_started')
  @include('home.sections.news_letter')
@endsection



