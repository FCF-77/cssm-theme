<article {{post_class()}}>
  <header>
    <div class="article--image">
      @php the_post_thumbnail() @endphp
    </div>
    <div class="single--header__wrapper">
      <div class="single--title">
        <h1>{!! get_the_title() !!}</h1>
       {{-- <div class="article--categories">
         @php
            $categories = wp_get_post_categories( get_the_ID() );
          @endphp
          @if ($categories)
            @foreach ($categories as $category)
              <a href="{!! get_category_link( $category ) !!}">{!! get_cat_name($category) !!}</a>
            @endforeach
          @endif
        </div> --}}
        <div class="article--date">
          <svg class="icon-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0" y="0" width="16" height="16" viewBox="0 0 16 16" enable-background="new 0 0 16 16" xml:space="preserve">
            <path fill="#ffffff" d="M8 0C3.6 0 0 3.6 0 8c0 4.4 3.6 8 8 8 4.4 0 8-3.6 8-8C16 3.6 12.4 0 8 0zM8 3.6c0.2-0.2 0.4-0.3 0.6-0.3 0.2 0 0.4 0.1 0.5 0.2 0.1 0.1 0.2 0.3 0.2 0.5 0 0.3-0.1 0.5-0.3 0.7C8.9 5 8.7 5.1 8.4 5.1 8.2 5.1 8.1 5 7.9 4.8 7.8 4.7 7.7 4.5 7.7 4.3 7.7 4 7.8 3.8 8 3.6zM9.3 11.1c-0.7 0.6-1.1 1-1.4 1.2 -0.3 0.2-0.6 0.3-0.8 0.3 -0.2 0-0.4-0.1-0.6-0.2 -0.1-0.1-0.2-0.3-0.2-0.6 0-0.6 0.3-2 1.1-4.4 0 0 0-0.1 0-0.1 0 0-0.1 0-0.1 0.1C7.2 7.4 7 7.6 6.5 8.1c-0.1 0.1-0.2 0.1-0.3 0L5.9 7.9c0 0-0.1-0.1-0.1-0.2 0-0.1 0-0.1 0.1-0.2C6.4 7 6.8 6.6 7.2 6.4 7.7 6.2 8 6 8.3 6c0.2 0 0.4 0.1 0.5 0.1C8.9 6.3 9 6.4 9 6.6 9 6.7 9 7 8.5 8.4c-0.6 2-0.7 2.7-0.7 2.9 0.1-0.1 0.4-0.3 0.9-0.8 0.1-0.1 0.2-0.1 0.3 0l0.3 0.3c0 0 0.1 0.1 0.1 0.2C9.4 11 9.4 11.1 9.3 11.1z"></path>
          </svg>
          <time class="updated" datetime="{{ get_post_time('c', true) }}">{{ get_the_date() }}</time>
        </div>
      </div>
    </div>
  </header>
  <div class="grid-container">
    <div class="single--card">
      <div class="grid-x grid-padding-x grid-margin-y block--content">
         <div class="medium-7 large-7 cell margin-bottom-3">
           {!! the_content() !!}
         </div>
         <div class="medium-4 medium-offset-1 large-4 large-offset-1 cell">
            @php  $especialidades = get_post_meta(get_the_ID(), 'especialidades_associadas', true) @endphp
            @if($especialidades) 
              <div class="speciality--info__doctors">
                <h4>Especialidades Relacionadas</h4>
                <ul>
                  @foreach( $especialidades as $especialidade)
                    <li class="speciality--doctor">
                      <a href="{!! the_permalink($especialidade); !!}">
                        <div class="speciality--doctor__thumbnail speciality--doctor__icon">
                            {!!  wp_get_attachment_image(get_field('icon', $especialidade)) !!} 
                        </div>
                        <span>{!! get_the_title($especialidade); !!}</span> 
                      </a>
                    </li>
                  @endforeach
                </ul>
              </div>
              <div class="margin-vertical-3"></div>
            @endif
            @if ($all_posts)
              <h4>Últimas Notícias</h4>
              <ul>
                @foreach ($all_posts as $all_post)
                  <li class="speciality--doctor_list">
                    <a href="{!! $all_post['permalink'] !!}">
                      {!! $all_post['title'] !!}
                    </a>
                  </li>
                @endforeach
              </ul>
              <div class="margin-vertical-3"></div>
            @endif
          <h4>Pretende esclarecer alguma dúvida?</h4>
          <a href="mailto:geral@casadesaudesaomateus.pt" class="btn btn-blue btn-icon btn-message-white">Enviar Mensagem</a>
        </div>
      </div>
    </div>
  </div>
</article>
