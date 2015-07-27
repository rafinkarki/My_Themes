<?php
/*
Widget Name: Price table widget
Description: A powerful yet simple price table widget for your sidebars or Page Builder pages.
Author: Sunil Chaulagain
Author URI: http://tuchuk.com
*/

class SiteOrigin_Widget_PriceTable_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'sow-price-table',
			__('Price Table(Builder)', 'siteorigin-widgets'),
			array(
				'description' => __('A simple Price Table.', 'siteorigin-widgets'),				
			),
			array(

			),
			array(	
				
				'title' => array(
					'type' => 'text',
					'label' => __('Title', 'siteorigin-widgets'),
				),							
				'price' => array(
					'type' => 'text',
					'label' => __('Price', 'siteorigin-widgets'),
				),
				'per' => array(
					'type' => 'text',
					'label' => __('Per', 'siteorigin-widgets'),
					'description' => __('eg:Mon,year,week etc', 'siteorigin-widgets'),
				),						
				'btntext' => array(
					'type' => 'text',
					'label' => __('Button text', 'siteorigin-widgets'),
				),
				'btnurl' => array(
					'type' => 'text',
					'sanitize' => 'url',
					'label' => __('Button URL', 'siteorigin-widgets'),
				),
				'new_window' => array(
					'type' => 'checkbox',
					'default' => false,
					'label' => __('Open in a new window', 'siteorigin-widgets'),
				),
				
				'features' => array(
					'type' => 'repeater',
					'label' => __('Features', 'siteorigin-widgets'),
					'item_name' => __('Feature', 'siteorigin-widgets'),
					'item_label' => array(
						'selector' => "[id*='features-text']",
						'update_event' => 'change',
						'value_method' => 'val'
					),
					'fields' => array(
						'text' => array(
							'type' => 'text',
							'label' => __('Text', 'siteorigin-widgets'),
						),
						
					),
				),
				'featured' => array(
					'type' => 'checkbox',
					'default' => false,
					'label' => __('Is featured table?', 'siteorigin-widgets'),
				),
				'gray' => array(
					'type' => 'checkbox',
					'default' => false,
					'label' => __('Gray Background.', 'siteorigin-widgets'),
					'description' => __('Effective for non featured table', 'siteorigin-widgets'),
				),

			),
			plugin_dir_path(__FILE__).'../'
		);
	}

	
	function get_template_name($instance) {
		return $this->get_style_name($instance);
	}

	function get_style_name($instance) {
		 return 'atom';
		
	}

}

siteorigin_widget_register('price-table', __FILE__);