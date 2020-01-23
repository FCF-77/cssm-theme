<article {{post_class()}}>
  <header>
    <div class="speciality--image">
      @php the_post_thumbnail() @endphp
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
        <div class="single--card__column cell medium-12 large-8 xlarge-8 small-order-2 medium-order-1">
          <div class="single--card__content">
            {{the_content()}}
          </div>
        </div>
        <div class="single--card__column cell medium-12 large-4 xlarge-4 small-order-1 medium-order-2">
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
