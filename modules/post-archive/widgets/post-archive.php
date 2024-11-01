<?php

/**
* Post Box Widget.
*/

namespace Suprementor\Modules\Post_Archive\Widgets;

class Post_Archive extends \Elementor\Widget_Base {

	/**
	* Used internally to get the widgets categories.
	*/
	public function get_categories() {
		return [ 'suprementor' ];
	}

	/*
	* Used internally to get the widgets name.
	*/
	public function get_name() {
		return 'sup_widget_post_archive';
	}

	/*
	* Used internally to get the widgets title.
	*/
	public function get_title() {
		return \Suprementor\Helpers\General::widget_prefix()  . __( 'Post Archive',  'suprementor' );
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
				'label' => __( 'Skin', 'suprementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->end_controls_section();

		/*
		* CONTENT - THUMBNAIL OTHER
		*/
		$thumbnail_other_conditions = [
			'terms' => [
				[
					'name' => '_skin',
					'operator' => 'in',
					'value' => [
						'smart_card_top',
						'smart_cover_top',
						'smart_boxed_cover_top',
						'bold_card_top',
						'bold_cover_top',
						'bold_boxed_cover_top',
						'news_card_top',
						'news_cover_top',
						'news_boxed_cover_top'
					]
				]
			]
		];

		\Suprementor\Controls\Post\Scale_Up_Thumbnail_Other::content( $this, $thumbnail_other_conditions, 'Top' );

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
						'smart_card_top',
						'smart_list',
						'smart_cover',
						'smart_cover_top',
						'smart_boxed_cover',
						'smart_boxed_cover_top',
						'bold_card',
						'bold_card_top',
						'bold_list',
						'bold_cover',
						'bold_cover_top',
						'bold_boxed_cover',
						'bold_boxed_cover_top',
						'news_card',
						'news_card_top',
						'news_list',
						'news_cover',
						'news_cover_top',
						'news_boxed_cover',
						'news_boxed_cover_top',
					]
				]
			]
		];

		\Suprementor\Controls\Post\Scale_Up_Thumbnail::content( $this, $thumbnail_conditions );

		/*
		* CONTENT - TITLE OTHER
		*/
		$title_other_conditions = [
			'terms' => [
				[
					'name' => '_skin',
					'operator' => 'in',
					'value' => [
						'smart_card_top',
						'smart_cover_top',
						'smart_boxed_cover_top',
						'bold_card_top',
						'bold_cover_top',
						'bold_boxed_cover_top',
					]
				]
			]
		];

		\Suprementor\Controls\Post\Title_Other::content( $this, $title_other_conditions, 'Top' );

		/*
		* CONTENT - TITLE
		*/
		$title_conditions = [
			'terms' => [
				[
					'name' => '_skin',
					'operator' => 'in',
					'value' => [
						'smart_card',
						'smart_card_top',
						'smart_list',
						'smart_cover',
						'smart_cover_top',
						'smart_boxed_cover',
						'smart_boxed_cover_top',
						'bold_card',
						'bold_card_top',
						'bold_list',
						'bold_cover',
						'bold_cover_top',
						'bold_boxed_cover',
						'bold_boxed_cover_top',
					]
				]
			]
		];

		\Suprementor\Controls\Post\Title::content( $this, $title_conditions );

		/*
		* CONTENT - CTI OTHER
		*/
		$cti_other_conditions = [
			'terms' => [
				[
					'name' => '_skin',
					'operator' => 'in',
					'value' => [
						'news_card_top',
						'news_cover_top',
						'news_boxed_cover_top',
					]
				]
			]
		];

		\Suprementor\Controls\Post\Categories_Title_Inline_Other::content( $this, $cti_other_conditions, 'Top' );

		/*
		* CONTENT - CTI
		*/
		$cti_conditions = [
			'terms' => [
				[
					'name' => '_skin',
					'operator' => 'in',
					'value' => [
						'news_card',
						'news_card_top',
						'news_cover',
						'news_cover_top',
						'news_boxed_cover',
						'news_boxed_cover_top',
						'news_list',
					]
				]
			]
		];

		\Suprementor\Controls\Post\Categories_Title_Inline::content( $this, $cti_conditions );

		/*
		* CONTENT - META INLINE OTHER
		*/
		$meta_inline_other_conditions = [
			'terms' => [
				[
					'name' => '_skin',
					'operator' => 'in',
					'value' => [
						'smart_card_top',
						'smart_cover_top',
						'smart_boxed_cover_top',
					]
				]
			]
		];

		\Suprementor\Controls\Post\Meta_Inline_Other::content( $this, $meta_inline_other_conditions, 'Top' );

		/*
		* CONTENT - META INLINE
		*/
		$meta_inline_conditions = [
			'terms' => [
				[
					'name' => '_skin',
					'operator' => 'in',
					'value' => [
						'smart_card',
						'smart_card_top',
						'smart_list',
						'smart_cover',
						'smart_cover_top',
						'smart_boxed_cover',
						'smart_boxed_cover_top',
					]
				]
			]
		];

		\Suprementor\Controls\Post\Meta_Inline::content( $this, $meta_inline_conditions );

		/*
		* CONTENT - EXCCERPT OTHER
		*/
		$excerpt_other_conditions = [
			'terms' => [
				[
					'name' => '_skin',
					'operator' => 'in',
					'value' => [
						'smart_card_top',
						'smart_cover_top',
						'smart_boxed_cover_top',
						'bold_card_top',
						'bold_cover_top',
						'bold_boxed_cover_top',
						'news_card_top',
						'news_cover_top',
						'news_boxed_cover_top',
					]
				]
			]
		];

		\Suprementor\Controls\Post\Excerpt_Other::content( $this, $excerpt_other_conditions, 'Top' );

		/*
		* CONTENT - EXCCERPT
		*/
		$excerpt_conditions = [
			'terms' => [
				[
					'name' => '_skin',
					'operator' => 'in',
					'value' => [
						'smart_card',
						'smart_card_top',
						'smart_list',
						'smart_cover',
						'smart_cover_top',
						'smart_boxed_cover',
						'smart_boxed_cover_top',
						'bold_card',
						'bold_card_top',
						'bold_list',
						'bold_cover',
						'bold_cover_top',
						'bold_boxed_cover',
						'bold_boxed_cover_top',
						'news_card',
						'news_card_top',
						'news_list',
						'news_cover',
						'news_cover_top',
						'news_boxed_cover',
						'news_boxed_cover_top',
					]
				]
			]
		];

		\Suprementor\Controls\Post\Excerpt::content( $this, $excerpt_conditions );

		/*
		* CONTENT - CATEGORIES
		*/
		$categories_conditions = [
			'terms' => [
				[
					'name' => '_skin',
					'operator' => 'in',
					'value' => [
						'bold_card',
						'bold_card_top',
						'bold_list',
						'bold_cover',
						'bold_cover_top',
						'bold_boxed_cover',
						'bold_boxed_cover_top',
					]
				]
			]
		];

		\Suprementor\Controls\Post\Categories::content( $this, $categories_conditions );

		/*
		* CONTENT - AUTHOR
		*/
		$author_conditions = [
			'terms' => [
				[
					'name' => '_skin',
					'operator' => 'in',
					'value' => [
						'bold_card',
						'bold_card_top',
						'bold_list',
						'bold_cover',
						'bold_cover_top',
						'bold_boxed_cover',
						'bold_boxed_cover_top',
					]
				]
			]
		];

		\Suprementor\Controls\Post\Author::content( $this, $author_conditions );

		/*
		* CONTENT - DATE
		*/
		$date_conditions = [
			'terms' => [
				[
					'name' => '_skin',
					'operator' => 'in',
					'value' => [
						'bold_cover',
						'bold_boxed_cover',
						'bold_cover_top',
						'bold_boxed_cover_top',
					]
				]
			]
		];

		\Suprementor\Controls\Post\Date::content( $this, $date_conditions );

		/*
		* CONTENT - DATE MINI
		*/
		$date_mini_conditions = [
			'terms' => [
				[
					'name' => '_skin',
					'operator' => 'in',
					'value' => [
						'bold_card',
						'bold_card_top',
						'bold_list',
					]
				]
			]
		];

		\Suprementor\Controls\Post\Date_Mini::content( $this, $date_mini_conditions );

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
						'smart_cover_top',
						'smart_boxed_cover',
						'smart_boxed_cover_top',
						'bold_cover',
						'bold_cover_top',
						'bold_boxed_cover',
						'bold_boxed_cover_top',
						'news_cover',
						'news_cover_top',
						'news_boxed_cover',
						'news_boxed_cover_top',
					]
				]
			]
		];

		\Suprementor\Controls\Cover::content( $this, $cover_conditions );

		/*
		* CONTENT - BUTTON
		*/
		$button_conditions = [
			'terms' => [
				[
					'name' => '_skin',
					'operator' => 'in',
					'value' => [
						'smart_card',
						'smart_card_top',
						'smart_list',
						'bold_card',
						'bold_card_top',
						'bold_list',
					]
				]
			]
		];

		\Suprementor\Controls\Post\Button::content( $this, $button_conditions );

		/*
		* CONTENT - COLUMNS
		*/
		$columns_conditions = [
			'terms' => [
				[
					'name' => '_skin',
					'operator' => 'in',
					'value' => [
						'smart_list',
						'bold_list',
						'news_list',
					]
				]
			]
		];

		\Suprementor\Controls\Columns::content( $this, $columns_conditions );

		/*
		* CONTENT - GRID
		*/
		\Suprementor\Controls\Grid::content( $this );

		/*
		* STYLE - TITLE
		*/
		\Suprementor\Controls\Post\Title_Other::style( $this, $title_other_conditions, 'Top' );

		\Suprementor\Controls\Post\Title::style( $this, $title_conditions );

		/*
		* STYLE - CTI
		*/
		\Suprementor\Controls\Post\Categories_Title_Inline_Other::style( $this, $cti_conditions, 'Top' );

		\Suprementor\Controls\Post\Categories_Title_Inline::style( $this, $cti_conditions );

		/*
		* STYLE - META INLINE
		*/
		\Suprementor\Controls\Post\Meta_Inline_Other::style( $this, $meta_inline_other_conditions, 'Top' );

		\Suprementor\Controls\Post\Meta_Inline::style( $this, $meta_inline_conditions );

		/*
		* STYLE - EXCERPT
		*/
		\Suprementor\Controls\Post\Excerpt_Other::style( $this, $excerpt_other_conditions, 'Top' );

		\Suprementor\Controls\Post\Excerpt::style( $this, $excerpt_conditions );

		/*
		* STYLE - CATEGORIES
		*/
		\Suprementor\Controls\Post\Categories::style( $this, $categories_conditions );

		/*
		* STYLE - AUTHOR
		*/
		\Suprementor\Controls\Post\Author::style( $this, $author_conditions );

		/*
		* STYLE - DATE
		*/
		\Suprementor\Controls\Post\Date::style( $this, $date_conditions );

		/*
		* STYLE - DATE MINI
		*/
		\Suprementor\Controls\Post\Date_mini::style( $this, $date_mini_conditions );

		/*
		* STYLE - COVER
		*/
		\Suprementor\Controls\Cover::style( $this, $cover_conditions );

		/*
		* STYLE - ITEMS
		*/
		$this->start_controls_section(
			'sup_style_items',
			[
				'label' => __( 'Items', 'suprementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'sup_items_background_color',
			[
				'label' => __( 'Background Color', 'suprementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sup-wrapper' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'sup_items_inner_padding',
			[
				'label' => __( 'Inner Padding', 'suprementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .sup-post-box-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'sup_items_inner_border',
				'label' => __( 'Border', 'suprementor' ),
				'selector' => '{{WRAPPER}} .sup-wrapper',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'sup_items_box_shadow',
				'label' => __( 'Box Shadow', 'suprementor' ),
				'selector' => '{{WRAPPER}} .sup-wrapper',
			]
		);

		$this->end_controls_section();

		/*
		* STYLE - BUTTON
		*/
		\Suprementor\Controls\Post\Button::style( $this, $button_conditions );

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
		do_action('suprementor-upgrade/modules/post-archive/load-skins');

		// free skins
		$this->add_skin( new \Suprementor\Modules\Post_Archive\Skins\Smart_Card( $this ) );
		$this->add_skin( new \Suprementor\Modules\Post_Archive\Skins\Smart_Cover( $this ) );
		$this->add_skin( new \Suprementor\Modules\Post_Archive\Skins\Smart_Boxed_Cover( $this ) );
		$this->add_skin( new \Suprementor\Modules\Post_Archive\Skins\Smart_List( $this ) );

		// upgrade skins, extends the included base skins
		if ( class_exists( '\Suprementor_Upgrade\Post_Archive\Skins\Smart_Card_Top' ) ) {
			$this->add_skin( new \Suprementor_Upgrade\Post_Archive\Skins\Smart_Card_Top( $this ) );
		} else {
			$this->add_skin( new \Suprementor\Modules\Post_Archive\Skins\Smart_Card_Top( $this ) );
		}

		if ( class_exists( '\Suprementor_Upgrade\Post_Archive\Skins\Smart_Cover_Top' ) ) {
			$this->add_skin( new \Suprementor_Upgrade\Post_Archive\Skins\Smart_Cover_Top( $this ) );
		} else {
			$this->add_skin( new \Suprementor\Modules\Post_Archive\Skins\Smart_Cover_Top( $this ) );
		}

		if ( class_exists( '\Suprementor_Upgrade\Post_Archive\Skins\Bold_Card' ) ) {
			$this->add_skin( new \Suprementor_Upgrade\Post_Archive\Skins\Bold_Card( $this ) );
		} else {
			$this->add_skin( new \Suprementor\Modules\Post_Archive\Skins\Bold_Card( $this ) );
		}

		if ( class_exists( '\Suprementor_Upgrade\Post_Archive\Skins\Bold_Card_Top' ) ) {
			$this->add_skin( new \Suprementor_Upgrade\Post_Archive\Skins\Bold_Card_Top( $this ) );
		} else {
			$this->add_skin( new \Suprementor\Modules\Post_Archive\Skins\Bold_Card_Top( $this ) );
		}

		if ( class_exists( '\Suprementor_Upgrade\Post_Archive\Skins\Bold_List' ) ) {
			$this->add_skin( new \Suprementor_Upgrade\Post_Archive\Skins\Bold_List( $this ) );
		} else {
			$this->add_skin( new \Suprementor\Modules\Post_Archive\Skins\Bold_List( $this ) );
		}

		if ( class_exists( '\Suprementor_Upgrade\Post_Archive\Skins\Bold_Cover' ) ) {
			$this->add_skin( new \Suprementor_Upgrade\Post_Archive\Skins\Bold_Cover( $this ) );
		} else {
			$this->add_skin( new \Suprementor\Modules\Post_Archive\Skins\Bold_Cover( $this ) );
		}

		if ( class_exists( '\Suprementor_Upgrade\Post_Archive\Skins\Bold_Cover_Top' ) ) {
			$this->add_skin( new \Suprementor_Upgrade\Post_Archive\Skins\Bold_Cover_Top( $this ) );
		} else {
			$this->add_skin( new \Suprementor\Modules\Post_Archive\Skins\Bold_Cover_Top( $this ) );
		}

		if ( class_exists( '\Suprementor_Upgrade\Post_Archive\Skins\Bold_Boxed_Cover' ) ) {
			$this->add_skin( new \Suprementor_Upgrade\Post_Archive\Skins\Bold_Boxed_Cover( $this ) );
		} else {
			$this->add_skin( new \Suprementor\Modules\Post_Archive\Skins\Bold_Boxed_Cover( $this ) );
		}

		if ( class_exists( '\Suprementor_Upgrade\Post_Archive\Skins\Bold_Boxed_Cover_Top' ) ) {
			$this->add_skin( new \Suprementor_Upgrade\Post_Archive\Skins\Bold_Boxed_Cover_Top( $this ) );
		} else {
			$this->add_skin( new \Suprementor\Modules\Post_Archive\Skins\Bold_Boxed_Cover_Top( $this ) );
		}

		if ( class_exists( '\Suprementor_Upgrade\Post_Archive\Skins\News_Card' ) ) {
			$this->add_skin( new \Suprementor_Upgrade\Post_Archive\Skins\News_Card( $this ) );
		} else {
			$this->add_skin( new \Suprementor\Modules\Post_Archive\Skins\News_Card( $this ) );
		}

		if ( class_exists( '\Suprementor_Upgrade\Post_Archive\Skins\News_Card_Top' ) ) {
			$this->add_skin( new \Suprementor_Upgrade\Post_Archive\Skins\News_Card_Top( $this ) );
		} else {
			$this->add_skin( new \Suprementor\Modules\Post_Archive\Skins\News_Card_Top( $this ) );
		}

		if ( class_exists( '\Suprementor_Upgrade\Post_Archive\Skins\News_List' ) ) {
			$this->add_skin( new \Suprementor_Upgrade\Post_Archive\Skins\News_List( $this ) );
		} else {
			$this->add_skin( new \Suprementor\Modules\Post_Archive\Skins\News_List( $this ) );
		}

		if ( class_exists( '\Suprementor_Upgrade\Post_Archive\Skins\News_Cover' ) ) {
			$this->add_skin( new \Suprementor_Upgrade\Post_Archive\Skins\News_Cover( $this ) );
		} else {
			$this->add_skin( new \Suprementor\Modules\Post_Archive\Skins\News_Cover( $this ) );
		}

		if ( class_exists( '\Suprementor_Upgrade\Post_Archive\Skins\News_Cover_Top' ) ) {
			$this->add_skin( new \Suprementor_Upgrade\Post_Archive\Skins\News_Cover_Top( $this ) );
		} else {
			$this->add_skin( new \Suprementor\Modules\Post_Archive\Skins\News_Cover_Top( $this ) );
		}

		if ( class_exists( '\Suprementor_Upgrade\Post_Archive\Skins\News_Boxed_Cover' ) ) {
			$this->add_skin( new \Suprementor_Upgrade\Post_Archive\Skins\News_Boxed_Cover( $this ) );
		} else {
			$this->add_skin( new \Suprementor\Modules\Post_Archive\Skins\News_Boxed_Cover( $this ) );
		}

		if ( class_exists( '\Suprementor_Upgrade\Post_Archive\Skins\News_Boxed_Cover_Top' ) ) {
			$this->add_skin( new \Suprementor_Upgrade\Post_Archive\Skins\News_Boxed_Cover_Top( $this ) );
		} else {
			$this->add_skin( new \Suprementor\Modules\Post_Archive\Skins\News_Boxed_Cover_Top( $this ) );
		}

	}

	/*
	* Adds classes and other stuff to the settings array.
	*/
	public function sup_process_settings( $settings ) {

		$settings['sup_wrapper_classes'][] = 'uk-transition-toggle';
		$settings['sup_wrapper_classes'][] = 'uk-overflow-hidden';

		$settings['sup_post_archive_categories_position_classes'][] = 'sup-post-archive-categories-position-processed';
		( empty( $settings['sup_post_categories_position'] ) ) ?: $settings['sup_post_archive_categories_position_classes'][] = $settings['sup_post_categories_position'];

		$settings['sup_grid_classes'][] = 'sup-grid-processed';
		( empty( $settings['sup_grid_gap'] ) ) ?: $settings['sup_grid_classes'][] = $settings['sup_grid_gap'];

		$settings['sup_columns_classes'][] = 'sup-columns-processed';
		( empty( $settings['sup_grid_desktop'] ) ) ?: $settings['sup_columns_classes'][] = $settings['sup_grid_desktop'];
		( empty( $settings['sup_grid_tablet'] ) ) ?: $settings['sup_columns_classes'][] = $settings['sup_grid_tablet'];
		( empty( $settings['sup_grid_mobile'] ) ) ?: $settings['sup_columns_classes'][] = $settings['sup_grid_mobile'];

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
				'description' => \Suprementor\Helpers\General::upgrade_skin_description('SUPREMENTOR_UPGRADE_POST_ARCHIVE', 'post-archive'),
			]
		);


	}

}
