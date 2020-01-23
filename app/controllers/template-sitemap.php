<?php

namespace App;

use Sober\Controller\Controller;

class TemplateSitemap extends Controller
{
  public function partners()
  {
    $locations = get_nav_menu_locations();
    $menu_object = wp_get_nav_menu_object($locations[ 'primary_navigation' ]);
    $primary_navigation_menu = wp_get_nav_menu_items($menu_object->term_id);

    $menu_items_parceiros = [];

    foreach ($primary_navigation_menu as $key => $menu_item) {
      if (get_the_title($menu_item->menu_item_parent) == 'Parceiros') {
        $menu_items_parceiros[$key] = $menu_item->object_id;
      } 
    }

    return $menu_items_parceiros;
  }

  public function pages() 
  {
    $partners = $this->partners();

    $args = [
      'post__not_in' => $partners,
      'post_type' => 'page',
      'post_status' => 'publish',
      'posts_per_page' => -1,
      'orderby' => 'title',
      'order' => 'ASC',
      'fields' => 'ids'
    ];

    $pagesQuery = new \WP_Query($args);
    $pages = [];

    // The Loop
    if ( $pagesQuery->have_posts() ) {
      while ( $pagesQuery->have_posts() ) {
        $pagesQuery->the_post();
        $pages[] = get_the_ID();
      }
      /* Restore original Post Data */
      wp_reset_postdata();
    }

    return $pages;
  }
}
