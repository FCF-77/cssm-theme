<?php

namespace App;

use Sober\Controller\Controller;

class ArchiveCssmDoctor extends Controller
{
  public function doctors_by_speciality()
  {
    $_posts = new \WP_Query( array(
        'post_type'         => 'cssm_doctor',
        'posts_per_page'    => -1,
        'meta_key'          => 'unidade_diferenciada',
        'orderby'           => 'meta_value',
        'order'             => 'DESC'
    ));

    $specialityDoctors = get_post_meta(get_the_ID(), 'corpo_clinico', true);
    $specialityDoctorsOrder = [];

    if ($specialityDoctors) {
      foreach ($specialityDoctors as $key => $value) {
        $specialityDoctorsOrder[$key] = [
          'id'            => $value,
          'name'          => get_the_title($value),
          'link'          => get_the_permalink($value),
          'thumbnail'     => get_the_post_thumbnail($value),
          'coordenador'   => get_post_meta($value, 'coordenador', true)
        ];

        if ($specialityDoctorsOrder[$key]['coordenador'] == 1) {
          array_unshift($specialityDoctorsOrder, $specialityDoctorsOrder[$key]);
        }
      }
    }
  }
}
