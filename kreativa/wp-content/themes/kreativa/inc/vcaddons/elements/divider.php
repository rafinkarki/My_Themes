<?php
/**
 * Visual Composer Eelement: Title
 * 
 */

function divider_func($atts, $content = null )
{
    extract(shortcode_atts(array(
                'style' => '',

    ), $atts)); 
    
    ob_start();
    
    echo '<div class="divider '.$style.'"></div>';
 
    $html = ob_get_contents();
    ob_end_clean();
    return $html;

    
}
add_shortcode('divider', 'divider_func');