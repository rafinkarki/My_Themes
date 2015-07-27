<?php
/**
 * Visual Composer Element: circularcounter Table
 * 
 */
function circularcounter_func($atts, $content = null )
{
	extract( shortcode_atts( array(
				'el_class' => '',
				'title' => '',
				'size' => '',
				'value' => '',
			), $atts) );
    
    ob_start();
    ?>

    <div class="circular-progressbar <?php echo $size;?> <?php echo $el_class;?>">
		<input type="text" 
		value="<?php echo $value;?>" 
		data-fgColor="#5661e8"
		data-bgColor="#c6d0e2">
		<h6><?php echo $title;?></h6>
	</div>
    <?php
    
    $html = ob_get_contents();
	ob_end_clean();
    return $html;    
}

add_shortcode('circularcounter', 'circularcounter_func');