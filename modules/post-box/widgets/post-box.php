<?php

namespace Suprementor\Modules\Post_Box\Widgets;

class Post_Box extends \Elementor\Widget_Base {

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
		return 'sup_widget_post_box';
	}

	/**
	* Used internally to get the widgets title.
	*/
	public function get_title() {
		return \Suprementor\Helpers\General::widget_prefix()  . __( 'Post Box',  'suprementor' );
	}

	/**
	* Sets the icon in the Elementor UI, font awesome, https://elementor.github.io/elementor-icons/
	*/
	public function get_icon() {
		return 'eicon-single-post';
	}

	/**
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
		* CONTENT - GET POST
		*/
		$this->start_controls_section(
			'sup_content_get_post',
			[
				'label' => __( 'Get Post', 'suprementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_group_control(
			\Suprementor\Group_Controls\Get_Post::get_type(),
			[
				'name' => 'get_post',
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
					'operator' => '!in',
					'value' => [
						'smart_card_duo',
						'smart_card_mini_duo',
						'smart_cover_duo',
						'smart_boxed_cover_duo',
						'bold_card_duo',
						'bold_card_mini_duo',
						'bold_cover_duo',
						'bold_boxed_cover_duo',
						'news_card_duo',
						'news_card_mini_duo',
						'news_cover_duo',
						'news_boxed_cover_duo',
					]
				]
			]
		];
		\Suprementor\Controls\Post\Scale_Up_Thumbnail::content( $this, $thumbnail_conditions );

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
						'smart_card_mini_duo',
						'smart_cover_duo',
						'smart_boxed_cover_duo',
						'bold_card_duo',
						'bold_card_mini_duo',
						'bold_cover_duo',
						'bold_boxed_cover_duo',
						'news_card_duo',
						'news_card_mini_duo',
						'news_cover_duo',
						'news_boxed_cover_duo',
					]
				]
			]
		];
		\Suprementor\Controls\Post\Responsive_Thumbnail_Duo::content( $this, $thumbnail_duo_conditions );

		/*
		* CONTENT - TITLE
		*/
		$title_conditions = [
			'terms' => [
				[
					'name' => '_skin',
					'operator' => '!in',
					'value' => [
						'news_card',
						'news_cover',
						'news_boxed_cover',
					]
				]
			]
		];

		\Suprementor\Controls\Post\Title::content( $this, $title_conditions );

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
						'news_card_duo',
						'news_cover',
						'news_cover_duo',
						'news_boxed_cover',
						'news_boxed_cover_duo',
					]
				]
			]
		];

		\Suprementor\Controls\Post\Categories_Title_Inline::content( $this, $cti_conditions );

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
						'smart_card_mini',
						'smart_card_mini_duo',
						'smart_card_duo',
						'smart_cover',
						'smart_cover_duo',
						'smart_boxed_cover',
						'smart_boxed_cover_duo',
					]
				]
			]
		];

		\Suprementor\Controls\Post\Meta_Inline::content( $this, $meta_inline_conditions );

		/*
		* CONTENT - EXCCERPT
		*/
		$excerpt_conditions = [
			'terms' => [
				[
					'name' => '_skin',
					'operator' => '!in',
					'value' => [
						'smart_card_mini',
						'smart_card_mini_duo',
						'bold_card_mini',
						'news_card',
						'news_cover',
						'news_boxed_cover',
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
						'bold_card_duo',
						'bold_card_mini',
						'bold_cover',
						'bold_boxed_cover',
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
						'bold_card_duo',
						'bold_cover',
						'bold_boxed_cover',
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
						'bold_card_duo',
						'bold_card_mini',
						'bold_card_mini_duo',
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
						'smart_cover_duo',
						'smart_boxed_cover',
						'smart_boxed_cover_duo',
						'bold_cover',
						'bold_cover_duo',
						'bold_boxed_cover',
						'bold_boxed_cover_duo',
						'news_cover',
						'news_cover_duo',
						'news_boxed_cover',
						'news_boxed_cover_duo',
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
						'smart_card_duo',
						'bold_card',
						'bold_card_duo',
					]
				]
			]
		];

		\Suprementor\Controls\Post\Button::content( $this, $button_conditions );

		/*
		* STYLE - TITLE
		*/
		\Suprementor\Controls\Post\Title::style( $this, $title_conditions );

		/*
		* STYLE - CTI
		*/
		\Suprementor\Controls\Post\Categories_Title_Inline::style( $this, $cti_conditions );

		/*
		* STYLE - META INLINE
		*/
		\Suprementor\Controls\Post\Meta_inline::style( $this, $meta_inline_conditions );

		/*
		* STYLE - EXCERPT
		*/
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
		* STYLE - INNER
		*/
		$this->start_controls_section(
			'sup_style_inner',
			[
				'label' => __( 'Inner', 'suprementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'sup_post_box_inner_padding',
			[
				'label' => __( 'Padding', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .sup-post-box-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
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

	/**
	* Setting this removes the default skin select option.
	*/
	protected $_has_template_content = false;

	/**
	* Adds the skins to the widget Skin select (first control section).
	*/
	protected function _register_skins() {

		// load upgrade skins to ad later
		do_action('suprementor-upgrade/modules/post-box/load-skins');

		// free skins
		$this->add_skin( new \Suprementor\Modules\Post_Box\Skins\Smart_Card( $this ) );
		$this->add_skin( new \Suprementor\Modules\Post_Box\Skins\Smart_Card_Mini( $this ) );
		$this->add_skin( new \Suprementor\Modules\Post_Box\Skins\Smart_Card_Mini_Duo( $this ) );
		$this->add_skin( new \Suprementor\Modules\Post_Box\Skins\Smart_Cover( $this ) );

		// upgrade skins, extends the included base skins
		if ( class_exists( '\Suprementor_Upgrade\Post_Box\Skins\Smart_Card_Duo' ) ) {
			$this->add_skin( new \Suprementor_Upgrade\Post_Box\Skins\Smart_Card_Duo( $this ) );
		} else {
			$this->add_skin( new \Suprementor\Modules\Post_Box\Skins\Smart_Card_Duo( $this ) );
		}

		if ( class_exists( '\Suprementor_Upgrade\Post_Box\Skins\Smart_Cover_Duo' ) ) {
			$this->add_skin( new \Suprementor_Upgrade\Post_Box\Skins\Smart_Cover_Duo( $this ) );
		} else {
			$this->add_skin( new \Suprementor\Modules\Post_Box\Skins\Smart_Cover_Duo( $this ) );
		}

		if ( class_exists( '\Suprementor_Upgrade\Post_Box\Skins\Smart_Boxed_Cover' ) ) {
			$this->add_skin( new \Suprementor_Upgrade\Post_Box\Skins\Smart_Boxed_Cover( $this ) );
		} else {
			$this->add_skin( new \Suprementor\Modules\Post_Box\Skins\Smart_Boxed_Cover( $this ) );
		}

		if ( class_exists( '\Suprementor_Upgrade\Post_Box\Skins\Smart_Boxed_Cover_Duo' ) ) {
			$this->add_skin( new \Suprementor_Upgrade\Post_Box\Skins\Smart_Boxed_Cover_Duo( $this ) );
		} else {
			$this->add_skin( new \Suprementor\Modules\Post_Box\Skins\Smart_Boxed_Cover_Duo( $this ) );
		}

		if ( class_exists( '\Suprementor_Upgrade\Post_Box\Skins\Bold_Card' ) ) {
			$this->add_skin( new \Suprementor_Upgrade\Post_Box\Skins\Bold_Card( $this ) );
		} else {
			$this->add_skin( new \Suprementor\Modules\Post_Box\Skins\Bold_Card( $this ) );
		}

		if ( class_exists( '\Suprementor_Upgrade\Post_Box\Skins\Bold_Card_Duo' ) ) {
			$this->add_skin( new \Suprementor_Upgrade\Post_Box\Skins\Bold_Card_Duo( $this ) );
		} else {
			$this->add_skin( new \Suprementor\Modules\Post_Box\Skins\Bold_Card_Duo( $this ) );
		}

		if ( class_exists( '\Suprementor_Upgrade\Post_Box\Skins\Bold_Card_Mini' ) ) {
			$this->add_skin( new \Suprementor_Upgrade\Post_Box\Skins\Bold_Card_Mini( $this ) );
		} else {
			$this->add_skin( new \Suprementor\Modules\Post_Box\Skins\Bold_Card_Mini( $this ) );
		}

		if ( class_exists( '\Suprementor_Upgrade\Post_Box\Skins\Bold_Card_Mini_Duo' ) ) {
			$this->add_skin( new \Suprementor_Upgrade\Post_Box\Skins\Bold_Card_Mini_Duo( $this ) );
		} else {
			$this->add_skin( new \Suprementor\Modules\Post_Box\Skins\Bold_Card_Mini_Duo( $this ) );
		}

		if ( class_exists( '\Suprementor_Upgrade\Post_Box\Skins\Bold_Cover' ) ) {
			$this->add_skin( new \Suprementor_Upgrade\Post_Box\Skins\Bold_Cover( $this ) );
		} else {
			$this->add_skin( new \Suprementor\Modules\Post_Box\Skins\Bold_Cover( $this ) );
		}

		if ( class_exists( '\Suprementor_Upgrade\Post_Box\Skins\Bold_Cover_Duo' ) ) {
			$this->add_skin( new \Suprementor_Upgrade\Post_Box\Skins\Bold_Cover_Duo( $this ) );
		} else {
			$this->add_skin( new \Suprementor\Modules\Post_Box\Skins\Bold_Cover_Duo( $this ) );
		}

		if ( class_exists( '\Suprementor_Upgrade\Post_Box\Skins\Bold_Boxed_Cover' ) ) {
			$this->add_skin( new \Suprementor_Upgrade\Post_Box\Skins\Bold_Boxed_Cover( $this ) );
		} else {
			$this->add_skin( new \Suprementor\Modules\Post_Box\Skins\Bold_Boxed_Cover( $this ) );
		}

		if ( class_exists( '\Suprementor_Upgrade\Post_Box\Skins\Bold_Boxed_Cover_Duo' ) ) {
			$this->add_skin( new \Suprementor_Upgrade\Post_Box\Skins\Bold_Boxed_Cover_Duo( $this ) );
		} else {
			$this->add_skin( new \Suprementor\Modules\Post_Box\Skins\Bold_Boxed_Cover_Duo( $this ) );
		}

		if ( class_exists( '\Suprementor_Upgrade\Post_Box\Skins\News_Card' ) ) {
			$this->add_skin( new \Suprementor_Upgrade\Post_Box\Skins\News_Card( $this ) );
		} else {
			$this->add_skin( new \Suprementor\Modules\Post_Box\Skins\News_Card( $this ) );
		}

		if ( class_exists( '\Suprementor_Upgrade\Post_Box\Skins\News_Card_Duo' ) ) {
			$this->add_skin( new \Suprementor_Upgrade\Post_Box\Skins\News_Card_Duo( $this ) );
		} else {
			$this->add_skin( new \Suprementor\Modules\Post_Box\Skins\News_Card_Duo( $this ) );
		}

		if ( class_exists( '\Suprementor_Upgrade\Post_Box\Skins\News_Cover' ) ) {
			$this->add_skin( new \Suprementor_Upgrade\Post_Box\Skins\News_Cover( $this ) );
		} else {
			$this->add_skin( new \Suprementor\Modules\Post_Box\Skins\News_Cover( $this ) );
		}

		if ( class_exists( '\Suprementor_Upgrade\Post_Box\Skins\News_Cover_Duo' ) ) {
			$this->add_skin( new \Suprementor_Upgrade\Post_Box\Skins\News_Cover_Duo( $this ) );
		} else {
			$this->add_skin( new \Suprementor\Modules\Post_Box\Skins\News_Cover_Duo( $this ) );
		}

		if ( class_exists( '\Suprementor_Upgrade\Post_Box\Skins\News_Boxed_Cover' ) ) {
			$this->add_skin( new \Suprementor_Upgrade\Post_Box\Skins\News_Boxed_Cover( $this ) );
		} else {
			$this->add_skin( new \Suprementor\Modules\Post_Box\Skins\News_Boxed_Cover( $this ) );
		}

		if ( class_exists( '\Suprementor_Upgrade\Post_Box\Skins\News_Boxed_Cover_Duo' ) ) {
			$this->add_skin( new \Suprementor_Upgrade\Post_Box\Skins\News_Boxed_Cover_Duo( $this ) );
		} else {
			$this->add_skin( new \Suprementor\Modules\Post_Box\Skins\News_Boxed_Cover_Duo( $this ) );
		}

	}

	/**
	* Adds classes and other stuff to the settings array.
	*/
	public function sup_process_settings( $settings ) {

		$settings['sup_wrapper_classes'][] = 'uk-transition-toggle';
		$settings['sup_wrapper_classes'][] = 'uk-overflow-hidden';

		$settings['sup_post_categories_position_classes'][] = 'sup-post-categories-position-processed';
		( empty( $settings['sup_post_categories_position'] ) ) ?: $settings['sup_post_categories_position_classes'][] = $settings['sup_post_categories_position'];

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
				'description' => \Suprementor\Helpers\General::upgrade_skin_description('SUPREMENTOR_UPGRADE_POST_BOX', 'post-box'),
			]
		);

	}

}
