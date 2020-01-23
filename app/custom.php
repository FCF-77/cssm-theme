<?php 

// https://gist.github.com/tinotriste/5387124

function the_breadcrumb() {
    $sep = ' > ';
    if (!is_front_page()) {
    
    // Start the breadcrumb with a link to your homepage
        echo '<div class="breadcrumbs">';
        echo '<a href="';
        echo get_option('home');
        echo '">';
        bloginfo('name');
        echo '</a>' . $sep;
    
    // Check if the current page is a category, an archive or a single page. If so show the category or archive name.
        if (is_category() || is_single() ){
            the_category('title_li=');
        } elseif (is_archive() || is_single()){
            if ( is_day() ) {
                printf( __( '%s', 'text_domain' ), get_the_date() );
            } elseif ( is_month() ) {
                printf( __( '%s', 'text_domain' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'text_domain' ) ) );
            } elseif ( is_year() ) {
                printf( __( '%s', 'text_domain' ), get_the_date( _x( 'Y', 'yearly archives date format', 'text_domain' ) ) );
            } else {
                _e( 'Blog Archives', 'text_domain' );
            }
        }
    
    // If the current page is a single post, show its title with the separator
        if (is_single()) {
            echo $sep;
            the_title();
        }
    
    // If the current page is a static page, show its title.
        if (is_page()) {
            echo the_title();
        }
    
    // if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
        if (is_home()){
            global $post;
            $page_for_posts_id = get_option('page_for_posts');
            if ( $page_for_posts_id ) { 
                $post = get_page($page_for_posts_id);
                setup_postdata($post);
                the_title();
                rewind_posts();
            }
        }
        echo '</div>';
    }
}

function the_cpt($post, $number) {
    $cpt = get_post_type($post);
    $cpt_object = get_post_type_object($cpt);

    $label = '';

    if ($number == 'singular') {
        $label = $cpt_object->labels->singular_name;
    } else if ($number == 'plural') {
        $label = $cpt_object->labels->menu_name;
    }
    
    return $label;
}

function get_current_template() {
    global $template;
    if (is_post_type_archive()) {
        return 'archive_' .get_post_type();
    } elseif (is_single()) {
        return 'single_' . get_post_type();
    } elseif (is_front_page()) {
        return 'home';
    } else {
        return basename( $template ,'.blade.php' );
    }
}