@extends('layouts.app')

@section('content')
  <div class="grid-container">
    @if (!have_posts())
      <div class="alert alert-warning">
        {{ __('Sorry, no results were found.', 'sage') }}
      </div>
      {!! get_search_form(false) !!}
    @endif

    @if (have_posts())
    <h1>Resultados de pesquisa por <em>"{{get_search_query()}}"</em></h1>
    @endif
    @while(have_posts()) @php the_post() @endphp
      @include('partials.content-search')
    @endwhile
    {!! get_the_posts_navigation() !!}
  </div>
@endsection
