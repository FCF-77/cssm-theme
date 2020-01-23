@php  $post_slug = $post->post_name; @endphp



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
          
          @if ($post_slug == 'cuidados-continuados-de-convalescenca')
            <div class="speciality--info__doctors">
              <h2>Equipa Multidisciplinar</h2>
              <ul>
                  <li class="speciality--doctor"><a>Diretor Técnico</a></li>
                  <li class="speciality--doctor"><a>Assistente Social</a></li>
                  <li class="speciality--doctor"><a>Assistentes Operacionais</a></li>
                  <li class="speciality--doctor"><a>Enfermeiros</a></li>
                  <li class="speciality--doctor"><a>Médicos</a></li>
                  <li class="speciality--doctor"><a>Nutricionista</a></li>
                  <li class="speciality--doctor"><a>Médico Fisiatra</a></li>
                  <li class="speciality--doctor"><a>Fisioterapeutas</a></li>
                  <li class="speciality--doctor"><a>Psicólogo</a></li>
                  <li class="speciality--doctor"><a>Terapeuta de Fala</a></li>
                  <li class="speciality--doctor"><a>Terapeuta Ocupacional</a></li>
                  <li class="speciality--doctor"><a>Orientador Espiritual</a></li>
              </ul>
            </div>
          @else 
            @if ($doctors)
              <div class="speciality--info__doctors">
                <h2>Corpo Clínico</h2>
                <ul>
                  @foreach ($doctors as $doctor)
                    <li class="speciality--doctor">
                      <a href="{!! $doctor['permalink'] !!}">
                        <div class="speciality--doctor__thumbnail @if (!$doctor['thumbnail']) no-thumbnail @endif">
                          {!! $doctor['thumbnail'] !!}
                        </div>
                        <span>{!! $doctor['name'] !!}</span>
                      </a>
                    </li>
                  @endforeach
                </ul>
              </div>
              <div class="margin-vertical-2"></div> 
            @endif
          @endif
        </div>
        <div class="single--card__column cell medium-12 large-6 small-order-3 medium-order-3 large-order-2">
          <div class="single--card__content">
              {{the_content()}}
            <p>{!! the_field('conteudo_da_especialidade') !!}</p>          
          </div>
        </div>
        
        @if ($post_slug == 'atendimento-medico-permanente')
          <div class="single--card__column cell medium-6 large-3 small-order-2 medium-order-2 large-order-3 medium-offset-1 large-offset-0 partner--info">
            <h2>Horário</h2>
            <ul>
              <li>24h/dia, 365d/ano</li>
            </ul>
            <h2>Contacto Telefónico</h2>
            <ul>
              <li>232 423 423</li>
            </ul>
            <h2>Morada</h2>
            <ul>
              <li>Rua 5 de Outubro 3500-093 Viseu</li>
            </ul>
            <a target="_blank" href="https://www.google.com/maps/place/Hospital+Casa+de+Sa%C3%BAde+S%C3%A3o+Mateus+SA/@40.656663,-7.903928,16z/data=!4m5!3m4!1s0x0:0x46bc31a42863156!8m2!3d40.6565819!4d-7.9048984?hl" class="btn btn-blue partner--info__directions">Obter Direções</a>
            <div class="margin-vertical-2"></div> 
          </div>
        @else  
          <div class="single--card__column cell medium-6 large-3 small-order-2 medium-order-2 large-order-3 medium-offset-1 large-offset-0">
            <div class="single--card__appointment">
                <h2>Pedido de Marcação</h2>
                <h3>Faça aqui o seu pedido de marcação online. Pode, se desejar, escolher o médico e respectivo acordo caso pretendido.</h3>
                <a class="btn btn-blue btn-icon btn-appointment" href="{{App::appointmentPage()}}">Marcação Online</a>
            </div>
            <div class="margin-vertical-3"></div> 
            
            @php $categoriaQuery = App::speciality_notice($post_slug,5);  @endphp
            @if ($categoriaQuery)
            <div class="servicos_geral">
              <h2>IMPRENSA</h2>
              <ul>                  
                @foreach ($categoriaQuery as $notice)
                  <li>
                    <a href="{{ get_the_permalink($notice) }}">
                      <span>{!! get_the_title($notice) !!}</span>
                    </a>
                  </li>
                @endforeach
              </ul>
              <div class="margin-vertical-2"></div> 
            </div>
            @endif
          </div>
        @endif
      </div>
    </div>
  </div>
</article>
