<?php
/*
Widget Name: Date Count widget
Description: A very date count widget.
Author: Sunil Chaulagain	
Author URI: http://tuchuk.com
*/

class SiteOrigin_Widget_Date_Count_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'sow-date_count',
			__('Date Count(Builder)', 'siteorigin-widgets'),
			array(
				'description' => __('A simple date count widget .', 'siteorigin-widgets'),
				
			),
			array(

			),
			array(

					
				'date' => array(
					'type' => 'text',
					'label' => __('Enter Release Date', 'siteorigin-widgets'),
					'description' => __('Format: 10 January 2016 for \'Type 1/2\' &  2016-01-10 for \'Type 2\' ', 'siteorigin-widgets'),
				),
				'style' => array(
					'type' => 'select',
					'label' => __('Style', 'siteorigin-widgets'),
					'options' => array(
						'1' => __('Type 1', 'siteorigin-widgets'),
						'2' => __('Type 2(Circular)', 'siteorigin-widgets'),
						'3' => __('Type 3(Container)', 'siteorigin-widgets'),
					)
				),		
				'type' => array(
					'type' => 'section',
					'label' => __('Type 1 & 2 Settings', 'siteorigin-widgets'),
					'hide'	=>'true',
					'fields' => array(
						'color' => array(
							'type' => 'color',
							'label' => __('Choose a Color', 'siteorigin-widgets'),
							'default'=>'#fff',
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

					),
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

siteorigin_widget_register('date_count', __FILE__);