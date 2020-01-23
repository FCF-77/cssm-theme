{{--
  Template Name: Cliniform Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-cliniform')
  @endwhile
@endsection