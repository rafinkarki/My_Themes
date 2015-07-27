<?php
/*
Widget Name: Features widget
Description: Displays a block of features with icons.
Author: Rafin/Sudip
*/

class SiteOrigin_Widget_Features_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'sow-features',
			__( 'Kreativa:Features', 'siteorigin-widgets' ),
			array(
				'description' => __( 'Displays a list of features with icons and title.', 'siteorigin-widgets' ),
				
			),
			array(),
			array(
			
				
						'icon' => array(
							'type' => 'icon',
							'label' => __('Icon', 'siteorigin-widgets'),
						),
						
						'title' => array(
							'type' => 'text',
							'label' => __('Title text', 'siteorigin-widgets'),
						),

						'subtitle' => array(
							'type' => 'text',
							'label' => __('Description', 'siteorigin-widgets'),
						
						),
						'btntext' => array(
								'type' => 'text',
								'label' => __('Button Text', 'siteorigin-widgets'),
							
							),
						'btnurl' => array(
								'type' => 'text',
								'label' => __('Button Url', 'siteorigin-widgets'),
							
							),
						'new_window' => array(
								'type' => 'checkbox',
								'label' => __('Open in new window', 'siteorigin-widgets'),
							
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

siteorigin_widget_register('features', __FILE__);