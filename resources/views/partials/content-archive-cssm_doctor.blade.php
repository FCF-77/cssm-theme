<div class="grid-container my-100">
    <div class="page-title">
      <h1>Corpo Clínico</h1>
      <h2>Conheça o rosto do quem cuida da sua saúde.</h2>
      <p>Estes são os profissionais que estão diariamente disponíveis e dedicados a ajudá-lo, proporcionando-lhe o melhor atendimento e tratamento possíveis.</p>
      <p>A Casa de Saúde São Mateus tem ao seu dispor os melhores profissionais nas mais variadas áreas de Saúde, para garantir que os pacientes sejam recebidos e tratados com base na ética, compromisso e profissionalismo do nosso Hospital.</p>
    </div>
      @php
        $_posts = new WP_Query( array(
              'post_type'         => 'cssm_speciality',
              'posts_per_page'    => -1,
              'orderby'           => 'post_name',
              'order'             => 'ASC'
          ));
      @endphp

      @if ($_posts->have_posts())

          @while ($_posts->have_posts()) @php $_posts->the_post() @endphp

            @php
              $specialityDoctors = get_post_meta(get_the_ID(), 'corpo_clinico', true);
              $specialityDoctorsOrder = [];
            @endphp

            @if ($specialityDoctors)
              <h1 class="doctor--unity margin-bottom-1">{!! the_title() !!}</h1>
              <div class="grid-x grid-padding-x grid-margin-y margin-bottom-3">
                @foreach ($specialityDoctors as $key => $value)
                    @php
                        $specialityDoctorsOrder[$key] = [
                        'id'            => $value,
                        'name'          => get_the_title($value),
                        'link'          => get_the_permalink($value),
                        'thumbnail'     => get_the_post_thumbnail($value),
                        'coordenador'   => get_post_meta($value, 'coordenador', true),
                        'status'        => get_post_status($value)
                      ];
                    @endphp

                    @if ($specialityDoctorsOrder[$key]['coordenador'] == 1)
                        @php
                            array_unshift($specialityDoctorsOrder, $specialityDoctorsOrder[$key]);
                        @endphp
                    @endif
                @endforeach

                @foreach ($specialityDoctorsOrder as $doctor)
                  @if ($doctor['status'] == 'publish')
                    <div class="cell small-6 medium-4 large-3 doctor coordenador-{{$doctor['coordenador']}}">
                      <a href="{{$doctor['link']}}">
                        @if ($doctor['thumbnail'])
                          {!! $doctor['thumbnail'] !!}
                        @else
                          <img src="@asset('images/corpo_clinico_thumb.png')" alt="{{$doctor['name']}}">
                        @endif
                        <div class="bg-overlay"></div>
                        <div class="doctor__info">
                          <div class="doctor__info--wrapper">
                            <h2>{!! $doctor['name'] !!}</h2>
                            @if ($doctor['coordenador'] == 1)
                              <span>Coordenador</span>
                            @endif
                            <h3>{{ the_title() }}</h3>
                          </div>
                        </div>
                      </a>
                    </div>
                  @endif
                @endforeach
              </div>
            @endif

            @php
              wp_reset_postdata();
            @endphp
          @endwhile
      @endif
  </div>