<?php
get_header('two'); ?>
<div class="wrapper-post container">
  <section class="blog-post container">
        <?php
        $args = array(
            'category_name' => 'post',
            'posts_per_page' => 10
        );

        $the_query = new WP_Query($args);

        if ($the_query->have_posts()) :?>
          <?php while ($the_query->have_posts()) : ?>
            <div class="content-posts ">
              <?php $the_query->the_post(); ?>
              <article class="post">
                <div class="img-wrap">
                  <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('full', 'class=img-responsive'); ?>
                  </a>
                </div>
                  <div class="wrap-content-post">
                    <h2>
                      <a class="title-post" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    <div class="post-description">
                      <?php the_excerpt(); ?>
                    </div>

                      <p class="info">
                          <?php the_time(' d, m,  Y '); ?>
                      </p>
                      </div>
                  </div>
              </article>
      <?php endwhile; ?>
    <?php else : //no posts ?>
    <?php endif; wp_reset_postdata(); ?>
  </section>
    <div class="wrap-sidebar">
        <div class="sidebar-block">
            <div class="sidebar-single-post">
                <ul>
                    <?php if(!dynamic_sidebar('main-sidebar')) : ?>

                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>

    <div class="pag-wrap container">
        <?php
        $args = array(
            'show_all'     => false, // показаны все страницы участвующие в пагинации
            'end_size'     => 1,     // количество страниц на концах
            'mid_size'     => 1,     // количество страниц вокруг текущей
            'prev_next'    => false,  // выводить ли боковые ссылки "предыдущая/следующая страница".
            'prev_text'    => __('« Previous'),
            'next_text'    => __('Next »'),
            'add_args'     => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
            'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.
            'screen_reader_text' => __( 'Posts navigation' ),
        );
        the_posts_pagination($args); ?>
    </div>

<?php get_footer(); ?>