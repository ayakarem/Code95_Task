<?php 
//include nav walker
require_once('wp_bootstrap_navwalker.php');
//include custom field
require_once('custom-field.php');
//add featured image
add_theme_support('post-thumbnails');
/*
**Funtion to Add style & script
**wp_enqueue_script
**wp_enqueue_style
*/
function add_links(){
    //styles
    wp_enqueue_style('bootstrapCSS' ,get_template_directory_uri().'/assets/css/bootstrap.min.css');
    wp_enqueue_style('sliderCss' ,get_template_directory_uri().'/assets/css/slider.css');
    wp_enqueue_style('styleCss',get_template_directory_uri().'/assets/css/style.css');
    //scripts
    wp_enqueue_script('jqueryScript' ,get_template_directory_uri().'/assets/js/jquery-3.3.1.min.js',array(),false,true);
    wp_enqueue_script('popperScript' ,get_template_directory_uri().'/assets/js/popper.min.js',array(),false,true);
    wp_enqueue_script('bootstrapScript' ,get_template_directory_uri().'/assets/js/bootstrap.min.js',array(),false,true);
    wp_enqueue_script('allScript' ,get_template_directory_uri().'/assets/js/all.js',array(),false,true);
    wp_enqueue_script('slickScript' ,get_template_directory_uri().'/assets/js/slick.js',array(),false,true);
    wp_enqueue_script('cusScript' ,get_template_directory_uri().'/assets/js/cus.js',array(),false,true);
}
   
add_action('wp_enqueue_scripts','add_links');

//add menu Support
function menu(){
    register_nav_menus(
        array(
            'main-menu' => esc_html__( 'Main Menu', 'Menu' ),
        )
    );
}
add_action('init','menu');

function bootstrap_menu() {
    wp_nav_menu(array(
        'theme_location' =>  'main-menu',
        'menu_class'     =>  'navbar-nav mr-auto',
        'container'      =>    'ul',
        'depth'          =>   2,
        'walker'         =>   new wp_bootstrap_navwalker()
    ));
}

//Register Top Ads
function top_ads() {
    //Register Sidebar 
    register_sidebar(array(
        'name'          => 'Top Ads',
        'id'            => 'top_ads',
        'description'   => 'Top Ads Widget ..'
    ));
}
add_action('widgets_init','top_ads');

//Register Side Ads
function side_ads() {
    //Register Sidebar 
    register_sidebar(array(
        'name'          => 'Side Ads',
        'id'            => 'side_ads',
        'description'   => 'Side Ads Widget ..'
    ));
}
add_action('widgets_init','side_ads');

//Get top 5 posts 
function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

?>