<!doctype html>
<html @php language_attributes() @endphp>
  @include('partials.head')
  <body {{ body_class() }}>
    <div id="global-wrapper">
      @php do_action('get_header')
      @endphp
      @include('partials.header')
      <div id="page-wrapper">
        <div class="page-container" data-namespace="{{get_current_template()}}">
          <main id="main" role="document" {{ body_class( 'main') }}>
            @yield('content')
          </main>
        </div>
        @include('partials.mobile-nav')
      </div>
      @php do_action('get_footer')
      @endphp
      @include('partials.footer')

      @php wp_footer()
      @endphp
    </div>
    @include('partials.success-appointment')
  </body>
</html>
