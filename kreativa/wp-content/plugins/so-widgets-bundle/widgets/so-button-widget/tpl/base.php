<?php if($instance['rounding']=='slight'):
	$border='';
else:
	$border=' border-radius ';
endif;?>
<div class="text-<?php echo esc_attr($instance['align']);?> ">
	<div class="wow <?php echo esc_attr($instance['animation']);?>" >
		
			<?php if( !empty( $instance['btnurl'] ) ) 
				echo '<a  href="' . esc_url( $instance['btnurl'] ) . '" ' . ( $instance['new_window'] ? 'target="_blank"' : '' ) . ' class="btn btn-primary btn-'.$instance['size']. $border .($instance['alt']? ' btn-transparent':'').'" >'; ?>
	            <?php echo esc_attr($instance['btntext']);?>
	        <?php if( !empty( $instance['btnurl'] ) ) echo '</a>'; ?>			
		
	</div><!-- end col -->
</div><!-- end row -->