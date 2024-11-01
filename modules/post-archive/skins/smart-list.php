<?php

namespace Suprementor\Modules\Post_Archive\Skins;

if ( ! defined( 'ABSPATH' ) ) exit;

class Smart_List extends \Elementor\Skin_Base {

    /**
    * Get the skin ID for internal use.
    */
    public function get_id() {
        return 'smart_list';
    }

    /**
    */
    public function get_title() {
        return __( 'Smart - List', 'suprementor' );
    }

    /**
    * Render widget output on the frontend.
    */
    public function render() {

        $settings = $this->parent->sup_process_settings( $this->parent->get_settings_for_display() );

        ?>

        <?php if ( have_posts() ) : ?>

            <div uk-grid class="<?php echo esc_attr( implode( ' ', $settings['sup_grid_classes'] ) ); ?>">

                <?php while ( have_posts() ) : ?>

                    <?php the_post(); ?>

                    <div class="<?php echo esc_attr( implode( ' ', $settings['sup_columns_classes'] ) ); ?>">

                        <?php \Suprementor\Controls\Wrapper::open( $settings, $this->parent->get_name(), $settings['sup_wrapper_classes'] ); ?>

                        <?php \Suprementor\Controls\Columns::open( $settings, ['uk-flex', 'uk-flex-stretch'] ); ?>

                        <?php \Suprementor\Controls\Columns::first_column( $settings, ['uk-cover-container'] ); ?>

                        <?php \Suprementor\Controls\Post\Scale_Up_Thumbnail::render( $settings, get_the_ID(), true ); ?>

                        <?php \Suprementor\Controls\Columns::first_column_close(); ?>

                        <?php \Suprementor\Controls\Columns::second_column(); ?>

                        <div class="sup-post-box-inner">

                            <?php \Suprementor\Controls\Post\Meta_Inline::render( $settings, get_the_ID() ); ?>

                            <?php \Suprementor\Controls\Post\Title::render( $settings, get_the_ID() ); ?>

                            <?php \Suprementor\Controls\Post\Excerpt::render( $settings, get_the_ID() ); ?>

                            <?php \Suprementor\Controls\Post\Button::render( $settings, get_the_ID() ); ?>

                        </div>

                        <?php \Suprementor\Controls\Columns::second_column_close(); ?>

                        <?php \Suprementor\Controls\Columns::close(); ?>

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
