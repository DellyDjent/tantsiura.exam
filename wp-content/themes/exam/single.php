<?php

/* Template Name: Blog Posts*/


get_header('two');

?>
    <section class="posts">
        <div class="container">
            <div class="single-post">
                <ul class="posts-list">
                    <?php if (have_posts()) :
                        while (have_posts()) : the_post();?>
                            <li class="post">
                                <h2><?php the_title(); ?></h2>
                                <div class="post-description">
                                    <?php the_post_thumbnail('full', 'class=img-about-us'); ?>
                                    <?php the_content(); ?>
                                </div>
                            </li>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </ul>
            </div>
    </section>
    <div class="sidebar-block">
        <div class="sidebar-single-post">
            <ul>
                <?php if(!dynamic_sidebar('main-sidebar')) : ?>

                <?php endif; ?>
            </ul>
        </div>
    </div>

    <?php get_sidebar() ?>

<?php get_footer() ?>