<?php
/*
Widget Name: CTA Slider widget
Description: A simple call to action slider
Author: Sunil Chaulagain
Author URI: http://tuchuk.com
*/

class SiteOrigin_Widget_CtaSlider_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'sow-ctaslider',
			__( 'kreativa:CTA Slider', 'siteorigin-widgets' ),
			array(
				'description' => __( 'A simple call to action slider', 'siteorigin-widgets' ),
				
			),
			array(),
			array(
					
				'cta' => array(
					'type' => 'repeater',
					'label' => __('Contents', 'siteorigin-widgets'),
					'item_name' => __('Content', 'siteorigin-widgets'),
					'item_label' => array(
						'selector' => "[id*='cta-title']",
						'update_event' => 'change',
						'value_method' => 'val'
					),
					'fields' => array(
						'title' => array(
							'type' => 'text',
							'label' => __('Title', 'siteorigin-widgets'),
						),
						'subtitle' => array(
							'type' => 'text',
							'label' => __('Subtitle', 'siteorigin-widgets'),
						),
						'btntext' => array(
							'type' => 'text',
							'label' => __('Button Text', 'siteorigin-widgets')
						),				

						'btnurl' => array(
							'type' => 'text',
							'label' => __('Button Url', 'siteorigin-widgets'),
						),					
					
					),
				),

				'new_window' => array(
					'type' => 'checkbox',
					'label' => __('Open in new window', 'siteorigin-widgets')
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

siteorigin_widget_register('ctaslider', __FILE__);