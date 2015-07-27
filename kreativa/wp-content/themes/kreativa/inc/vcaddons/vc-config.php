<?php
if (function_exists('vc_map')) {
/*----------------------------------------------------------------------------*
 * Force Visual Composer to initialize as "built into the theme". 
 * This will hide certain tabs under the Settings->Visual Composer page
 *----------------------------------------------------------------------------*/
	
	add_action( 'vc_before_init', 'kreativa_SetAsTheme' );

	function kreativa_SetAsTheme() {
	
		vc_set_as_theme();

		$dir = get_stylesheet_directory() . '/inc/vcaddons/elements';
		vc_set_shortcodes_templates_dir( $dir );

	}


/*----------------------------------------------------------------------------*
 * VC Map (Fields for each elements)
 *----------------------------------------------------------------------------*/

	
		require_once 'vc_map.php';

/*----------------------------------------------------------------------------*
 * Include All Custom Elements
 *----------------------------------------------------------------------------*/

	require_once 'elements/service.php';
	require_once 'elements/title.php';
	require_once 'elements/divider.php';
	require_once 'elements/price.php';
	//require_once 'elements/counter.php';
	require_once 'elements/circularcounter.php';
	//require_once 'elements/progressbar.php';
}


// Filter to replace default css class names for vc_row shortcode and vc_column
add_filter( 'vc_shortcodes_css_class', 'custom_css_classes_for_vc_row_and_vc_column', 10, 2 );
function custom_css_classes_for_vc_row_and_vc_column( $class_string, $tag ) {
  if ( $tag == 'vc_row' || $tag == 'vc_row_inner' ) {
    $class_string = str_replace( 'vc_row-fluid', 'row-fluid', $class_string ); // This will replace "vc_row-fluid" with "my_row-fluid"
  }
  if ( $tag == 'vc_column' || $tag == 'vc_column_inner' ) {
    $class_string = preg_replace( '/vc_col-sm-(\d{1,2})/', 'vc_col-sm-$1', $class_string ); // This will replace "vc_col-sm-%" with "my_col-sm-%"
  }
  return $class_string; // Important: you should always return modified or original $class_string
}