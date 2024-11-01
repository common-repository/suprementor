<?php

namespace Suprementor\Modules\Post_Category_Box\Widgets;

class Post_Category_Box extends \Elementor\Widget_Base {

    /*
    * Used internally to get the widgets categories.
    */
    public function get_categories() {
        return [ 'suprementor' ];
    }

    /*
    * Used internally to get the widgets name.
    */
    public function get_name() {
        return 'sup_widget_post_category_box';
    }

    /*
    * Used internally to get the widgets title.
    */
    public function get_title() {
        return \Suprementor\Helpers\General::widget_prefix()  . __( 'Post Category Box',  'suprementor' );
    }

    /*
    * Sets the icon in the Elementor UI, font awesome, https://elementor.github.io/elementor-icons/
    */
    public function get_icon() {
        return 'eicon-single-post';
    }

    /*
    * Register the widgets controls
    */
    protected function _register_controls() {

        /*
        * CONTENT
        */
        $this->start_controls_section(
            'sup_skin',
            [
                'label' => __( 'Skin & Category', 'suprementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT
            ]
        );

        $this->add_control(
            'sup_category_id',
            [
                'label' => __( 'Category', 'suprementor' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => \Suprementor\Helpers\General::get_post_categoy_options(),
            ]
        );

        $this->end_controls_section();

        /*
        * CONTENT - THUMBNAIL
        */
        $thumbnail_conditions = [
            'terms' => [
                [
                    'name' => '_skin',
                    'operator' => 'in',
                    'value' => [
                        'smart_card',
                        'smart_cover',
                        'smart_boxed_cover',
                    ]
                ]
            ]
        ];
        \Suprementor\Controls\Post\Category\Scale_Up_Thumbnail::content( $this, $thumbnail_conditions );

        /*
        * CONTENT - THUMBNAIL DUO
        */
        $thumbnail_duo_conditions = [
            'terms' => [
                [
                    'name' => '_skin',
                    'operator' => 'in',
                    'value' => [
                        'smart_card_duo',
                        'smart_cover_duo',
                        'smart_boxed_cover_duo',
                    ]
                ]
            ]
        ];
        \Suprementor\Controls\Post\Category\Responsive_Thumbnail_Duo::content( $this, $thumbnail_duo_conditions );

        /*
        * CONTENT - TITLE
        */
        \Suprementor\Controls\Post\Category\Title::content( $this );

        /*
        * CONTENT - COUNT
        */
        \Suprementor\Controls\Post\Category\Count::content( $this );

        /*
        * CONTENT - DESCRIPTION
        */
        \Suprementor\Controls\Post\Category\Description::content( $this );

        /*
        * CONTENT - COVER
        */
        $cover_conditions = [
            'terms' => [
                [
                    'name' => '_skin',
                    'operator' => 'in',
                    'value' => [
                        'smart_boxed_cover',
                        'smart_boxed_cover_duo',
                        'smart_cover',
                        'smart_cover_duo',
                    ]
                ]
            ]
        ];

        \Suprementor\Controls\Cover::content( $this, $cover_conditions );

        /*
        * STYLE - TITLE
        */
        \Suprementor\Controls\Post\Category\Title::style( $this );

        /*
        * STYLE - COUNT
        */
        \Suprementor\Controls\Post\Category\Count::style( $this );

        /*
        * STYLE - DESCRIPTION
        */
        \Suprementor\Controls\Post\Category\Description::style( $this );

        /*
        * STYLE - COVER
        */
        \Suprementor\Controls\Cover::style( $this, $cover_conditions );

        /*
        * STYLE - WRAPPER
        */
        \Suprementor\Controls\Wrapper::style( $this );

        /*
        * Modify the controls to better fit the skin
        */
        $this->sup_update_controls();

    }

    /*
    * Setting this removes the default skin select option.
    */
    protected $_has_template_content = false;

    /*
    * Adds the skins to the widget Skin select (first control section).
    */
    protected function _register_skins() {

        // load upgrade skins
        do_action('suprementor-upgrade/modules/post-category-box/load-skins');

        // free skins
        $this->add_skin( new \Suprementor\Modules\Post_Category_Box\Skins\Smart_Card( $this ) );

        // if upgrade skins where loaded by the action use them, if not fallback to the base skins
        if ( class_exists('\Suprementor_Upgrade\Post_Category_Box\Skins\Smart_Card_Duo') ) {
            $this->add_skin( new \Suprementor_Upgrade\Post_Category_Box\Skins\Smart_Card_Duo( $this ) );
        } else {
            $this->add_skin( new \Suprementor\Modules\Post_Category_Box\Skins\Smart_Card_Duo( $this ) );
        }

        if ( class_exists('\Suprementor_Upgrade\Post_Category_Box\Skins\Smart_Cover') ) {
            $this->add_skin( new \Suprementor_Upgrade\Post_Category_Box\Skins\Smart_Cover( $this ) );
        } else {
            $this->add_skin( new \Suprementor\Modules\Post_Category_Box\Skins\Smart_Cover( $this ) );
        }

        if ( class_exists('\Suprementor_Upgrade\Post_Category_Box\Skins\Smart_Cover_Duo') ) {
            $this->add_skin( new \Suprementor_Upgrade\Post_Category_Box\Skins\Smart_Cover_Duo( $this ) );
        } else {
            $this->add_skin( new \Suprementor\Modules\Post_Category_Box\Skins\Smart_Cover_Duo( $this ) );
        }

        if ( class_exists('\Suprementor_Upgrade\Post_Category_Box\Skins\Smart_Boxed_Cover') ) {
            $this->add_skin( new \Suprementor_Upgrade\Post_Category_Box\Skins\Smart_Boxed_Cover( $this ) );
        } else {
            $this->add_skin( new \Suprementor\Modules\Post_Category_Box\Skins\Smart_Boxed_Cover( $this ) );
        }

        if ( class_exists('\Suprementor_Upgrade\Post_Category_Box\Skins\Smart_Boxed_Cover_Duo') ) {
            $this->add_skin( new \Suprementor_Upgrade\Post_Category_Box\Skins\Smart_Boxed_Cover_Duo( $this ) );
        } else {
            $this->add_skin( new \Suprementor\Modules\Post_Category_Box\Skins\Smart_Boxed_Cover_Duo( $this ) );
        }

    }

    /*
    * Adds classes and other stuff to the settings array.
    */
    public function sup_process_settings( $settings ) {

        $settings['sup_wrapper_classes'][] = 'uk-transition-toggle';
        $settings['sup_wrapper_classes'][] = 'uk-overflow-hidden';

        return $settings;

    }

    /*
    * Update any global controls used in the widgets.
    */
    public function sup_update_controls() {

        $this->update_control(
            '_skin',
            [
                'label_block' => true,
                'description' => \Suprementor\Helpers\General::upgrade_skin_description('SUPREMENTOR_UPGRADE_POST_CATEGORY_BOX', 'post-category-box'),
            ]
        );

    }

}
