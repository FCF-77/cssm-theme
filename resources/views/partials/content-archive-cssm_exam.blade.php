<div class="grid-container my-100">
  <div class="page-title">
    <h1>Exames</h1>
    <p>Na Casa de Saúde temos à sua disposição Meios Complementares de Diagnóstico em áreas muito diferenciadas.</p>
  </div>

  <div class="grid-x grid-margin-x grid-margin-y margin-bottom-3 align-middle" id="examCards">
    @if ($services['cssm_exam'])
      @foreach ($services['cssm_exam'] as $service)
        
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

      @endforeach
    @endif
  </div>
</div>