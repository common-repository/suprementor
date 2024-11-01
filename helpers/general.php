<?php

namespace Suprementor\Helpers;

if( ! defined('ABSPATH') ) exit;

class General {

    /**
    * Filter to overwrite the widget prefix for white label.
    */
    public static function widget_prefix(){

        return apply_filters( 'suprementor/helpers/general/widget_prefix', 'Supreme ' );

    }

    /**
    * Get a link to a product in the store
    */
    public static function store_url( $slug ) {

        return self::home_url() . "/product/" . $slug;

    }

    /**
    * Get a link to a product in the store
    */
    public static function home_url() {

        return 'https://supremepap.com';

    }

    /**
    * Gets all image sizes as select optiosn
    */

    public static function get_all_image_sizes() {

        $image_sizes =  wp_get_registered_image_subsizes();

        foreach ( $image_sizes as $k => $v) {

            $formatted_sizes[$k] = ucwords( str_replace( '_', ' ', $k ) ) . ' - ' . $v['width'] . 'x' . $v['height'];

            if ( ! empty( $v['crop'] ) ) {

                $formatted_sizes[$k] .= ' Crop';

            }
        }

        $formatted_sizes['full'] = 'Full';

        return apply_filters( 'image_size_names_choose', $formatted_sizes );

    }

    /**
    * Get Post Options
    */
    public static function get_post_options() {

        $args = array(
            'post_type'         => 'post',
            'posts_per_page'    => -1,
        );

        $posts = get_posts( $args );

        $options = array();

        if ( ! empty( $posts ) && ! is_wp_error( $posts ) ) {
            foreach ( $posts as $p ) {
                $options[ $p->ID ] = $p->post_title;
            }
        }

        return $options;

    }

    /**
    * Get Post Category Options
    */
    public static function get_post_categoy_options() {

        $args = array(
            'orderby'    => 'name',
            'order'      => 'ASC',
            'hide_empty' => 0,
            'post_type' => 'post'
        );

        $categories = get_categories( $args );

        $options = [];

        if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
            foreach ( $categories as $c ) {
                $options[$c->term_id] = $c->name;
            }
        }

        return $options;

    }

    /**
    * Get Post Tag Options
    */
    public static function get_post_tag_options() {

        $args = array(
            'orderby'    => 'name',
            'order'      => 'ASC',
            'hide_empty' => 0,
        );

        $tags = get_tags( $args );

        $options = [];

        if ( ! empty( $tags ) && ! is_wp_error( $tags ) ) {
            foreach ( $tags as $t ) {
                $options[$t->term_id] = $t->name;
            }
        }

        return $options;

    }

    /**
    * Get Author Options
    */
    public static function get_author_options() {

        $users = get_users( [ 'role__in' => [ 'super_admin', 'administrator', 'editor', 'author', 'contributor' ] ] );

        $options = [];

        if ( ! empty( $users ) && ! is_wp_error( $users ) ){
            foreach ( $users as $user ) {
                $options[ $user->ID ] = $user->display_name;
            }
        }

        return $options;

    }

    /**
    * Get Product Category Options
    */
    public static function get_product_category_options() {

        if ( ! class_exists('WooCommerce') ) {
            return [];
        }

        $args = array(
            'orderby'    => 'name',
            'order'      => 'ASC',
            'hide_empty' => 0,
            'taxonomy' => 'product_cat'
        );

        $categories = get_categories( $args );

        $options = [];

        if ( ! empty( $categories ) && ! is_wp_error( $categories ) ){
            foreach ( $categories as $category ) {
                $options[ $category->term_id ] = $category->name;
            }
        }

        return $options;

    }

    /**
    * Placeholder Text Medium.
    */
    public static function placeholder_text_medium() {

        return 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua minim veniam.';

    }

    /**
    * Small peice of upgrade text to be combined with other text.
    */
    public static function upgrade_tag() {

        return ' (Upgrade)';

    }

    /**
    * Displays the front end upgrade advert when a skin is not available.
    */
    public static function upgrade_skin_advert( $slug ) {

        ?>

        <div style="background: #f8f8f8; padding: 20px;">
            <strong style="color: #a1a1a1;">UPGRADE REQUIRED</strong>
            <p style="color: #a1a1a1;">Upgrade this widget in the Supreme store <a style="color: #000;" href="<?php echo self::store_url( $slug ); ?>"> here</a>. If you own this upgrade please check all Supreme plugins are updated and active.</p>
        </div>

        <?php

    }

    /**
    * Shows a small link to the upgrade store for non upgraded widgets.
    */
    public static function upgrade_skin_description( $constant, $slug ) {

        if ( ! defined( $constant ) ) {

            $description = 'Upgrade this widget via the <a href="' . self::store_url( $slug ) . '" target="_blank">Suprementor Store</a> to unlock additonal skins, options and functionality.';

        } else {

            $description = __('The Skin controls the widgets available controls, its features and functionality along with its appearance.', 'suprementor');

        }

        return $description;

    }

    /**
    * Create a generic error template.
    */
    public static function alert($class, $content) {

        if ( current_user_can( 'administrator') ) :

            ?>

            <div class="uk-alert <?php echo esc_attr( $class ); ?> uk-margin-remove">
                <?php echo __( $content, 'suprementor' ); ?>
            </div>

            <?php

        endif;

    }

    /**
    * Error for when a skin requires acf.
    */
    public static function alert_acf_skin() {

        ?>

        <div class="uk-alert uk-alert-danger uk-margin-remove">
            <?php echo self::alert_acf_message(); ?>
        </div>

        <?php

    }

    /**
    * Error message for when a skin requires acf.
    */
    public static function alert_acf_message() {

        return  __( 'This functionality requires the (free) Advanced Custom Fields plugin by Elliot Condon.', 'suprementor' );

    }

    /**
    * Get Saved Templae Sections
    */
    public static function get_saved_template_sections() {

        $sections = get_posts(
            [
                'post_type' => 'elementor_library',
                'posts_per_page' => -1,
                'tax_query' => [
                    [
                        'taxonomy' => 'elementor_library_type',
                        'field' => 'name',
                        'terms' => 'section',
                    ]
                ]
            ]
        );

        $options = [];

        if ( ! empty( $sections ) && ! is_wp_error( $sections ) ) {
            foreach ( $sections as $s ) {
                $options[$s->ID] = $s->post_title;
            }
        }

        return $options;

    }

    /**
    * Get Saved Templae Sections
    */
    public static function get_saved_global_widgets() {

        $widgets = get_posts(
            [
                'post_type' => 'elementor_library',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'elementor_library_type',
                        'field' => 'name',
                        'terms' => 'widget',
                    )
                )
            ]
        );

        $options = [];

        if ( ! empty( $widgets ) && ! is_wp_error( $widgets ) ) {
            foreach ( $widgets as $w ) {
                $options[$w->ID] = $w->post_title;
            }
        }

        return $options;

    }

    /**
    * Add Cover to Elementor Image
    */
    public static function add_cover_to_elementor_image( $html, $settings, $image_size_key, $image_key ) {
        $html = str_replace( '<img ', '<img uk-cover ', $html );
        return $html;
    }

}
