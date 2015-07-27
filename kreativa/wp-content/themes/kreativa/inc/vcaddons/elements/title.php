<?php
/**
 * Visual Composer Eelement: Title
 * 
 */

function title_func($atts, $content = null )
{
    extract(shortcode_atts(array(
                'heading' => '',
                'heading_tag' => 'h2',
                'align' => 'left', 
    ), $atts)); 
    
    ob_start();
    
    echo '<'.$heading_tag.' class="'.$align.'">';
    echo $heading;
    echo '</'.$heading_tag.'>';
 
    $html = ob_get_contents();
    ob_end_clean();
    return $html;

    
}
add_shortcode('title', 'title_func');