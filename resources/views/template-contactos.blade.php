{{--
  Template Name: Contactos Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-contactos')
  @endwhile
@endsection
