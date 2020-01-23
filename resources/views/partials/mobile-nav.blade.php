<div id="mobilenav" class="show-for-small-only">
  @if (has_nav_menu('primary_navigation'))
    <div class="mobilenav__menu">
      {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
    </div>
  @endif
  <span class="mobilenav__copyright">Casa de Saúde de São Mateus<br><br><a href="tel:+351232423423">232 423 423</a></span>
</div>