<?php
/*
Widget Name: Client's Image widget
Description: A very simple widget to list client's images.
Author: Rafin/Sudip
*/

class SiteOrigin_Widget_ClientLogo_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'sow-clientlogo',
			__('Kreativa:Client\'s Image', 'siteorigin-widgets'),
			array(
				'description' => __('A list of images of client\'s.', 'siteorigin-widgets'),
				
			),
			array(

			),
			array(
				
	
				'image' => array(
					'type' => 'media',
					'label' => __('Image file', 'siteorigin-widgets'),
				),
				'desc' => array(
					'type' => 'text',
					'label' => __('Text', 'siteorigin-widgets'),
				),	
			),
			plugin_dir_path(__FILE__).'../'
		);
	}

	

	function get_template_name($instance) {
		return 'base';
	}

	function get_style_name($instance) {
		return false;
	}

}

siteorigin_widget_register('clientlogo', __FILE__);