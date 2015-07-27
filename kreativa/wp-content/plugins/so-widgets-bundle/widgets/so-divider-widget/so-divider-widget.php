<?php
/*
Widget Name: Divider  widget
Description: A very simple divider widget.
Author: Rafin/Sudip
*/
class SiteOrigin_Widget_Divider_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'sow-divider',
			__('Kreativa:Divider', 'siteorigin-widgets'),
			array(
				'description' => __('A very simple divider widget.', 'siteorigin-widgets'),
				
			),
			array(),
			array(
				
			)
		);
	}
	function get_template_name($instance) {
		return 'simple';
	}
	function get_style_name($instance) {
		return false;
	}

}
siteorigin_widget_register('divider', __FILE__);