<article {{post_class()}}>
  <header>
    <div class="single--header__wrapper">
      <div class="doctor--image">
        <div class="doctor--image__inner"></div>
        @if (has_post_thumbnail())
          {!! the_post_thumbnail() !!}
        @else
          <img src="@asset('images/corpo_clinico_thumb.png')" alt="{{get_the_title()}}">
        @endif
      </div>
      <div class="single--title">
        <h1>{{ get_the_title() }}</h1>
        {{ App::get_breadcrumbs() }}
      </div>
    </div>
  </header>
  <div class="grid-container">
    <div class="single--card">
      <div class="grid-x grid-padding-x grid-margin-y">
        <div class="single--card__column cell medium-3 large-3 small-order-1 medium-order-1 large-order-1">
          @php
            $args = new WP_Query(array(
                'post_type'         => 'cssm_speciality',
                'posts_per_page'    => -1,
                'meta_query' => array(
                    array(
                        'key'       => 'corpo_clinico',
                        'value'     => get_the_ID(),
                        'compare'   => 'like'
                    ),
                ),
            ));
          @endphp
          <div class="speciality--info__doctors">
            @if($args->have_posts()) 
              <h2>Especialidades</h2>      
              <ul>
              @while ($args->have_posts()) @php $args->the_post() @endphp      
                <li class="speciality--doctor">
                  <a href="{!! the_permalink() !!}">
                    <div class="speciality--doctor__thumbnail speciality--doctor__icon">
                        {!!  wp_get_attachment_image(get_field('icon')) !!}  
                    </div>
                    <span>{!! the_title() !!}</span>
                  </a>
                </li>
                @php
                  wp_reset_postdata();
                @endphp                      
              @endwhile 
              </ul>
              <div class="margin-vertical-3"></div>  
            @endif
            <div class="hide-for-medium-only">
              @if( have_rows('horario_do_medico') )
                <h2 style="margin-bottom:10px;">Horário</h2>
                <ul>
                  @while ( have_rows('horario_do_medico') ) @php the_row() @endphp 
                  <li class="schedule--doctor">
                    <span>{{ the_sub_field('dia_da_semana') }}</span> 
                    <span>{{ the_sub_field('hora_de_inicio') }} - {{ the_sub_field('hora_de_fim') }}</span> 
                  </li>
                  @php
                  wp_reset_postdata();
                  @endphp  
                  @endwhile
                </ul> 
                <div class="margin-vertical-2"></div>    
              @endif
            </div>
          </div>
        </div>
        <div class="single--card__column cell medium-12 large-6 small-order-3 medium-order-4 large-order-2 block--content">
          <div class="single--card__cv">
            {{the_content()}}
          </div>
        </div>
        <div class="single--card__column cell medium-5 medium-order-2 speciality--info__doctors show-for-medium-only">
          @if( have_rows('horario_do_medico') )
              <h2>Horário</h2>
              <ul>
                @while ( have_rows('horario_do_medico') ) @php the_row() @endphp 
                <li class="schedule--doctor">
                  <span>{{ the_sub_field('dia_da_semana') }}</span> 
                  <span>{{ the_sub_field('hora_de_inicio') }} - {{ the_sub_field('hora_de_fim') }}</span> 
                </li>
                @php
                wp_reset_postdata();
                @endphp  
                @endwhile
              </ul>     
            @endif
        </div>
        <div class="single--card__column cell medium-4 large-3 small-order-2 medium-order-3 large-order-3 large-offset-0">
          <div class="single--card__appointment">
            <h2>Pedido de Marcação</h2>
            <h3>Faça aqui o seu pedido de marcação online. Pode, se desejar, escolher o médico e respectivo acordo caso pretendido.</h3>
            <a class="btn btn-blue btn-icon btn-appointment" href="{{App::appointmentPage()}}">Marcação Online</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</article>