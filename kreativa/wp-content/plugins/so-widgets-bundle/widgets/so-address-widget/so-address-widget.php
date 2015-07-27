<?php
/*
Widget Name: Adress widget
Description: Displays a contact address.
Author: Rafin/Sudip
*/
class SiteOrigin_Widget_Address_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'sow-address',
			__( 'Kreativa:Address', 'siteorigin-widgets' ),
			array(
				'description' => __('Displays an contact address details', 'siteorigin-widgets' ),
				
			),
			array(),
			array(		   
							
					'phone' => array(
						'type' => 'text',
						'label' => __('Phone', 'siteorigin-widgets'),
					),
			   
					'email' => array(
						'type' => 'text',
						'label' => __('Email', 'siteorigin-widgets'),
					),				
	
					'website' => array(
						'type' => 'text',
						'label' => __('Website', 'siteorigin-widgets'),
					),
					'link' => array(
						'type' => 'text',
						'label' => __('Link to direct', 'siteorigin-widgets'),
						'description' => __('Phone,Email and Website are directed to this link', 'siteorigin-widgets'),
					),
					'new_window' => array(
						'type' => 'checkbox',
						'label' => __('Open in new window', 'siteorigin-widgets'),
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
siteorigin_widget_register('address', __FILE__);