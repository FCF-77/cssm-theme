<div class="grid-container">
  @if ($slides)
    <div class="swiper-container homepage__swiper" id="homepageSwiper">
      <div class="swiper-wrapper">
        {{-- <div class="swiper-slide homepage__slide">
            <div class="swiper__video">
                <video muted="" poster="@asset('images/video-poster.jpg')">
                  <source src="@asset('images/cssm.mp4')" type="video/mp4">
                  Your browser does not support the video tag.
                </video>
            </div>
        </div> --}}
        @foreach ($slides as $slide)
          <div class="swiper-slide homepage__slide">
            <img src="{{ $slide['image']}}" alt="{!! $slide['frase_principal']['texto'] !!}">
            <div class="homepage__slide--content">
              <span style="color: {{ $slide['legenda_top']['cor']}}">{{ $slide['legenda_top']['texto']}}</span>
              <a href="{{ $slide['ligacao_para_conteudo'] }}">
                <h1 style="color: {{ $slide['frase_principal']['cor']}}">{!! $slide['frase_principal']['texto'] !!}</h1>
              </a>
              <h2 style="color: {{ $slide['legenda_bottom']['cor']}}">{{ $slide['legenda_bottom']['texto']}}</h2>
            </div>
          </div>
        @endforeach
      </div>
      <div class="homepage__swiper--next">
        <span class="arrow"></span>
      </div>
      <div class="homepage__swiper--prev">
        <span class="arrow"></span>
      </div>
      <div class="homepage__swiper--pagination"></div>
    </div>
  @endif

  {{ the_content() }}
</div>

<div class="homepage-selects grid-container margin-vertical-3">
  <div class="grid-x grid-margin-x grid-margin-y">
    <div class="homepage-selects--each cell medium-4 align-self-top">
      <h2>Especialidades</h2>
      <div class="wrapper-input">
        <span>Seleccione a especialidade</span>
        <div class="services-list">
          <div class="services-search-wrapper">
            <input type="text" class="services-search" id="specialityInput" autocomplete="off">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
              <g fill="none" fill-rule="evenodd" stroke="#00C7E8" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" transform="translate(1 1)">
                <circle cx="8" cy="8" r="8"/>
                <path d="M18,18 L13.65,13.65"/>
              </g>
            </svg>
          </div>
          @if ($services['cssm_speciality'])
            <ul class="custom-scrollbar autocomplete-items" id="specialityList">
              @foreach ($services['cssm_speciality'] as $index => $speciality)
                <li data-index={{$index}}><a href="{{get_permalink($speciality['id'])}}">{{ $speciality['title'] }}</a></li>
              @endforeach
            </ul>
          @endif
        </div>
      </div>
      <a class="homepage-selects--seeall" href="{{ get_post_type_archive_link('cssm_speciality') }}">Ver todos</a>
    </div>

    <div class="homepage-selects--each cell medium-4 align-self-top">
      <h2>Exames</h2>
      <div class="wrapper-input">
        <span>Seleccione o exame</span>
        <div class="services-list">
          <div class="services-search-wrapper">
            <input type="text" class="services-search" id="examInput" autocomplete="off">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
              <g fill="none" fill-rule="evenodd" stroke="#00C7E8" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" transform="translate(1 1)">
                <circle cx="8" cy="8" r="8"/>
                <path d="M18,18 L13.65,13.65"/>
              </g>
            </svg>
          </div>
          @if ($services['cssm_exam'])
            <ul class="custom-scrollbar autocomplete-items" id="examList">
              @foreach ($services['cssm_exam'] as $index => $exam)
                <li data-index={{$index}}><a href="{{get_permalink($exam['id'])}}">{{ $exam['title'] }}</a></li>
              @endforeach
            </ul>
          @endif
        </div>
      </div>
      <a class="homepage-selects--seeall" href="{{ get_post_type_archive_link('cssm_exam') }}">Ver todos</a>
    </div>

    <div class="homepage-selects--each cell medium-4 align-self-top">
      <h2>Corpo Clínico</h2>
      <div class="wrapper-input">
        <span>Seleccione o médico</span>
        <div class="services-list">
          <div class="services-search-wrapper">
            <input type="text" class="services-search" id="doctorInput" autocomplete="off">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
              <g fill="none" fill-rule="evenodd" stroke="#00C7E8" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" transform="translate(1 1)">
                <circle cx="8" cy="8" r="8"/>
                <path d="M18,18 L13.65,13.65"/>
              </g>
            </svg>
          </div>
          @if ($services['cssm_doctor'])
            <ul class="custom-scrollbar autocomplete-items" id="doctorList">
              @foreach ($services['cssm_doctor'] as $index => $doctor)
                <li data-index={{$index}}><a href="{{get_permalink($doctor['id'])}}">{{ $doctor['title'] }}</a></li>
              @endforeach
            </ul>
          @endif
        </div>
      </div>
      <a class="homepage-selects--seeall" href="{{ get_post_type_archive_link('cssm_doctor') }}">Ver todos</a>
    </div>
  </div>
</div>
<div class="homepage-agreements grid-container">
 <div class="homepage-agreements__cta">
    <h3><a href="/acordos-e-convencoes">Acordos e Convenções</a></h3>
    <p>Para melhor o servir, temos acordos e convenções com várias instituições. Consulte a lista das instituições com que temos acordo. Caso tenha alguma dúvida não hesite em contactar-nos.</p>
    <a href="/acordos-e-convencoes">Consultar Acordos</a>
  </div>
  <picture class="homepage-agreements__image">
    <img src="@asset('images/acordos.jpg')" alt="Acordos e Convenções">
  </picture>
</div>



