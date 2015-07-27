<?php $src = wp_get_attachment_image_src($instance['image'], 'full');?>       
<div class="client-items">	
	<div class="item">
		<div class="client-holder">
			<img src="<?php echo esc_url($src[0]);?>" alt="" >
			<?php if( $instance['desc']!='') : ?>
				<div class="client-content">
					<p><?php echo wp_kses_post($instance['desc']);?></p>
				</div>
			<?php endif;?>
		</div>
	</div>	
</div>