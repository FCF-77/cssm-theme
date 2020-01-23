@php

@endphp

<article @php post_class() @endphp>
  <header>
    <h3>{{App::post_type_label(get_the_ID())}}</h3>
    <h2 class="entry-title"><a href="{{ get_permalink() }}">{{ get_the_title() }}</a></h2>
  </header>
</article>
