<?php

namespace App;

use Sober\Controller\Controller;

class FrontPage extends Controller
{
  public function slides()
  {
    $slides = [];

    if( have_rows('homepage_slide') ) {
      while ( have_rows('homepage_slide') ) : $row = the_row();

        $index = get_row_index();

        //vars
        $imagem = get_sub_field('imagem');
        $legenda_top = get_sub_field('legenda_top');
        $frase_principal = get_sub_field('frase_principal');
        $ligacao_para_conteudo = get_sub_field('ligacao_para_conteudo');
        $legenda_bottom = get_sub_field('legenda_bottom');

        $slides[$index]['image'] = $imagem;

        $slides[$index]['legenda_top']['texto'] = $legenda_top['legenda_top_texto'];
        $slides[$index]['legenda_top']['cor'] = $legenda_top['legenda_top_cor'];

        $slides[$index]['frase_principal']['texto'] = $frase_principal['frase_principal_texto'];
        $slides[$index]['frase_principal']['cor'] = $frase_principal['frase_principal_cor'];

        $slides[$index]['ligacao_para_conteudo'] = $ligacao_para_conteudo;

        $slides[$index]['legenda_bottom']['texto'] = $legenda_bottom['legenda_bottom_texto'];
        $slides[$index]['legenda_bottom']['cor'] = $legenda_bottom['legenda_bottom_cor'];
      
      endwhile;
    }
    
    return $slides;
  }
}
