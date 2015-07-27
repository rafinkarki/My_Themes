<div id="owl-page-tittle" class="owl-carousel owl-theme">
	<?php foreach( $instance['cta'] as $i => $cta ) : ?>
        <div class="item">
        	<div class="heading-content">
        	<h4><?php echo  esc_attr($cta['title']);?></h4>
	        <span><?php echo  esc_attr($cta['subtitle']);?></span>
	        <?php if( $cta['btnurl']!='') : ?>
	        	<div class="border-button">
	        		<a href="<?php echo esc_url( $cta['btnurl'] ); ?>" <?php echo ( $instance['new_window'] ? 'target="_blank"' : '' ) ; ?>><?php echo wp_kses_post( $cta['btntext'] ); ?></a>
	        	</div>
	        <?php endif; ?>		        
	        </div>
	    </div>
    <?php endforeach;?>   
</div>