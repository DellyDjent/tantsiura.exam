<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width">
    <title><?php bloginfo('name'); ?></title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <section class="welcome-section">
        <header class="main-header">
            <nav class="navbar navbar-inverse row middle-xs">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <h1>
                            <?php the_custom_logo(); ?>
                        </h1>
                    </div>
                    <div id="navbar" class="collapse navbar-collapse">
                        <?php wp_nav_menu( array(
                            'theme_location'  => 'main-nav',
                            'container'       => false,
                            'menu_class'      => 'nav navbar-nav main-menu-list row col-sm-8 end-sm'
                        ));
                        ?>
                    </div><!--/.nav-collapse -->
                </div>
            </nav>
        </header>
        <section class="top-section container">
            <?php
            $the_slug = 'why-us-page';
            $args = array(
                'name'           => $the_slug,
                'post_type'      => 'post',
                'post_status'    => 'publish',
                'posts_per_page' => 1
            );
            $query = new WP_Query( $args );
            if ($query->have_posts()):?>
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="wrap-top">
                        <div class="img-top-section">
                            <?php the_post_thumbnail('full', 'class=img-about-us'); ?>
                        </div>
                        <div class="content-top-section">

                            <div class="head-top-section">
                                <h2 class="tittle">
                                    <?php the_title(); ?>
                                    <span class="subhead-head" >us</span>
                                </h2>
                            </div>
                            <div class="welcome">
                                <h2><?php echo get_theme_mod ('welcome_title'); ?></h2>
                                <h6><?php echo get_theme_mod ('welcome_subtitle'); ?></h6>
                            </div>
                            <div class="content-area">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    <a class="scroll-down" href="#">scroll down</a>
                    </div>
                <?php endwhile; ?>
            <?php endif; wp_reset_postdata(); ?>
        </section>
    </section>