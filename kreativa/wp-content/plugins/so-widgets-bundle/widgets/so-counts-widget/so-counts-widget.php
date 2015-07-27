<?php
/*
Widget Name: Counts Widget
Description: Displays counts.
Version: trunk
Author: Sunil Chaulagain
Author URI: http://tuchuk.com*/
class SiteOrigin_Widget_Counts_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'sow-counts',
			__( 'Counts (Builder)', 'siteorigin-widgets' ),
			array(
				'description' => __( 'Displays a list of counts.', 'siteorigin-widgets' ),
			),
			array(),
			array(
			
				'counts' => array(
					'type' => 'repeater',
					'label' => __('Counts', 'siteorigin-widgets'),
					'item_name' => __('Count', 'siteorigin-widgets'),
					'item_label' => array(
						'selector' => "[id*='counts-text']",
						'update_event' => 'change',
						'value_method' => 'val'
					),
					'fields' => array(
						
						'text' => array(
							'type' => 'text',
							'label' => __('Text', 'siteorigin-widgets'),
						),

						'number' => array(
							'type' => 'text',
							'label' => __('Number', 'siteorigin-widgets'),
						),						
						
					),
				),
				

			),
			plugin_dir_path(__FILE__).'../'
		);
	}

	function get_style_name($instance){
		return false;
	}

	function get_template_name($instance){
		return 'base';
	}

}

siteorigin_widget_register('counts', __FILE__);