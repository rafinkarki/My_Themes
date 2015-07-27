<?php
/**
 * Visual Composer Eelement: Service
 * 
 */
function service_func($atts, $content = null )
{
	extract(shortcode_atts(array(
                'ico' => '',
                'style' => '',
                'size' => 'fa-3x',
                'social_auto' => '',
                'glow' => '',
                'link' => '',
                'target' => '',
                'align' => '',
                'css_animation' => '',
                'el_class' => '',
                'template' => '',
    ), $atts)); 
    
    ob_start();
    ?>
    <div class="row">
	    <div class="col-md-2">
	    <div class="fa fa-<?php echo esc_attr($icon); ?>"></div>
	    </div>
	    <div class="col-md-10 icon">
	   		<?php echo $content; ?>
	    </div>
    </div>
    <?php
    
    $html = ob_get_contents();
	ob_end_clean();
    return $html;    
}

add_shortcode('service', 'service_func');