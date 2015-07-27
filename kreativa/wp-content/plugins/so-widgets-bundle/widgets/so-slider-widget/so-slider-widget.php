<?php
/*
Widget Name: Slider widget
Description: A very simple slider widget.
Author: Rafin/Sudip
*/

class SiteOrigin_Widget_Slider_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'sow-slider',
			__('Kreativa:Slider', 'siteorigin-widgets'),
			array(
				'description' => __('A responsive slider widget that supports images.', 'siteorigin-widgets'),				
				'panels_title' => false,
			),
			array(

			),
			array(

				'frames' => array(
					'type' => 'repeater',
					'label' => __('Slider frames', 'siteorigin-widgets'),
					'item_name' => __('Frame', 'siteorigin-widgets'),
					'item_label' => array(
						'selector' => "[id*='frames-layertitle']",
						'update_event' => 'change',
						'value_method' => 'val'
					),
					'fields' => array(						
						
						'background_image' => array(
							'type' => 'media',
							'library' => 'image',
							'label' => __('Background image', 'siteorigin-widgets'),
						),

						'align' => array(
							'type' => 'select',
							'label' => __('Layer Alignment', 'siteorigin-widgets'),
							'options' => array(
								'left' => __('Left', 'siteorigin-widgets'),
								'right' => __('Right', 'siteorigin-widgets'),
								'center' => __('Center', 'siteorigin-widgets'),
								'500' => __('Boxed View Style', 'siteorigin-widgets'),
							)
						),					
						'layertitle' => array(
							'type' => 'text',
							'label' => __('Layer Heading', 'siteorigin-widgets'),
							'description' => __('Display underlined heading in a slider while boxed view', 'siteorigin-widgets'),
						),
						'title' => array(
							'type' => 'text',
							'label' => __('Layer Title', 'siteorigin-widgets'),
							'description' => __('Display underlined heading in a slider', 'siteorigin-widgets'),
						),

						'layersubtitle' => array(
							'type' => 'textarea',
							'label' => __('Layer Description', 'siteorigin-widgets'),
						),
						'moretext' => array(
							'type' => 'text',
							'label' => __('More Link Text', 'siteorigin-widgets'),
							
						),
						'moreurl' => array(
							'type' => 'text',
							'label' => __('More Link URL', 'siteorigin-widgets'),
						
						),
						
					),
				),
				'new_window' => array(
					'type' => 'checkbox',
					'label' => __('Open in New Window', 'siteorigin-widgets'),
					'default' => false,
				),

				'speed' => array(
					'type' => 'number',
					'label' => __('Animation speed', 'siteorigin-widgets'),
					'description' => __('Animation speed in milliseconds.', 'siteorigin-widgets'),
					'default' => 300,
				),
				'animation' => array(
							'type' => 'select',
							'label' => __('Animation', 'siteorigin-widgets'),
							'options' => array(
								'none' => __('none', 'siteorigin-widgets'),							
								'slidedown' => __('slidedown', 'siteorigin-widgets'),
								'slideup' => __('slideup', 'siteorigin-widgets'),
								'slide' => __('slide', 'siteorigin-widgets'),
								'slidefade' => __('slidefade', 'siteorigin-widgets'),
								'flow' => __('flow', 'siteorigin-widgets'),
								'turn' => __('turn', 'siteorigin-widgets'),
								'pop' => __('pop', 'siteorigin-widgets'),
								'flip' => __('flip', 'siteorigin-widgets'),
								'fade' => __('fade', 'siteorigin-widgets'),
								
							)
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

siteorigin_widget_register('slider', __FILE__);
