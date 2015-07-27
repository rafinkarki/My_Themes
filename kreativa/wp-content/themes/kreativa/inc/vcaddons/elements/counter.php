<?php
/**
 * Visual Composer Element: circularcounter Table
 * 
 */
function counter_func($atts, $content = null )
{
	extract( shortcode_atts( array(
				'el_class' => '',
				'title' => '',
				'scheme' => '',
				'value' => '',
			), $atts) );
    
    ob_start();
    ?>

    <div class="counter-box style3">
		<i class="fa fa-code"></i>
		<span class="sc-counter">9</span>
		<span class="counter-separator"></span>
		<h6>Awards</h6>
	</div>

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

add_shortcode('counter', 'counter_func');