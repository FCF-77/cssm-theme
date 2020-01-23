<div class="grid-container my-100">
  <div class="page-title default-page">
    <h1>{!! App::title() !!}</h1>
  </div>
  <div class="grid-x">
    <div class="block--content cell medium-6 medium-offset-3">
      @php the_content() @endphp
    </div>
  </div>
</div>
{!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
