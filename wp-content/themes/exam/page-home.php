<?php
/*
Template Name: Home Page
*/
get_header(); ?>

    <section class="welcome-here">
        <?php
        $the_slug = 'welcome-here-post';
        $args = array(
            'name'           => $the_slug,
            'post_type'      => 'post',
            'post_status'    => 'publish',
            'posts_per_page' => 1
        );
        $query = new WP_Query( $args );
        if ($query->have_posts()):?>
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <div class="wrap-welcome-here">
                    <div class="img-welcome-here">
                        <?php the_post_thumbnail('full', 'class=img-about-us'); ?>
                    </div>
                    <div class="content-welcome-here">
                        <div class="welcome-here-head">
                            <h2 class="tittle">
                                <?php the_title(); ?>
                            </h2>
                        </div>
                        <div class="content-area">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; wp_reset_postdata(); ?>
    </section>



    <section class="offering-section">
        <div class="offering">
            <h2><?php echo get_theme_mod ('offering_title'); ?></h2>
            <h6><?php echo get_theme_mod ('offering_subtitle'); ?></h6>
        </div>

        <?php
        $query = new WP_Query( array('post_type' => 'offering-reviews', 'posts_per_page' => 100 ) );
        if ($query->have_posts()):?>
            <ul class="wc-table list-offering container">
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <li class="list-offering-item" <?php

                    if ( $thumbnail_id = get_post_thumbnail_id() ) {
                        if ( $image_src = wp_get_attachment_image_src( $thumbnail_id, 'normal-bg' ) )
                            printf( ' style="background:  url(%s) top center no-repeat;"', $image_src[0] );
                    }

                    ?>>
                        <div class="offering-content">
                            <h3>
                                <?php the_title(); ?>
                            </h3>
                            <div class="description">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php endif; wp_reset_postdata(); ?>
    </section>







    <section class="latest-work-section container">
        <div class="works">
            <h2><?php echo get_theme_mod ('works_title'); ?></h2>
            <h6><?php echo get_theme_mod ('works_subtitle'); ?></h6>
        </div>
        <ul class="list-btn-portfolio">
            <li class="list-btn-portfolio-item">
                <button class="btn-portfolio">All</button>
            </li>
            <li class="list-btn-portfolio-item">
                <button class="btn-portfolio">Design</button>
            </li>
            <li class="list-btn-portfolio-item">
                <button class="btn-portfolio">Development</button>
            </li>
            <li class="list-btn-portfolio-item">
                <button class="btn-portfolio">SEO</button>
            </li>
            <li class="list-btn-portfolio-item">
                <button class="btn-portfolio">Others</button>
            </li>
        </ul>
        <?php
        $query = new WP_Query( array('post_type' => 'works-reviews', 'posts_per_page' => 100 ) );
        if ($query->have_posts()):?>
            <ul class="wc-table list-works">
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <li class="list-features-item" <?php

                    if ( $thumbnail_id = get_post_thumbnail_id() ) {
                        if ( $image_src = wp_get_attachment_image_src( $thumbnail_id, 'normal-bg' ) )
                            printf( ' style="background:  url(%s) no-repeat;"', $image_src[0] );
                    }

                    ?>>
                        <div class="service-content">
                            <div class="description">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php endif; wp_reset_postdata(); ?>
    </section>

<?php get_footer(); ?>
