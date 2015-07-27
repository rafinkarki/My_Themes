<?php
/**
 * Shortcodes Visual Composer integration
 *
 * @package tera
 * @since tera 1.0
 */

add_action( 'init', 'ts_integrateWithVC' );

function ts_integrateWithVC() {
	
	if (!function_exists('vc_map')) {
		return;
	}
	
/*----------------------------------------------------------------------------*
 * Service
 *----------------------------------------------------------------------------*/
	vc_map( 
		array(
			'name' => __('Service', 'kreativa'),
			'base' => 'icon',
			'class' => '',
			'category' => __('Content', 'kreativa'),
			'admin_enqueue_js' => '',
			'admin_enqueue_css' => '',
			"params" => array(
			array(
				"type" => "textfield",
				"heading" => "Heading Text",
				"param_name" => "heading",
				"admin_label" => true,
				"value" => "",
				'description' => 'The heading text that will be displayed at box top.',
			),

			array(
				"type" => "dropdown",
				"heading" => "Heading Tag",
				"param_name" => "heading_tag",
				"value" => array(
					"Default"   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",   
					"h5" => "h5",   
					"h6" => "h6",   
				),
				"description" => "The heading tag that will be used in the heading text.",
			),

			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Icon Family", 'kreativa'),
				"param_name" => "ico_family",
				"value" => array(
					'Font Awesome' => '',
					'Elegant Icons' => 'el el-',
					'Custom' => 'custom',
				),
				"description" => __("Select the icon family.", 'kreativa'),
			),

			array(
				"type" => "textfield",
				"heading" => __("Custom Icon Class", 'kreativa'),
				"param_name" => "ico_custom",
				"description" => __("Type a custom icon class to be used in the icon.", 'kreativa'),
				'dependency' => array('element' => 'ico_family', 'value' => 'custom'),
			),

			array(
				"type" => "textfield",
				"heading" => __("Icon Name", 'kreativa'),
				"param_name" => "ico",
				"description" => __("Type icon name without prefixes, e.g. cogs or eye.", 'kreativa'),
			),

			
			
			array(
				"type" => "textarea_html",
				"heading" => "Content",
				"param_name" => "content",
				"value" => "<li>Web Development</li><li>Security Research</li><li>Advanced Topics</li>",
				"description" => "The list that will be showed as the box content.",
			),

			

			array(
				"type" => "textfield",
				"heading" => __("Extra class name", 'kreativa'),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'kreativa')
			),

			array(
				'type' => 'dropdown',
				'heading' => __( 'Template', 'kreativa' ),
				'param_name' => 'template',
				'admin_label' => true,
				'value' => array(
					__( 'Default', 'kreativa' ) => 'style1',
					'style1' => 'style1',
					'style2' => 'style2',
					'style3' => 'style3',
					'style4' => 'style4',
					'style5' => 'style5',
					'style6' => 'style6',
					'style7' => 'style7',
					'style8' => 'style8',
				),
				'description' => __( 'Select a default template to start and maybe customize it. Usually the templates are added by themes.', 'kreativa' )
			),

			
		)
		)
	);

/*----------------------------------------------------------------------------*
 * Title
 *----------------------------------------------------------------------------*/

	vc_map( 
		array(
			'name' => __('Title', 'kreativa'),
			'base' => 'title',
			'class' => '',
			'category' => __('Kreativa', 'kreativa'),
			'admin_enqueue_js' => '',
			'admin_enqueue_css' => '',
			"params" => array(
			
			array(
				"type" => "textfield",
				"heading" => "Heading Text",
				"param_name" => "heading",
				"admin_label" => true,
				"value" => "",
				'description' => 'The text that will be used as heading.',
			),

			array(
				"type" => "dropdown",
				"heading" => "Heading Tag",
				"param_name" => "heading_tag",
				"value" => array(
					"Default"   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",   
					"h5" => "h5",   
					"h6" => "h6",   
				),
				"description" => "The heading tag that will be used in the heading text.",
			),
			

			array(
				'type' => 'dropdown',
				'heading' => __( 'Align', 'kreativa' ),
				'param_name' => 'align',
				'admin_label' => true,
				'value' => array(
					__( 'Left', 'kreativa' ) => 'left',
					'Right' => 'right',
					'Center' => 'Center',
				),
				'description' => __( 'Select a default template to start and maybe customize it. Usually the templates are added by themes.', 'kreativa' )
			),

			
		)
		)
	);	


/*----------------------------------------------------------------------------*
 * Divider
 *----------------------------------------------------------------------------*/

	vc_map( 
		array(
			'name' => __('Divider', 'kreativa'),
			'base' => 'divider',
			'class' => '',
			'category' => __('Kreativa', 'kreativa'),
			'admin_enqueue_js' => '',
			'admin_enqueue_css' => '',
			"params" => array(
					array(
						"type" => "dropdown",
						"heading" => "Divider Style",
						"param_name" => "style",
						"value" => array(
							"Normal"   => "",
							"Dashed" => "br-dashed",
							"Dotted" => "br-dotted",
							"Unique" => "unique",   
						),
						"description" => "The style of the divider.",
					),
			
		)
		)
	);	


/*----------------------------------------------------------------------------*
 * Message
 *----------------------------------------------------------------------------*/

	vc_remove_param( "vc_message", "el_class" );
	vc_remove_param( "vc_message", "css_animation" );
	vc_remove_param( "vc_message", "style" );

	vc_add_param('vc_message',array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Message Box Type", 'kreativa'),
					"param_name" => "color",
					"value" => array(
						"Notification" => 'notification',
						"Success" => 'success',
						"Danger" => 'danger',
						"Alert" => 'alert',
						"Custom" => 'custom',
						),
					"description" => __("Select the way message box will be displayed", 'kreativa'),
				)
	);
	vc_add_param('vc_message',array(
						"type" => "textfield",
						"class" => "",
						"heading" => __("Font Awesome Icon", 'kreativa'),
						"param_name" => "icon",
						"value" => 'lightbulb-o',
						'description' => 'Enter a font awesome icon class just name without fa-',
					)
	);

		vc_add_param('vc_message',array(
						"type" => "dropdown",
						"class" => "",
						"heading" => __("Message Box Type", 'kreativa'),
						"param_name" => "box_bg",
						"value" => array(
							"White" =>'bg-white' ,
							"Black" => 'bg-black',
							"Blue" => 'bg-blue',
							"Dark Blue" => 'bg-dark-blue',
							"Light Blue" => 'bg-light-blue',
							"Turquoise Blue" => 'bg-turquoise-blue',
							"Gray" => 'bg-gray',
							"Dark Gray" => 'bg-dark-gray',
							"Periwinkle Gray" => 'bg-periwinkle-gray',
							"Botticelli Gray" => 'bg-botticelli-gray',
							"Light Gray"=> 'bg-light-gray' ,
							"Silver" => 'bg-silver',
							"Orange"=> 'bg-orange' ,
							"Dark Orange" => 'bg-dark-orange',
							"Bittersweet" => 'bg-bittersweet',
							"Green" => 'bg-green',
							"Dark Green" => 'bg-dark-green',
							"Turquoise"=> 'bg-turquoise'  ,
							"Purple"  => 'bg-purple',
							"Dark Purple" => 'bg-dark-purple',
							"Pink" => 'bg-pink',
							"Cranberry" => 'bg-cranberry',
							"Yellow" => 'bg-yellow',
							"Red" => 'bg-red',
							),
						"description" => __("Select the way message box will be displayed", 'kreativa'),
						"dependency" => array( 'element' => 'color', 'value' => array('custom') ),
					)
			);

			vc_add_param('vc_message',array(
						"type" => "dropdown",
						"class" => "",
						"heading" => __("Message Box Color", 'kreativa'),
						"param_name" => "box_color",
						"value" => array(
							"White" =>'color-white' ,
							"Black" => 'color-black',
							"Blue" => 'color-blue',
							"Dark Blue" => 'color-dark-blue',
							"Light Blue" => 'color-light-blue',
							"Turquoise Blue" => 'color-turquoise-blue',
							"Gray" => 'color-gray',
							"Dark Gray" => 'color-dark-gray',
							"Periwinkle Gray" => 'color-periwinkle-gray',
							"Botticelli Gray" => 'color-botticelli-gray',
							"Light Gray"=> 'color-light-gray' ,
							"Silver" => 'color-silver',
							"Orange"=> 'color-orange' ,
							"Dark Orange" => 'color-dark-orange',
							"Bittersweet" => 'color-bittersweet',
							"Green" => 'color-green',
							"Dark Green" => 'color-dark-green',
							"Turquoise"=> 'color-turquoise'  ,
							"Purple"  => 'color-purple',
							"Dark Purple" => 'color-dark-purple',
							"Pink" => 'color-pink',
							"Cranberry" => 'color-cranberry',
							"Yellow" => 'color-yellow',
							"Red" => 'color-red',
							),
						"description" => __("Select the way message box will be displayed", 'kreativa'),
						"dependency" => array( 'element' => 'color', 'value' => array('custom') ),
					)
			);

			vc_add_param('vc_message',array(
						"type" => "dropdown",
						"class" => "",
						"heading" => __("Message Box Border Color", 'kreativa'),
						"param_name" => "box_br_color",
						"value" => array(
							"White" =>'br-color-white' ,
							"Black" => 'br-color-black',
							"Blue" => 'br-color-blue',
							"Dark Blue" => 'br-color-dark-blue',
							"Light Blue" => 'br-color-light-blue',
							"Turquoise Blue" => 'br-color-turquoise-blue',
							"Gray" => 'br-color-gray',
							"Dark Gray" => 'br-color-dark-gray',
							"Periwinkle Gray" => 'br-color-periwinkle-gray',
							"Botticelli Gray" => 'br-color-botticelli-gray',
							"Light Gray"=> 'br-color-light-gray' ,
							"Silver" => 'br-color-silver',
							"Orange"=> 'br-color-orange' ,
							"Dark Orange" => 'br-color-dark-orange',
							"Bittersweet" => 'br-color-bittersweet',
							"Green" => 'br-color-green',
							"Dark Green" => 'br-color-dark-green',
							"Turquoise"=> 'br-color-turquoise'  ,
							"Purple"  => 'br-color-purple',
							"Dark Purple" => 'br-color-dark-purple',
							"Pink" => 'br-color-pink',
							"Cranberry" => 'br-color-cranberry',
							"Yellow" => 'br-color-yellow',
							"Red" => 'br-color-red',
							),
						"description" => __("Select the way message box will be displayed", 'kreativa'),
						"dependency" => array( 'element' => 'color', 'value' => array('custom') ),
					)
			);

			vc_add_param('vc_message',array(
						"type" => "dropdown",
						"class" => "",
						"heading" => __("Message Box Border Thickness", 'kreativa'),
						"param_name" => "box_br_thickness",
						"value" => array(
							"Light" => 'br-light',
							"Semi Light" => 'br-semi-light',
							"Medium"=> 'br-medium' ,
							"Semi Thick" => 'br-semi-thick',
							"Thick"=> 'br-thick' ,
							),
						"description" => __("Select the way message box will be displayed", 'kreativa'),
						"dependency" => array( 'element' => 'color', 'value' => array('custom') ),
					)
			);

			vc_add_param('vc_message',array(
						"type" => "dropdown",
						"class" => "",
						"heading" => __("Message Box Border Style", 'kreativa'),
						"param_name" => "box_br_style",
						"value" => array(
							"Solid" => 'br-solid',
							"Dashed" => 'br-dashed',
							"Dotted" => 'br-dotted',
							"Double" => 'br-double',
							),
						"description" => __("Select the way message box will be displayed", 'kreativa'),
						"dependency" => array( 'element' => 'color', 'value' => array('custom') ),
					)
			);



/*----------------------------------------------------------------------------*
 * Button
 *----------------------------------------------------------------------------*/

			vc_remove_param( "vc_button", "el_class" );

			vc_add_param('vc_button',array(
						"type" => "dropdown",
						"class" => "",
						"heading" => __("Background", 'kreativa'),
						"param_name" => "color",
						"value" => array(
							"Default"   => "bg-blue",
							"White" =>'bg-white' ,
							"Black" => 'bg-black',
							"Blue" => 'bg-blue',
							"Dark Blue" => 'bg-dark-blue',
							"Light Blue" => 'bg-light-blue',
							"Turquoise Blue" => 'bg-turquoise-blue',
							"Gray" => 'bg-gray',
							"Dark Gray" => 'bg-dark-gray',
							"Periwinkle Gray" => 'bg-periwinkle-gray',
							"Botticelli Gray" => 'bg-botticelli-gray',
							"Light Gray"=> 'bg-light-gray' ,
							"Silver" => 'bg-silver',
							"Orange"=> 'bg-orange' ,
							"Dark Orange" => 'bg-dark-orange',
							"Bittersweet" => 'bg-bittersweet',
							"Green" => 'bg-green',
							"Dark Green" => 'bg-dark-green',
							"Turquoise"=> 'bg-turquoise'  ,
							"Purple"  => 'bg-purple',
							"Dark Purple" => 'bg-dark-purple',
							"Pink" => 'bg-pink',
							"Cranberry" => 'bg-cranberry',
							"Yellow" => 'bg-yellow',
							"Red" => 'bg-red',
							),
						"description" => __("Background color of the button", 'kreativa'),
					)
			);

			vc_add_param('vc_button',array(
						"type" => "dropdown",
						"class" => "",
						"heading" => __("Font", 'kreativa'),
						"param_name" => "text_color",
						"value" => array(
							"White" =>'color-white' ,
							"Black" => 'color-black',
							"Blue" => 'color-blue',
							"Dark Blue" => 'color-dark-blue',
							"Light Blue" => 'color-light-blue',
							"Turquoise Blue" => 'color-turquoise-blue',
							"Gray" => 'color-gray',
							"Dark Gray" => 'color-dark-gray',
							"Periwinkle Gray" => 'color-periwinkle-gray',
							"Botticelli Gray" => 'color-botticelli-gray',
							"Light Gray"=> 'color-light-gray' ,
							"Silver" => 'color-silver',
							"Orange"=> 'color-orange' ,
							"Dark Orange" => 'color-dark-orange',
							"Bittersweet" => 'color-bittersweet',
							"Green" => 'color-green',
							"Dark Green" => 'color-dark-green',
							"Turquoise"=> 'color-turquoise'  ,
							"Purple"  => 'color-purple',
							"Dark Purple" => 'color-dark-purple',
							"Pink" => 'color-pink',
							"Cranberry" => 'color-cranberry',
							"Yellow" => 'color-yellow',
							"Red" => 'color-red',
							),
						"description" => __("Font color of the button", 'kreativa'),
					)
			);

			vc_add_param('vc_button',array(
							"type" => "textfield",
							"class" => "",
							"heading" => __("Font Awesome Icon", 'kreativa'),
							"param_name" => "icon",
							"value" => 'lightbulb-o',
							'description' => 'Enter a font awesome icon class just name without fa-',
						)
			);

			vc_add_param('vc_button',array(
						"type" => "dropdown",
						"class" => "",
						"heading" => __("Icon Size", 'kreativa'),
						"param_name" => "size",
						"value" => array(
							"Normal" => '',
							"Small" => 'small',
							"Big" => 'Big',
							),
						"description" => __("The size of the button", 'kreativa'),
					)
			);

			vc_add_param('vc_button',array(
						"type" => "dropdown",
						"class" => "",
						"heading" => __("Icon Position", 'kreativa'),
						"param_name" => "position",
						"value" => array(
							"Default" => '',
							"Left" => 'left',
							"Center" => 'center',
							"Right" => 'right',
							),
						"description" => __("The position of the button", 'kreativa'),
					)
			);

			vc_add_param('vc_button',array(
						"type" => "dropdown",
						"class" => "",
						"heading" => __("Icon Style", 'kreativa'),
						"param_name" => "style",
						"value" => array(
							"Default" => 'normal',
							"Flat" => 'flat',
							"Shaped" => 'shaped',
							"3D" => 'b3d',
							"Unfilled" => 'unfilled',

							),
						"description" => __("The style of the button", 'kreativa'),
					)
			);

			vc_add_param('vc_button',array(
						"type" => "dropdown",
						"class" => "",
						"heading" => __("Border Thickness", 'kreativa'),
						"param_name" => "br_thickness",
						"value" => array(
							"Light" => 'br-light',
							"Semi Light" => 'br-semi-light',
							"Medium"=> 'br-medium' ,
							"Semi Thick" => 'br-semi-thick',
							"Thick"=> 'br-thick' ,
							),
						"description" => __("The border Thickness of the button", 'kreativa'),
						"dependency" => array( 'element' => 'style', 'value' => array('unfilled') ),
					)
			);
			vc_add_param('vc_button',array(
						"type" => "dropdown",
						"class" => "",
						"heading" => __("Border Color", 'kreativa'),
						"param_name" => "br_color",
						"value" => array(
							"White" =>'br-color-white' ,
							"Black" => 'br-color-black',
							"Blue" => 'br-color-blue',
							"Dark Blue" => 'br-color-dark-blue',
							"Light Blue" => 'br-color-light-blue',
							"Turquoise Blue" => 'br-color-turquoise-blue',
							"Gray" => 'br-color-gray',
							"Dark Gray" => 'br-color-dark-gray',
							"Periwinkle Gray" => 'br-color-periwinkle-gray',
							"Botticelli Gray" => 'br-color-botticelli-gray',
							"Light Gray"=> 'br-color-light-gray' ,
							"Silver" => 'br-color-silver',
							"Orange"=> 'br-color-orange' ,
							"Dark Orange" => 'br-color-dark-orange',
							"Bittersweet" => 'br-color-bittersweet',
							"Green" => 'br-color-green',
							"Dark Green" => 'br-color-dark-green',
							"Turquoise"=> 'br-color-turquoise'  ,
							"Purple"  => 'br-color-purple',
							"Dark Purple" => 'br-color-dark-purple',
							"Pink" => 'br-color-pink',
							"Cranberry" => 'br-color-cranberry',
							"Yellow" => 'br-color-yellow',
							"Red" => 'br-color-red',
							),
						"description" => __("The border color of the button", 'kreativa'),
						"dependency" => array( 'element' => 'style', 'value' => array('unfilled') ),
					)
			);


/*----------------------------------------------------------------------------*
 * Tabs
 *----------------------------------------------------------------------------*/


vc_remove_param( "vc_tabs", "el_class" );
vc_remove_param( "vc_tabs", "interval" );
vc_remove_param( "vc_tabs", "title" );
vc_add_param('vc_tabs',array(
						'type' => 'checkbox',
						'heading' => __( 'Side Tabs?', 'js_composer' ),
						'param_name' => 'sidetabs',
						'description' => __( 'Do you want to show tabs at side?', 'kreativa' ),
						'value' => array( __( 'Yes, please', 'kreativa' ) => 'yes' )
					)
			);


/*----------------------------------------------------------------------------*
 * Row
 *----------------------------------------------------------------------------*/

vc_add_param('vc_row',array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Background Size", 'kreativa'),
					"param_name" => "bg_size",
					"value" => array(
						'Cover' => "",
						'Contain' => "contain",
						'Default' => "auto",
						),
					"description" => __("Select the way background image will be sized.", 'kreativa'),
					"dependency" => array( 'element' => 'bg_type', 'value' => array('image') ),
				)
			);
}

/*----------------------------------------------------------------------------*
 * Prcing Table
 *----------------------------------------------------------------------------*/

vc_map(
		array(
			'name' => __('Pricing Table', 'kreativa'),
			'base' => 'pricing',
			'class' => '',
			'category' => __('Kreativa', 'kreativa'),
			'admin_enqueue_js' => '',
			'admin_enqueue_css' => '',
			'params' => array(
				
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Alternative Style", 'kreativa'),
					"param_name" => "scheme",
					"value" => array(
						'Default' => '',
						'Dark' => 'style-dark',
						
					),
					"description" => __("Select an alternative color scheme to be used. Light turns background white to darker backgrounds.", 'kreativa'),
				),
				array(
					"type" => "textarea_html",
					"class" => "",
					"heading" => __("Items", 'kreativa'),
					"param_name" => "content",
					"value" => '<ul><li>Item</li><li>Item</li><li>Item</li></ul>',
					"description" => __("Insert here an unordered list/ul to display the items.", 'kreativa'),
				),
				
				array(
					"type" => "textfield",
					"heading" => __("Plan Title", 'kreativa'),
					"param_name" => "title",
					"value" => "Starter",
					"admin_label" => true,
					"description" => __("The main plan title displayed at top.", 'kreativa')
				),
				array(
					"type" => "textfield",
					"heading" => __("Price Value ", 'kreativa'),
					"param_name" => "price",
					"value" => "19",
					"description" => __("Price without currency.", 'kreativa')
				),
				array(
					"type" => "textfield",
					"heading" => __("Decimal Value ", 'kreativa'),
					"param_name" => "price_small",
					"value" => "99",
					"description" => __("Small Price used for decimal numbers.", 'kreativa')
				),
				array(
					"type" => "textfield",
					"heading" => __("Currency", 'kreativa'),
					"param_name" => "currency",
					"value" => "$",
					"description" => __("The currency displayed aside price.", 'kreativa')
				),
				array(
					"type" => "textfield",
					"heading" => __("Period", 'kreativa'),
					"param_name" => "period",
					"value" => "/month",
					"description" => __("The plan period that is displayed when supported by template.", 'kreativa')
				),
				array(
					"type" => "textfield",
					"heading" => __("Button Link", 'kreativa'),
					"param_name" => "link",
					"value" => "#",
					"description" => __("Button link. Leave blank and the button won't be displayed.", 'kreativa')
				),
				array(
					"type" => "textfield",
					"heading" => __("Button Text", 'kreativa'),
					"param_name" => "button_text",
					"value" => "Get this now",
					"description" => __("Button text to be displayed.", 'kreativa')
				),
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Featured?", 'kreativa'),
					"param_name" => "featured",
					"value" => array(
						'No' => '',
						'Yes' => 'yes',
					),
					'dependency' => array('element' => 'template', 'value' => array('default', 'subtitle', 'small-desc') ),
					"description" => __("Select yes to turn this table featured, this allow you add a little text above like 'Best Price', for example.", 'kreativa'),
				),
					array(
						"type" => "textfield",
						"heading" => __("Featured Text", 'kreativa'),
						"param_name" => "featured_text",
						"value" => "",
						'dependency' => array('element' => 'featured', 'value' => array('yes') ),
						"description" => __("Text displayed in featured box, e.g. 'Best Price'.", 'kreativa')
					),
				array(
					"type" => "textfield",
					"heading" => __("Extra class name", 'kreativa'),
					"param_name" => "el_class",
					"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'kreativa')
				),
				
				

			),				
		)
	);

/*----------------------------------------------------------------------------*
 * Circular Counter
 *----------------------------------------------------------------------------*/

vc_map(
		array(
			'name' => __('Circular Counter', 'kreativa'),
			'base' => 'circularcounter',
			'class' => '',
			'category' => __('Kreativa', 'kreativa'),
			'admin_enqueue_js' => '',
			'admin_enqueue_css' => '',
			'params' => array(
				array(
					"type" => "textfield",
					"heading" => __("Plan Title", 'kreativa'),
					"param_name" => "title",
					"value" => "Starter",
					"admin_label" => true,
				),
				array(
					"type" => "textfield",
					"heading" => __("Percentage Value ", 'kreativa'),
					"param_name" => "value",
					"value" => "75",
					"description" => __("This is plain percentage value without % sign.", 'kreativa')
				),
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Size of Circle", 'kreativa'),
					"param_name" => "size",
					"value" => array(
						'Default' => '',
						'Big' => 'big',
						),
					),
				array(
					"type" => "textfield",
					"heading" => __("Extra class name", 'kreativa'),
					"param_name" => "el_class",
					"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'kreativa')
				),
				
				

			),				
		)
	);

/*----------------------------------------------------------------------------*
 *Counter
 *----------------------------------------------------------------------------*/

vc_map(
		array(
			'name' => __('Counter', 'kreativa'),
			'base' => 'counter',
			'class' => '',
			'category' => __('Kreativa', 'kreativa'),
			'admin_enqueue_js' => '',
			'admin_enqueue_css' => '',
			'params' => array(
				array(
					"type" => "textfield",
					"heading" => __("Plan Title", 'kreativa'),
					"param_name" => "title",
					"value" => "Starter",
					"admin_label" => true,
				),
				array(
					"type" => "textfield",
					"heading" => __(" Value ", 'kreativa'),
					"param_name" => "value",
					"value" => "1000",
					"description" => __("This is plain value.", 'kreativa')
				),

				array(
					"type" => "textfield",
					"heading" => __(" Font awesome icon ", 'kreativa'),
					"param_name" => "icon",
					"value" => "pencil",
					"description" => __("Enter the icon name without fa- .", 'kreativa')
				),

				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Counter Style", 'kreativa'),
					"param_name" => "scheme",
					"value" => array(
						'Default' => 'style1',
						'Alternative' => 'style3',
						),
					),
				array(
					"type" => "textfield",
					"heading" => __("Extra class name", 'kreativa'),
					"param_name" => "el_class",
					"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'kreativa')
				),
				
				

			),				
		)
	);	

