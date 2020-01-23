@extends('layouts.app')

@section('content')
  <div class="grid-container my-100">
    <div class="page-title">
      <h1>Notícias</h1>
      @if (is_category())
        <h2>Categoria: {{single_cat_title()}}</h2>
      @endif
    </div>
    <div class="grid-x grid-margin-x grid-margin-y">
      @while (have_posts()) @php the_post() @endphp
          <article @php post_class('cell medium-6 news__article margin-vertical-3') @endphp >
            <a href="{{get_the_permalink()}}">
              <picture>
                {{ the_post_thumbnail( 'large', array( 'alt' => get_the_title() ) ) }}
              </picture>
              <div class="news__article--content">
                <header>
                  <time class="updated" datetime="{{ get_post_time('c', true) }}">{{ get_the_date() }}</time>
                  <h2>{!! get_the_title() !!}</h2>
                </header>
                <div class="news__article--summary">
                  {{ App::get_excerpt(190) }}
                </div>
              </div>
            </a>
          </article>
      @endwhile
    </div>
  </div>
@endsection