<?php

//add menus to site
add_theme_support('menus');
add_theme_support('post-thumbnails');



function register_theme_menus(){

	register_nav_menus(
		array(
			'primary-menu' => _('Primary Menu')
			)
		);
}
add_action('init', 'register_theme_menus');



//to import CSS and fonts
function load_fonts() {
            wp_register_style('googleFonts', 'https://fonts.googleapis.com/css?family=Signika:400,300,600,700');
            wp_enqueue_style( 'googleFonts');
        }
    add_action('wp_print_styles', 'load_fonts');


function auction_theme_styles(){

	wp_enqueue_style('smoothness_css', 'http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css');
	wp_enqueue_style('normalize_css', get_template_directory_uri() . '/css/normalize.css');
	wp_enqueue_style('main_css', get_template_directory_uri() . '/style.css');
}

//to add the css above to your page
add_action('wp_enqueue_scripts', 'auction_theme_styles');



//to link to scripts and JS libraries
function auction_theme_js(){

		wp_enqueue_script('main_js', get_template_directory_uri() . '/js/main.js', array('jquery'), '', false);
		wp_enqueue_script('responsive-nav_js', get_template_directory_uri() . '/js/responsive-nav.js', array('jquery'), '', false);
		wp_enqueue_script('modernizr_js', get_template_directory_uri() . '/js/modernizr-2.8.3.min.js', '', '', false);
		wp_enqueue_script('jquery_ui', get_template_directory_uri() . '/js/jquery-ui.min.js', array('jquery'), '', false);

}

add_action('wp_enqueue_scripts', 'auction_theme_js');

function my_events_per_page( $query ) {
    if ( $query->is_main_query() && is_post_type_archive('event') ){
        //Display 50 posts for a custom post type called 'event'
        $query->query_vars['posts_per_page'] = 50;
        return;
    }
}

add_action('pre_get_posts', 'my_events_per_page', 1);
?>