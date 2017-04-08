    <footer class="main-footer">
        <section class="clients-section">
            <div class="container">
                <div class="clients-subhead">
                    <h2><?php echo get_theme_mod ('clients_title'); ?></h2>
                </div>
                <ul class="owl-carousel owl-theme clients-slider container" id="owlContent">
                    <?php
                    $args = array(
                        'post_type' => 'clients-reviews'
                    );

                    $the_query = new WP_Query($args);

                    if ($the_query->have_posts()) :?>
                        <?php while ($the_query->have_posts()) : ?>
                            <li class="item">
                                <?php $the_query->the_post(); ?>
                                <div class="content-slide">
                                    <a href="<?php the_permalink(); ?>" class="margin light-text slider-text margin"><?php the_content(); ?></a>
                                </div>
                            </li>
                        <?php endwhile; ?>
                    <?php else : //no posts ?>
                    <?php endif; wp_reset_postdata(); ?>
                </ul>
            </div>
        </section>
            <div class="contact-section">
                <div class="container">
                    <div class="wrap-address">
                        <div class="contact">
                            <h2><?php echo get_theme_mod ('contact_title'); ?></h2>
                            <h6><?php echo get_theme_mod ('contact_subtitle'); ?></h6>
                        </div>
                        <div class="address">
                            <a href="#" class="phone"><?php echo get_theme_mod ('address_title'); ?></a>
                            <p class="add"><?php echo get_theme_mod ('address_subtitle'); ?></p>
                        </div>
                        <div class="map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d20759.97487172191!2d32.0930263!3d49.427873399999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2sua!4v1491638585676" width="560" height="385" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="contact-form">
                        <?php echo do_shortcode ('[contact-form-7 id="33" title="Contact form 1"]'); ?>
                    </div>
                </div>
            </div>
        <div class="copyright-logo">
            <h2>
                <?php the_custom_logo(); ?>
            </h2>
            <div class="copyright-content copyright">
                <p><?php echo get_theme_mod ('copyright_subtitle'); ?></p>
            </div>
        </div>
    </footer>

<?php wp_footer(); ?>

</body>
</html>