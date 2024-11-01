<?php

namespace Suprementor\Modules\Product_Category_Box\Widgets;

class Product_Category_Box extends \Elementor\Widget_Base {

	/**
	* Used internally to get the widgets categories.
	*/
	public function get_categories() {
		return [ 'suprementor' ];
	}

	/**
	* Used internally to get the widgets name.
	*/
	public function get_name() {
		return 'sup_widget_product_category_box';
	}

	/**
	* Used internally to get the widgets title.
	*/
	public function get_title() {
		return \Suprementor\Helpers\General::widget_prefix()  . __( 'Product Category Box',  'suprementor' );
	}

	/**
	* Sets the icon in the Elementor UI, font awesome, https://elementor.github.io/elementor-icons/
	*/
	public function get_icon() {
		return 'fa fa-code';
	}

	/**
	* Register the widgets controls
	*/
	protected function _register_controls() {

		/*
		* CONTENT
		*/
		$this->start_controls_section(
			'sup_skin_cat',
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
				'options' => \Suprementor\Helpers\General::get_product_category_options(),
			]
		);

		$this->end_controls_section();

		/*
		* CONTENT - THUMBNAIL
		*/
		\Suprementor\Controls\Product\Category\Scale_Up_Thumbnail::content( $this );
		/*
		* CONTENT - TITLE
		*/
		\Suprementor\Controls\Product\Category\Title::content( $this );

		/*
		* CONTENT - COUNT
		*/
		\Suprementor\Controls\Product\Category\Count::content( $this );

		/*
		* CONTENT - DESCRIPTION
		*/
		\Suprementor\Controls\Product\Category\Description::content( $this );

		/*
		* CONTENT - COVER
		*/
		$cover_conditions = [
			'terms' => [
				[
					'name' => '_skin',
					'operator' => 'in',
					'value' => [
						'smart_cover',
						'smart_boxed_cover',
					]
				]
			]
		];

		\Suprementor\Controls\Cover::content( $this, $cover_conditions );

		/*
		* STYLE - TITLE
		*/
		\Suprementor\Controls\Product\Category\Title::style( $this );

		/*
		* STYLE - COUNT
		*/
		\Suprementor\Controls\Product\Category\Count::style( $this );

		/*
		* STYLE - DESCRIPTION
		*/
		\Suprementor\Controls\Product\Category\Description::style( $this );

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

	/**
	* Setting this removes the default skin select option.
	*/
	protected $_has_template_content = false;

	/**
	* Adds the skins to the widget Skin select (first control section).
	*/
	protected function _register_skins() {

		//free skins
		$this->add_skin( new \Suprementor\Modules\Product_Category_Box\Skins\Smart_Card( $this ) );

		// upgrade skins, extends the included base skins
		if ( class_exists('\Suprementor_Upgrade\Product_Category_Box\Skins\Smart_Cover') ) {
			$this->add_skin( new \Suprementor_Upgrade\Product_Category_Box\Skins\Smart_Cover( $this ) );
		} else {
			$this->add_skin( new \Suprementor\Modules\Product_Category_Box\Skins\Smart_Cover( $this ) );
		}

		if ( class_exists('\Suprementor_Upgrade\Product_Category_Box\Skins\Smart_Boxed_Cover') ) {
			$this->add_skin( new \Suprementor_Upgrade\Product_Category_Box\Skins\Smart_Boxed_Cover( $this ) );
		} else {
			$this->add_skin( new \Suprementor\Modules\Product_Category_Box\Skins\Smart_Boxed_Cover( $this ) );
		}
		
	}

	/**
	* Adds classes and other stuff to the settings array.
	*/
	public function sup_process_settings( $settings ) {

		$settings['sup_wrapper_classes'][] = 'uk-transition-toggle';
		$settings['sup_wrapper_classes'][] = 'uk-overflow-hidden';

		return $settings;

	}

	/**
	* Update any global controls used in the widgets.
	*/
	public function sup_update_controls() {

		$this->update_control(
			'_skin',
			[
				'label_block' => true,
				'description' => \Suprementor\Helpers\General::upgrade_skin_description('SUPREMENTOR_UPGRADE_PRODUCT_CATEGORY_BOX', 'product-category-box'),
			]
		);

	}

}
