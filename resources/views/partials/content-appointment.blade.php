
  {{-- <div class="page-title">
    <h1>{!! the_title() !!}</h1>
    <h2>Faça o seu pedido de marcação, confirmaremos o mais brevemente possível.</h2>
  </div> --}}
<form class="cssm-form" method="POST" id="appointmentForm">
  <div class="grid-container my-100-especial">
    <div class="grid-x align-center" >
      <div class="cell medium-12 medium-order-1 large-6 margin-bottom-3">
        <div class="grid-x align-center formFieldGroup">
          <div class="cell formFieldGroup__title">
            <h3>Dados da Marcação</h3>
          </div>
        </div>
        <div id="formFieldGroup__radio">
          <ul>
            <li>
              <input type="radio" name="radio-especialidade" id="radio-especialidade" data-filter="select-especialidades" value="Consulta" checked>
              <label for="radio-especialidade">
                    <svg width="60px" height="60px" viewBox="0 0 60 60" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                          <g fill="#B4C5DB" fill-rule="nonzero">
                              <g>
                                  <path d="M59.3997499,6.75 C58.3993331,4.75 56.2734473,3.5 54.0225094,3.5 L50.8962068,3.5 C50.2709462,1.5 48.5202168,0 46.394331,0 C43.7682368,0 41.7674031,2.125 41.7674031,4.625 C41.7674031,7.25 43.8932889,9.25 46.394331,9.25 C48.5202168,9.25 50.2709462,7.75 50.8962068,5.875 L54.0225094,5.875 C55.3980825,5.875 56.5235515,6.625 57.148812,7.875 C57.7740725,9.125 57.6490204,10.5 56.7736557,11.5 L47.5197999,24.125 C45.0187578,26.625 41.642351,27.875 38.140892,27.875 C34.6394331,27.875 31.2630263,26.5 28.7619842,24.125 L19.5081284,11.5 C18.7578158,10.375 18.6327637,9 19.1329721,7.875 C19.7582326,6.625 20.8837015,5.875 22.2592747,5.875 L25.5106294,5.875 C26.0108378,7.875 27.8866194,9.25 30.0125052,9.25 C32.6385994,9.25 34.6394331,7.125 34.6394331,4.625 C34.6394331,2.125 32.5135473,0 30.0125052,0 C27.8866194,0 26.13589,1.5 25.5106294,3.375 L22.2592747,3.375 C20.0083368,3.375 17.882451,4.625 16.8820342,6.625 C15.8816173,8.625 16.0066694,11.125 17.3822426,12.875 L26.3859942,25.125 C26.3859942,25.25 26.5110463,25.375 26.6360984,25.5 C26.6360984,25.5 26.7611505,25.5 26.7611505,25.625 L33.1388078,34.375 C34.0141726,35.625 35.2646936,36.375 36.7653189,36.75 L36.7653189,51.5 C36.7653189,54.75 34.1392247,57.375 30.8878699,57.375 C27.6365152,57.375 25.010421,54.75 25.010421,51.5 L25.010421,35.25 C25.010421,30.625 21.2588579,26.875 16.63193,26.875 C12.0050021,26.875 8.25343893,30.625 8.25343893,35.25 L8.25343893,41.25 C3.62651105,41.875 7.81597009e-14,45.75 7.81597009e-14,50.5 C7.81597009e-14,55.75 4.25177157,60 9.50395998,60 C14.7561484,60 19.00792,55.75 19.00792,50.5 C19.00792,45.75 15.3814089,41.75 10.754481,41.125 L10.754481,35.25 C10.754481,32 13.3805752,29.375 16.63193,29.375 C19.8832847,29.375 22.5093789,32 22.5093789,35.25 L22.5093789,51.5 C22.5093789,56.125 26.2609421,59.875 30.8878699,59.875 C35.5147978,59.875 39.266361,56.125 39.266361,51.5 L39.266361,36.875 C40.6419341,36.625 42.0175073,35.75 42.892872,34.5 L49.2705294,25.75 C49.2705294,25.75 49.3955815,25.75 49.3955815,25.625 C49.5206336,25.5 49.6456857,25.375 49.6456857,25.25 L58.6494373,13 C60.1500625,11.125 60.4001667,8.75 59.3997499,6.75 Z M46.5,6.6 C45.2647059,6.6 44.4,5.61176471 44.4,4.5 C44.4,3.26470588 45.3882353,2.4 46.5,2.4 C47.7352941,2.4 48.6,3.38823529 48.6,4.5 C48.6,5.61176471 47.6117647,6.6 46.5,6.6 Z M29.7052107,2.4 C30.9374397,2.4 31.8,3.38823529 31.8,4.5 C31.8,5.73529412 30.8142168,6.6 29.7052107,6.6 C28.4729818,6.6 27.6104215,5.61176471 27.6104215,4.5 C27.4871986,3.38823529 28.4729818,2.4 29.7052107,2.4 Z M16.2,50.7 C16.2,54.5196429 13.0918919,57.6 9.23783784,57.6 C5.38378378,57.6 2.4,54.5196429 2.4,50.7 C2.4,47.0035714 5.50810811,43.9232143 9.23783784,43.8 C9.23783784,43.8 9.23783784,43.8 9.36216216,43.8 C9.36216216,43.8 9.48648649,43.8 9.48648649,43.8 C13.2162162,43.9232143 16.2,47.0035714 16.2,50.7 Z M41.2227273,32.88 C40.6090909,33.72 39.5045455,34.2 38.4,34.2 C37.2954545,34.2 36.3136364,33.72 35.5772727,32.88 L33,29.4 C34.7181818,30 36.5590909,30.36 38.4,30.36 C40.2409091,30.36 42.0818182,30 43.8,29.4 L41.2227273,32.88 Z"></path>
                                  <path d="M9.5,45.625 C6.75,45.625 4.625,47.875 4.625,50.5 C4.625,53.25 6.875,55.375 9.5,55.375 C12.25,55.375 14.375,53.125 14.375,50.5 C14.375,47.875 12.125,45.625 9.5,45.625 Z M9.5,53 C8.125,53 7.125,51.875 7.125,50.625 C7.125,49.25 8.25,48.25 9.5,48.25 C10.875,48.25 11.875,49.375 11.875,50.625 C11.875,51.875 10.75,53 9.5,53 Z"></path>
                              </g>
                          </g>
                      </g>
                    </svg>
                    Consultas
                  </label>
            </li>
            <li>
              <input type="radio" name="radio-exame" id="radio-exame" data-filter="select-exames" value="Exame">
              <label for="radio-exame">
                    <svg width="60px" height="60px" viewBox="0 0 60 60" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(0.000000, -1.000000)" fill="#B4C5DB" fill-rule="nonzero">
                          <path d="M42.4116424,1 C37.6715177,1 33.1808732,2.90274841 29.9376299,6.32769556 C26.6943867,2.90274841 22.2037422,1 17.4636175,1 C7.85862786,1 0,8.99154334 0,18.7589852 C0,39.0549683 27.1933472,59.858351 28.4407484,60.7463002 C28.6902287,60.8731501 28.9397089,61 29.1891892,61 C29.4386694,61 29.6881497,60.8731501 29.9376299,60.7463002 C31.1850312,59.858351 60,39.0549683 60,18.7589852 C59.8752599,8.86469345 52.016632,1 42.4116424,1 Z M17.4636175,3.53699789 C21.954262,3.53699789 26.1954262,5.56659619 28.9397089,9.11839323 C29.4386694,9.75264271 30.4365904,9.75264271 30.8108108,9.11839323 C33.8045738,5.56659619 37.9209979,3.53699789 42.4116424,3.53699789 C50.6444906,3.53699789 57.3804574,10.3868922 57.3804574,18.7589852 C57.3804574,23.4524313 55.6340956,28.2727273 52.8898129,32.9661734 L43.1600832,32.9661734 L38.7941788,21.8033827 C38.6694387,21.2959831 38.1704782,21.0422833 37.6715177,21.0422833 C37.1725572,21.0422833 36.6735967,21.2959831 36.5488565,21.6765328 L28.5654886,36.5179704 L20.5821206,16.602537 C20.3326403,15.9682875 19.95842,15.7145877 19.3347193,15.7145877 C18.8357588,15.7145877 18.3367983,16.0951374 18.2120582,16.602537 L12.4740125,32.8393235 L6.73596674,32.8393235 C4.24116424,28.2727273 2.49480249,23.4524313 2.49480249,18.6321353 C2.49480249,10.2600423 9.23076923,3.53699789 17.4636175,3.53699789 Z M29.1891892,58.0824524 C26.1954262,55.6723044 15.0935551,46.4122622 8.23284823,35.3763214 L13.3471933,35.3763214 C13.8461538,35.3763214 14.3451143,34.9957717 14.4698545,34.4883721 L19.4594595,20.4080338 L27.3180873,39.8160677 C27.4428274,40.3234672 27.9417879,40.577167 28.4407484,40.577167 C28.4407484,40.577167 28.4407484,40.577167 28.5654886,40.577167 C29.0644491,40.577167 29.4386694,40.3234672 29.6881497,39.9429175 L37.4220374,25.2283298 L41.1642412,34.615222 C41.4137214,35.1226216 41.7879418,35.3763214 42.2869023,35.3763214 L51.2681913,35.3763214 C44.033264,46.5391121 32.1829522,55.7991543 29.1891892,58.0824524 Z"></path>
                        </g>
                      </g>
                    </svg>
                    Exames
                  </label>
            </li>
          </ul>
        </div>
        <div class="select-wrapper">
          <div id="select-especialidades" class="grid-x grid-margin-x grid-margin-y align-center formFieldGroup select-list visible">

            <div class="formFieldGroup__wrapper cell medium-6 x-small-12">
              <div class="input-bg"></div>
              <label for="especialidade">Especialidades</label>

              <input aria-label="Lista de Especialidades" placeholder="Escolha uma especialidade" autocomplete="off" type="text" id="especialidade" name="especialidade" class="required especialidade fake-select">
              <div class="formFieldGroup__list formFieldGroup__list--especialidades">
                @if ($services['cssm_speciality'])
                <ul>
                  @foreach ($services['cssm_speciality'] as $speciality)
                  <li data-id="{{$speciality["id"]}}">
                    <picture>
                      {!! $speciality["icon"] !!}
                    </picture>
                    <span>{!! $speciality["title"] !!}</span>
                  </li>
                  @endforeach
                </ul>
                @endif
              </div>
              {{-- <span class="error-message">Por favor insira o seu numero de telefone.</span> --}}
            </div>

            <div class="formFieldGroup__wrapper cell medium-6 x-small-12">
              <label for="doctor">Corpo Clínico</label>
              <div class="input-bg"></div>
              {{-- <span class="fake-placeholder">Escolha um doutor</span> --}}
              <input aria-label="Lista de Médicos" placeholder="Escolha um médico" autocomplete="off" type="text" id="doctor" name="doctor" class="required doctor fake-select">
              <div class="formFieldGroup__list">
                @if ($services['cssm_doctor'])
                <ul aria-label="Lista de Doutores">
                  @foreach ($services['cssm_doctor'] as $doctor)
                  <li data-id="{{$doctor["id"]}}">
                    <picture>
                      @if (has_post_thumbnail($doctor["id"]))
                        {!! get_the_post_thumbnail($doctor["id"], 'thumbnail') !!}
                      @else
                        <img src="@asset('images/corpo_clinico_thumb.png')" alt="{{$doctor['title']}}">
                      @endif
                    </picture>
                    <span>{!! $doctor["title"] !!}</span>
                  </li>
                  @endforeach
                </ul>
                @endif
              </div>
              {{-- <span class="error-message">Por favor insira o seu numero de telefone.</span> --}}
            </div>
          </div>
          <div id="select-exames" class="align-center formFieldGroup select-list ">
            <div class="formFieldGroup__wrapper cell x-small-12">
              <label for="exames">Exames</label>
              <div class="input-bg"></div>
              <input aria-label="Lista de Exames" placeholder="Escolha um exame" autocomplete="off" type="text" id="exames" name="exames" class="required exame fake-select">
              <div class="formFieldGroup__list formFieldGroup__list--exames ">
                @if ($services['cssm_exam'])
                <ul>
                  @foreach ($services['cssm_exam'] as $exam)
                  <li data-id="{{$exam["id"]}}">
                    <picture>
                      {!! $exam["icon"] !!}
                    </picture>
                    <span>{!! $exam["title"] !!}</span>
                  </li>
                  @endforeach
                </ul>
                @endif
              </div>
              {{-- <span class="error-message">Por favor insira o seu numero de telefone.</span> --}}
            </div>
          </div>
        </div>
        <div class="grid-x grid-margin-x grid-margin-y align-center formFieldGroup">
          <div class="formFieldGroup__wrapper cell x-small-12 medium-6">
            <label class="input-label" for="date">Data Preferencial</label>
            <div class="input-bg"></div>
            <input aria-label="Data Preferencial da Marcação" type="text" id="date" name="date" class="formFieldGroup__input required date"> {{-- <span class="error-message">Por favor insira o seu numero de telefone.</span>    --}}
          </div>
          <div class="formFieldGroup__wrapper cell x-small-12 medium-6">
            <label class="input-label" for="time">Horário Preferencial</label>
            <div class="input-bg"></div>
            <input aria-label="Horário Preferencial da Marcação" type="text" id="time" name="time" class="formFieldGroup__input required time"> {{-- <span class="error-message">Por favor insira o seu numero de telefone.</span>  --}}
          </div>
        </div>
      </div>   
      <div class="cell medium-12 medium-order-2 large-5 large-offset-1">
        <div class="grid-x align-center formFieldGroup">
          <div class="cell margin-bottom-1 formFieldGroup__title">
            <h3>Dados Pessoais</h3>
          </div>
          <div class="grid-x grid-margin-x grid-margin-y align-center formFieldGroup">
            <div class="formFieldGroup__wrapper cell medium-6 x-small-12">
              <label class="input-label" for="name">Nome</label>
              <div class="input-bg"></div>
              <input aria-label="Nome" required type="text" id="name" name="name" class="formFieldGroup__input required name"> {{-- <span class="error-message">Por favor insira o seu numero de telefone.</span>      --}}
            </div>
            <div class="formFieldGroup__wrapper cell medium-6 x-small-12">
              <label class="input-label" for="phone">Telefone</label>
              <div class="input-bg"></div>
              <input aria-label="Telefone" required type="text" id="phone" name="phone" class="formFieldGroup__input required phone"> {{--
              <span class="error-message">Por favor insira o seu numero de telefone.</span> --}}
            </div>
            <div class="formFieldGroup__wrapper cell medium-12 x-small-12">
              <label class="input-label" for="email">Email</label>
              <div class="input-bg"></div>
              <input aria-label="Email" type="email" id="email" name="email" class="formFieldGroup__input required email"> {{--
              <span class="error-message">Por favor insira o seu numero de telefone.</span> --}}
            </div>
            <div class="formFieldGroup__wrapper cell medium-12 x-small-12">
              <label for="mensagem">Mensagem</label>
              <div class="input-bg"></div>
              <textarea style="height:175px;" aria-label="Mensagem Opcional" name="mensagem" id="mensagem"></textarea>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="appointmentForm__final">
    <div class="grid-container">
      <h3>Entraremos em contacto consigo o mais brevemente possível para confirmar a sua marcação.</h3>
      <div id="rgpd-wrapper">
        <div id="rgpd-check">
          <svg x="0" y="0" viewBox="0 0 21.1 18.1" xml:space="preserve" enable-background="new 0 0 21.1 18.1">
              <style type="text/css">
              .svg-line{fill-rule:evenodd;clip-rule:evenodd;fill:none;stroke:#5c5857;stroke-width:3;stroke-miterlimit:10;}
              </style>
              <path class="svg-line" d="M1 11l6 5L20 1"></path>
          </svg>
        </div>
        <input aria-label="Consentimento do tratamento de dados" id="rgpd-check-input" type="checkbox">
        <p id="rgpd-text">Aceito o tratamento dos meus <a href="{{get_privacy_policy_url()}}" target="_blank">dados pessoais</a></p>
      </div>
      <button type="submit" id="submit" class="btn btn-blue btn-icon btn-appointment">Enviar Pedido de Marcação</button>
    </div>
  </div>
  {{-- <button type="submit">Enviar</button> --}}
  
</form>
