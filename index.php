<?php get_header(); ?>

<!--Start News-->
<div class="container">
    <div class="row">
        <div class="news col-md-8 col-12 mt-2">
            <div class="row">
                <?php 
                    $breaking_news = new WP_Query(array(
                        'post_type'       => 'post',
                        'posts_per_page'  => 3,
                        'meta_query'      => array(array(
                            'key'    => 'locations',
                            'value'  => 'main_posts',
                            'compare'=> 'LIKE' 
                        ))
                    )); 
                    if( $breaking_news->have_posts()  ){
                        $counter=0;
                        while ($breaking_news->have_posts() ) {
                            $breaking_news->the_post(); 
                            $counter++;
                            $post_type = get_field('post_type');
                            ?>
                <div
                    class="<?php if($counter == 1) { echo 'bigimg col-md-8'; } else { echo 'smallimgs col-md-4'; } ?>  col-12 mt-2">
                    <div class="<?php if($counter == 1){echo 'bimg';} else{ echo 'imgall';} ?> position-relative w-100"
                        style="background-image: url('<?php the_post_thumbnail_url() ?>')">
                        <div class="wordsdiv position-absolute w-100">
                            <div class="words position-absolute">
                                <?php if($post_type== 'local'){?>
                                <p class="local mb-0 d-inline-block">local</p>
                                <?php } else { ?>
                                <p class="world mb-0 d-inline-block">world</p>
                                <?php } ?>
                                <h2><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } } ?>
            </div>
        </div>
        <div class="grayimg col-md-4 col-12 mt-4 mt-sm-2 d-flex align-items-center justify-content-center w-100">
            <?php dynamic_sidebar('side_ads');?>
        </div>
    </div>
    <!--End News-->


    <!--Start Egypt News Slider-->
    <?php
    $egypt_news=new WP_Query(array(
        'posts_per_page' => 12, 
        'category_name' => 'Egypt News'
    ));
    if ( $egypt_news->have_posts() ) { ?>
    <div class="egypt-news">
        <hr>
        <h3 class="text-left text-uppercase">Egypt News</h3>
        <section class="customer-logos slider position-relative mt-4">
            <?php 
                while ($egypt_news->have_posts() ) {
                    $egypt_news->the_post(); ?>
            <div class="slide">
                <div class="slidbg position-relative w-100"
                    style="background-image: url('<?php the_post_thumbnail_url() ?>');">
                    <div class="wordslider position-absolute w-100">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title() ?>
                        </a>
                    </div>
                </div>
            </div>
            <?php  } ?>
        </section>
    </div>
    <?php } ?>
    <!--End Egypt News Slider-->


    <!--Start Features-->
    <?php
    $feature = new WP_Query(array(
        'post_type'     => 'post',
        'posts_per_type' => 2,
        'meta_query'    => array(array(
            'key'     => 'locations',
            'value'   => 'feature_posts' ,
            'compare' => 'LIKE'
        ))
    ));
    if( $feature->have_posts()  ){
    ?>

    <div class="features-posts">
        <div class="row">
            <div class="features col-md-8 col-12">
                <hr>
                <h3 class="text-left text-uppercase">Features</h3>
                <div class="row">
                    <?php  while ($feature->have_posts() ) { $feature->the_post(); ?>
                    <div class="featimg col-md-6 col-12 mb-2">
                        <div class="singlefeatimg w-100"
                            style="background-image: url('<?php the_post_thumbnail_url() ?>')">
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>


            <div class="top5 col-md-4 col-12">
                <hr>
                <h3 class="text-left text-uppercase">Top 5 Stories</h3>
                <ul class="w-100">
                    <?php 
                    $popularpost = new WP_Query(array( 
                        'posts_per_page' => 5, 
                        'meta_key'       => 'wpb_post_views_count', 
                        'orderby'        => 'meta_value_num', 
                        'order'          => 'DESC'  
                    ));
                    $count = 1;
                      while ( $popularpost->have_posts() ) : $popularpost->the_post(); ?>
                    <li><a href="<?php echo get_permalink()?> "><span
                                class="num"><?php echo $count; ?></span><?php echo the_title() ?> </a></li>
                    <?php $count++; endwhile; ?>
                </ul>
            </div>
        </div>
    </div>
    <!--End Features-->
    <?php get_footer(); ?>