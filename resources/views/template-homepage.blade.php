{{--
  Template Name: Homepage Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-homepage')
  @endwhile
@endsection