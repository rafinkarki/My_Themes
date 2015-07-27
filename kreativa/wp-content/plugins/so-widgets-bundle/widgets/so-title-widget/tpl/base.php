<div class="section-heading text-<?php echo wp_kses_post( $instance['align'] ); ?>" >
<?php if(!empty( $instance['title'])):?>
    <h<?php  echo esc_attr($instance['size']);?>><?php echo esc_attr( $instance['title'] ); ?></h<?php  echo esc_attr($instance['size']);?>>
<?php endif;?>

<?php if(!empty($instance['subtitle']))  : ?>
    <span class="section-subtitle"><?php echo esc_attr( $instance['subtitle'] ); ?></span>
<?php endif; ?>
</div>
