<?php

namespace Suprementor\Modules\Author_Info\Widgets;

class Author_Info extends \Elementor\Widget_Base {

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
		return 'sup_widget_author_info';
	}

	/**
	* Used internally to get the widgets title.
	*/
	public function get_title() {
		return \Suprementor\Helpers\General::widget_prefix()  . __( 'Author Info',  'suprementor' );
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
		* CONTENT - SKIN
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
		* CONTENT - SOURCE
		*/
		\Suprementor\Controls\Author\Source::content( $this );

		/*
		* CONTENT - THUMBNAIL
		*/
		$thumbnail_conditions = [
			'terms' => [
				[
					'name' => '_skin',
					'operator' => 'in',
					'value' => [
						'smart_about',
						'smart_card',
						'smart_card_alt',
						'smart_boxed_cover',
						'smart_cover',
					]
				]
			]
		];
		\Suprementor\Controls\Author\Scale_Up_Thumbnail::content( $this, $thumbnail_conditions );

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
						'smart_card_alt_duo',
						'smart_boxed_cover_duo',
						'smart_cover_duo',
					]
				]
			]
		];
		\Suprementor\Controls\Author\Responsive_Thumbnail_Duo::content( $this, $thumbnail_duo_conditions );

		/*
		* CONTENT - DISPLAY NAME
		*/
		\Suprementor\Controls\Author\Display_Name::content( $this );

		/*
		* CONTENT - SNIPPET
		*/
		\Suprementor\Controls\Author\Snippet::content( $this );

		/*
		* CONTENT - BIO
		*/
		\Suprementor\Controls\Author\Bio::content( $this );

		/*
		* CONTENT - SOCIAL ICONS
		*/
		$social_icons_conditions = [
			'terms' => [
				[
					'name' => '_skin',
					'operator' => 'in',
					'value' => [
						'smart_card_alt',
						'smart_card_alt_duo',
						'smart_about',
					]
				]
			]
		];

		\Suprementor\Controls\Author\Social_Icons::content( $this, $social_icons_conditions );

		/*
		* CONTENT - COLUMNS
		*/
		$columns_conditions = [
			'terms' => [
				[
					'name' => '_skin',
					'operator' => 'in',
					'value' => [
						'smart_about',
					]
				]
			]
		];

		\Suprementor\Controls\Columns::content( $this, $columns_conditions );

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
						'smart_cover_duo',
						'smart_boxed_cover_duo',
					]
				]
			]
		];
		\Suprementor\Controls\Cover::content( $this, $cover_conditions );

		/*
		* CONTENT - BUTTON
		*/
		\Suprementor\Controls\Author\Button::content( $this );

		/*
		* STYLE - DISPLAY NAME
		*/
		$dispaly_name_conditions = [
			'terms' => [
				[
					'name' => 'sup_author_display_name_show',
					'operator' => '=',
					'value' => 'yes'
				]
			]
		];
		\Suprementor\Controls\Author\Display_Name::style( $this, $dispaly_name_conditions );

		/*
		* STYLE - SNIPPET
		*/
		$snippet_conditions = [
			'terms' => [
				[
					'name' => 'sup_author_snippet_show',
					'operator' => '=',
					'value' => 'yes'
				]
			]
		];
		\Suprementor\Controls\Author\Snippet::style( $this, $snippet_conditions );

		/*
		* STYLE - BIO
		*/
		$bio_conditions = [
			'terms' => [
				[
					'name' => 'sup_author_bio_show',
					'operator' => '=',
					'value' => 'yes'
				]
			]
		];
		\Suprementor\Controls\Author\Bio::style( $this, $bio_conditions );

		/*
		* STYLE - SOCIAL ICONS
		*/
		$social_icons_conditions = [
			'relation' => 'and',
			'terms' => [
				[
					'name' => '_skin',
					'operator' => 'in',
					'value' => [
						'smart_about',
						'smart_card_alt',
						'smart_card_alt_duo',
					]
				],
				[
					'name' => 'sup_author_social_icons_show',
					'operator' => '=',
					'value' => 'yes'
				]
			]
		];
		\Suprementor\Controls\Author\Social_Icons::style( $this, $social_icons_conditions );

		/*
		* STYLE - THUMBNAIL
		*/
		$this->start_controls_section(
			'sup_style_section_author_info_thumbnail',
			[
				'label' => __( 'Thumbnail', 'suprementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'conditions' => [
					'relation' => 'and',
					'terms' => [
						[
							'name' => '_skin',
							'operator' => 'in',
							'value' => [
								'smart_about',
							]
						],
						[
							'name' => 'sup_author_scale_up_thumbnail_show',
							'operator' => '=',
							'value' => 'yes'
						]
					]
				]
			]
		);

		$this->add_responsive_control(
			'sup_author_info_thumbnail_padding',
			[
				'label' => __( 'Padding', 'suprementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .sup-author-info-thumbnail-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'conditions' => [
					'terms' => [
						[
							'name' => '_skin',
							'operator' => 'in',
							'value' => [
								'smart_about',
							]
						]
					]
				]
			]
		);

		$this->end_controls_section();

		/*
		* STYLE - INNER
		*/
		$this->start_controls_section(
			'sup_style_section_author_info_inner',
			[
				'label' => __( 'Inner', 'suprementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'sup_author_info_inner_padding',
			[
				'label' => __( 'Padding', 'suprementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .sup-author-info-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		/*
		* STYLE - BUTTON
		*/
		\Suprementor\Controls\Author\Button::style( $this );

		/*
		* STYLE - FOOTER
		*/
		$footer_conditions = [
			'terms' => [
				[
					'name' => '_skin',
					'operator' => 'in',
					'value' => [
						'smart_card_alt',
						'smart_card_alt_duo',
					]
				]
			]
		];
		\Suprementor\Controls\Footer::style( $this, $footer_conditions );

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

		// load upgrade skins
		do_action('suprementor-upgrade/modules/author-info/load-skins');

		// free skins
		$this->add_skin( new \Suprementor\Modules\Author_Info\Skins\Smart_Card( $this ) );
		$this->add_skin( new \Suprementor\Modules\Author_Info\Skins\Smart_About( $this ) );

		// upgrade skins, extends the included base skins
		if ( class_exists( '\Suprementor_Upgrade\Author_Info\Skins\Smart_Card_Duo' ) ) {
			$this->add_skin( new \Suprementor_Upgrade\Author_Info\Skins\Smart_Card_Duo( $this ) );
		} else {
			$this->add_skin( new \Suprementor\Modules\Author_Info\Skins\Smart_Card_Duo( $this ) );
		}

		if ( class_exists( '\Suprementor_Upgrade\Author_Info\Skins\Smart_Boxed_Cover_Duo' ) ) {
			$this->add_skin( new \Suprementor_Upgrade\Author_Info\Skins\Smart_Boxed_Cover_Duo( $this ) );
		} else {
			$this->add_skin( new \Suprementor\Modules\Author_Info\Skins\Smart_Boxed_Cover_Duo( $this ) );
		}

		if ( class_exists( '\Suprementor_Upgrade\Author_Info\Skins\Smart_Card_Alt' ) ) {
			$this->add_skin( new \Suprementor_Upgrade\Author_Info\Skins\Smart_Card_Alt( $this ) );
		} else {
			$this->add_skin( new \Suprementor\Modules\Author_Info\Skins\Smart_Card_Alt( $this ) );
		}

		if ( class_exists( '\Suprementor_Upgrade\Author_Info\Skins\Smart_Card_Alt_Duo' ) ) {
			$this->add_skin( new \Suprementor_Upgrade\Author_Info\Skins\Smart_Card_Alt_Duo( $this ) );
		} else {
			$this->add_skin( new \Suprementor\Modules\Author_Info\Skins\Smart_Card_Alt_Duo( $this ) );
		}

		if ( class_exists( '\Suprementor_Upgrade\Author_Info\Skins\Smart_Boxed_Cover' ) ) {
			$this->add_skin( new \Suprementor_Upgrade\Author_Info\Skins\Smart_Boxed_Cover( $this ) );
		} else {
			$this->add_skin( new \Suprementor\Modules\Author_Info\Skins\Smart_Boxed_Cover( $this ) );
		}

		if ( class_exists( '\Suprementor_Upgrade\Author_Info\Skins\Smart_Cover' ) ) {
			$this->add_skin( new \Suprementor_Upgrade\Author_Info\Skins\Smart_Cover( $this ) );
		} else {
			$this->add_skin( new \Suprementor\Modules\Author_Info\Skins\Smart_Cover( $this ) );
		}

		if ( class_exists( '\Suprementor_Upgrade\Author_Info\Skins\Smart_Cover_Duo' ) ) {
			$this->add_skin( new \Suprementor_Upgrade\Author_Info\Skins\Smart_Cover_Duo( $this ) );
		} else {
			$this->add_skin( new \Suprementor\Modules\Author_Info\Skins\Smart_Cover_Duo( $this ) );
		}

	}

	/**
	* Adds classes and other stuff to the settings array.
	*/
	public function sup_process_settings( $settings ) {

		$settings['sup_button_show'] = 'yes';

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
				'description' => \Suprementor\Helpers\General::upgrade_skin_description('SUPREMENTOR_UPGRADE_AUTHOR_INFO', 'author-info'),
			]
		);

	}

}
