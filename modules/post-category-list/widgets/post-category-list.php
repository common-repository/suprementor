<?php

/**
* Post Box Widget.
*/

namespace Suprementor\Modules\Post_Category_List\Widgets;

class Post_Category_List extends \Elementor\Widget_Base {

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
		return 'sup_widget_post_category_list';
	}

	/**
	* Used internally to get the widgets title.
	*/
	public function get_title() {
		return \Suprementor\Helpers\General::widget_prefix()  . __( 'Post Category List',  'suprementor' );
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

		\Suprementor\Controls\Header::content( $this );

		$this->start_controls_section(
			'sup_content_section_pct_list',
			[
				'label' => __( 'Categories List', 'suprementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'sup_content_section_pcl_count_show',
			[
				'label' => __( 'Show Count', 'suprementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'suprementor' ),
				'label_off' => __( 'No', 'suprementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'sup_content_section_pcl_columns_desktop',
			[
				'label' => __( 'Columns Desktop', 'surementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'uk-width-1-2@m',
				'options' => [
					'uk-width-1-1@m'  => __( '1', 'suprementor' ),
					'uk-width-1-2@m' => __( '2', 'suprementor' ),
				],
				'conditions' => [
					'terms' => [
						[
							'name' => '_skin',
							'operator' => 'in',
							'value' => [
								'smart_list',
							]
						]
					]
				]
			]
		);

		$this->add_control(
			'sup_content_section_pcl_columns_tablet',
			[
				'label' => __( 'Columns Tablet', 'surementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'uk-width-1-1@s',
				'options' => [
					'uk-width-1-1@s'  => __( '1', 'suprementor' ),
					'uk-width-1-2@s' => __( '2', 'suprementor' ),
				],
				'conditions' => [
					'terms' => [
						[
							'name' => '_skin',
							'operator' => 'in',
							'value' => [
								'smart_list',
							]
						]
					]
				]
			]
		);

		$this->add_control(
			'sup_content_section_pcl_columns_mobile',
			[
				'label' => __( 'Columns Tablet', 'surementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'uk-width-1-1',
				'options' => [
					'uk-width-1-1'  => __( '1', 'suprementor' ),
					'uk-width-1-2' => __( '2', 'suprementor' ),
				],
				'conditions' => [
					'terms' => [
						[
							'name' => '_skin',
							'operator' => 'in',
							'value' => [
								'smart_list',
							]
						]
					]
				]
			]
		);


		$this->end_controls_section();

		/*
		* STYLE
		*/

		\Suprementor\Controls\Header::style( $this );

		$this->start_controls_section(
			'sup_style_section_pcl_list',
			[
				'label' => __( 'List', 'suprementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'sup_style_section_pcl_link_typography',
				'label' => __( 'Link Typography', 'suprementor' ),
				'selector' => '{{WRAPPER}} .sup-post-category-list-wrap a',
			]
		);

		$this->add_control(
			'sup_style_section_pcl_list_link_color',
			[
				'label' => __( 'Link Color', 'suprementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sup-post-category-list-wrap a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'sup_style_section_pcl_list_link_hover_color',
			[
				'label' => __( 'Link Hover Color', 'suprementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sup-post-category-list-wrap a:hover, {{WRAPPER}} .sup-post-category-list-wrap a:focus' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'sup_style_section_pcl_count_typography',
				'label' => __( 'Count Typography', 'suprementor' ),
				'selector' => '{{WRAPPER}} .sup-post-category-list-wrap .sup-post-category-list-count',
			]
		);


		$this->add_control(
			'sup_style_section_pcl_list_count_color',
			[
				'label' => __( 'Count Color', 'suprementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sup-post-category-list-wrap .sup-post-category-list-count' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'sup_style_section_pcl_list_background_color',
			[
				'label' => __( 'Background Color', 'suprementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sup-post-category-list-wrap' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'sup_style_section_pcl_list_wrap_padding',
			[
				'label' => __( 'Wrap Padding', 'suprementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .sup-post-category-list-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'sup_style_section_pcl_list_item_padding',
			[
				'label' => __( 'Item Padding', 'suprementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .sup-post-category-list-wrap .sup-post-category-list-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		\Suprementor\Controls\Wrapper::style( $this );

	}

	/**
	* Setting this removes the default skin select option.
	*/
	protected $_has_template_content = false;

	/**
	* Adds the skins to the widget Skin select (first control section).
	*/
	protected function _register_skins() {

		$this->add_skin( new \Suprementor\Modules\Post_Category_List\Skins\Smart_List( $this ) );
		$this->add_skin( new \Suprementor\Modules\Post_Category_List\Skins\Smart_Inline( $this ) );

	}

	/**
	* Adds classes and other stuff to the settings array.
	*/
	public function process_settings( $settings ) {

		$settings['sup_content_section_pcl_columns_classes'][] = 'sup-pcl-columns-processed';
		$settings['sup_content_section_pcl_columns_classes'][] = $settings['sup_content_section_pcl_columns_desktop'];
		$settings['sup_content_section_pcl_columns_classes'][] = $settings['sup_content_section_pcl_columns_tablet'];
		$settings['sup_content_section_pcl_columns_classes'][] = $settings['sup_content_section_pcl_columns_mobile'];

		$settings['sup_wrapper_classes'][] = 'uk-transition-toggle';
		$settings['sup_wrapper_classes'][] = 'uk-overflow-hidden';



		return $settings;

	}

}
