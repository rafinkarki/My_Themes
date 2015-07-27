<?php if($instance['style']=='1' || $instance['style']=='3'): 
	$class='';$b='';$g='';$p='';$y='';
	$style='';
	$style.='style="color:'.esc_html($instance['type']['color']).'; ';
	$style.='text-align:'.esc_attr($instance['type']['align']).';"'; 
	if($instance['style']=='3'):
		$class='colorized';
		$b=' color-blue';
		$g=' color-green';
		$p=' color-purple';
		$y=' color-yellow';
	endif;
?>
	<div id="countdown" data-date="<?php echo esc_attr($instance['date']);?>" data-id="1">
	    <div class="stat f-container" >
	        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 <?php echo $class. $b;?>" >
	            <div class="count-counter">
	                <h1 class="days stat-count" <?php echo $style;?>><?php _e('0','siteorigin_widgets');?></h1>
	                <p class="count-details" <?php echo $style;?>>Days</p>
	            </div>
	        </div>
	        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 <?php echo $class. $g;?>">
	            <div class="count-counter">
	                <h1 class="hours stat-count" <?php echo $style;?>><?php _e('0','siteorigin_widgets');?></h1>
	                <p class="count-details" <?php echo $style;?>><?php _e('Hours','siteorigin_widgets');?></p>
	            </div>
	        </div>
	        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 <?php echo $class. $p;?>">
	            <div class="count-counter">
	                <h1 class="minutes stat-count" <?php echo $style;?>><?php _e('0','siteorigin_widgets');?></h1>
	                <p class="count-details" <?php echo $style;?>><?php _e('Minutes','siteorigin_widgets');?></p>
	            </div>
	        </div>
	        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 <?php echo $class. $y;?>">
	            <div class="count-counter">
	                <h1 class="seconds stat-count" <?php echo $style;?>><?php _e('0','siteorigin_widgets');?></h1>
	                <p class="count-details" <?php echo $style;?>><?php _e('Seconds','siteorigin_widgets');?></p>
	            </div>
	        </div>
	    </div><!-- stat -->
	</div><!-- end countdown -->
<?php else:?>
	<div id="countdown" class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
	   <div id="DateCountdown" data-date="<?php echo esc_attr($instance['date']);?>" data-id="2"></div>
	</div><!-- end countdown -->
<?php endif;?>