<?php
/*
Widget Name: Testimonials widget
Description: Displays clients' point of view.
Author: Rafin/Sudip
*/

class SiteOrigin_Widget_Testimonials_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'sow-testimonials',
			__( 'Kreativa:Testimonials', 'siteorigin-widgets' ),
			array(
				'description' => __( 'Displays feedback from clients with their posts', 'siteorigin-widgets' ),
				
			),
			array(),
			array(
					
				'testimonials' => array(
					'type' => 'repeater',
					'label' => __('Testimonials', 'siteorigin-widgets'),
					'item_name' => __('Testimonial', 'siteorigin-widgets'),
					'item_label' => array(
						'selector' => "[id*='testimonials-title']",
						'update_event' => 'change',
						'value_method' => 'val'
					),
					'fields' => array(
						'title' => array(
							'type' => 'text',
							'label' => __('Name', 'siteorigin-widgets'),
						),
						'text' => array(
							'type' => 'textarea',
							'label' => __('Description', 'siteorigin-widgets')
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

siteorigin_widget_register('testimonials', __FILE__);