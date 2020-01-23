{{--
  Template Name: Ergogymno Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-ergogymno')
  @endwhile
@endsection
