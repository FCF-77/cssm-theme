<?php

namespace App;

use Sober\Controller\Controller;

class App extends Controller
{
    public function siteName()
    {
        return get_bloginfo('name');
    }

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }
        return get_the_title();
    }

    public function newsLoop()
    {
        $article = get_posts([
            'post_type'         => 'post',
            'posts_per_page'    => '3',
            'fields'            => 'ids'
        ]);

        return array_map(function ($post) {
            return [
                'title' => get_the_title($post),
                'permalink' => get_the_permalink($post),
                'thumbnail' => get_the_post_thumbnail($post, 'large'),
                'category' => get_the_category($post)
            ];
        }, $article);
    }

    public function get_categories()
    {
        $categories = get_categories( array(
            'orderby' => 'name',
            'order'   => 'ASC'
        ) );

        return array_map(function ($category) {
            return [
                'name' => get_the_title( $category ),
                'permalink' => get_the_permalink(get_category_link( $category ))
            ];
        }, $categories);
    }

    public function all_posts()
    {
        $all_posts = get_posts([
            'post_type'   => 'post',
            'posts_per_page' => 10,
            'post__not_in'   => array( get_the_ID() )
        ]);

        return array_map(function ($post) {
            return [
                'title' => get_the_title($post),
                'permalink' => get_the_permalink($post)
            ];
        }, $all_posts);  
    }

    public function related()
    {
        $related = [];
        $relatedQuery = new \WP_Query(
            [
                'category__in'   => wp_get_post_categories( get_the_ID() ),
                'posts_per_page' => -1,
                'post__not_in'   => array( get_the_ID() ),
                'fields'         => 'ids',
            ]
        );

        if( $relatedQuery->have_posts() ) {
            while( $relatedQuery->have_posts() ) {
                $relatedQuery->the_post();
                $related[] = get_the_ID();
                /*whatever you want to output*/
            }
            wp_reset_postdata();
        }

        return $related;
    }

    public static function speciality_notice($terms,$numberposts)
    {
        $speciality_notice = [];
        $speciality_noticeQuery = new \WP_Query(
            [
                'posts_per_page' => $numberposts,
                'order' => 'DESC',
                'orderby' => 'date',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'category',
                        'field'    => 'slug',
                        'terms'    => $terms,
                    ),
                ),
            ]
        );

        if( $speciality_noticeQuery->have_posts() ) {
            while( $speciality_noticeQuery->have_posts() ) {
                $speciality_noticeQuery->the_post();
                $speciality_notice[] = get_the_ID();
                /*whatever you want to output*/
            }
            wp_reset_postdata();
        }

        return $speciality_notice;
    }

    public static function appointmentPage()
    {
        return get_the_permalink(get_field('pagina_de_marcacao_online', 'option'));
    }

    public static function contactoPage()
    {
        return get_the_permalink(get_field('pagina_de_contatos', 'option'));
    }

    public function services()
    {
        $postTypes = ['cssm_speciality', 'cssm_exam', 'cssm_doctor'];

        $servicesPosts = [];

        foreach ($postTypes as $postType) {
            $servicesQuery[$postType] = new \WP_Query([
                'post_type' => $postType,
                'posts_per_page' =>'-1',
                'fields' => 'ids',
                'orderby' => 'title',
                'order' => 'ASC'
            ]);

            if ($servicesQuery[$postType]->have_posts()) {
                while ($servicesQuery[$postType]->have_posts()) {
                    $servicesQuery[$postType]->the_post();

                    $servicesPosts[$postType][] = [
                        'id' => get_the_ID(),
                        'title' => get_the_title(),
                        'permalink' => get_the_permalink(),
                        'icon' => wp_get_attachment_image(get_field('icon', get_the_ID())),
                    ];
                }
                wp_reset_postdata();
            }
        }

        return $servicesPosts;
    }

    public static function post_type_label($id)
    {
        $postType = get_post_type_object(get_post_type($id));
        if ($postType) {
            echo esc_html($postType->labels->singular_name);
        }
    }

    public static function get_excerpt($limit, $source = null){
        $excerpt = $source == "content" ? get_the_content() : get_the_excerpt();
        $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
        $excerpt = strip_shortcodes($excerpt);
        $excerpt = strip_tags($excerpt);
        $excerpt = substr($excerpt, 0, $limit);
        $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
        $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
        $excerpt = $excerpt.'...';
        return $excerpt;
    }

    public static function get_breadcrumbs() {
        if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb('<div class="breadcrumbs">','</div>');
        }
    }

   
}
