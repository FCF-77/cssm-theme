{{--
  Template Name: Appointment Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-appointment')
  @endwhile
@endsection
