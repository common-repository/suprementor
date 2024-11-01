<?php

namespace Suprementor\Modules\Post_Category_List\Skins;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Smart_List extends \Elementor\Skin_Base {

    /**
    * Get skin ID.
    */
    public function get_id() {
        return 'smart_list';
    }

    /**
    * Get skin title.
    */
    public function get_title() {
        return __( 'Smart - List', 'suprementor' );
    }

    /**
    * Render widget output on the frontend.
    */
    public function render() {

        $settings = $this->parent->process_settings( $this->parent->get_settings_for_display() ); ?>

        <?php \Suprementor\Controls\Wrapper::open( $settings, $this->parent->get_name(), $settings['sup_wrapper_classes'] ); ?>

        <?php \Suprementor\Controls\Header::render( $settings ); ?>

        <?php

        $args = array(
            'orderby'    => 'name',
            'order'      => 'ASC',
            'hide_empty' => 1,
            'post_type' => 'post'
        );

        $categories = get_categories( $args );

        ?>

        <div uk-grid class="sup-post-category-list-wrap uk-grid-collapse">

            <?php if ( ! empty( $categories) && ! is_wp_error( $categories) ) : ?>

                <?php foreach ( $categories as $c ) : ?>

                    <div class="<?php echo esc_attr( implode( ' ', $settings['sup_content_section_pcl_columns_classes'] ) ); ?>">

                        <div uk-grid class="uk-grid-collapse uk-flex uk-flex-middle">

                            <div class="uk-width-auto sup-post-category-list-item">

                                <a href="<?php echo esc_url( get_category_link( $c->term_id ) ); ?>" class="sup-transition-all">

                                    <?php echo esc_html( $c->name ); ?>

                                </a>

                            </div>

                            <?php if (  ! empty( $settings['sup_content_section_pcl_count_show'] ) ) : ?>

                                <div class="uk-width-expand uk-text-right sup-post-category-list-count sup-post-category-list-item">

                                    (<?php echo esc_html( $c->count ); ?>)

                                </div>

                            <?php endif; ?>

                        </div>

                    </div>

                <?php endforeach; ?>

            <?php endif; ?>

        </div>

        <?php \Suprementor\Controls\Wrapper::close(); ?>

        <?php

    }

}
