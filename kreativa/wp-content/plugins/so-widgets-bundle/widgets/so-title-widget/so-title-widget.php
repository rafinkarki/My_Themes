<?php
/*
Widget Name: Title widget
Description: Displays Title with subtitle
Author: Rafin/Sudip
*/
class SiteOrigin_Widget_Title_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'sow-title',
			__('Kreativa:Title', 'siteorigin-widgets'),
			array(
				'description' => __('A simple title widget.', 'siteorigin-widgets'),
				
			),
			array(
				),
			array(

				'title' => array(
					'type' => 'text',
					'label' => __('Title Text', 'siteorigin-widgets'),
				),
				'subtitle' => array(
					'type' => 'textarea',
					'label' => __('Sub Title Text', 'siteorigin-widgets'),
				),			

				'size' => array(
					'type' => 'select',
					'label' => __('Title Size', 'siteorigin-widgets'),
					'options' => array(
						'1' => __('H1', 'siteorigin-widgets'),
						'2' => __('H2', 'siteorigin-widgets'),
						'3' => __('H3', 'siteorigin-widgets'),
						'4' => __('H4', 'siteorigin-widgets'),
						'5' => __('H5', 'siteorigin-widgets'),
						'6' => __('H6', 'siteorigin-widgets'),
						
					)
				),

				'align' => array(
					'type' => 'select',
					'label' => __('Alignment', 'siteorigin-widgets'),
					'options' => array(
						'left' => __('Left', 'siteorigin-widgets'),
						'right' => __('Right', 'siteorigin-widgets'),
						'center' => __('Center', 'siteorigin-widgets'),
					)
				),
			)
		);
	}


	function get_style_name($instance){
		return false;
	}

	function get_template_name($instance){
		return 'base';
	}
}
siteorigin_widget_register('title', __FILE__);