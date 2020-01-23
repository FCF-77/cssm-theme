
<article {{post_class()}}>
  <header>
    <div class="speciality--image">
      {!! the_post_thumbnail() !!}
    </div>
    <div class="single--header__wrapper">
      <div class="single--title">
          <h1>{{ get_the_title() }}</h1>
          {{ App::get_breadcrumbs() }}
      </div>
    </div>
  </header>
  <div class="grid-container">
    <div class="single--card">
      <div class="grid-x grid-padding-x grid-margin-y">
        <div class="single--card__column cell medium-5 large-3 small-order-1 medium-order-1 large-order-1">
           
            <div class="speciality--info__doctors">
              <h2>Corpo Clínico</h2>

                @php
                    $_posts = new WP_Query( array(
                      'post_type'         => 'cssm_speciality',
                      'posts_per_page'    => -1,
                      'post__in'          => array(3000),
                      'orderby'           => 'post_name',
                      'order'             => 'ASC'
                  ));
                @endphp

                @if ($_posts->have_posts())
                  @while ($_posts->have_posts()) @php $_posts->the_post() @endphp

                    @php $specialityDoctorsPediatria = get_post_meta(get_the_ID(), 'corpo_clinico', true); @endphp

                    @if ($specialityDoctorsPediatria)
                      <div class="title_especialidade">{!! the_title() !!}</div>
                      
                        @foreach ($specialityDoctorsPediatria as $value)
                        <li class="speciality--doctor">
                          <a href="{!! get_the_permalink($value); !!}">
                            <div class="speciality--doctor__thumbnail @if (!get_the_post_thumbnail($value)) no-thumbnail @endif">
                              {!! get_the_post_thumbnail($value) !!}
                            </div>
                            <span>{!! get_the_title($value); !!}</span>
                          </a>
                        </li>
                        @endforeach

                    @endif  
                    @php
                    wp_reset_postdata();
                    @endphp
                  @endwhile
                @endif

              </div>
            <div class="margin-vertical-2"></div> 
           
        </div>
        <div class="single--card__column cell medium-12 large-6 small-order-3 medium-order-3 large-order-2">
          <div class="single--card__content">
              {{the_content()}}         
          </div>
        </div>
        <div class="single--card__column cell medium-6 large-3 small-order-2 medium-order-2 large-order-3 medium-offset-1 large-offset-0 partner--info">
          @if (get_field('horario_parceiro'))
            <h2>Horário</h2>
            <p>{!! the_field('horario_parceiro') !!}</p>
          @endif
          <h2>Contactos</h2>
          <ul>
            @if (have_rows('contactos_telefonicos'))
              @while (have_rows('contactos_telefonicos')) @php the_row() @endphp
                  <li>{!! the_sub_field('telefone') !!}</li>
              @endwhile
            @endif
            @if (have_rows('emails'))
              @while (have_rows('emails')) @php the_row() @endphp
                  <li><a href="mailto:geral@casadesaudesaomateus.pt">{!! the_sub_field('email') !!}</a></li>
              @endwhile
            @endif
          </ul>
          @if (get_field('morada'))
            <h2>Morada</h2>
            <p>{!! the_field('morada') !!}</p>
          @endif
          @if (get_field('google_maps'))
            <a target="_blank" href="{!! the_field('google_maps') !!}" class="btn btn-blue partner--info__directions">Obter Direções</a>
          @endif           
          <div class="margin-vertical-3"></div> 
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
