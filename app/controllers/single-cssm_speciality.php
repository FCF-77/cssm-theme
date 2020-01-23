<?php

namespace App;

use Sober\Controller\Controller;

class SingleCssmSpeciality extends Controller
{
  public function doctors()
  {
      $doctors = get_field('corpo_clinico');

      if ($doctors) {
         return array_map(function ($post) {
            return [
                'name' => get_the_title($post->ID),
                'permalink' => get_the_permalink($post->ID),
                'thumbnail' => get_the_post_thumbnail($post->ID, array( 100, 100))
            ];
        }, $doctors);
      }
  }

  public function exams()
  {
      $exams = get_field('exames_associados');

      if ($exams) {
        return array_map(function ($post) {
          return [
              'name' => get_the_title($post->ID),
              'permalink' => get_the_permalink($post->ID)
          ];
      }, $exams);
      }
  }

  
}


