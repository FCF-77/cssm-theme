{{--
  Template Name: Sitemap Template 
--}}

@extends('layouts.app')
 
@section('content')
<div class="grid-container my-100">
  <div class="page-title default-page">
    <h1>{!! App::title() !!}</h1>
  </div>
  <div class="grid-x">
    <div class="block--content cell medium-6 medium-offset-3">

      @if ($pages)
        <h2>Páginas</h2>
        <ul>
          @foreach ($pages as $page)
            <li>
              <a href="{{ get_the_permalink($page) }}">
                {{get_the_title($page)}}
              </a>
            </li>
          @endforeach
        </ul>
      @endif

      <div class="margin-vertical-3"></div>
      
      @if ($partners)
        <h2>Parceiros</h2>
        <ul>
          @foreach ($partners as $partner)
            <li>
              <a href="{{get_the_permalink($partner)}}">
                {{get_the_title($partner)}}
              </a>
            </li>
          @endforeach
        </ul>
      @endif

      <div class="margin-vertical-3"></div>

      @if ($services['cssm_speciality'])
        <h2>Especialidades</h2>
        <ul>
          @foreach ($services['cssm_speciality'] as $speciality)
            <li>
              <a href="{{$speciality['permalink']}}">
                {{$speciality['title']}}
              </a>
            </li>
          @endforeach
        </ul>
      @endif

      <div class="margin-vertical-3"></div>

      @if ($services['cssm_exam'])
        <h2>Exames</h2>
        <ul>
          @foreach ($services['cssm_exam'] as $exam)
            <li>
              <a href="{{$exam['permalink']}}">
                {{$exam['title']}}
              </a>
            </li>
          @endforeach
        </ul>
      @endif

      <div class="margin-vertical-3"></div>

      @if ($services['cssm_doctor'])
        <h2>Corpo Clínico</h2>
        <ul>
          @foreach ($services['cssm_doctor'] as $doctor)
            <li>
              <a href="{{$doctor['permalink']}}">
                {{$doctor['title']}}
              </a>
            </li>
          @endforeach
        </ul>
      @endif
    </div>
  </div>
</div>
@endsection
