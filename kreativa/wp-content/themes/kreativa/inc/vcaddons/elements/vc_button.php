<?php
$output = $color = $size = $icon = $target = $href = $el_class = $title = $position = '';
extract( shortcode_atts( array(
	'color' => 'bg-blue',
	'text_color' => 'color-white',
	'size' => '',
	'icon' => '',
	'target' => '_self',
	'href' => '',
	'title' => __( 'Text on the button', "js_composer" ),
	'style' => 'filled',
	'br_thickness' => 'br-light',
	'br_color' => 'br-color-dark-blue',
	'position' => ''
), $atts ) );
$a_class = '';
if($style=='unfilled')
echo '<a class="button '.$style.''.$size.' '.$br_color.' '.$text_color.'" href="'.$href.'">';
else
echo '<a class="button '.$style.''.$size.' '.$color.' '.$text_color.'" href="'.$href.'">';

if(isset($icon) && $icon!='')
echo '<i class="fa fa-'.$icon.' icon-before"></i>';
echo $title.'</a>';

/*



if ( $el_class != '' ) {
	$tmp_class = explode( " ", strtolower( $el_class ) );
	$tmp_class = str_replace( ".", "", $tmp_class );
	if ( in_array( "prettyphoto", $tmp_class ) ) {
		wp_enqueue_script( 'prettyphoto' );
		wp_enqueue_style( 'prettyphoto' );
		$a_class .= ' prettyphoto';
		$el_class = str_ireplace( "prettyphoto", "", $el_class );
	}
	if ( in_array( "pull-right", $tmp_class ) && $href != '' ) {
		$a_class .= ' pull-right';
		$el_class = str_ireplace( "pull-right", "", $el_class );
	}
	if ( in_array( "pull-left", $tmp_class ) && $href != '' ) {
		$a_class .= ' pull-left';
		$el_class = str_ireplace( "pull-left", "", $el_class );
	}
}

if ( $target == 'same' || $target == '_self' ) {
	$target = '';
}
$target = ( $target != '' ) ? ' target="' . $target . '"' : '';

$color = ( $color != '' ) ? ' wpb_' . $color : '';
$size = ( $size != '' && $size != 'wpb_regularsize' ) ? ' wpb_' . $size : ' ' . $size;
$icon = ( $icon != '' && $icon != 'none' ) ? ' ' . $icon : '';
$i_icon = ( $icon != '' ) ? ' <i class="icon"> </i>' : '';
$position = ( $position != '' ) ? ' ' . $position . '-button-position' : '';
$el_class = $this->getExtraClass( $el_class );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_button ' . $color . $size . $icon . $el_class . $position, $this->settings['base'], $atts );

if ( $href != '' ) {
	$output .= '<span class="' . $css_class . '">' . $title . $i_icon . '</span>';
	$output = '<a class="wpb_button_a' . $a_class . '" title="' . $title . '" href="' . $href . '"' . $target . '>' . $output . '</a>';
} else {
	$output .= '<button class="' . $css_class . '">' . $title . $i_icon . '</button>';

}

echo $output . $this->endBlockComment( 'button' ) . "\n";
*/