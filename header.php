<!DOCTYPE html>

<html <?php language_attributes(); ?> >

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php bloginfo('name'); ?> </title>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php wp_head(); ?>
</head>
<body>
    <!--Start Gray Header-->
    <div class="head-img col-md-6 mb-2 mx-auto">
        <?php dynamic_sidebar('top_ads');?>
    </div>
    <!--End Gray Header-->
    <!--Start Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <!--Start Phone Button-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!--End Phone Button-->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php bootstrap_menu() ?> 
            <form class="form-inline my-2 my-lg-0 position-relative">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0 position-absolute" type="submit">
                    <i class="fa fa-search"></i></button>
            </form>
        </div>
    </nav>
    
    <!--End Navbar-->