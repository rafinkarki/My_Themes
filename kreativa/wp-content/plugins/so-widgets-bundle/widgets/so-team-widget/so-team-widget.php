<?php
/*
Widget Name: Team  widget
Description: Displays a team member with their designation and social media url.
Author: Rafin/Sudip
*/
class SiteOrigin_Widget_Team_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'sow-team',
			__( 'Kreativa:Team', 'siteorigin-widgets' ),
			array(
				'description' => __('Displays a team members with their designation.', 'siteorigin-widgets' ),
				
			),
			array(),
			array(
				
				'number' => array(
					'type' => 'text',
					'label' => __('Number of team', 'siteorigin-widgets'),
					'defalut'=>'3'
					),
				'new_window' => array(
					'type' => 'checkbox',
					'label' => __('Open In New Window', 'siteorigin-widgets'),
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
siteorigin_widget_register('team', __FILE__);