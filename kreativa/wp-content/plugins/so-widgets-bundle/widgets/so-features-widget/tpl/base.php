<div class="service-items">
	<div class="item">
		<div class="title">
			<?php echo siteorigin_widget_get_icon($instance['icon'], '');?>
			<h6><?php echo wp_kses_post( $instance['title'] ) ?></h6>
		</div>
		<?php if(!empty($instance['subtitle'])):?>
			<div class="description">
				<p><?php echo wp_kses_post( $instance['subtitle'] ) ?></p>
			</div>
		<?php endif;?>
		<?php if( $instance['btnurl']!='') : ?>
        	<div class="border-button">
        		<a href="<?php echo esc_url( $instance['btnurl'] ); ?>" <?php echo ( $instance['new_window'] ? 'target="_blank"' : '' ) ; ?>><?php echo esc_attr( $instance['btntext'] ); ?></a>
        	</div>
        <?php endif; ?>
	</div>
</div>