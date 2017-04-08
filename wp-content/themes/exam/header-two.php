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
    <section class="welcome second-welcome">
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
        <div class="subhead-header-two blog">
            <h2><?php echo get_theme_mod ('blog_title'); ?></h2>
        </div>
    </section>