<article {{ post_class() }} >
    <header>
      <div class="article--image">
        @php the_post_thumbnail() @endphp
      </div>
      <div class="single--header__wrapper">
        <div class="single--title">
          <div class="article--date">
            <div class="icon_esp" >{!! wp_get_attachment_image(get_field('icon', get_the_ID())) !!}</div>
            <h1 style="margin-left:10px;">{{ get_the_title() }}</h1>
            <div class="sub_title">PISO 2</div>
          </div>
        </div>
      </div>
    </header>
    <div class="grid-container">
      <div class="single--card">
        <div class="grid-x grid-padding-x grid-margin-y">
          <div class="single--card__column cell medium-4 large-3 small-order-1 medium-order-1 large-order-1 partner--info partner--ucc" style="text-align:center;">
                <img src="@asset('images/logo_UCC.jpg')" alt="Unidade de Convalescencia">
            <div class="margin-vertical-3"></div>
            <h2>Contactos</h2>
            <ul>
              @if (have_rows('contactos_telefonicos'))
                  @while (have_rows('contactos_telefonicos')) @php the_row() @endphp
                    <li>{!! the_sub_field('telefone') !!}</li>
                  @endwhile
              @endif
              @if (have_rows('emails'))
                  @while (have_rows('emails')) @php the_row() @endphp
                    <li><a href="mailto:{!! the_sub_field('email') !!}">{!! the_sub_field('email') !!}</a></li>
                  @endwhile
              @endif
            </ul>
            @if (get_field('morada'))
              <h2>Morada</h2>
              <p>{!! the_field('morada') !!}</p>
            @endif
            <div class="margin-vertical-2"></div>
            @if (get_field('google_maps'))
              <a target="_blank" href="{!! the_field('google_maps') !!}" class="btn btn-blue partner--info__directions">Obter Direções</a>
            @endif
            <div class="margin-vertical-3"></div>
           
            
          </div>
          <div class="single--card__column cell medium-8 large-6 small-order-2 medium-order-2 large-order-2">
            <div class="single--card__content">
              {{the_content()}}
            </div>
          </div>
          <div class="single--card__column cell medium-6 large-3 small-order-3 medium-order-3 large-order-3 partner--info"> 
              <div class="galerry_ucc">
                  {!! do_shortcode("[modula id='2045']"); !!}
              </div>
              <div class="margin-vertical-3"></div> 

              <div class="servicos_geral">

                {{-- @php $categoriaQuery = App::speciality_notice("uc");  @endphp
                @if ($categoriaQuery) --}}
                  <h2>IMPRENSA</h2>
                  <ul>
                      <li><a href="https://www.casadesaude.pt/reabilitacao-de-doentes-com-avc/"><span>Reabilitação de Doentes com AVC</span></a></li>  
                    
                    {{-- @foreach ($categoriaQuery as $notice)
                      <li>
                        <a href="{{ get_the_permalink($notice) }}">
                          <span>{!! get_the_title($notice) !!}</span>
                        </a>
                      </li>
                    @endforeach --}}
                  </ul>
                  <div class="margin-vertical-2"></div> 
                {{-- @endif --}}
    
               
              </div>
          </div>
        </div>
      </div>
    </div>
  </article>
  