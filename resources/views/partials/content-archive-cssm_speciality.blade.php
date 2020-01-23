<div class="grid-container my-100">
  <div class="page-title">
    <h1>Especialidades</h1>
    <p>Consulte-nos nas mais variadas especialidades de consulta externa.</p>
    <p>Temos ao seu dispor vários profissionais qualificados e equipamentos de qualidade e inovadores para um melhor diagnóstico e tratamento.</p>
  </div>

  {{-- <h2 class="speciality--type">Unidades Diferenciadas</h2>
  <div class="grid-x grid-margin-x grid-margin-y margin-bottom-3 align-middle" id="especialidadesUnidades">
    @if ($services['cssm_speciality'])
      @foreach ($services['cssm_speciality'] as $service)

        @if (get_field( 'unidade_diferenciada', $service['id'] ) == 1)
          <div class="cell medium-6 large-4 xlarge-3 speciality--card">
            <a href="{{ get_permalink($service['id']) }}">
              <div class="speciality--card__wrapper">
                <div class="speciality--card__icon">
                  <span class="speciality--card__circle"></span>
                  {!! $service['icon'] !!}
                </div>
                <h3>{{ $service['title'] }}</h3>
              </div>
            </a>
          </div>
        @endif

      @endforeach
    @endif
  </div> --}}
  
  <div class="grid-x grid-margin-x grid-margin-y align-middle" id="especialidadesRestantes">
  @if ($services['cssm_speciality'])
    @foreach ($services['cssm_speciality'] as $service)

      @if (get_field( 'unidade_diferenciada', $service['id'] ) == 0 && get_field('remover_do_arquivo', $service['id']) !== true)
        <div class="cell medium-6 large-4 xlarge-3 speciality--card">
          <a href="{{ get_permalink($service['id']) }}">
            <div class="speciality--card__wrapper">
              <div class="speciality--card__icon">
                <span class="speciality--card__circle"></span>
                {!! $service['icon'] !!}
              </div>
              <h3>{{ $service['title'] }}</h3>
            </div>
          </a>
        </div>
      @endif

    @endforeach
  @endif
  </div>
</div>