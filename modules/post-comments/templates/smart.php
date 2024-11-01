<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if ( comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
}

$settings = $GLOBALS['sup_widget_global_settings'];

?>

<div id="comments" class="sup-comments-area">

    <?php if ( have_comments() ) : ?>

        <div>

            <div class="sup-comments-header">

                <div uk-grid class="uk-grid-collapse uk-flex uk-flex-middle">

                    <div class="uk-width-expand">

                        <?php $comments_number = get_comments_number(); ?>

                        <span class="sup-comments-number">

                            <?php echo $comments_number; ?>

                        </span>

                        <span class="sup-comments-title">

                            <?php

                            if ( '1' === $comments_number ) {

                                echo 'Comment';

                            } else {

                                echo 'Comments';
                            }

                            ?>

                        </span>

                    </div>

                    <div class="uk-width-auto uk-flex uk-flex-middle sup-child-line-height-1 sup-post-commments-next-prev">

                        <?php

                        previous_comments_link( '<span uk-icon="icon: chevron-left; ratio: ' . absint( $settings['sup_post_comments_np_icon_size']['size'] )  . ';" class="sup-line-height-1"></span>');

                        next_comments_link( '<span uk-icon="icon: chevron-right; ratio: ' . absint( $settings['sup_post_comments_np_icon_size']['size'] ) . ';" class="sup-line-height-1"></span>');

                        ?>

                    </div>

                </div>

            </div>

            <div class="sup-comments-list">
                <?php

                require_once( SUPREMENTOR_PATH . '/modules/post-comments/templates/smart-comment-walker.php' );

                wp_list_comments([
                    'avatar_size' => 50,
                    'format' => 'html5',
                    'short_ping' => true,
                    'style' => 'div',
                    'walker' => new Sup_Smart_Comment_Walker()
                ]);

                ?>
            </div>

        </div>

    <?php endif; // Check for have_comments(). ?>

    <?php // if no comments leave a message. ?>

    <?php if ( ! comments_open() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

        <div class="sup-no-comments-wrap">

            <div class="sup-no-comments-inner">

                <?php esc_html_e( $settings['sup_content_post_comments_message_closed'], 'suprementor' ); ?>

            </div>

        </div>

    <?php endif; ?>

    <div class="sup-comment-form-wrap">

        <?php

        $comment_send = $settings['sup_content_post_comments_message_send'];
        $comment_reply = $settings['sup_content_post_comments_message_discuss'];
        $comment_reply_to = $settings['sup_content_post_comments_message_reply'];
        $comment_author = $settings['sup_content_post_comments_message_author'];
        $comment_email = $settings['sup_content_post_comments_message_email'];
        $comment_body = $settings['sup_content_post_comments_message_body'];
        $comment_url = $settings['sup_content_post_comments_message_url'];
        $comment_cookies = $settings['sup_content_post_comments_message_cookies'];
        $comment_privacy = $settings['sup_content_post_comments_message_privacy'];
        $comment_before = $settings['sup_content_post_comments_message_before'];
        $comment_cancel = $settings['sup_content_post_comments_message_cancel'];

        $comments_args = [
            'fields' => [
                'author' => '<div class="sup-comment-field-wrap uk-margin-small-bottom"><input class="sup-comment-field" id="author" name="author" aria-required="true" placeholder="' . esc_attr( $comment_author ) .'"></input></div>',
                'email' => '<div class="sup-comment-field-wrap uk-margin-small-bottom"><input class="sup-comment-field" id="email" name="email" placeholder="' . esc_attr( $comment_email ) .'"></input></div>',
                'url' => '<div class="sup-comment-field-wrap uk-margin-small-bottom"><input class="sup-comment-field" id="url" name="url" placeholder="' . esc_attr( $comment_url ) .'"></input></div>',
                'cookies' => '<div class="sup-comment-field-wrap uk-margin-small-bottom"><input type="checkbox" required>' . esc_html( $comment_cookies ) . ' <a href="' . esc_url( get_privacy_policy_url() ) . '">' . esc_html( $comment_privacy ) . '</a></div>',
            ],
            'comment_field' => '<div class="sup-comment-field-wrap uk-margin-small-bottom"><textarea id="comment" class="sup-comment-field" name="comment" aria-required="true" placeholder="' . esc_attr( $comment_body ) .'"></textarea></div>',
            'label_submit' => __( $comment_send, 'suprementor' ),
            'title_reply_before' => '<div id="sup-reply-title" class="sup-comment-reply-title uk-grid-collapse uk-flex uk-flex-between">',
            'title_reply_after' => '</div>',
            'cancel_reply_before' => '<span id="sup-cancel-reply-title" class="sup-comment-cancel-reply-title uk-pull-right uk-display-inline-block">',
            'cancel_reply_after' => '</span>',
            'title_reply' => __( $comment_reply, 'suprementor' ),
            'title_reply_to' => __( $comment_reply_to, 'suprementor' ),
            'cancel_reply_link' => __( $comment_cancel, 'suprementor' ),
            'comment_notes_before' => __( $comment_before, 'suprementor' ),
            'comment_notes_after' => '',
            'id_submit' => __( 'sup-comment-submit' ),
            'submit_field' => '<div class="sup-comment-submit-wrap">%1$s %2$s</div>',
            'format' => 'html5'
        ];

        comment_form( $comments_args );

        ?>

    </div>

</div><!-- .comments-area -->
