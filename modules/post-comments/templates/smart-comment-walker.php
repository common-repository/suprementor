<?php

if( ! defined('ABSPATH') ) exit;



if ( ! class_exists( 'Sup_Smart_Comment_Walker') ) {

    class Sup_Smart_Comment_Walker extends Walker_Comment {

        protected function html5_comment( $comment, $depth, $args ) {

            $settings = $GLOBALS['sup_widget_global_settings'];

            if ( intval( $comment->comment_parent ) !== 0 ) {

                $comment_class = 'sup-comment-reply';
                $wrap_class = 'sup-comment-wrap-reply';

            } else {

                $comment_class = 'sup-comment-top';
                $wrap_class = 'sup-comment-wrap-top';

            }

            ?>

            <div id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'parent' : '', $comment ); ?>>

                <div id="div-comment-<?php comment_ID(); ?>" class="sup-comment-body">

                    <div class="sup-comment-wrap <?php echo $wrap_class; ?>">

                        <div class="sup-comment-wrap-inner <?php echo $comment_class; ?>">

                            <div uk-grid class="uk-flex uk-flex-middle uk-grid-collapse">

                                <?php if ( ! empty( get_option( 'show_avatars' ) ) ) : ?>

                                    <div class="uk-width-auto">

                                        <div class="sup-comment-avatar">

                                            <?php if ( $args['avatar_size'] !== 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>

                                        </div>

                                    </div>

                                <?php endif; ?>

                                <div class="uk-width-expand">

                                    <?php if ( intval( $comment->comment_parent ) !== 0 ) : ?>

                                        <div class="sup-comment-author">

                                            <?php echo esc_html( get_comment_author($comment) . ' ' . $settings['sup_content_post_comments_message_reply_to'] . ' ' . get_comment_author($comment->comment_parent) ); ?>

                                        </div>

                                    <?php else : ?>

                                        <div class="sup-comment-author"><?php echo esc_html( get_comment_author($comment) ); ?></div>

                                    <?php endif; ?>

                                    <div class="sup-comment-date">

                                        <?php echo esc_html( get_comment_date( '', $comment ) . ', ' .  get_comment_time() ); ?>

                                    </div>

                                </div>

                                <div class="uk-width-auto">

                                    <div class="sup-comment-link">

                                        <?php
                                        // Output Edit link
                                        edit_comment_link( __( 'Edit' ), '<span class="sup-comment-edit-link">', '</span> ' );

                                        // Output Reply link
                                        comment_reply_link([
                                            'add_below'     => 'div-comment',
                                            'depth'         => $depth,
                                            'max_depth'     => $args['max_depth']
                                        ]);
                                        ?>

                                    </div>

                                </div>

                            </div>

                            <div class="sup-comment-content">

                                <?php if ( ! $comment->comment_approved ): ?>

                                    <p class="sup-comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.'); ?></p>

                                <?php endif; ?>

                                <div class="sup-comment-text-wrap">

                                    <?php comment_text(); ?>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>
                <?php
            }
        }
    }
