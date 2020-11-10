<?php 
 get_header();
    while ( have_posts() ) : the_post();
    wpb_set_post_views(get_the_ID());
    echo the_title();
    endwhile; 
 get_footer();
?>
