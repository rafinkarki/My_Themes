<?php
/*
Widget Name: Portfolio widget
Description: A simple portfolio widget to display project.
Author: Rafin/Sudip
*/

class SiteOrigin_Widget_Portfolio_Widget extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'sow-portfolio',
			__('Kreativa:Portfolio', 'siteorigin-widgets'),
			array(
				'description' => __('A customizable portfolio widget.', 'siteorigin-widgets'),
			),
			array(

			),
			array(
				'number' => array(
					'type' => 'text',
					'label' => __('Number of Portfolio Projects', 'siteorigin-widgets'),
					'default'=>'5',
				),
				'align' => array(
					'type' => 'select',
					'label' => __('Navigation Alignment', 'siteorigin-widgets'),
					'options' => array(
						'left' => __('Left', 'siteorigin-widgets'),
						'right' => __('Right', 'siteorigin-widgets'),
						'center' => __('Center', 'siteorigin-widgets'),
					)
				),

				'layout' => array(
							'type' => 'select',
							'label' => __('Portfolio theme', 'siteorigin-widgets'),
							'default' => 'atom',
							'options' => array(
								'recent'   =>'Recent Portfolio',                              
                                'atom'   =>'Normal 3 Columns Portfolio',             
							),
						),


				),
		
			plugin_dir_path(__FILE__)
		);

	}
	function get_style_name($instance){
		return false;
	}

	function get_template_name($instance) {
		
		return $instance['layout'];
	}

}

siteorigin_widget_register('portfolio', __FILE__);