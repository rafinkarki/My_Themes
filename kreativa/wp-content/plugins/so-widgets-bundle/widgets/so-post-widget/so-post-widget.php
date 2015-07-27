<?php
/*
Widget Name: Post  widget
Description: Gives you a widget to display your posts.
Author: Rafin/Sudip
*/



class SiteOrigin_Widget_Post_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'sow-post',
			__('Kreativa:Posts', 'siteorigin-widgets'),
			array(
				'description' => __('Display your posts .', 'siteorigin-widgets'),
				
			),
			array(

			),
			array(
				
				'posts' => array(
					'type' => 'posts',
					'label' => __('Posts query', 'siteorigin-widgets'),
				),
			),
			plugin_dir_path(__FILE__).'../'
		);
	}

	function initialize() {
		$this->register_frontend_scripts(
			array(
				array(
					'touch-swipe',
					plugin_dir_url( SOW_BUNDLE_BASE_FILE ) . 'js/jquery.touchSwipe' . SOW_BUNDLE_JS_SUFFIX . '.js',
					array( 'jquery' ),
					'1.6.6'
				),
				array(
					'sow-carousel-basic',
					siteorigin_widget_get_plugin_dir_url( 'post' ) . 'js/carousel' . SOW_BUNDLE_JS_SUFFIX . '.js',
					array( 'jquery', 'touch-swipe' ),
					SOW_BUNDLE_VERSION,
					true
				)
			)
		);
		$this->register_frontend_styles(
			array(
				array(
					'sow-carousel-basic',
					siteorigin_widget_get_plugin_dir_url( 'post' ) . 'css/style.css',
					array(),
					SOW_BUNDLE_VERSION
				)
			)
		);
	}

	function get_template_name($instance){
		return 'base';
	}

	function get_style_name($instance){
		return false;
	}
}

siteorigin_widget_register('post', __FILE__);