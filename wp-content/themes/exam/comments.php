<?php

if ( post_password_required() )
    return;
?>

<div id="comments" class="comments-area">

    <?php
    function mytheme_comment($comment, $args, $depth){
        $GLOBALS['comment'] = $comment; ?>
        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
            <div id="comment-<?php comment_ID(); ?>">
                <div class="comment-author vcard">
                    <?php echo get_avatar( $comment, 71); ?>
                </div>

                <div class="comment-meta commentmetadata">
                    <cite class="fn"><?php echo get_comment_author_link() ?></cite>
                    <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf( '%1$s в %2$s', get_comment_date(),  get_comment_time()) ?></a>
                    <?php edit_comment_link('(Edit)', '  ', '') ?>
                    <?php comment_text() ?>
                    <div class="reply">
                        <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'reply_text' => 'Click to Reply',  'max_depth' => $args['max_depth']))) ?>
                    </div>
                </div>

            </div>
        </li>
        <?php
    }
    ?>

    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title">
            Comments
        </h2>

        <ul class="comment-list">
            <?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
        </ul><!-- .comment-list -->

        <?php
        // Are there comments to navigate through?
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
            ?>
            <nav class="navigation comment-navigation" role="navigation">
                <h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'Classic' ); ?></h1>
                <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'Classic' ) ); ?></div>
                <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'Classic' ) ); ?></div>
            </nav><!-- .comment-navigation -->
        <?php endif; // Check for comment navigation ?>

        <?php if ( ! comments_open() && get_comments_number() ) : ?>
            <p class="no-comments"><?php _e( 'Comments are closed.' , 'Classic' ); ?></p>
        <?php endif; ?>

    <?php endif; // have_comments() ?>

    <?php comment_form(); ?>

</div><!-- #comments -->