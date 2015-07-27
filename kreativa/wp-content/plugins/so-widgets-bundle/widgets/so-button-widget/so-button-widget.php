<?php
/*
idget Name: Button widget
Description: A powerful yet simple button widget.
Author: Sunil Chaulagain	
Author URI: http://tuchuk.com
*/

class SiteOrigin_Widget_Button_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'sow-button',
			__('Button(Builder)', 'siteorigin-widgets'),
			array(
				'description' => __('A customizable button widget.', 'siteorigin-widgets'),
				
			),
			array(

			),
			array(		
					
				'btntext' => array(
					'type' => 'text',
					'label' => __('Button text', 'siteorigin-widgets'),
				),
				'btnurl' => array(
					'type' => 'text',
					'sanitize' => 'url',
					'label' => __('Destination URL', 'siteorigin-widgets'),
				),

				'new_window' => array(
					'type' => 'checkbox',
					'default' => false,
					'label' => __('Open in a new window', 'siteorigin-widgets'),
				),
				'rounding' => array(
					'type' => 'select',
					'label' => __('Rounding', 'siteorigin-widgets'),
					'default' => 'round',
					'options' => array(
						'slight' => __('Slightly rounded border', 'siteorigin-widgets'),
						'round' => __('Completely rounded border', 'siteorigin-widgets'),
					),
				),
				'size' => array(
					'type' => 'select',
					'label' => __('Button size', 'siteorigin-widgets'),
					'options' => array(
						'sm' => __('Small sized button', 'siteorigin-widgets'),
						'normal' => __('Medium sized button', 'siteorigin-widgets'),
						'lg' => __('Large sized button', 'siteorigin-widgets'),							
					),					
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
				'alt' => array(
					'type' => 'checkbox',
					'label' => __('ALternate style of button?', 'siteorigin-widgets'),
					'descripton'  => __('Transparent colorless Button Style', 'siteorigin-widgets'),
					'descripton' => __('', 'siteorigin-widgets'),
					),	
				'animation' => array(
							'type' => 'select',
							'label' => __('Animation', 'siteorigin-widgets'),
							'options' => array(
								'none' => __('none', 'siteorigin-widgets'),
								'bounce' => __('bounce', 'siteorigin-widgets'),
								'flash' => __('flash', 'siteorigin-widgets'),
								'pulse' => __('pulse', 'siteorigin-widgets'),
								'rubberBand' => __('rubberBand', 'siteorigin-widgets'),
								'shake' => __('shake', 'siteorigin-widgets'),
								'swing' => __('swing', 'siteorigin-widgets'),
								'tada' => __('tada', 'siteorigin-widgets'),
								'wobble' => __('wobble', 'siteorigin-widgets'),
								'bounceIn' => __('bounceIn', 'siteorigin-widgets'),
								'bounceInDown' => __('bounceInDown', 'siteorigin-widgets'),
								'bounceInLeft' => __('bounceInLeft', 'siteorigin-widgets'),
								'bounceInRight' => __('bounceInRight', 'siteorigin-widgets'),
								'bounceInUp' => __('bounceInUp', 'siteorigin-widgets'),
								'fadeIn' => __('fadein', 'siteorigin-widgets'),								
								'fadeInDown' => __('fadeInDown', 'siteorigin-widgets'),
								'fadeInDownBig' => __('fadeInDownBig', 'siteorigin-widgets'),
								'fadeInLeft' => __('fadeInLeft', 'siteorigin-widgets'),
								'fadeInLeftBig' => __('fadeInLeftBig', 'siteorigin-widgets'),
								'fadeInRight' => __('fadeInRight', 'siteorigin-widgets'),
								'fadeInRightBig' => __('fadeInRightBig', 'siteorigin-widgets'),
								'fadeInUp' => __('fadeInUp', 'siteorigin-widgets'),
								'fadeInUpBig' => __('fadeInUpBig', 'siteorigin-widgets'),								
								'flipInX' => __('flipInX', 'siteorigin-widgets'),
								'flipInY' => __('flipInY', 'siteorigin-widgets'),
								'rotateIn' => __('rotateIn', 'siteorigin-widgets'),
								'rotateInDownLeft' => __('rotateInDownLeft', 'siteorigin-widgets'),
								'rotateInDownRight' => __('rotateInDownRight', 'siteorigin-widgets'),
								'rotateInUpLeft' => __('rotateInUpLeft', 'siteorigin-widgets'),
								'rotateInUpRight' => __('rotateInUpRight', 'siteorigin-widgets'),
								'slideInDown' => __('slideindown', 'siteorigin-widgets'),
								'slideInUp' => __('slideinup', 'siteorigin-widgets'),
								'slide' => __('slide', 'siteorigin-widgets'),
								'slideInRight' => __('slideinright', 'siteorigin-widgets'),
								'slideInLeft' => __('slideinleft', 'siteorigin-widgets'),
								'flow' => __('flow', 'siteorigin-widgets'),
								'turn' => __('turn', 'siteorigin-widgets'),
								'pop' => __('pop', 'siteorigin-widgets'),
								'flip' => __('flip', 'siteorigin-widgets'),								
							)
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

siteorigin_widget_register('button', __FILE__);