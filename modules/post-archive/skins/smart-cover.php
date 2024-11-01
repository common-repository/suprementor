<?php

namespace Suprementor\Modules\Post_Archive\Skins;

if ( ! defined( 'ABSPATH' ) ) exit;

class Smart_Cover extends \Elementor\Skin_Base {

    /**
    * Get the skin ID for internal use.
    */
    public function get_id() {
        return 'smart_cover';
    }

    /**
    */
    public function get_title() {
        return __( 'Smart - Cover', 'suprementor' );
    }

    /**
    * Render widget output on the frontend.
    */
    public function render() {

        $settings = $this->parent->sup_process_settings( $this->parent->get_settings_for_display() );

        ?>

        <?php if ( have_posts() ) : ?>

            <div uk-grid class="<?php echo esc_attr( implode( ' ', $settings['sup_grid_classes'] ) ); ?>" uk-height-match=".sup-height-match .sup-wrapper">

                <?php while ( have_posts() ) : ?>

                    <?php the_post(); ?>

                    <div class="sup-height-match <?php echo esc_attr( implode( ' ', $settings['sup_columns_classes'] ) ); ?>">

                        <?php \Suprementor\Controls\Wrapper::open( $settings, $this->parent->get_name(), $settings['sup_wrapper_classes'] ); ?>

                        <div class="sup-cover-container uk-cover-container uk-position-relative">

                            <?php \Suprementor\Controls\Post\Scale_Up_Thumbnail::render( $settings, get_the_ID(), true ); ?>

                            <div style="pointer-events: none;" class="uk-position-cover sup-cover-overlay uk-overflow-hidden"></div>

                            <div class="sup-cover sup-cover-wrap sup-post-box-inner <?php echo esc_attr( implode( ' ', \Suprementor\Controls\Cover::wrapper_classes( $settings ) ) ); ?>" style="pointer-events: none;">

                                <?php \Suprementor\Controls\Post\Meta_Inline::render( $settings, get_the_ID() ); ?>

                                <?php \Suprementor\Controls\Post\Title::render( $settings, get_the_ID() ); ?>

                                <?php \Suprementor\Controls\Post\Excerpt::render( $settings, get_the_ID() ); ?>

                            </div>

                        </div>

                        <?php \Suprementor\Controls\Wrapper::close(); ?>

                    </div>

                <?php endwhile; ?>

            </div>

        <?php else : ?>

            <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>

        <?php endif; ?>

        <?php

    }

}
